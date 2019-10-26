@include('layout.header')
    <div class="panel panel-default">
        <div class="panel-heanding" style="backgroundcolor:#337AB7;color:white;">
            <h2 style="color:red;margin-top:0px; margin-bottom:0px;">
                Tin Tức trong ngày
            </h2>
        </div>

        <div class="panel-body" style="margin-left:200px;">
            @foreach($chuyenmuc as $cm)
            <div class="row-item row">
                <a href="">{{$cm->Ten}}</a>
                
            </div>
            @endforeach()
        </div>
    </div>

@include('layout.footer')