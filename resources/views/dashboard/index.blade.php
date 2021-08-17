@extends('layout.header');
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/Home')}}">Home</a>
            </li>
            {{--<li class="breadcrumb-item"><a href="#">Components</a>--}}
            {{--</li>--}}
            {{--<li class="breadcrumb-item active">Alerts--}}
            {{--</li>--}}
        </ol>
    </div>
@endsection
@section('content')
<div class="content-body">
    <section id="basic-alerts">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Stats</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <code>Coming Soon</code>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $('.dashboard').addClass('active');
</script>
@endsection
