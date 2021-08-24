{{--This renders on page load--}}
<table class="table table-striped- table-bordered table-hover table-checkable dynamic-table">
    <thead class="theme-color">
        <th>Rank</th>
        <th>Question Text</th>
        <th>Personality Type</th>
        <th>Language</th>
        <th>Question ID</th>
        <th></th>
    </thead>
    <tbody class="atbody">
        @foreach($data['questionstypeA'] as $key=>$row)
        <tr>
            <td>{{$row->rank}}</td>
            <td>{{$row->question}}</td>
            <td>{{get_personality($row->personality_id)}}</td>
            <td>{{$row->langname}}</td>
            <td>{{$row->id}}</td>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                        <i data-feather="more-vertical"></i>
                    </button>
                            <div class="dropdown-menu">
                                <a data-id="{{$row->id}}" data-type="A" data-transid="{{$row->trans_id}}" href="javascript:void(0)" class="dropdown-item type_a_question" >
                                    <i data-feather="edit-2" class="mr-50"></i>
                                    <span>Edit</span>
                                    </a>
                                <a data-href="{{url('/deletequestion/'.$row->id)}}"   data-toggle="modal" data-target="#confirm-delete" class="dropdown-item" href="javascript:void(0);">
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

<div class="form-group m-form__group mt-5">
 <button data-id="-1" data-type="A" data-transid="0" type="submit" class="btn btn-primary type_a_question">Add New Question</button>
 </div>


