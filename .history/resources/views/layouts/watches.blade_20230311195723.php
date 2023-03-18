@extends('index')
@section('content')
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="row" >
                <div class="col-12 text-center">
                    <form action="{{route('index.watches')}}" method="Get">
                        <select name="product_name" id="">
                            <option value="">Chon dòng sản phẩm</option>
                            @foreach ($productType as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <select name="price" id="">
                            <option value="">Chọn giá tiền</option>
                            @foreach ($priceType as $key => $item)
                                <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success">Tim kiem</button>
                    </form>
                </div>
                
            </div>
            <div class="heading_container heading_center">

                <h2>
                    Latest Phone
                </h2>
            </div>
            <div class="row">
                @if (isset($product))
                    
                @foreach ($product as $item)
                
                <div class="col-sm-6 col-xl-3">
                    <div class="box">
                        <a href="">
                            <div class="img-box">
                                <img src="{{asset()$item->productcomponent->first()->image ?? null}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{$item->name}}
                                </h6>
                                <h6>
                                    Price:
                                    <span>
                                        {{$item->productcomponent->first()->price ?? null}}
                                    </span>
                                </h6>
                            </div>
                            <div class="new">
                                <span>
                                    New
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif
                    
                
            </div>
            <div class="btn-box">
                <a href="">
                    View All
                </a>
            </div>
        </div>
    </section>
@endsection
