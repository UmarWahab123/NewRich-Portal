@extends('layout.header')
@section('css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
@endsection
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">User Management</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/Home')}}">Users</a>
            </li>
            <li class="breadcrumb-item"><a href="#">{{$data['page_title']}}</a>
            </li>
        </ol>
    </div>
@endsection
@section('content')
<div class="content-body">
    <section id="basic-input">
        <div class="card">
<div class="card-body">
    <div class="col-md-12">
        <form action="{{ url('/saveuser') }}" class="" id="form_submit" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Role</label>
                        <select name="role_id" class="form-control" data-option-id="{{(isset($data['results']->role_id) ? $data['results']->role_id : '')}}">
                            <option value="">Select</option>
                            @foreach($data['roles'] as $key=>$value)
                            <option value="{{$value->id}}">{{$value->role_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->first_name) ? $data['results']->first_name : '')}}">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control m-input m-input--square" value="{{(isset($data['results']->id) ? $data['results']->last_name : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control m-input m-input--square" value="{{(isset($data['results']->email) ? $data['results']->email : '')}}">
                    </div>
                </div>
                </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Contact No</label>
                        <input type="text" name="phone" class="form-control m-input m-input--square" value="{{(isset($data['results']->phone) ? $data['results']->phone : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control m-input m-input--square" value="{{(isset($data['results']->address) ? $data['results']->address : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Postal Code</label>
                        <input type="text" name="postal_code" class="form-control m-input m-input--square" value="{{(isset($data['results']->postal_code) ? $data['results']->postal_code : '')}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Status</label>
                        <select name="status" class="form-control" data-option-id="{{(isset($data['results']->status) ? $data['results']->status : '')}}">
                            <option value="">Select</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                </div>
                </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Password</label>
                        <input type="password" placeholder="{{(isset($data['results']->id) ? 'Type in to update password' : '')}}" name="password" class="form-control password m-input m-input--square" value="">
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group m-form__group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control cpassword password m-input m-input--square" value="">
                    </div>
                </div>
            </div>

            <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
            <a href="{{url('users')}}" class="btn btn-outline-secondary">Back</a>
            </input>
            </input>
        </form>
    </div>
    </div>
    </div>
        </section>
</div>
@endsection
@section('js')
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $('.usermgt').addClass('sidebar-group-active');
        $('.users').addClass('active');
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

