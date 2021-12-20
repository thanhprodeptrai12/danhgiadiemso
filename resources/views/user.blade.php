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

                        <h3 class="w-50 float-left card-title m-0">Danh Sách thành viên</h3>

                    </div>

                    <div>

                        <div class="table-responsive">

                            <table class="table text-center" id="user_table">

                                <thead>

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Status</th>

                                        

                                    </tr>

                                </thead>

                                <tbody>

                                    @if(isset($user))

                                    @foreach($user as $key => $item)

                                    <tr>

                                        <th scope="row">{{$key+1}}</th>

                                        <form enctype="multipart/form-data" action="/admin/user/update" method="POST" style="height: 36px;">
                                        <td>
                                            
                                                {{ csrf_field() }}
                                                <input name="name" style="text-align: center" class="form-control" type="text" value="{{$item->name}}" ><br>
                                                <input name="id" type="hidden" value="{{$item->id}}"><br>
                                                
                                            
                                        </td>
                                        <td>
                                            <input name="email" style="text-align: center" class="form-control" type="text" value="{{$item->email}}" ><br>
                                            <button style="visibility: hidden;" class="btn btn-primary">Submit</button>
                                        </td>
                                        </form>
                                        

                                        <td>
                                            <a class="text-primary mr-2" href="user/{{$item->id}}/hide"><i class="fas fa-eye-slash"></i></a>
                                            <a class="text-danger mr-2" href="user/{{$item->id}}/delete"><i class="fas fa-times"></i></a>
                                            <a class="text-success mr-2" href="user/{{$item->id}}/public"><i class="fas fa-eye"></i></a>
                                        </td>

                                        <td>
                                            @if($item->status == 'true')  <button type="button" class="btn btn-success">{{$item->status}}</button> @else  <button type="button" class="btn btn-primary">{{$item->status}}</button> @endif
                                        </td>

                                    </tr>

                                    @endforeach

                                    @endif

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <form enctype="multipart/form-data" action="/admin/user/store" method="POST" style="height: 36px;">
                                        <td>
                                                {{ csrf_field() }}
                                                <input style="text-align: center" name="name" class="form-control" type="text"><br>
                                                <button style="visibility: hidden;" class="btn btn-primary">Submit</button>
                                        </td>
                                        <td>
                                          <input style="text-align: center" name="email" class="form-control" type="text" placeholder="Enter New User" autocomplete="new-user"/>
                                        </td>
                                        <td>
                                        <input  style="text-align: center" name="password" class="form-control" type="password" placeholder="Enter New Password" autocomplete="new-password"/>
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