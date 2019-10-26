@include('admin.menu')

    @if(session('notice'))
        <div class=alert alert-success style="color:red;font-size:25px;text-align:center">
        {{session('notice')}}
        </div>
    @endif

    <div id="wrapper">
        <div id="table">
            <table> 
                <tr id="row1">
                    <td><a style="font-size:30px;color:white;">id</a></td>
                    <td><a style="font-size:30px;color:white;">Tên</a></td>
                    <td><a style="font-size:30px;color:white;">Email</a></td>
                    <td><a style="font-size:30px;color:white;">Quyền</a></td>
                    <td><a style="font-size:30px;color:white;">Edit</a></td>
                    <td><a style="font-size:30px;color:white;">delete</a></td>
                </tr>

                @foreach($user as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                        @if($u->level == 0)
                            {{'Người Dùng'}}
                        @else
                            {{'Admin'}}
                        @endif
                    </td>
                    <td><a href="sua/{{$u->id}}">Edit<a></td>
                    <td><a href="xoa/{{$u->id}}">delete</a></td>
                </tr>
                @endforeach()

            </table>
        </div>
    </div>    

@include('layout.footer')