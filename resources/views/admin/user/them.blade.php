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
        <form action="<?php echo url('/admin/dangki'); ?>" method="POST" style="margin-left:500px;margin-top:100px">
        @csrf
            <div>
                <label style="font-size:20px;">Tên:</label>
                <input name="Ten" placeholder="nhập tên" style="font-size:20px;margin-left:116px;"/>
            </div>    
            <br>   
            <div>
                <label style="font-size:20px;">Email:</label>
                <input name="Email" placeholder="nhập email" style="font-size:20px;margin-left:100px;"/>
            </div> 
            <br>  
            <div>
                <label style="font-size:20px;">Mật khẩu:</label>
                <input type="password" name="Password" placeholder="mật khẩu" style="font-size:20px;margin-left:71px;"/>
            </div>  
            <br>
            <div>
                <label style="font-size:20px;">Nhập lại mật khẩu:</label>
                <input type="password" name="RePassword" placeholder="" style="font-size:20px;"/>
            </div>   
            <br>  
            <button style="font-size:20px;" type="submit" class="btn btn-default">Đăng Kí</label>
            <button style="font-size:20px;" type="reset" class="btn btn-default">Reset</label>
        </form>
    </div>

@include('layout.footer')