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

                        <h3 class="w-50 float-left card-title m-0">Danh Sách Tiêu Chí</h3>

                    </div>

                    <div>

                        <div class="table-responsive">

                            <table class="table text-center" id="user_table">

                                <thead>

                                    <tr>

                                        <th scope="col">Name</th>

                                        <th scope="col">Điểm</th>
                                        <th scope="col">Xac nhan</th>

                                    </tr>

                                </thead>

                                <tbody>

                                <form method="POST" action="/admin/criteria/update">
                                    @csrf
                                        <input name="id" value="{{$criteria->id}}" type="hidden" class="form-control"/>
                                    <td>
                                        <input name="name" value="{{$criteria->name}}" type="input" class="form-control"/>
                                    </td>
                                    <td>
                                        <input name="point" value="{{$criteria->point}}" type="input" class="form-control"/>
                                    </td>
                                    <td>
                                        <button type="submit">
                                            <span class="fa fa-search text-secondary">Đồng ý</span>
                                        </button>
                                    </td>
                                    </div>
                                </form>

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