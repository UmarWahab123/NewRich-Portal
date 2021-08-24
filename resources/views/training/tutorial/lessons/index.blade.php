<table class="table table-hover table-light custom-table mt-2 w-100">
    <thead>
    <tr class="font-white fsize12 font-weight-bold">
        <th>Image</th>
        <th>Title</th>
        <th>Positon</th>
        <th>Tages</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data['pages'] as $key=>$value)
        <tr>
            <td><img src="{{$value->file_upload}}" class="img-fluid" width="100px"></td>
            <td><span class="darkgreen-color">{{$value->title}}</span></td>
            <td>{{$value->position}}</td>
            <td>{{$value->tags}}</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/page/'.$value->training_id.'/'.$value->id)}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Edit</span>
                        </a>
                        <a data-href="{{url('/deletelesson/'.$value->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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