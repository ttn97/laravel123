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
                    <td><a style="font-size:30px;color:white;">Tên Chuyên Mục</a></td>
                    <td><a style="font-size:30px;color:white;">Tên Không Dấu</a></td>
                    <td><a style="font-size:30px;color:white;">Edit</a></td>
                    <td><a style="font-size:30px;color:white;">delete</a></td>
                </tr>

                @foreach($chuyenmuc as $cm)
                <tr>
                    <td>{{$cm->id}}</td>
                    <td>{{$cm->Ten}}</td>
                    <td>{{$cm->TenKhongDau}}</td>
                    <td><a href="sua/{{$cm->id}}">Edit<a></td>
                    <td><a href="xoa/{{$cm->id}}">delete</a></td>
                </tr>
                @endforeach()

            </table>
        </div>
    </div>    

@include('layout.footer')