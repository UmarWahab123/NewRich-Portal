@extends('layout.header')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-file-uploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
@endsection
@section('content')
    {{ csrf_field() }}
    <section id="multilingual-datatable">
                            <div class="card">
                                @include('training.tutorial.detail.info')
                                <h2 class="text-uppercase mt-5 text-center  green-color text-uppercase font-weight-bold"><b>Pages</b></h2>
                                <div class="col-12">
                                    <a class="btn btn-primary ml-2" href="{{url('/page')}}/{{$data["results"]->id}}">Add Page</a>
                                    <a class="btn btn-primary" href="{{url('/tutorial')}}">Add Tutorial</a>
                                    <a class="btn btn-outline-secondary" href="{{url('/tutorials')}}">Back To Tutorials</a>
                                </div>
                                <div class="row lesson-div">
                                <div class="col-12">
                                       @include('training.tutorial.lessons.index')
                                </div>
                                </div>
                            </div>
        </section>
 @include('includes.delete')
 @include('includes.save_lg_modal')
@endsection

@section('js')
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/forms/form-select2.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.tariningR').addClass('sidebar-group-active');
            $('.tutorials').addClass('active');
            $(document).on('click','.btn-lesson',function(){
                var token = $('input[name=_token]').val();
                var training_id = '{{$data["results"]->id}}';
                var id = $(this).attr('data-id');
                var type = $(this).attr('data-type');
                $.ajax(
                        {
                            type:"post",
                            headers: {'X-CSRF-TOKEN': token},
                            url: "{{url('/lessonmodal') }}",
                            dataType: "json",
                            data:{'id':id,'training_id':training_id,'type':type},
                            success:function(data)
                            {
                                $('.modal-div').html(data.response);
                                $('#savemodal').modal('show');
                                tags();
                            }
                        });
            });
            $(document).on('click','.savelesson',function(e){
                $(document).off('click','.savelesson');
                e.preventDefault();
                var token = $('input[name=_token]').val();
                var formdata=$('#notesform').serialize();
                $.ajax(
                        {
                            type:"post",
                            headers: {'X-CSRF-TOKEN': token},
                            url: "{{url('/savelesson') }}",
                            dataType: "json",
                            data:formdata,
                            success:function(data)
                            {
                                $('.lesson-div').html(data.response);
                                $('#savemodal').modal('hide');
                            }
                        });
            })
        });
    </script>
@endsection
