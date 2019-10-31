<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\ChuyenMuc;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    // Xóa comment
    public function getXoa($id,$idTinTuc){
        $comment=Comment::find($id);
        var_dump($comment);
        $comment->delete();
        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('notice','Đã xóa bình luận thành công');
    }

    // post comment
    public function postComment($id,Request $request){
        $idTinTuc=$id;
        $tintuc=TinTuc::find($id);

        $comment= new Comment;
        $comment->idTintuc = $idTinTuc;
        $comment->idUser=Auth::User()->id;
        $comment->NoiDung=$request->NoiDung;
        $comment->save();
        return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html");
    }

}
