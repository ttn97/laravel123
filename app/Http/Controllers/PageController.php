<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenMuc;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;
use App\User;

class PageController extends Controller
{
    //

    function __construct()
    {
        $chuyenmuc=ChuyenMuc::all();
        $tintuc=TinTuc::all();
        $user=User::all();
        view()->share('chuyenmuc',$chuyenmuc);
        view()->share('tintuc',$tintuc);

     
            view()->share('user',Auth::user());
      
    }

    public function trangchu()
    {
        return view('pages/trangchu');
    }
    
    public function lienhe()
    {
        return view('pages/lienhe');
    }

    public function getdangnhap()
    {
        return view('pages/dangnhap');
    }
    
    public function postdangnhap(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:6|max:32',
        ],[
            'email.required'=>'Bạn chưa nhập email',   
            'password.required'=>'bạn chưa nhập mật khẩu',
            'password.min'=>'mật khẩu phải có từ 6 đến 32 kí tự',
            'password.max'=>'mật khẩu phải có từ 6 đến 32 kí tự'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/pages/trangchu');
        }
        else
        {
            return redirect('admin/dangnhap')->with('notice','lỗi nhập email hoặc mật khẩu');
        }
    }   
}
