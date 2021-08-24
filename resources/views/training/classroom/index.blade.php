@extends('layout.header')

@section('content')
    {{ csrf_field() }}
    <section id="multilingual-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Classrooms</h4>
                                    <a class="btn btn-primary" href="{{url('/classroom')}}">Add Classroom</a>
                                </div>
                                <div class="card-datatable p-2">
                                    <table class="dynamic_table table font-weight-bold">
                                        <thead>
                                             <tr role="row">
		                                        <th>Sr No</th>
		                                        <th> Name</th>
                                                <th>Action</th>
                                   			 </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($data['results'] as $key=>$value)
                                   		 <tr>
                                        <td> {{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                             <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('/classroom/'.$value->id)}}">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a data-href="{{url('/deleteclassroom/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.tariningR').addClass('sidebar-group-active');
            $('.classrooms').addClass('active');
        });
    </script>
@endsection
