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
                    <td><a style="font-size:30px;color:white;">Thuộc Chuyên Mục</a></td>
                    <td><a style="font-size:30px;color:white;">Tiêu đề</a></td>
                    <td><a style="font-size:30px;color:white;">Tên Không Dấu</a></td>
                    <td><a style="font-size:30px;color:white;">Tóm Tắt</a></td>
                    <td><a style="font-size:30px;color:white;">Nội Dung</a></td>
                    <td><a style="font-size:30px;color:white;">Hình</a></td>
                    <td><a style="font-size:30px;color:white;">Nổi Bật</a></td>
                    <td><a style="font-size:30px;color:white;">Lượt xem</a></td>
                    <td><a style="font-size:30px;color:white;">Edit</a></td>
                    <td><a style="font-size:30px;color:white;">delete</a></td>
                </tr>

                @foreach($tintuc as $tt)
                <tr>
                    <td>{{$tt->id}}</td>
                    <td>{{$tt->idChuyenMuc}}</td>
                    <td>{{$tt->TieuDe}}</td>
                    <td>{{$tt->TieuDeKhongDau}}</td>
                    <td>{{$tt->TomTat}}</td>
                    <td>{{$tt->NoiDung}}</td>
                    <td>{{$tt->Hinh}}</td>
                    <td>
                        @if($tt->NoiBat == 0)
                        {{'Không'}}
                        @else
                        {{'Có'}}
                        @endif
                    </td>
                    <td>{{$tt->SoLuotXem}}</td>
                    <td><a href="sua/{{$tt->id}}">Edit</a></td>
                    <td><a href="xoa/{{$tt->id}}">delete</a></td>
                </tr>
                @endforeach()

            </table>
        </div>
    </div>    

@include('layout.footer')