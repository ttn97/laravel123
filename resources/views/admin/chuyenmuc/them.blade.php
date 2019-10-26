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
        <form action="<?php echo url('/admin/chuyenmuc/them'); ?>" method="POST" style="margin-left:500px;margin-top:100px">
        @csrf
            <div>
                <label style="font-size:20px;">Tên thể loại</label>
                <input name="Ten" placeholder="Nhập tên chuyên mục" style="font-size:20px;"/>
            </div>       
            <br>  
            <button style="font-size:20px;" type="submit" class="btn btn-default">Thêm vào</label>
            <button style="font-size:20px;" type="reset" class="btn btn-default">Reset</label>
        </form>
    </div>

@include('layout.footer')