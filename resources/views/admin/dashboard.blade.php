@extends(backpack_view('blank'))

@php
$widgets['before_content'][] = [
    'type' => 'jumbotron',
    'heading' => trans('backpack::base.welcome'),
    'content' => trans('backpack::base.use_sidebar'),
    'button_link' => backpack_url('logout'),
    'button_text' => trans('backpack::base.logout'),
];

@endphp

@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-sm-6 col-lg-4">
                <div class="card text-dark bg-white">
                    <div class="card-header">
                        <h3 class="">
                            <i class="nav-icon la la-video la-lg"></i> Total Videos
                        </h3>

                    </div>
                    <div class="card-body pb-0">
                        {{ $videos->count() }}
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="card text-dark bg-white">
                    <div class="card-header">
                        <h3 class="">
                            <i class="nav-icon la la-video la-lg"></i> Total Audios
                        </h3>

                    </div>
                    <div class="card-body pb-0">
                        {{ $audios->count() }}
                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="card text-dark bg-white">
                    <div class="card-header">
                        <h3><i class="nav-icon la la-image la-lg"></i> Total Images</h3>
                    </div>
                    <div class="card-body pb-0">
                        {{ $images->count() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
