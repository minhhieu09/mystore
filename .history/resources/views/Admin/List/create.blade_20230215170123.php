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
                        <input type="text" class="form-control" placeholder="Tên sản phẩm" >
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
                            @foreach ($type as $row) {
                                <option value="{{$row->id}}">
                                    @if (isset($id))
                                        
                                    @endif
                                </option>
                            }
                                
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection
