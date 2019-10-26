<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\ChuyenMuc;
use App\Comment;
class CommentController extends Controller
{

    // Xóa comment
    public function getXoa($id,$idTinTuc){
        $comment=Comment::find($id);
        var_dump($comment);
        $comment->delete();
        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('notice','Đã xóa bình luận thành công');
    }


}
