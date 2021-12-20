@extends('admin')

@section('content')

<div class="breadcrumb">

<div class="col-md-6">

            <div class="ul-card-widget__head-label">

                <h5 class="text-18 font-weight-700 card-title">{{ Auth::user()->name }} </h5>

            </div>

        </div>

</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">

    <div class="col-lg-12 col-md-12">

        <div class="row">

            <div class="col-md-12">

                <div class="card o-hidden mb-4">

                    <div class="card-header d-flex align-items-center border-0">

                        <h3 class="w-50 float-left card-title m-0">Quản lý điểm số</h3>

                        <div class="dropdown dropleft text-right w-50 float-right">

                            <button class="btn bg-gray-100" id="dropdownMenuButton1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="nav-icon i-Gear-2"></i></button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"><a class="dropdown-item" href="/admin/user/create">Thêm thành viên</a><a class="dropdown-item" href="#">View All users</a><a class="dropdown-item" href="#">Something else here</a></div>

                        </div>

                    </div>

                    <div>

                        <div class="table-responsive">

                            <table class="table text-center" id="user_table">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Name</th>

                                        <th scope="col">Cập nhật Điểm</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @if(isset($users))

                                    @foreach($users as $key => $item)

                                    <tr>

                                        <th scope="row">{{$key+1}}</th>

                                        <td>{{$item->name}}</td>

                                        <td><a class="text-success mr-2" href="{{route('detail.point', [$item->id] )}}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="text-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>

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