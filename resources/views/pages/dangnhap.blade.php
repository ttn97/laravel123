@include('layout.header')   
    <br>

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

    <div name="login">
        <fieldset style="width:300px;height:150px;margin:50px auto 170px;">
            <legend style="font-size:40px;">Login</legend>
        <form action="dangnhap" method="POST">
        @csrf

            <label style="font-size:20px;">email</label>
            <label style="font-size:20px;"><input style="margin-left:30px;"type="text" name="email" size="25"/></label>
            <br>
            <br>
            <label style="font-size:20px;">password</label>
            <label style="font-size:20px;"><input type="password" name="password" size="25"/></label>
            <br>
            <br>
            <label><button style="font-size:20px;" type="submit" class="btn btn-default">Login</label>
        </form>        
        </fieldset>
    </div>    
@include('layout.footer')