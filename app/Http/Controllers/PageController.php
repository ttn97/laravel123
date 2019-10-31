<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenMuc;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    //

    function __construct()
    {
        $chuyenmuc=ChuyenMuc::all();
        $tintuc=TinTuc::all();
        view()->share('chuyenmuc',$chuyenmuc);
        view()->share('tintuc',$tintuc);
        
        if(Auth::check()){
            view()->share('nguoidung',Auth::user());
        }
    }

    public function trangchu()
    {   
        $tintuc=TinTuc::paginate(4);
        return view('pages/trangchu')->with('tintuc',$tintuc);
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

    public function getdangxuat(){
        Auth::logout();
        return redirect('dangnhap');
    }

    public function tintuc($id){
        $tintuc=TinTuc::find($id);
        $tinlienquan = TinTuc::where('idChuyenMuc',$tintuc->idChuyenMuc)->take(3)->get();
        return view('pages/tintuc')->with('tintuc',$tintuc)->with('tinlienquan',$tinlienquan);
        
    }

    public function getsearch(Request $request){
        $key=$request->key;
        $tintuc=TinTuc::where('TieuDe','like',"%$key%")->orWhere('TomTat','like',"%$key%")->orWhere('NoiDung','like',"%$key%")->take(20)->paginate(5);
        return view('pages/timkiem')->with('tintuc',$tintuc)->with('key',$key);
    }
}
