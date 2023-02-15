@extends('layouts.admin')
@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm sản phẩm</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
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
            <br />
            <form class="form-horizontal form-label-left">

                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Tên Sản Phẩm</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control" placeholder="Tên sản phẩm">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Sản phẩm đặc biệt<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control" rows="3" placeholder="Nội dung sản phẩm"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Loại sản phẩm<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 ">
                        <select name="type" class="form-select mb-3" id="">
                            <option selected value="">Chọn loại sản phẩm</option>
                            @foreach ($data as $row)
                                {
                                <option value="{{ $row->id }}">
                                    @if (isset($id))
                                        {{ $product->productType->id == $row->id ? ' selected="selected"' : '' }}
                                    @endif
                                    {{ $row->name }}
                                </option>
                                }
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Mô tả sản phẩm<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 ">
                        <textarea textarea id="product-content" class="form-control ckeditor-box" rows="3"
                            placeholder="Nội dung sản phẩm"></textarea>
                    </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="" class="btn btn-success">Submit</button>
                    </div>
                </div>
                @if (!isset($id))
                    <div class="row">
                        <div class="col-12 mb-3" id="listItem">
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label for="memory">Chọn dung lượng</label>
                                    <select name="memory[]" required>
                                        <option selected value="">Chọn bộ nhớ</option>
                                        @foreach ($memory as $key => $row)
                                            <option value="{{ $key }}">{{ $row }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="color">Chọn màu</label>
                                    <br>
                                    <select name="color[]" required>
                                        <option selected value="">Chọn màu</option>
                                        @foreach ($color as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="amount">Số lượng</label>
                                    <br>
                                    <input type="number" name="amount[]" style="width: 100px" required />
                                </div>
                                <div class="col-2">
                                    <label for="price">Đơn giá</label>
                                    <br>
                                    <input type="number" name="price[]" style="width: 100px" required />
                                </div>
                                <div class="col-3 group-img">
                                    <label for="img">Chọn hình ảnh</label>
                                    <input name="image[]" type="file" style="width: 85px" />
                                    <img src="#" class="imgPreview" style="width: 200px">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="btn btn-primary" id="addGroupImg" style="width: 100px">Thêm</div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12 mb-3" id="listItem">
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label for="memory">Chọn dung lượng</label>
                                    <select name="memory[]">
                                        <option selected value="">Chọn bộ nhớ</option>
                                        @foreach ($memory as $key => $row)
                                            <option value="{{ $key }}"
                                                {{ $productComponent->memory == $key ? 'selected' : '' }}>
                                                {{ $row }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="color">Chọn màu</label>
                                    <br>
                                    <select name="color[]">
                                        <option selected value="">Chọn màu</option>
                                        @foreach ($color as $row)
                                            <option value="{{ $row->id }}"
                                                {{ $productComponent->color_id == $row->id ? 'selected' : '' }}>
                                                {{ $row->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="amount">Số lượng</label>
                                    <br>
                                    <input type="number" name="amount[]" style="width: 100px"
                                        value="{{ isset($id) ? $productComponent->amount : '' }}">
                                </div>
                                <div class="col-2">
                                    <label for="price">Đơn giá</label>
                                    <br>
                                    <input type="number" name="price[]" style="width: 100px"
                                        value="{{ isset($id) ? $productComponent->price : '' }}">
                                </div>
                                <div class="col-3 group-img">
                                    <label for="img">Chọn hình ảnh</label>
                                    <input name="image[]" type="file" style="width: 85px" />
                                    <img src="{{ isset($id) ? asset('images/' . $productComponent->image) : '#' }}"
                                        class="imgPreview" style="width: 200px">
                                </div>
                            </div>
                        </div>
                        @if (!isset($id))
                            <div class="col-12">
                                <div class="btn btn-primary" id="addGroupImg" style="width: 100px">Thêm</div>
                            </div>
                        @endif
                    </div>
                @endif
            </form>
        </div>
    </div>
    </div>
@endsection
