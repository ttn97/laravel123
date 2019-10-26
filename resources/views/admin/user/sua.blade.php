@include('admin.menu')
    <h1 style="color:blue">Người dùng:<small>{{$user->name}}</small></h1>    

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
        <form action="{{$user->id}}" method="POST" style="margin-left:500px;margin-top:100px">
        @csrf
            <div>
                <label style="font-size:20px;">Tên:</label>
                <input name="Ten" value="{{$user->name}}" placeholder="nhập tên" style="font-size:20px;margin-left:116px;"/>
            </div>    
            <br>   
            <div>
                <label style="font-size:20px;">Email:</label>
                <input name="Email" value="{{$user->email}}" placeholder="nhập email" readonly="" style="font-size:20px;margin-left:100px;"/>
            </div> 
            <br>  
            <div>
                <label style="font-size:20px;">Đổi Mật khẩu:</label>
                <input  type="password" name="Password" placeholder="mật khẩu" style="font-size:20px;margin-left:37px;"/>
            </div>  
            <br>
            <div>
                <label style="font-size:20px;">Nhập lại mật khẩu:</label>
                <input  type="password" name="RePassword" placeholder="" style="font-size:20px;"/>
            </div>   
            <br>  
            <button style="font-size:20px;" type="submit" class="btn btn-default">Sửa</label>
            <button style="font-size:20px;" type="reset" class="btn btn-default">Reset</label>
        </form>
    </div>

@include('layout.footer')