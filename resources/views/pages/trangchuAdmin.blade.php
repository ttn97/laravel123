@include('layout.header')
    <div class="panel panel-default">
        <div class="panel-heanding" style="backgroundcolor:#337AB7;color:white;">
            <h2 style="color:red;margin-top:0px; margin-bottom:0px;">
                Tin Tức Chung
            </h2>
        </div>

        <div class="panel-body" style="margin-left:200px;">
            @foreach($tintuc as $tt)
                <div class="row-item row">
                    <a href="//localhost/MyLaravel/public/tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><h3>{{$tt->TieuDe}}</h3></a>   
                    <h5>{{$tt->TomTat}}</h5>
                    <img src="//localhost/MyLaravel/public/upload/tintuc/{{$tt->Hinh}}" style="width:200px;heigh:250px">
                </div>
                <hr>
            @endforeach

             {!! $tintuc->render() !!} 
        </div>
    </div>
    <style>
        .pagination ul{
            display: inline-block;
            padding-left:0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination li{
            display: inline;
        }
        .pagination li > a,
        .pagination li > span {
            position:relative;
            float:left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.428571429;
            text-decoration: none;
            background-color: #ffffff;
            border: 1px solid #dddddd;
        }
        .pagination li:last-child > a,
        .pagination li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;

        }
        .pagination li:first-child > a,
        .pagination li:first-child > span {
            margin-left: 0;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px;
        }
        .pagination li > a:hover,
        .pagination li > span:hover,
        .pagination li > a:focus,
        .pagination li > a:focus {
            background-color: #eeeeee;
        }
        .pagination ul > .active > a,
        .pagination ul > .active > span,
        .pagination ul > .active > a:hover,
        .pagination ul > .active > span:hover,
        .pagination ul > .active > a:focus,
        .pagination ul > .active > span:focus {
            z-index: #ffffff;
            cursor: default;
            background-color:#428bca;
            border-color:#428bca;
        }
        .pagination ul > .disbled > span
        .pagination ul > .disbled > a
        .pagination ul > .disbled > a:hover
        .pagination ul > .disbled > a:focus {
            color: #999999;
            cursor: not-allowed;
            background-color: #ffffff;
            border-color: #dddddd;           
        }
    </style>   

@include('layout.footer')