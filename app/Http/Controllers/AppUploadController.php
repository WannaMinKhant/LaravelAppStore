<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Respose;
use Validator;
use Auth;

class AppUploadController extends Controller
{
	//return app upload page
    function index()
    {
    	return view('app_upload');
    }

    function upload(Request $request)
    {
        if($request->hasFile('file'))
        {
            $app_code = '';
        //input name
        $apps = $request->file('file');
        
        
        foreach($apps as $app)
        {
            //random name
            $new_name=rand().'-'.time().'.'.$app->getClientOriginalExtension();

            $app_size=$app->getClientSize();
            //add apps folder
            $app->move(public_path('apps'), $new_name);

            $app_code.='<div class="col-md-3" style="margin-bottom:24px;"><img src="http://localhost/UploadTest/public/apps/'.$new_name.'"class="img-thumbnail" /></div>';

        }
            

        $output=array(
                'success'=>'App is uploaded successfully ( '.$app_size.' Bytes )' ,

                'app'=> $app_code

            );
        return response()->json($output);

        }else{
            return 'No file selected';
        }
    	

    }

    function show()
    {
       
        $path=public_path('apps');
        $files=\File::files($path);
        foreach($files as $file)
        {
            $app=pathinfo($file);
            $ListofApp[]=$app['basename'];
        }
        return view('/view_apps')->with('Apps',$ListofApp);
    }

    function download($appName)
    {
        $filePath=public_path('apps/'.$appName);
        return response()->download($filePath);
        //echo $filePath;
    }

    // function login()
    // {
    //     return view('/admin/login');
    // }


    // function checkAdminLogin(Request $request)
    // {
    //     $this->validate($request,[
    //         'email' => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);

    //     $admin_data = array(
    //         'email' => $request->get('email'),
    //         'password'=> $request->get('password')
    //     );

    //     if(Auth::attempt($admin_data))
    //     {
    //         return redirect('/admin_successlogin');
    //     }else
    //     {
    //         return back()->with('error','wrong admin login');
    //     }
    // }

}
