<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function getDanhsach(){
        $user=User::all();
        return view("admin/user/danhsach",['user'=>$user]);
    }

    public function getThem(){
        $user=User::all();
        return view('admin/user/them');
    }


    //
    public function postThem(Request $request){
        $this->validate($request,[
            'Ten'=>'required|min:6',
            'Email'=>'required|min:6|unique:users,Email',
            'Password'=>'required|min:6',
            'RePassword'=>'required|same:Password',
        ],[
            'Ten.required'=>'Bạn chưa nhập tên',
            'Ten.min'=>'Tên phải có ít nhất 6 kí tự',

            'Email.required'=>'Bạn chưa nhập email',
            'Email.min'=>'email phải có ít nhất 6 kí tự',
            'Email.unique'=>'Email đã tồn tại',
            
            'Password.require'=>'bạn chưa nhập mật khẩu',
            'Password.min'=>'mật khẩu phải có ít nhất 6 kí tự',
            'RePassword.required'=>'bạn chưa nhập lại mật khẩu',
            'RePassword.same'=>'mật khẩu ko trùng khớp',
        ]);

        $user = new User;
        $user->name=$request->Ten;
        $user->email=$request->Email;
        $user->password =bcrypt($request->Password);
        $user->level=0;
        $user->save();
        return redirect('admin/user/them')->with('notice','Thêm thành viên thành công');
    }

    //-------------sửa user-----------
    public function getSua($id){
        $user=User::find($id);
        return view('admin/user/sua',['user'=>$user]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,[
            'Ten'=>'required|min:6',
            'Password'=>'required|min:6',
            'RePassword'=>'required|same:Password',
        ],[
            'Ten.required'=>'Bạn chưa nhập tên',
            'Ten.min'=>'Tên phải có ít nhất 6 kí tự',
            
            'Password.require'=>'bạn chưa nhập mật khẩu',
            'Password.min'=>'mật khẩu phải có ít nhất 6 kí tự',
            'RePassword.required'=>'bạn chưa nhập lại mật khẩu',
            'RePassword.same'=>'mật khẩu ko trùng khớp',
        ]);
        $user=User::find($id);
        $user->name=$request->Ten;
        $user->email== $user->email;
        $user->password =bcrypt($request->Password);
        $user->level=0;
        $user->save();
        return redirect('admin/user/danhsach')->with('notice','sửa thành viên thành công tài khoản:'.$user->email);
    }

    //------------Xóa user-------------------
    public function getXoa($id){
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('notice','đã xóa thành công thành viên:'.":".$user->Ten);
    }

    // Đăng nhập 
    public function getDangnhapAdmin(){
        return view('admin/login');
    }

    public function postDangnhapAdmin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Bạn chưa nhập email',   
            'password.required'=>'bạn chưa nhập mật khẩu',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/chuyenmuc/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('notice','lỗi nhập email hoặc mật khẩu');
        }
    }

    public function getDangXuatAmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function getdangki(){
        return view('admin/register');
    }

    public function postdangki(Request $request){
        $this->validate($request,[
            'Ten'=>'required|min:6',
            'Email'=>'required|min:6|unique:users,Email',
            'Password'=>'required|min:6',
            'RePassword'=>'required|same:Password',
        ],[
            'Ten.required'=>'Bạn chưa nhập tên',
            'Ten.min'=>'Tên phải có ít nhất 6 kí tự',

            'Email.required'=>'Bạn chưa nhập email',
            'Email.min'=>'email phải có ít nhất 6 kí tự',
            'Email.unique'=>'Email đã tồn tại',
            
            'Password.require'=>'bạn chưa nhập mật khẩu',
            'Password.min'=>'mật khẩu phải có ít nhất 6 kí tự',
            'RePassword.required'=>'bạn chưa nhập lại mật khẩu',
            'RePassword.same'=>'mật khẩu ko trùng khớp',
        ]);

        $user = new User;
        $user->name=$request->Ten;
        $user->email=$request->Email;
        $user->password =bcrypt($request->Password);
        $user->level=0;
        $user->save();
        return redirect('admin/dangnhap')->with('notice','đăng kí thành công');
    }

}


