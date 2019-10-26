@include('admin.menu')

    @if(count($errors) > 0)
            <div class=alert alert-success style="color:red;font-size:25px;text-align:center">
            @foreach($errors->all() as $er )
                {{$er}} <br>
            @endforeach
            </div>
    @endif
        
    @if(session('notice'))
        <div class=alert alert-success style="color:red;font-size:25px;text-align:center">
        {{session('notice')}}
        </div>
    @endif

    <div>   
        <h1 style="color:blue">Tin Tức:</h1>
        <small style="color:blue;font-size:20px;">{{$tintuc->TieuDe}}</small>
    </div>

    <div class="col-lg-7" style="padding-bottom:120px">
        <form enctype="multipart/form-data" action="<?php echo url('upload/{{$tintuc->Hinh}}'); ?>" method="POST" style="margin-left:500px;margin-top:100px">
        @csrf
            <div>  
                <label>Chuyên Mục</label>
                <select name="ChuyenMuc" id="idChuyenMuc" style="font-size:15px">
                    @foreach($chuyenmuc as $cm)
                   
                        <option style="font-size:15px" value="{{$cm->id}}">{{$cm->Ten}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label style="font-size:20px;">Tiêu Đề</label>
                <input value="{{$tintuc->TieuDe}}" name="TieuDe" style="font-size:15px;"/>
            </div>       
            <br>
            <div>
                <label style="font-size:20px;">Tóm Tắt</label>
                <textarea  id="demo" name="TomTat" class="form-control ckeditor" row="3" style="font-size:15px;">
                    {{$tintuc->TomTat}}
                </textarea>
            </div>  
            <br>
            <div>
                <label style="font-size:20px;">Nội Dung</label>
                <textarea id="demo" name="NoiDung" class="form-control ckeditor" row="8" style="font-size:15px;">
                    {{$tintuc->NoiDung}}    
                </textarea>    
            </div>
            <br> 
            <div>
                <label>Hình Ảnh</label>
                <p>
                <img width="300px" src="upload/tintuc/{{$tintuc->Hinh}}">
                <p>
                <input type="file" name="Hinh"/>
            </div>
            <br>
            <div>
            <label>Nội Bật:</label>
            <label class="radio-inline">
                <input name="rDoStatus" value="1" type="radio">Có
            </label>
            </div>
            <br>
            <button style="font-size:20px;" type="submit" class="btn btn-default">Thêm vào</label>
            <button style="font-size:20px;" type="reset" class="btn btn-default">Reset</label>
        </form>

    </div>

    <div id="wrapper">
        <div id="table">

            <table> 
                <tr id="row1">
                    <td><a style="font-size:30px;color:white;">id</a></td>
                    <td><a style="font-size:30px;color:white;">Người Dùng</a></td>
                    <td><a style="font-size:30px;color:white;">Nội Dung</a></td>
                    <td><a style="font-size:30px;color:white;">Ngày đăng</a></td>
                    <td><a style="font-size:30px;color:white;">delete</a></td>
                </tr>

                @foreach($tintuc->comment as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->user->name}}</td>
                    <td>{{$c->NoiDung}}</td>
                    <td>{{$c->created_at}}</td>
                    <td><a href="//localhost/MyLaravel/public/admin/comment/xoa/{{$c->id}}/{{$tintuc->id}}">delete</a></td>
                </tr>
                @endforeach()

            </table>
        </div>
    </div>    
    
@include('layout.footer')