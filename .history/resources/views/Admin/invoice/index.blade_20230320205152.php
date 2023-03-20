@extends('admin.index')
@section('content')
    <form action="" method="post" id="add-color-form">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <h1 class="h3 d-inline align-middle">Hoá đơn</h1>
                    <a class="badge bg-dark text-white ms-2">
                        Danh sách hoá đơn
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <a class="btn btn-info ml-3" href="">Quay lại</a>
            </div>
        </div>

        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-10">
                    <table class="table table-bordered table-hover table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>#</th>
                    
                                <th>Người dùng</th>
                                <th>Tổng tiền</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $key => $row)
                                <tr>
                                    <td>{{ $key}}</td>
                                    
                                    <td>{{ $row->customer->name }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>
                                        <a href=""
                                            class="btn btn-primary">Cập nhật</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </form>
@endsection
