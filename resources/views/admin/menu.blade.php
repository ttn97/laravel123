<link rel="stylesheet" href="{{ URL::asset('css/css.css') }}">
<div id="me">
        <h1>Welcome to admin</h1>
        <ul>
            <li>
                <a href="<?php echo url('/admin/user/danhsach'); ?>">Quản lí thành viên</a>
                <ul class="sub-menu">    
                    <li><a href="<?php echo url('/admin/user/them'); ?>">Thêm Thành viên</a></li>
                </ul>    
            </li>
            <li>
                <a href="<?php echo url('/admin/chuyenmuc/danhsach'); ?>">quản lí chuyên mục</a>
                <ul class="sub-menu">    
                    <li><a href="<?php echo url('/admin/chuyenmuc/them'); ?>">Thêm Chuyên Mục</a></li>
                </ul>   
            </li>
            <li>
                <a href="<?php echo url('/admin/tintuc/danhsach'); ?>">quản lí bài viết</a>
                <ul class="sub-menu">    
                    <li><a href="<?php echo url('/admin/tintuc/them'); ?>">Thêm Bài Viết</a></li>
                </ul>   
            </li>
            <li>
                <a href="<?php echo url('/admin/dangxuat'); ?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            </li> 
        </ul>
</div>