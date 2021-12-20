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

                        <h3 class="w-50 float-left card-title m-0">Thành viên - {{$thanhvien->name}} ({{$thanhvien->email}}) </h3>

                    </div>

                    <div class="table-responsive">

                            <table class="table text-center" id="user_table">

                                <thead>

                                    <tr>

                                        <th scope="col">Tiêu chí đã đánh giá</th>

                                        <th scope="col">Điểm tiêu chí</th>

                                        <th scope="col">Đánh giá cho thời gian</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Delete</th>



                                    </tr>

                                </thead>

                                <tbody>
                                    @if(isset($array))

                                    @foreach($array as $key)

                                    <tr>

                                        <td>{{$key->name}}</td>

                                        <td>{{$key->point}}</td>

                                        <td>
                                            <form enctype="multipart/form-data" action="/admin/update/point" method="GET" style="height: 36px;">
                                                {{ csrf_field() }}
                                                <input style="text-align: center" name="created_at" class="form-control" type="text" value="{{$key->pivot->created_at}}"><br>
                                                <input style="text-align: center" name="pivot_id" class="form-control" type="hidden" value="{{$key->pivot->id}}">
                                                <button style="visibility: hidden;" class="btn btn-primary">Submit</button>
                                            </form>
                                        </td>
                                        <td>{{$key->pivot->note}}</td>

                                        <td><a href="/admin/point/{{$key->pivot->id}}/delete" class="text-danger">Delete</a></td>

                                    </tr>

                                    @endforeach

                                    @endif
                                    
                                </tbody>

                            </table>

                        </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-12">

                <div class="card o-hidden mb-4">

                    <div class="card-header d-flex align-items-center border-0">

                        <h3 class="w-50 float-left card-title m-0">Quản lý điểm số</h3>

                    </div>

                    <div class="card-body">
                        <form method="GET" action="/admin/store">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$user->id}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn tiêu chí</label>
                            <select class="form-control" name="criteria" id="exampleFormControlSelect1">
                                @foreach($criteria as $item)
                                <option value="{{$item->id}}">{{$item->name}}  @if($item->point >= 0)  +{{$item->point}}đ @else  {{$item->point}}đ @endif</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Chọn Thời Gian</label>
                            <input required="required" class="form-control" type="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ghi chú</label>
                            <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info">Submit</button>
                        </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection