@include('admin.menu')
    <div id="wrapper">
        <div id="table">
            <table> 
                <tr>            
                    <td colspan="3"></td>
                    <td colspan="2" style="background-color:blueviolet;"><a href="#">Thêm chuyên mục</a></td>
                </tr>
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
                    <td><a href="#">Edit<a></td>
                    <td><a href="#">delete</a></td>
                </tr>
                @endforeach()

            </table>
        </div>
    </div>    

@include('layout.footer')