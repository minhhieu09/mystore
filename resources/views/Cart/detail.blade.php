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
                                @foreach ($product->productcomponent as $key => $detail_image)
                                    @if (!empty($detail_image))
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                            <img src="{{ asset('images') . '/' . $detail_image['image'] }}"
                                                class="d-block w-100" alt="anh">
                                        </div>
                                    @endif
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
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <ul style="list-style: none;">
                                    <li>
                                        {{-- <h3>{{$product->name}}</h3> --}}
                                    </li>
                                    <li>
                                        <div style="display: flex">
                                            <div style="margin-right: 10px">
                                                @foreach ($color as $detail_color)
                                                    <b>Ma??u s????c: {{ $detail_color->color_code }}</b>
                                                @endforeach

                                            </div>
                                            @foreach ($color as $detail_color)
                                                <div
                                                    style="width: 20px;height: 20px;border: 2px solid;border-radius: 100%;margin-right: 5px;background-color: {{ $detail_color->color_code }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li>
                                        @foreach ($product->productcomponent as $key => $item)
                                            <h3>{{ $item->price }}VND</h3>
                                        @endforeach
                                    </li>
                                    <hr>
                                    <li>
                                        <p>IPhone l?? m???t ??i???n tho???i th??ng minh ???????c s???n xu???t b???i Apple k???t h???p m??y t??nh,
                                            iPod, m??y ???nh k??? thu???t s??? v?? ??i???n tho???i di ?????ng th??nh m???t thi???t b??? c?? giao di???n
                                            m??n h??nh c???m ???ng. IPhone ch???y h??? ??i???u h??nh iOS v?? v??o n??m 2021 khi iPhone 13
                                            ???????c gi???i thi???u, n?? ???? cung c???p t???i 1 TB dung l?????ng l??u tr??? v?? camera 12
                                            megapixel.</p>
                                    </li>
                                    <hr>
                                    <li>
                                        <div class="product-option">
                                            <strong class="label">L???a ch???n phi??n b???n</strong>
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
                                                @foreach ($color as $detail_color)
                                                    <option value="{{ $detail_color->id }}">
                                                        {{ $detail_color->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div style="width: 250px;">
                                            <h4>S??? L?????NG</h4>
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
                                        TH??M V??O GI??? H??NG
                                    </li>
                                    <li class="add" style="background-color: #f15e2c;">
                                        <a style="display: block" href="{{ route('index.cart') }}">THANH TO??N</a>
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

    <!-- S???n ph???m li??n quan -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                <h2 class="text-center">S???n ph???m li??n quan</h2>
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
                                <div><strong> VN??</strong></div>
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
                url: "{{route('get-memory') }}",
                data: {
                    "id": form[0].value,
                    "color": form[2].value,
                },
                success: function(e) {
                    if (e) {
                        var html = '';
                        $.each(e.data, function(key, value) {
                            // console.log(value);
                            html += '<div class="form-group">' +
                                '<div class="item" data-component="' + value.id + '">' +
                                '<span>' +
                                '<label for="memory">' +
                                '<strong>' + value.memory + 'GB</strong>' +
                                '</label>' +
                                '</span>' +
                                '<strong>' + parseInt(value.price).toLocaleString() + '???</strong>' +
                                '</div>' +
                                '</div>'
                        });

                        //Delete and apple new option
                        $('.product-option').find('.form-group').remove();
                        $('.product-option').find('.options').append(html);
                    }
                }
            });
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

                var row = $(this).closest('.row');
                var dongia = Number(row.find('.price').html());
                var donhang = Number($(this).closest('.container').find('#price-don').html());
                $(this).closest('.container').find('#price-don').html(dongia + donhang);
                //alert(dongia);

            });

            $(".giam").click(function(event) {
                var tg = $(this).closest('.slg-sanpham');
                var sl = Number(tg.find('.soluong-sanpham').val());
                if (sl > 2) {
                    tg.find('.soluong-sanpham').val(sl - 1);
                } else {
                    tg.find('.soluong-sanpham').val(1);
                    $(this).css({
                        cursor: 'not-allowed',
                        color: 'black'
                    });
                }

            });

            getMemory();

            $('select[name="color"]').change(function() {
                getMemory();
                $('[name=component]').val('');
            });

            $('#versionProduct').find('.form-group:nth-child(2)').find('.item').css('background-color',
            'gainsboro');

            $(document).on('click', '#versionProduct .item', function() {
                $('#versionProduct .item').removeAttr('style');
                $(this).css('background-color', 'gainsboro');
                $('[name=component]').val($(this).attr('data-component'));
                // console.log($('[name=component]').val());
            });
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function showCart(data) {
                var row = '';
                let sort = [];

                $.each(data, function(index, value) {
                    sort.push(value);
                });

                sort.sort((a, b) => {
                    return a.time - b.time;
                });

                $.each(sort, function(index, val) {
                    row += '<div class="row">' +
                        '<input type="hidden" name="product_id" value="' + val.id + '">' +
                        '<div class="col-md-5">' +
                        '<img src="http://127.0.0.1:8000/images/' + val.img + '">' +
                        '</div>' +
                        '<div class="col-md-7">' +
                        '<strong>' + val.name + '</strong>' +
                        '<div class="product-giohang">' +
                        '<div>' +
                        '<p>Gi??: </p>' +
                        '<p>' + val.price + '</p>' +
                        '</div>' +
                        '<div>' +
                        '<p>S??? l?????ng: </p>' +
                        '<p>' + val.amount + '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<hr>' +
                        '</div>'
                });

                return row;
            }

            $.ajax({
                type: "get",
                url: "/cart/cart-session",
                success: function(e) {
                    $('#scroll-giohang').append(showCart(e));
                }
            });

            $('#add-cart').click(function() {
                // var product_id = $(this).parent().find('input[name=product_id]').val();
                // var img = $(this).parent().find('.img-thumbnail').attr('src');
                // var name = $(this).parent().find('.name').text();
                // var price = $(this).parent().find('.price').text();
                // var amount = '1';
                var form = $('form').serializeArray();
                console.log(form);

                $.ajax({
                    type: "get",
                    url: "/cart/add-cart",
                    data: {
                        "id": form[0].value,
                        "component": form[1].value,
                        "color": form[2].value,
                        "amount": form[3].value
                    },
                    success: function(e) {
                        console.log(e);
                        $('#scroll-giohang').html(showCart(e));

                        if (e) {
                            $("#add-cart-effect").fadeIn('slow').fadeOut('slow');
                        }
                    }
                });


            });
        });
    </script>
@endsection
