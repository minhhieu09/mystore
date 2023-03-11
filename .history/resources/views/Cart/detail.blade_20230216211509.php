@extends('index')
@section('content')
    <!-- Content -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>

        <hr style="width: 100%; margin-top: 8px; height: 4px;">

        <div class="row mt-3" id="sanpham">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($component as $key => $detail_image)
                                    <li data-target="#carouselExampleIndicators"
                                        data-slide-to="{{ $key }}"{{ $key == 0 ? 'class="active"' : '' }}></li>
                                @endforeach
                            </ol>

                            <div class="carousel-inner">
                                @foreach ($component as $key => $detail_image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                        <img src="{{ asset('images').'/'. $detail_image->image }}" class="d-block w-100" alt="anh">
                                    </div>
                                @endforeach
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"
                                    style="background-color: black"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"
                                    style="background-color: black"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-7">
                        <div>
                            <form action="" method="get">
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <ul style="list-style: none;">
                                    <li>
                                        {{-- <h3>{{$product->name}}</h3> --}}
                                    </li>
                                    <li>
                                        <div style="display: flex">
                                            <div style="margin-right: 10px">
                                                @foreach ($component as $detail_color)
                                                    <b>Màu sắc: {{ $detail_color->colors->color_code }}</b>
                                                @endforeach

                                            </div>
                                            @foreach ($component as $detail_color)
                                                <div
                                                    style="width: 20px;height: 20px;border: 2px solid;border-radius: 100%;margin-right: 5px;background-color: {{ $detail_color->colors->color_code }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li>
                                        <h3>VND</h3>
                                    </li>
                                    <hr>
                                    <li>
                                        <p>IPhone là một điện thoại thông minh được sản xuất bởi Apple kết hợp máy tính,
                                            iPod, máy ảnh kỹ thuật số và điện thoại di động thành một thiết bị có giao diện
                                            màn hình cảm ứng. IPhone chạy hệ điều hành iOS và vào năm 2021 khi iPhone 13
                                            được giới thiệu, nó đã cung cấp tới 1 TB dung lượng lưu trữ và camera 12
                                            megapixel.</p>
                                    </li>
                                    <hr>
                                    <li>
                                        <div class="product-option">
                                            <strong class="label">Lựa chọn phiên bản</strong>
                                            <div class="options" id="versionProduct" data-id="4" style="display: flex">
                                                <input type="hidden" name="component" value="">
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                    <li class="mau-sanpham">
                                        <div style="width: 30%;">
                                            <h4>Color</h4>
                                            <select name="color" id="colorid" required>
                                                @foreach ($component as $detail_color)
                                                    <option value="{{ $detail_color->id }}">
                                                        {{ $detail_color->colors->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="width: 250px;">
                                            <h4>SỐ LƯỢNG</h4>
                                            <div class="slg-sanpham">
                                                <span class="giam">-</span>
                                                <input type="number" name="amount" class="soluong-sanpham" value="1"
                                                    readonly style="width: 45px">
                                                <span class="tang">+</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="btn btn-primary add" id="add-cart"
                                        style="background-color: black;color: white">
                                        THÊM VÀO GIỎ HÀNG
                                    </li>
                                    <li class="add" style="background-color: #f15e2c;">
                                        <a style="display: block" href="">THANH TOÁN</a>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Sản phẩm liên quan -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                <h2 class="text-center">Sản phẩm liên quan</h2>
            </div>
        </div>

        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">
                    <div class="row">

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="border-product">
                                <img src="" class="img-thumbnail">
                                <div class="pt-3"><strong></strong></div>
                                <p>While/Black</p>
                                <div><strong> VNĐ</strong></div>
                                <a href="" class="btn btn-danger">Mua ngay</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->
            </div>
            <!--/.Slides-->

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function getMemory() {
            var form = $('form').serializeArray();
            $.ajax({
                type: "get",
                url: "{{ route('get-memory') }}",
                data: {
                    "id": form[0].value,
                    "color": form[2].value,
                },
                success: function(e) {    
        
                    if (e) {
                        var html = '';
                        $.each(e.data, function(key, value) {
                            html += '<div class="form-group">' +
                                        '<div class="item" data-component=" ' + value.id + '">' +
                                        '<span>' +
                                        '<label for="memory">' +
                                        '<strong>' + value.memory + 'GB</strong>' +
                                        '</label>' +
                                        '</span>' +
                                        '<strong>' + parseInt(value.price).toLocaleString() + 'đ</strong>' +
                                        '</div>' +
                                    '</div>';
                        });
                        $('.product-option').find('.form-group').remove();
                        $('.product-option').find('.options').append(html);

                    }
                }
            });
        }
        $(document).ready(function() {
            getMemory();
        })
    </script>
@endsection
