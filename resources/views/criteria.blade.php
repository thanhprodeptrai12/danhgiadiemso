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

                                        <th scope="col">STT</th>

                                        <th scope="col">Name</th>

                                        <th scope="col">Điểm</th>

                                        <th scope="col">Action</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @if(isset($criteria))

                                    @foreach($criteria as $key => $item)

                                    <tr>

                                        <th scope="row">{{$key+1}}</th>

                                        <form enctype="multipart/form-data" action="/admin/criteria/update" method="POST" style="height: 36px;">
                                        <td>
                                            
                                                {{ csrf_field() }}
                                                <input name="name" style="text-align: center" class="form-control" type="text" value="{{$item->name}}" ><br>
                                                <input name="id" type="hidden" value="{{$item->id}}"><br>
                                                
                                            
                                        </td>
                                        <td>
                                            <input name="point" style="text-align: center" class="form-control" type="text" value="{{$item->point}}" ><br>
                                            <button style="visibility: hidden;" class="btn btn-primary">Submit</button>
                                        </td>
                                        </form>

                                        <td><a href="criteria/{{$item->id}}/delete">Delete</a></td>

                                    </tr>

                                    @endforeach

                                    @endif

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <form enctype="multipart/form-data" action="/admin/criteria/store" method="POST" style="height: 36px;">
                                        <td>
                                                {{ csrf_field() }}
                                                <input style="text-align: center" name="name" class="form-control" type="text"><br>
                                                <button style="visibility: hidden;" class="btn btn-primary">Submit</button>
                                        </td>
                                        <td>
                                          <input style="text-align: center" name="point" class="form-control" type="text"><br>
                                        </td>
                                        <td><button class="btn btn-primary">Tạo Mới</button></td>
                                        </form>
                                    </tr>
                                </tfoot>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection