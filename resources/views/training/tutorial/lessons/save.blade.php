@extends('layout.header')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/editors/quill/quill.bubble.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-quill-editor.css')}}">

@endsection
@section('content')
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">{{$data['page_title']}}</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/tutorials')}}">Tutorials</a>
            </li>
            <li class="breadcrumb-item"><a href="{{url('/tutorials')}}">Pages</a>
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
<form action="{{ url('/savelesson') }}" class="" id="form_submit" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label>Title </label>
                <input  class="form-control" name="title" type="text" value="{{(isset($data['results']->id) ? $data['results']->title : '')}}">
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label>Position</label>
                <select class="form-control" name="position" data-option-id="{{(isset($data['results']->id) ? $data['results']->position : '')}}">
                    <option value="">Select</option>
                    @for($i=1; $i<=20; $i++)
                    <option>{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label>Tags  </label>
                <select name="tags[]" class="tags form-control" multiple>
                    <optgroup label="LifeStyle">
                        <option>Love</option>
                        <option>World</option>
                        <option>Motivation</option>
                    </optgroup>
                    <optgroup label="Mindset">
                        <option>Journey</option>
                        <option>Resistance</option>
                        <option>Process</option>
                    </optgroup>
                    <optgroup label="Yoga">
                        <option>Stamina</option>
                        <option>Stronger</option>
                        <option>Resilience</option>
                    </optgroup>
                </select>
                {{--<input  class="form-control" name="tags" type="text" value="{{(isset($data['results']->tags) ? $data['results']->tags : '')}}">--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="form-group" id="full-container">
                <label for="exampleFormControlTextarea1">Description</label>
                <div id="full-container">
                    <div class="editor">
                        <?=(isset($data['results']->description) ? $data['results']->description : '')?>
                    </div>
                </div>
                <textarea class="form-control d-none" name="description">{{(isset($data['results']->description) ? $data['results']->description : '')}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group" >
                <label>
                    Upload File
                </label>
                <div  action="{{url('/upload_file?url=-uploads-pages') }}" class="dropzone" id="dropzoneupload">
                    <div class="dz-message">Drop files here or click to upload.</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if(isset($data['results']->id))
                <img class="img-fluid mt-3" src="{{$data['results']->file_upload }}">
            @endif
        </div>
    </div>
    <div class="row">
    <input class="form-control" type="hidden" name="file_upload" value="{{(isset($data['results']->id) ? $data['results']->file_upload : '')}}">
    <input class="form-control" type="hidden" name="training_id" value="{{$data['training_id']}}">
    <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
    <button class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 savepage">Save Changes</button>
        <a class="btn btn-outline-secondary" href="{{url('/trainingdetail')}}/{{$data["training_id"]}}">Back To Detail</a>
    </div>
</form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>
    <script type="text/javascript">
        $('select[name="tags[]"] option').each(function() {
            var tagval=$(this).text();
            var tagsarray='<?=json_encode($tags); ?>';
            var tagsarray = JSON.parse(tagsarray); //
            const isInArray = tagsarray.includes(tagval);
            if(isInArray){
                console.log(tagsarray);
                $(this).attr('selected',true);
            }
        });
        tags();
        $(document).on('click','.savepage',function(e) {
            e.preventDefault();
            $('textarea[name=description]').val($('.ql-editor').html());
            $('#form_submit').submit();
        });
        $('.tariningR').addClass('sidebar-group-active');
        $('.tutorials').addClass('active');


        function DropzoneSinglefunc(filetypes,maxFiles){
            Dropzone.autoDiscover = false;
            $('#dropzoneupload').dropzone({
                paramName: 'file',
                maxFiles: maxFiles,
                acceptedFiles:filetypes,
                addRemoveLinks:!0,
                accept:function(e, o) {
                    "justinbieber.jpg"==e.name?o("Naha, you don't."): o()
                },
                success:function(file, serverFileName) {
                    $('input[name="file_upload"]').val(serverFileName);
                    i++;
                },
            });
        }
        DropzoneSinglefunc('.png,.jpg,.jpge',1);

        $('#form_submit').validate({
            rules: {
                'title': {
                    required: true
                },

            }
        });
    </script>
@endsection
