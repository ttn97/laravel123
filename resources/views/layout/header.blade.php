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
    <div id="menu">
        <ul>
            <a href="//localhost/MyLaravel/public/admin/pages/trangchu">Trang Chủ</a>
            <a href="#">Chuyên Mục</a>
            <a href="//localhost/MyLaravel/public/admin/pages/lienhe">Liên Hệ</a>
            <a href="#">Tin Khác</a>

            <div class="container">
                <input type="search" id="search" placeholder="tìm kiếm" style="font-size:25px;width:250px;float:left; border: #110121 solid 2px;" />
            </div>
            <div id="abc"> 
            @if(!isset($user))
                <a href="//localhost/MyLaravel/public/dangnhap"  style="border: #110121 solid 1px;">Đăng Nhập</a>
                <a href="//localhost/MyLaravel/public/dangki"  style="border: #110121 solid 1px;">Đăng Kí</a>     
           
            
                <a style="border: #110121 solid 1px;">
                    {{$user->name}}
                </a>
                <a href="dangxuat"  style="border: #110121 solid 1px;">Đăng xuất</a>
            @endif
            </div>
            
        </ul>
    </div>
