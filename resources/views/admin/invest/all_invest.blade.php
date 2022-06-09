@extends('admin.template.master')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('image/ecaps.jpeg')}}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{asset('image/ecaps.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Ecaps-invest</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('image/ecaps.jpeg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{auth('admin')->user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @include('admin.template.navbar')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Investors History | <b>{{number_format(\App\Models\Investment::sum('amount'))}} SAR</b></h3>
{{--                                    <a href="{{route('invest.create')}}" class="btn btn-sm btn-primary float-right">add Invest</a>--}}
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-responsive-lg table-bordered table-hover">
                                        <thead style="background-color: #F15A21;" class="text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>Total Amount (SAR)</th>
                                            <th>percentage of 100,000,000</th>
                                            <th>shares number</th>
                                            <th>date</th>
                                        </tr>
                                        </thead>
                                        @foreach(\App\Models\Investment::orderByDesc('id')->get() as $key => $invest)
                                            <tbody>
                                            <tr>
                                                <th>{{$key + 1}}</th>
                                                <th>{{$invest->user->name}}</th>
                                                <th>{{number_format($invest->amount) . ' SAR'}}</th>
                                                <th>% {{($invest->amount / 100000000) * 100}}</th>
                                                <th>{{number_format(($invest->amount / 100))}}</th>
                                                <th>{{$invest->investment_date}}</th>
                                            </tr>
                                            </tbody>
                                        @endforeach
{{--                                        <thead style="background-color: #F15A21;" class="text-white">--}}
{{--                                        <tr>--}}
{{--                                            <th colspan="8" class="text-center">Total</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tr>--}}
{{--                                            <th></th>--}}
{{--                                            <th></th>--}}
{{--                                            <th>{{number_format($user->investments()->sum('amount'))}} SAR</th>--}}
{{--                                            <th>% {{($invest->amount / 100000000) * 100}} </th>--}}
{{--                                            <th>{{number_format(($user->investments()->sum('amount') / 100))}}</th>--}}
{{--                                            <th></th>--}}
{{--                                            <th></th>--}}
{{--                                        </tr>--}}
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- /.content -->
        </div>
@endsection
