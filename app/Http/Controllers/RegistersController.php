<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class RegistersController extends AdminController
{

    public $model = 'registers';

    public $validator = [

    ];
    private function init()
    {
        return '\\App\\' . ucfirst(str_singular($this->model));
    }
    public function index(Request $request)
    {

        $searchContent = '';
        $searchFromDate = '';
        $searchToDate = '';
        $modelClass = $this->init();

        $contents = $modelClass::latest('created_at');
        if ($request->input('q')) {
            $searchContent = urldecode($request->input('q'));
            $contents = $contents->where('name', 'LIKE', '%'. $searchContent. '%');
        }

        if ($request->input('from_date')) {
            $searchFromDate = urldecode($request->input('from_date'));
            $contents = $contents->where('created_at', '>', $searchFromDate.' 00:00:00');
        }

        if ($request->input('to_date')) {
            $searchToDate = urldecode($request->input('to_date'));
            $contents = $contents->where('created_at', '<', $searchToDate.' 23:59:59');
        }

        $contents = $contents->paginate(10);

        return view('admin.'.$this->model.'.index', compact('contents', 'searchContent', 'searchFromDate', 'searchToDate'))->with('model', $this->model);
    }

    public function create()
    {
        $modelClass = $this->init();
        $content = new $modelClass;
        return view('admin.'.$this->model.'.form', compact('content'))->with('model', $this->model);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validator);
        if ($validator->fails()) {
            return redirect('admin/'.$this->model.'/create')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();
        $data['password'] =  Hash::make(time());
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'));
        } else {
            unset($data['image']);
        }
        $modelClass = $this->init();
        $modelClass::create($data);
        flash()->success('Success created!');
        return redirect('admin/'.$this->model);
    }
    public function edit($id)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        return view('admin.'.$this->model.'.form', compact('content'))->with('model', $this->model);
    }
    public function update($id, Request $request)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        $data = $request->all();
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'), $content->image);
        } else {
            unset($data['image']);
        }
        $content->update($data);
        flash()->success('Success edited!');
        return redirect('admin/'.$this->model);
    }
    public function destroy($id)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        $content->delete();
        flash()->success('Success Deleted!');
        return redirect('admin/'.$this->model);
    }
}
