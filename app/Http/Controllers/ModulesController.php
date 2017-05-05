<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ModulesController extends AdminController
{

    public $model = 'modules';

    public $validator = [
        'key_name' => 'required',
        'key_type' => 'required',
        'key_content' => 'required',
        'key_value' => 'required',
    ];


    public function store(Request $request)
    {
        $data = $request->all();
        $modelClass = '\\App\\' . ucfirst(str_singular($this->model));
        $modelClass::create($data);
        flash()->success('Success create '.$this->model.'!');
        return $request->input('redirect_back') ? redirect()->to($request->input('redirect_back')) : redirect('admin/'.$this->model);

    }

    public function update($id, Request $request)
    {
        $modelClass = '\\App\\' . ucfirst(str_singular($this->model));
        $content = $modelClass::find($id);
        $data = $request->all();
        $content->update($data);
        flash()->success('Success update '.$this->model.'!');
        return $request->input('redirect_back') ? redirect()->to($request->input('redirect_back')) : redirect('admin/'.$this->model);
    }

    public function destroy($id, Request $request)
    {
        $modelClass = '\\App\\' . ucfirst(str_singular($this->model));
        $content = $modelClass::find($id);
        $content->delete();
        flash()->success('Success delete '.$this->model.'!');
        return $request->input('redirect_back') ? redirect()->to($request->input('redirect_back')) : redirect('admin/'.$this->model);
    }
}