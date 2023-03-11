@php($i = 0)
@extends('index')
@section('content')
    <!-- Content -->
    <div class="container mt-5">
        <form action="" method="post"></form>
        @csrf
        <div class="row">
            <div class="col-md-8">
                @foreach ($data as $item)
                <div style="display: none"></div>
                <input type="hidden" name="component[]" value="">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="" class="img-thumbnail">
                        </div>
                        <div class="col-md-6">
                            <div class="infor-gio">
                                <h5>{{$}}</h5>
                                <p>Giá: VND</p>
                                <div class="mau-sanpham">
                                    <div style="width: 30%;">
                                        <h4>Color</h4>
                                        <select readonly>
                                            <option></option>
                                        </select>
                                    </div>
                                    <div>
                                        <h4>SỐ LƯỢNG</h4>
                                        <div class="slg-sanpham" style="width: 110px; margin-right: 50px;">
                                            <span class="giam"
                                                style="color: red !important;cursor: pointer !important;">-</span>
                                            <input type="number" name="amount[]" class="soluong-sanpham" value=""
                                                readonly style="width: 45px">
                                            <span class="tang">+</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="giohang-sub">
                                <h5>
                                    <span class="price"></span>
                                    <span>VND</span>
                                </h5>
                                <p>Còn hàng</p>
                                <button class="btn btn-light">Thích</button>
                                <a class="btn btn-dark" href="">
                                    Xóa
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}

                    <input type="hidden" name="total" value="">


                    <!-- Bottem -->
                    <hr style="width: 100%; height: 4px; background-color: black;">
                    <div style="display: flex; justify-content: space-around;">
                        <button class="btn btn-dark">
                            <a href="">XÓA HẾT</a>
                        </button>
                        <button class="btn btn-dark">
                            <a href="">QUAY LẠI MUA HÀNG</a>
                        </button>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="giohang-left">
                    <h5>ĐƠN HÀNG</h5>
                    <hr>
                    <div class="form-group">
                        <label>NHẬP MÃ KHUYẾN MÃI</label>
                        <input type="text" name=""><span><button class="btn btn-warning">ÁP
                                DỤNG</button></span>
                    </div>
                    <hr>
                    <div class="don-gia">
                        <div>
                            <p>Đơn hàng</p>
                            <p>Giảm</p>
                        </div>
                        <div style="text-align: right;">
                            <p>
                                <span id="price-don"></span>
                                <span>VND</span>
                            </p>
                            <p>0 VND</p>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div>
                        <div>
                            <label>Chọn phương thức thanh toán</label>
                        </div>
                        <div>
                            <img src="" alt="momo_icon" style="width: 30px">
                            <label for="">Momo</label>
                            <input type="radio" name="payment_type" value="momo" checked>
                        </div>
                        <div style="margin-top: 10px">
                            <img src="" alt="vnpay_icon" style="width: 30px">
                            <label for="">Vnpay</label>
                            <input type="radio" name="payment_type" value="vnpay">
                        </div>
                        <div style="margin-top: 10px">
                            <img src="" alt="vnpay_icon" style="width: 30px">
                            <label for="">Stripe</label>
                            <input type="radio" name="payment_type" value="stripe">
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="thanhtoan">
                        <div>
                            <p>TỔNG: </p>
                            <p id="price-tong">
                                <span></span>
                                <span>VND</span>
                            </p>
                        </div>
                        <button class="btn btn-warning">THANH TOÁN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function updatePrice(status, element) {
            var row = element.closest('.row');
            var dongia = Number(row.find('.price').html().replace(/,/g, ""));
            var donhang = Number($('#price-don').html().replace(/\./g, ""));

            if (status == 'tang') {
                var total = dongia + donhang;
            } else {
                var total = donhang - dongia;
            }

            $('#price-tong').find('span').first().html(parseInt(total).toLocaleString());
            $('#price-don').html(parseInt(total).toLocaleString());

            $('input[name="total"]').val(total);
        }
        $(document).ready(function() {
            //thay doi so luong
            $(".tang").click(function(event) {
                var tg = $(this).closest('.slg-sanpham');
                var sl = Number(tg.find(".soluong-sanpham").val());
                tg.find(".soluong-sanpham").val(sl + 1);
                tg.find(".giam").css({
                    cursor: 'pointer',
                    color: 'red'
                });

                updatePrice('tang', $(this));
            });

            $(".giam").click(function(event) {
                var tg = $(this).closest('.slg-sanpham');
                var sl = Number(tg.find('.soluong-sanpham').val());
                if (sl >= 2) {
                    tg.find('.soluong-sanpham').val(sl - 1)
                    updatePrice('giam', $(this));
                } else {
                    tg.find('.soluong-sanpham').val(1);
                }
            });
        });
    </script>
@endsection
