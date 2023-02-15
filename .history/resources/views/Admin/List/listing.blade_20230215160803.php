@php($i = 1)
@extends('layouts.admin')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Admin Management</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <form action="" class="form-inline">

                        <div class="input-group">
                            <input name="key" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="clearfix"></div>

            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách sản phẩm</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                            <li>

                                <a href="" class="btn btn-success">Thêm mới</a>
                            </li>
                            <li>

                                
                                <a href="" class="btn btn-primary ml-3">Quay lại</a>
                            </li>
                        </ul>
                        <div class="col-lg-6">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Special</th>
                                    <th>Status</th>
                                    <th>Color</th>
                                    <th>Memory</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th colspan="2">Option</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $product)
                                    @foreach ($product->productcomponent as $key => $row)
                                        <tr>
                                            @if ($key == 0)
                                                <th scope="row"{{ 'rowspan=' . count($product->productcomponent) }}>
                                                    {{ $i++ }}</th>
                                                <td {{ 'rowspan=' . count($product->productcomponent) }}>
                                                    {{ $product->name }}</td>
                                                <td {{ 'rowspan=' . count($product->productcomponent) }}>
                                                    {{ $product->description }}</td>
                                                
                                                {{-- @foreach ($row->colors as $special) 
                                                        <div class="btn btn-info mt-1">{{$special->name}}</div>
                                                    @endforeach --}}
                                                <td {{ 'rowspan=' . count($product->productcomponent) }}>
                                                @if ($product->status == 0)
                                                    <span class="badge badge-danger">Private</span>
                                                @else
                                                    <span class="badge badge-success">Publish</span>
                                                @endif
                                                </td>
                                            @endif
                                            <td>{{ $row->colors->name }}</td>
                                            <td>{{ $row->memory }}</td>
                                            <td>{{ $row->amount }}</td>
                                            <td>{{ $row->price }}</td>
                                            <td><a href="{{route('admin.edit')}}"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i>Sửa</a>
                                                <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa </a>
                                            </td>
                                            <td><a href="#"><i class="fa fa-succes-o" aria-hidden="true"></i> Thêm
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>


        </div>
    </div>
@endsection
