@extends('layouts.admin')
@section('content')
@include('common.noti_message')
    <form action="{{route('admin.update')}}" method="post">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Thay đổi thông tin sản phẩm</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Tên sản phẩm</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" value="{{ isset($id) ? $product->name : '' }}"
                                    placeholder="Nhập tên sản phẩm" name="name" required />
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Hiển thị sản phẩm</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="switch form-label">
                                        @if (isset($id))
                                            <input class="form-control" type="checkbox" name="status"
                                                {{ $product->status == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        @else
                                            <input class="form-control" type="checkbox" name="status" checked>
                                            <span class="slider round"></span>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Loại sản phẩm</h5>
                            </div>
                            <div class="card-body">
                                <select class="form-select mb-3" name="type" required>
                                    <option selected value="">Chọn loại sản phẩm</option>
                                    @foreach ($type as $row)
                                        <option value="{{ $row->id }}"
                                            @if (isset($id)) {{ $product->productType->id == $row->id ? 'selected' : '' }} @endif>
                                            {{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Mô tả sản phẩm</h5>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" id="summernote" name="description">
                                        {!! isset($id) ? $product->description : null !!}
                                    </textarea>
                            </div>
                        </div>
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
                            <div class="btn btn-primary" id="addGroupImg" style="width: 100px" type="submit">Thêm</div>
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

            </div>
            <div class="col-lg-6">
                <button class="btn btn-success" type="submit">Lưu</button>
                <a href="" class="btn btn-primary ml-3">Quay lại</a>
            </div>
        </div>
        </div>
    </form>
@endsection
