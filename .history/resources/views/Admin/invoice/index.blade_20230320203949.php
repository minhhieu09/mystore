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
                                <th>Mã hoá đơn</th>
                                <th>Người dùng</th>
                                <th>Thanh toán</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Vận chuyển</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $key => $row)
                                <tr>
                                    <td>{{ ($invoices->currentPage() - 1) * $invoices->perPage() + $loop->index + 1 }}</td>
                                    <td>{{ $row->order_id }}</td>
                                    <td>{{ $row->customer->name }}</td>
                                    <td>{{ $row->payment_type }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                            <p class="text-bg-success text-center">Thành công</p>
                                        @elseif($row->status == 0)
                                            <p class="text-bg-danger text-center">Thất bại</p>
                                        @else
                                            <p class="text-bg-secondary text-center">Đăng xử lý</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->delivery == 1)
                                            <p class="text-bg-success text-center">Hoàn thành</p>
                                        @elseif($row->delivery == 0)
                                            <p class="text-bg-secondary text-center">Đang giao</p>
                                        @else
                                            <p class="text-bg-danger text-center">Huỷ đơn</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route(ADMIN_INVOICE_DETAIL, $row->order_id) }}"
                                            class="btn btn-primary">Cập nhật</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $invoices->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </form>
@endsection
