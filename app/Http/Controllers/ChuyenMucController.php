<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenMuc;


class ChuyenMucController extends Controller
{
    // CHUYÊN MỤC
    public function getDanhsach(){
        $chuyemuc = ChuyenMuc::all();
        return view('admin/chuyenmuc/danhsach',['chuyenmuc'=>$chuyemuc]);
    }

    //ChuyenMuc Thêm
    public function getThem(){
        return view('admin/chuyenmuc/them');
    }

    public function postThem(Request $request){
        $this->validate($request,
        [
            'Ten' => "required|unique:ChuyenMuc,Ten|min:6|max:100"
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên chuyên mục',
            'Tên.min'=>'Tên phải có độ dài hơn 6 kí tự',
            'Tên.max'=>'Tên phải có độ dài nhỏ hơn 100 kí tự',
            'Ten.unique'=>'Tên chuyên mục đã tồn tại',
        ]);
        $chuyenmuc = new ChuyenMuc;
        $chuyenmuc->Ten=$request->Ten;
        $chuyenmuc->TenKhongDau=changeTitle($request->Ten);
        $chuyenmuc->save();
        return redirect('admin/chuyenmuc/them')->with('notice','thêm thành công');
    }
    //ChuyenMuc Sửa
    public function getSua($id){
        $chuyenmuc=ChuyenMuc::find($id);
        return view('admin/chuyenmuc/sua',['chuyenmuc'=>$chuyenmuc]);
    }

    public function postSua($id,Request $request){
        $this-> validate($request,
        [
            'Ten'=>'required|unique:ChuyenMuc,Ten|min:6|max:100'
        ],
        [
            'Ten.required'=>'Bạn nhập chuyên mục',
            'Ten.min'=>'Tên phải có độ dài hơn 6 kí tự',
            'Ten.max'=>'Tên phải có độ dài nhỏ hơn 100 kí tự',
            'Ten.unique'=>'Tên chuyên mục đã tồn tại',
        ]);
        $chuyenmuc=ChuyenMuc::find($id);
        $chuyenmuc->Ten = $request->Ten;
        $chuyenmuc->TenKhongDau = ChangeTitle($request->Ten);
        $chuyenmuc->save();
        return redirect('admin/chuyenmuc/danhsach')->with('notice','sửa thành công');
    }

    //ChuyenMuc Xóa
    public function getXoa($id){
        $chuyenmuc=Chuyenmuc::find($id);
        $chuyenmuc->delete();
        return redirect('admin/chuyenmuc/danhsach')->with('notice','Đã xóa thành công chuyên mục'.":".$chuyenmuc->Ten);
    }
}

