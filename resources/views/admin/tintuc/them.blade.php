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

    <div class="col-lg-7" style="padding-bottom:120px">
        <form enctype="multipart/form-data" action="<?php echo url('/admin/tintuc/them'); ?>" method="POST" style="margin-left:500px;margin-top:100px">
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
                <input name="TieuDe" placeholder="Nhập tiều đề" style="font-size:15px;"/>
            </div>       
            <br>
            <div>
                <label style="font-size:20px;">Tóm Tắt</label>
                <textarea id="demo" name="TomTat" class="form-control ckeditor" row="3" style="font-size:15px;"></textarea>
            </div>  
            <br>
            <div>
                <label style="font-size:20px;">Nội Dung</label>
                <textarea id="demo" name="NoiDung" class="form-control ckeditor" row="8" style="font-size:15px;"></textarea>    
            </div>
            <br> 
            <div>
                <label>Hình Ảnh</label>
                <input type="file" name="Hinh"/>
            </div>
            <br>
            <div>
            <label>Nội Bật:</label>
            <label class="radio-inline">
                <input name="rDoStatus" value="1" type="radio">Có
            </label>
            <label class="radio-inline">
                <input name="rDoStatus" value="0" type="radio">Không
            </label>
            </div>
            <br>
            <button style="font-size:20px;" type="submit" class="btn btn-default">Thêm vào</label>
            <button style="font-size:20px;" type="reset" class="btn btn-default">Reset</label>
        </form>
    </div>

@include('layout.footer')