<?php

namespace App\Http\Controllers;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Laravel\Socialite\Facades\Socialite;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth.backend',  ['except' => [
            'ajax',
            'redirectToGoogle',
            'handleGoogleCallback',
            'notice'
        ]]);
    }

    /**
     * Save images
     * @param $file
     * @param null $old
     * @return string
     */
    public function saveImage($file, $old = null)
    {
        $filename = $file->getClientOriginalName();

        if (file_exists(public_path('files/images/'. $filename))) {
            $filename = substr(uniqid(), 0, 4).'_'.$filename;
        }

        Image::make($file->getRealPath())->save(public_path('files/images/'. $filename));

        if ($old) {
            @unlink(public_path('files/images/' .$old));
        }
        return $filename;
    }

    /** Redirect to G+ authenticate.
     * @return mixed
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->email)->get();

            if ($user->count() > 0) {
                session()->put('admin_login', $user->first());
                session()->put('admin_token', $googleUser->token);
                return redirect('/admin');
            } else {
                flash('Invalid Credentials!');
                @file_get_contents('https://accounts.google.com/o/oauth2/revoke?token='. $googleUser->token);
                return redirect('admin/notice');
            }
        } catch (Exception $e) {
            flash('Error when login! Please try again!');
            return redirect('admin/notice');
        }

    }

    public function logout()
    {
        session()->forget('admin_login');
        @file_get_contents('https://accounts.google.com/o/oauth2/revoke?token='. session()->get('admin_token'));
        session()->forget('admin_token');
        return redirect('admin/notice');
    }

    public function index(Request $request)
    {
        $user = session()->get('admin_login');
        return view('admin.index', compact('user'));
    }

    public function notice()
    {
        return view('admin.notice');
    }

    public function export($content)
    {

        $modelClass = '\\App\\' . ucfirst(str_singular($content));
        $contents = $modelClass::latest('created_at')->get();
        $filename = storage_path('logs/'. $content.'_'.uniqid(time()).'xls');

        Excel::create($filename, function($excel) use($contents) {

            $excel->sheet('Export', function($sheet) use($contents) {
                $sheet->fromArray($contents);

            });

        })->download('xls');
    }
}
