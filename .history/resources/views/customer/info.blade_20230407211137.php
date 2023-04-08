@extends('index')
@section('content')
    @include('common.noti_message')
    <div class="container mt-4 py-2" style="background-color: #e9e9e9">
        <form class="well form-horizontal" action="" method="post" id="contact_form">
            <input type="hidden" name="id" value="">
            <div class="row">
                @csrf
                <div class="col-12">
                    <!-- Form Name -->
                    <legend>Thông tin cá nhân</legend>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label">Họ</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="first_name" placeholder="Nhập họ của bạn" class="form-control"
                                       type="text" autocomplete="off" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" placeholder="Nhập địa chỉ email" class="form-control"
                                       type="text" autocomplete="off" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Thành phố</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                <select name="city" class="form-control" id="city" required>
                                    <option value="">Chọn thành phố</option>
                                    @foreach($city as $citys)
                                        <option value="{{ $citys->city_id }}" {{ $citys->city_id == $customer->city_id ? 'selected' : ''}}>
                                            {{ $citys->city_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="control-label">Tên</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="last_name" placeholder="Nhập tên của bạn" class="form-control"
                                       type="text" autocomplete="off" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Số điện thoại</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="phone" placeholder="(+84) 12 3456789" class="form-control" type="text"
                                       autocomplete="off" value="" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Quận, huyện</label>
                        <div class="selectContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="district" id="district" class="form-control" required>
                                    <option value="">Chọn quận, huyện</option>
                                    @if (isset($address))
                                        @foreach($address as $district)
                                            <option value="{{ $district->distric_id }}"
                                                {{ $district->distric_id == $customer->distric_id ? 'selected' : '' }}>
                                                {{ $district->distric_name }}
                                            </option>
                                    @endforeach
                                    @endif
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="row">
                <div class="col-12">
                    <div style="text-align: center">
                        <a href="" class="btn btn-primary">Quay lại</a>
                        <button type="submit" class="btn btn-success">Lưu</button>
                        <a href="{{route('customer.logout')}}" class="btn btn-danger">Đăng xuất</a>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#city').change(function () {
                $.ajax({
                    type: "get",
                    url: "info.address",
                    data: {
                        "city_id": $(this).val()
                    },
                    success: function (e) {
                        var html = '';
                        $.each(e.data, function (index, value) {
                            html += '<option value="'+ value.distric_id +'">'+ value.distric_name +'</option>'
                        });
                        console.log(e.data);

                        $('#district').find('option:not(:first)').remove();
                        $('#district').append(html);
                    }
                });
            });
        })
    </script>
@endsection

