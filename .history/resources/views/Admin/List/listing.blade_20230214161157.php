@extends('layouts.admin')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Admin Management</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="clearfix"></div>

            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bordered table <small>Bordered table subtitle</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    
                                </tr>
                            </thead>
                            @foreach ($products as $product)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$product->id}}</th>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->status}}</td>
                                        <td><a href="#"><i class="fa fa-clone" aria-hidden="true"></i> Copy </a></td>
                                        <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>S???a</a></td>
                                        <td><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> X??a </a></td>
                                    </tr>
                            @endforeach
                        </table>
                        {{$products->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>


        </div>
    </div>
@endsection
