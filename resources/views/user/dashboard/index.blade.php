@extends('user.template.master')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed">


   <div class="container">
        <div class="row">
            <div class="col-12  text-center">
                <img src="{{asset('image/long_ecpas.jpeg')}}" alt="" width="400">
            </div>
        </div>
   </div>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('image/ecaps.jpeg')}}" alt="AdminLTELogo" height="60" width="60">
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
{{--                                <h3 class="card-title">Your invest history |--}}
{{--                                    <b>{{number_format(auth()->user()->investments()->sum('amount'))}} SAR</b></h3>--}}
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <p class="lead float-right">المستخدم : {{auth()->user()->name}}</p>

                                    <button class="btn btn-danger btn-sm float-left">تسجيل الخروج</button>
                                </form>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-responsive-lg table-bordered table-hover">
                                    <thead style="background-color: #F15A21;" class="text-white">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>الإسم</th>
                                        <th>المبلغ المدفوع</th>
                                        <th>النسبة</th>
                                        <th>عدد الحصص</th>
                                    </tr>
                                    </thead>
                                    @forelse(auth()->user()->investments()->orderByDesc('id')->get() as $key => $invest)
                                        <tbody class="text-center">
                                        <th>{{$key + 1}}</th>
                                        <th>{{$invest->user->name}}</th>
                                        <th>{{number_format($invest->amount) . ' ريال'}}</th>
                                        <th>% {{($invest->amount / 100000000) * 100}}</th>
                                        <th>{{number_format(($invest->amount / 100))}}</th>
                                        </tbody>
                                    @endforeach
                                        @if(auth()->user()->investments->count())
                                            <thead style="background-color: #F15A21;" class="text-white">
                                            <tr>
                                                <th colspan="8" class="text-center">المجموع النهائي للمستثمر</th>
                                            </tr>
                                            </thead>
                                            <tr class="text-center">
                                                <th></th>
                                                <th></th>
                                                <th>{{number_format(auth()->user()->investments()->sum('amount'))}} SAR</th>
                                                <th>% {{(auth()->user()->investments()->sum('amount') / 100000000) * 100}} </th>
                                                <th>{{number_format((auth()->user()->investments()->sum('amount') / 100))}}</th>
                                            </tr>
                                        @endif
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center  ">
            <div class="col-4">
                <a href="https://drive.google.com/file/d/1Kojosk4ef0_nDn79NbOWQi3XFZD35Fhy/view?usp=sharing" target="_blank" class="btn p-3 text-white  btn-block" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #000000">طريقة الإستثمار</a>
            </div>
            <div class="col-4">
                <a href="https://drive.google.com/file/d/1BRlYmu5SFfq_BChFqjqj5mSwhdMbOBkf/view?usp=sharing" target="_blank" class="btn p-3  text-white btn-block" style="background-color: #000000">مقدار الإستثمارات </a>
            </div>
        </div>
    </div>

    <footer class="text-center text-white" style="background-color: #000000;margin-top: 300px">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
{{--                <!-- Facebook -->--}}
{{--                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"--}}
{{--                ><i class="fab fa-facebook-f"></i--}}
{{--                    ></a>--}}

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/ecaps_sa?lang=ar" role="button"
                ><i class="fab fa-twitter"></i
                    ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="mailto:ecapsspace.sa@gmail.com" role="button"
                ><i class="fab fa-google"></i
                    ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/ecaps.sa/" role="button"
                ><i class="fab fa-instagram"></i
                    ></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="tel:0570647945" role="button"
                ><i class="fa fa-phone" aria-hidden="true"></i></a>

{{--                <!-- Github -->--}}
{{--                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"--}}
{{--                ><i class="fab fa-github"></i--}}
{{--                    ></a>--}}
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #F15A21;">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
@endsection
