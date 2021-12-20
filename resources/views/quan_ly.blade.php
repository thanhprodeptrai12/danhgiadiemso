@extends('admin')

@section('content')

<div class="breadcrumb">

<div class="col-md-6">

            <div class="ul-card-widget__head-label">

                <h5 class="text-18 font-weight-700 card-title">{{ Auth::user()->name }} </h5>
                <h3 class="font-weight-700 card-title">Tháng đang tìm: {{ $month }} </h3>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

                <form method="GET" action="/admin">
                    @csrf
                    <input name="keyword" type="search" class="form-control" name="datepicker" id="datepicker" style="width: 30%;" placeholder="Nhập số tháng cần tìm"/>
                        <button type="submit">
                        <span >Đồng ý</span>
                        </button>
                    </div>
                </form>
                
                <script>
                $("#datepicker").datepicker( {
                    format: "mm-yyyy",
                    startView: "months", 
                    minViewMode: "months"
                });
                </script>

            </div>

        </div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">

    <div class="col-lg-12 col-md-12">

        <div class="row">

            <div class="col-md-12">

                <div class="card o-hidden mb-4">

                    <div class="card-header d-flex align-items-center border-0">

                        <h3 class="w-50 float-left card-title m-0">Danh Sách User</h3>

                    </div>

                    <div>

                        <div class="table-responsive">

                            <table class="table text-center" id="user_table">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Name</th>

                                        <th scope="col">Email</th>

                                        <th scope="col">Point</th>

                                        <th scope="col">Chi tiet</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @if(isset($users))

                                    @foreach($users as $key => $user)

                                    <tr>

                                        <th scope="row">{{$key+1}}</th>

                                        <td>{{$user->name}}</td>

                                        <td>{{$user->email}}</td>

                                        <td>
                                            {{$user->criterias->sum('point')}}
                                        </td>
                                        <td>
                                        <a class="text-success mr-2" href="/admin/view/{{$month}}/{{$user->id}}">Xem</a></td>
                                        </td>

                                    </tr>

                                    @endforeach

                                    @endif

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection