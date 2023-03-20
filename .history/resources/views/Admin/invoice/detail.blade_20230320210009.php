@php($i = 1)
@extends('admin.index')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <a class="badge bg-dark text-white ms-2">
                        Thông tin đơn hàng
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <a href="{{ route('admin.invoice') }}" class="btn btn-primary ml-3">Quay lại</a>
            </div>
        </div>

        {{-- Form info --}}
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Người mua hàng</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" readonly
                                   value="{{ $invoice->customer->first_name . $invoice->customer->name }}" />
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tổng tiền</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" value="{{ $invoice->total }}" readonly />
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Dung lượng</th>
                                <th>Màu sắc</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $paymentInfo)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $paymentInfo->name }}</td>
                                <td>{{ $paymentInfo->memory }}</td>
                                <td>{{ $paymentInfo->color }}</td>
                                <td>{{ $paymentInfo->amount }}</td>
                                <td>{{ $paymentInfo->price }}</td>
                                <td>{{ $paymentInfo->amount * $paymentInfo->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </form>
@endsection

