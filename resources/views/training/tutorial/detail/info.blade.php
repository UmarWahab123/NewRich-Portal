<style>
    .td-padding-50-0 tr td {padding-top: 25px !important;padding-bottom: 25px !important;}
    table.new-shadow tr:hover {background: none;}
</style>
<h2 class="text-uppercase mt-5 text-center  green-color text-uppercase font-weight-bold"><b><i class="fa fa-gamepad pr-2"></i> Training Detail</b></h2>
<div class="row">
    <table class="responsive table sticky-header" style="width: 100%!important">
        <tbody>
        <tr>
            <td>
                <a href="">
                  <span class="">
                     <div style="background-image: url({{$data['results']->file_upload}});" class="new-shadow-all contest-item round-10">
                     </div>
                  </span>
                </a>
                <div class="row m-t-20">
                    <div class="col-md-12">
                        <a href="{{url('/tutorial/'.$data['results']->id)}}" class="btn btn-block btn-outline-primary mt-2">
                     <span class=""><i class="fas fa-gamepad "></i> Go To Edit
                     </span>
                        </a>

                    </div>
                </div>
            </td>
            <td>
                <div class="row">
                    <div class="col-md-12">
                        <label><i class="fa fa-signal"></i> </label>
                     <span class="label green-color font-weight-bold">
                     <i class="glyphicon glyphicon-ok-sign text-uppercase "></i>{{$data['results']->type}} </span>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label>
                            <i class="fas fa-gamepad"></i>
                            <span class="">Name</span>
                        </label><br>
                        <h3 class="zero"><b>
                                <span class="darkgreen-color">{{$data['results']->title}}</span>
                            </b>
                        </h3>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <i class="fas fa-gamepad"></i>
                            <span class="">Share</span>
                        </label><br>
                     <span class=" green-color fsize13">
                     {{$data['results']->share}}
                     </span>
                    </div>
                    <div class="col-md-3">
                        <label>
                            <i class="fas fa-users"></i>
                            <span class="">Access Control</span>
                        </label><br>
                     <span class=" green-color fsize13 ml-5">
                     {{$data['results']->access_control}}
                     </span>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><i class="fas fa-money-bill-alt"></i> Tags</label><br>
                                        <h5 class="zero"><b>
                                                <span class="darkgreen-color">{{$data['results']->tags}}</span>
                                            </b>
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label><i class="fas fa-file"></i> Description</label><br>
                                        <span class="fsize13">{{$data['results']->details}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>