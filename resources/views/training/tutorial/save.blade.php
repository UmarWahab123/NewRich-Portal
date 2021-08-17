@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-file-uploader.css">
@endsection
@section('content')
@section('breadcrumb')
<h2 class="content-header-title float-left mb-0">{{$data['page_title']}}</h2>
<div class="breadcrumb-wrapper">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('/tutorials')}}">Tutorials</a>
</li>
<li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
</li>
</ol>
</div>
@endsection
<div class="content-body">
<section id="basic-input">
<div class="card">
<div class="card-body">
<form action="{{ url('/savetutorial') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4 ml-1">
            <div class="form-group">
                <label>
              Title
                </label>
                <input  class="form-control" name="title" type="text" value="{{(isset($data['results']->name) ? $data['results']->name : '')}}">
                </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>
                    Tags
                    </label>
                    <input  class="form-control" name="tags" type="text" value="{{(isset($data['results']->tags) ? $data['results']->tags : '')}}">
                </div>

                <div class="form-group" >
                    <label>
                    Upload Video
                    </label>
                    <div  action="{{url('/upload_file?url=-uploads-tutorials') }}" class="dropzone" id="test">
                     <div class="dz-message">Drop files here or click to upload.</div>
                    </div>
                </div>
            </div>

        </div>

   <input class="form-control" name="text" type="file_upload" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
   <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
   <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>

</input>
</input>
</form>

</div>
</div>


</section>
</div>
@endsection


    @section('js')
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script type="text/javascript">
    $('.tariningR').addClass('sidebar-group-active');
    $('.tutorials').addClass('active');
    Dropzone.autoDiscover = false;
    var fileList = new Array;
    var fileListinput = new Array;
    var i =0;
    $('#test').dropzone({
        paramName: 'file',
        maxFiles: 1,
        acceptedFiles:".jpg,.png",
        addRemoveLinks:!0,
        accept:function(e, o) {
            "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
        },
        success:function(file, serverFileName) {
            fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
            fileListinput[i] = 'uploads/tutorials/'+serverFileName;
            console.log(fileListinput);
            $('input[name="file_upload"]').val(fileListinput);
            i++;
        },
                  removedfile:function(file) {
                    var path ="/uploads/tutorials/";
                    var rmvFile = "";
                    console.log(fileList);
                    for(f=0;f<fileList.length;f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile){
                        $.ajax({
                            url: document.location.origin+"/deletefiles",
                            type: "POST",
                            data: { "fileList" : rmvFile,"path":path },
                            success: function(data) {
                                removeImg(fileListinput, rmvFile);
                                $('input[name="image"]').val(JSON.stringify(fileListinput));
                                $(document).find(file.previewElement).remove();
                                i--;
                            }
                        });
                    }
                },
    });
    $('#form_submit').validate({
    rules: {
    'role_id': {
    required: true
    },
    'first_name': {
    required: true
    },
    'last_name': {
    required: true
    },
    'email': {
    required: true,
    email: true
    },

    'cpassword': {
    equalTo: '.password'
    },
    'status': {
    required: true
    },
    }
    });
    </script>
    @endsection
