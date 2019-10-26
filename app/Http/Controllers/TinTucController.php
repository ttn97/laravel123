<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\ChuyenMuc;
use App\Comment;
class TinTucController extends Controller
{
    //danh sách
    public function getDanhsach(){
        $tintuc=TinTuc::all();
        return view('admin/tintuc/danhsach',['tintuc'=>$tintuc]);
    }

    //Thêm Tin tức
    public function getThem(){
        $chuyenmuc=ChuyenMuc::all();
        return view('admin/tintuc/them',['chuyenmuc'=>$chuyenmuc]);
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'ChuyenMuc'=>'required',
            'TieuDe'=>'required|min:6|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ],
        [
            'ChuyenMuc.required'=>'Bạn chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.unique'=>'tiêu đề đã tồn tại',
            'TieuDe.min'=>'tiêu đề phải có ít nhất 6 kí tự',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
        ]);
        $tintuc = new TinTuc;
        $tintuc->idChuyenMuc=$request->ChuyenMuc;
        $tintuc->TieuDe= $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->SoLuotXem=0;
        $tintuc->NoiBat=$request->rDoStatus;
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png'){
                return redirect("admin/tintuc/them")->with('notice','Bạn chỉ đc thêm ảnh có đuổi jpg hoặc png');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(5)."_".$name;
            while(file_exists('upload'.$Hinh))
            {
                $Hinh = str_random(5)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
        }
        else{
            $tintuc->Hinh="";
        }
        $tintuc->save();
        return redirect("admin/tintuc/them")->with('notice','Bạn đã thêm 1 tin thành công');
    }

    // sửa tin tức
    public function getSua($id){
        $chuyenmuc=ChuyenMuc::all();
        $tintuc=TinTuc::find($id);
        return view('admin/tintuc/sua',['chuyenmuc'=>$chuyenmuc,'tintuc'=>$tintuc]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,[
            'ChuyenMuc'=>'required',
            'TieuDe'=>'required|min:6|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ],
        [
            'ChuyenMuc.required'=>'Bạn chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.unique'=>'tiêu đề đã tồn tại',
            'TieuDe.min'=>'tiêu đề phải có ít nhất 6 kí tự',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
        ]);
        $tintuc=TinTuc::find($id);
        $tintuc->idChuyenMuc=$request->ChuyenMuc;
        $tintuc->TieuDe= $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->SoLuotXem=0;
        $tintuc->NoiBat=$request->rDoStatus;
        if($request->hasFile('Hinh')){
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png'){
                return redirect("admin/tintuc/them")->with('notice','Bạn chỉ đc thêm ảnh có đuổi jpg hoặc png');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(5)."_".$name;
            while(file_exists('upload'.$Hinh))
            {
                $Hinh = str_random(5)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
        }
        else{
            $tintuc->Hinh="";
        }
        $tintuc->save();
        return redirect("admin/tintuc/them")->with('notice','Bạn đã thêm 1 tin thành công');

    }


    // Xóa Tin tức
    public function getXoa($id){
        $tintuc=TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('notice','Đã xóa thành công tin tức'.":".$tintuc->TieuDe);
    }


}
