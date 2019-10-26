@include('admin.menu')
    <h1 style="color:blue">Chuyên Mục:<small>{{$chuyenmuc->Ten}}</small></h1>  

    <div class="col-lg-7" style="padding-bottom:120px">
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

        <form action="{{$chuyenmuc->id}}" method="POST" style="margin-left:500px;margin-top:100px">
        @csrf
            <div>
                <label style="font-size:20px;">Chỉnh tên thể loại:</label>
                <input name="Ten" placeholder="Điền tên thể loại" value="{{$chuyenmuc->Ten}}" style="font-size:20px;"/>
            </div>       
            <br>  
            <button style="font-size:20px;" type="submit" class="btn btn-default">Sửa</label>
            <button style="font-size:20px;" type="reset" class="btn btn-default">Reset</label>
        </form>
    </div>

@include('layout.footer')