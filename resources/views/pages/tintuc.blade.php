@include('layout.header')
    <div style="margin-left:200px;margin-top:50px;">
        <h1 style="color:blue;">{{$tintuc->TieuDe}}</h1>
        <small>Posted On {{$tintuc->created_at}}</small><br><br>
        <img src="//localhost/Mylaravel/public/upload/tintuc/{{$tintuc->Hinh}}"><br><br>
        {!!$tintuc->NoiDung!!}<br>
        <br><hr><br>

        @if(Auth::check())
        <div>
            <h4>Viết Bình Luận</h4>
            <form action="//localhost/MyLaravel/public/comment/{{$tintuc->id}}" method="POST" role="form">
            @csrf
                <textarea rows="3" name="NoiDung"> </textarea><br>
                <button style="color:#690" type="submit">Gửi Bình Luận</button>
            </form>
        </div>
        @endif
        
        
        @foreach($tintuc->comment as $cm)
        <div style="border: 2px solid black;heigh:100px;width:500px;margin-top:20px;">
            <h4 style="margin-left:">{{$cm->user->name}} <small>{{$cm->created_at}}</small> </h4>
            <p style="margin-left:20px;">{!!$cm->NoiDung!!}</p>
        </div>
        @endforeach
        
        <br><br>
        <h3 style="color:blue;">Tin Tức Liên quan</h3>
        <br><br>
        @foreach($tinlienquan as $lq)
        <div>
            <a style="color:red;font-size:20px;" href="//localhost/MyLaravel/public/tintuc/{{$lq->id}}/{{$lq->TieuDeKhongDau}}.html">{{$lq->TieuDe}}</a><br>
            <img src="//localhost/MyLaravel/public/upload/tintuc/{{$lq->Hinh}}" style="width:200px;heigh:250px"><br><br>
            <p>{{$lq->TomTat}}</p>
            <br><br>
        </div>
        <hr>
        @endforeach
    </div>
    <br>

@include('layout.footer')
