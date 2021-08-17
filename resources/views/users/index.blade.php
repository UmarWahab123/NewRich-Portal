@extends('layout.header')
@section('css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
@endsection
@section('content')
    {{ csrf_field() }}
    <section id="multilingual-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Users</h4>
                                    <a class="btn btn-primary" href="{{url('/user')}}">Add User</a>
                                </div>
                                <div class="card-datatable p-2">
                                    <table class="dynamic_table table font-weight-bold">
                                        <thead>
                                             <tr role="row">
		                                        <th>Sr No</th>
		                                        <th> First Name</th>
		                                        <th> Last Name</th>
		                                        <th> Email</th>
		                                        <th> Role</th>
		                                        <th> Status</th>
		                                        <th> Action</th>
                                   			 </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($data['results'] as $key=>$value)
                                   		 <tr>
                                        <td> {{$key+1}}</td>
                                        <td>{{$value->first_name}}</td>
                                        <td>{{$value->last_name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{isset($value->role->role_title) ? $value->role->role_title : ''}}</td>
                                             <td>
                                                 @if($value->status=="Active")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-primary mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @elseif($value->status=="Inactive")
                                                     <span data-id="{{$value->id}}" data-status="{{$value->status=='Active' ? 'Inactive' : 'Active'}}" class="badge badge-pill badge-light-warning mr-1 pointer btnstatus">{{$value->status}}</span>
                                                 @endif
                                             </td>
                                             <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('/user/'.$value->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a data-href="{{url('/deleteuser/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>Delete</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
 @include('includes.delete')

@endsection


@section('js')
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.usermgt').addClass('sidebar-group-active');
            $('.users').addClass('active');
            $(document).on('click','.btnstatus',function () {
                var id=$(this).attr('data-id');
                var status=$(this).attr('data-status');
                var formdata={'id':id,'status':status};
                var token = $('input[name=_token]').val();
                var current=$(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to update the user status?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirm it!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ml-1'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            type:'POST',
                            headers: {'X-CSRF-TOKEN': token},
                            dataType:'json',
                            data:formdata,
                            url: '{{url('userstatus')}}',
                            success: function(response){
                                current.attr('data-status',status);
                                if(response.status==1){
                                    if(status=='Active'){
                                        current.attr('data-status','Inactive');
                                        current.removeClass('badge-light-warning');
                                        current.addClass('badge-light-primary');
                                    }else{
                                        current.attr('data-status','Active');
                                        current.removeClass('badge-light-primary');
                                        current.addClass('badge-light-warning');
                                    }
                                    current.html(status);
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Updated!',
                                        text: 'User status has been updated.',
                                        customClass: {
                                            confirmButton: 'btn btn-success'
                                        }
                                    });
                                }
                            }
                        });

                    }
                });
            });
        });
    </script>
@endsection
