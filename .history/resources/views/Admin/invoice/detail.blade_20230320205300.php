@php($i = 1)
@extends('admin.index')
@section('content')
    <form action="{{ route(ADMIN_INVOICE_UPDATE) }}" method="post">
        @csrf
        @if(isset($orderId))
            <input type="hidden" value="{{ $orderId }}" name="order_id">
        @endif
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <h1 class="h3 d-inline align-middle">Cập nhật</h1>
                    <a class="badge bg-dark text-white ms-2">
                        Cập thật thông tin đơn hàng
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success" type="submit">Lưu</button>
                <a href="{{ route(ADMIN_INVOICE_INDEX) }}" class="btn btn-primary ml-3">Quay lại</a>
            </div>
        </div>

        {{-- Form info --}}
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Mã đơn hàng</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" value="{{ $invoice->order_id }}"
                                   readonly />
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Người mua hàng</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" readonly
                                   value="{{ $invoice->customer->first_name . $invoice->customer->name }}" />
                        </div>
                    </div>

                    @if($invoice->status == 1)
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Vận chuyển</h5>
                            </div>
                            <div class="card-body">
                                <select class="form-select mb-3" name="delivery" required>
                                    <option {{ $invoice->delivery == 0 ? 'selected' : '' }} value="0">Đang giao</option>
                                    <option {{ $invoice->delivery == 1 ? 'selected' : '' }} value="1">Thành công
                                    </option>
                                    <option {{ $invoice->delivery == 2 ? 'selected' : '' }} value="2">Thất bại
                                    </option>
                                </select>
                            </div>
                        </div>
                    @endif
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

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Hình thức thanh toán</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" value="{{ $invoice->payment_type }}" readonly />
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
                                <td>{{ $paymentInfo->product_name }}</td>
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

