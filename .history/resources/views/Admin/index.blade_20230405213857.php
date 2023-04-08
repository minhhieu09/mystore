@extends('layouts.admin')

@section('content')
    <!-- /top tiles -->
    <div class="container-fluid p-0" style="height:100%;">
        <h1 class="h3 mb-3"><strong>Thống kê</strong> Thông tin</h1>

        <div class="row">
            <div class="col-xl-6 col-xxl-5 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Vận chuyển</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="delivery"></h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                        <span class="text-muted">Kể từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-top: 10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Khách hàng đăng ký</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="customer"></h1>
                                    <div class="mb-0">
                                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                        <span class="text-muted">Kể từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Thu nhập</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="total-price">$21.300</h1>
                                    <div class="mb-0">
                                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                        <span class="text-muted">Kể từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Đơn hàng</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3" id="order"></h1>
                                    <div class="mb-0">
                                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                        <span class="text-muted">Kể từ tháng trước</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "get",
            url: "/dashboard",
            success: function success(e) {
                $('#total-price').html(e.data);
                console.log(e.data);
            }
        });
    })
    </script>
@endsection
