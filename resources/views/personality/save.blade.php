@extends('layout.header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
@endsection
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Ennegramm</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/personalities')}}">Personalities</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Add Personality</a>
            </li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="content-body">
    <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-6 col-12 mb-1">
                                           <form action="{{ url('/savepersonality') }}" class="" id="form_submit" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>
                                                                   Personality Type
                                                                </label>
                                                                <input  class="form-control" name="name" type="text" value="{{(isset($data['results']->id) ? $data['results']->name : '')}}">
                                                                </input>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                                               <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                               <a href="{{url('personalities')}}" class="btn btn-outline-secondary">Back</a>
                                            </input>
                                            </input>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 </section>
</div>
@endsection
@section('js')
  <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script type="text/javascript">
        $('.enneagram').addClass('sidebar-group-active');
        $('.personalities').addClass('active');
        $('#form_submit').validate({
            rules: {
                'name': {
                    required: true
                },
            }
        });
    </script>
    @endsection
