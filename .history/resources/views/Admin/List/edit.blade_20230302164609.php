@extends('admin.index')
@section('content')
    @if($errors->has('name'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ $errors->getBag('default')->first('name') }}
        </div>
    @endif

    <form action="{{ route(ADMIN_PRODUCT_STORE) }}" method="post">
        @csrf
        @if(isset($id))
            <input type="hidden" value="{{ $id }}" name="id">
        @endif
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <h1 class="h3 d-inline align-middle">Thay đổi</h1>
                    <a class="badge bg-dark text-white ms-2">
                        Thay đổi thông tin sản phẩm
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-success" type="submit">Lưu</button>
                <a href="{{ route(ADMIN_PRODUCT_INDEX) }}" class="btn btn-primary ml-3">Quay lại</a>
            </div>
        </div>
        @include('admin.product.form')
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var id = $('input[name="id"]').val();

            $('#input-multiple').select2({
                width: '100%',
                placeholder: "Chọn tùy chỉnh đặc biệt"
            });

            $.ajax({
                type: "get",
                data: {
                    'id': id
                },
                url: "{{ route(GET_PRODUCT_SPECIAL) }}",
                success: function (e) {
                    console.log(e);
                    $('#input-multiple').val(e);
                    $('#input-multiple').trigger('change');
                }
            });
        });

        $(document).on('change', '.group-img input', function () {
            let $file = $(this);

            if ($file.prop('files') && $file.prop('files')[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    console.log($file);
                    $file.closest('.group-img').find('.imgPreview').attr('src', e.target.result);
                };

                reader.readAsDataURL($file.prop('files')[0]);
            }
        });
    </script>
@endsection
