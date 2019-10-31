<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/css.css') }}">
</head>
<body>
    <div id="menu" style="width:90%;">
        <ul>
            <a href="//localhost/MyLaravel/public/admin/pages/trangchu">Trang Chủ</a>
            <a href="#">Chuyên Mục 
            </a>
            <a href="//localhost/MyLaravel/public/admin/pages/lienhe">Liên Hệ</a>
            <a href="#">Tin Khác</a>

            <div class="container">
                <form action="{{asset('search')}}" method="GET" role="form">
                @csrf
                    <input name="key" type="search" id="search" placeholder="tìm kiếm" style="text-align:center;font-size:25px;height:35px;width:250px;float:left; border: #110121 solid 2px;" />
                    <button type="submit" style="font-size:25px;height:35px;width:100px;float:left; border: #110121 solid 2px;">Tìm</button>
                </form>
            </div>
            <div id="abc" style="text-align:right;"> 
            @if(Auth::check())
            <a href="//localhost/MyLaravel/public/dangxuat"  style="border: #110121 solid 1px;">Đăng xuất</a>
                @if(Auth::user()->level == 0)
                    <a style="border: #110121 solid 1px;">
                        xin chào {{Auth::user()->name}}!
                    </a>

                @else
                    <a href="//localhost/MyLaravel/public/admin/chuyenmuc/danhsach" style="border: #110121 solid 1px;">
                        Quản lí trang 
                    </a>
                    
                @endif
            @else
                <a href="//localhost/MyLaravel/public/dangnhap"  style="border: #110121 solid 1px;">Đăng Nhập</a>
                <a href="//localhost/MyLaravel/public/dangki"  style="border: #110121 solid 1px;">Đăng Kí</a>    



            @endif
            </div>
            
        </ul>

        <img src="//localhost/MyLaravel/public/bander.jpg" style="width:100%;height:215px;">
    </div>
