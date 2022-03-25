@extends('dashboards.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ $title }}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboards') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category') }}">Danh mục</a></li>
                        <li class="breadcrumb-item active text-light"><b>Sản phẩm thuộc {{ $category->name }}</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-12 col-12 text-center position-relative">
                            <b>
                                <h4 class="m-1 text-primary">DANH SÁCH SẢN PHẨM</h4>
                            </b>
                        </div>
                    </div>
                    <div class="row d-flex flex-direction-row">
                        <div class="col-md-12 col-12">
                            <div class="d-md-flex flex-direction-row justify-content-end w-100">
                                <div class="mx-md-2 col-xs-12">
                                    <div class="d-flex flex-row align-items-center">
                                        <b style="min-width: 100px; white-space: nowrap;">Số Dòng</b>
                                        <select name="limit" id="limit" data-route-data="{{ route('view-category-products', ['id'=>$category->id]) }}" class="limit form-control">
                                            <option value="10" {{ (!Session::has('limit'))?'selected':'' }}></option>
                                            <option value="5" {{ (Session::has('limit')&&Session::get('limit')==5)?'selected':'' }}>5</option>
                                            <option value="10" {{ (Session::has('limit')&&Session::get('limit')==10)?'selected':'' }}>10</option>
                                            <option value="20" {{ (Session::has('limit')&&Session::get('limit')==20)?'selected':'' }}>20</option>
                                            <option value="30" {{ (Session::has('limit')&&Session::get('limit')==30)?'selected':'' }}>30</option>
                                            <option value="40" {{ (Session::has('limit')&&Session::get('limit')==40)?'selected':'' }}>40</option>
                                            <option value="50" {{ (Session::has('limit')&&Session::get('limit')==50)?'selected':'' }}>50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- {{ dd($lists) }} --}}
                <div id="table-body" class="ld-over">
                    <div class="ld ld-ring ld-spin"></div>
                    <div id="table-content">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="icheck-primary d-inline">
                                                    <input class="icheck" type="checkbox" id="check-all">
                                                    <label for="check-all"><b></b></label>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger ld-over"
                                                        id="delete-all"
                                                        data-route="{{ route('delete-products') }}"
                                                        data-route-data="{{ route('view-category-products', ['id'=>$category->id]) }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <div class="ld ld-ring ld-spin"></div>
                                                </button>
                                            </th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th>Chi Tiết</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($lists))
                                            @foreach ($lists as $item)
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary d-inline">
                                                            <input class="icheck ichecks" name="id[]" value="{{ $item->product->id }}" type="checkbox" id="check-{{ $item->product->id }}">
                                                            <label for="check-{{ $item->product->id }}"><b>{{ $item->product->id }}</b></label>
                                                        </div>
                                                    </td>
                                                    <td style="white-space: normal; max-width: 300px;">
                                                        <b>{{ $item->product->name }}</b>
                                                    </td>
                                                    <td>
                                                        {{-- <img class="shadow" src="{{ url($item->product->image) }}" alt="" width="80px" height="80px"> --}}
                                                    </td>
                                                    <td style="white-space: normal;">
                                                        <ul class="mb-0 pl-2">
                                                            <li>
                                                                Link: <b><a target="_blank" href="{{ url('product/'.$item->product->slug) }}">{{ url('product/'.$item->product->slug) }}</a></b>
                                                            </li>
                                                            <li>
                                                                Giá bán: <b>{{ number_format($item->product->cost_price) }}</b>
                                                            </li>
                                                            <li>
                                                                Giá khuyến mãi: <b>{{ number_format($item->product->sale_price) }}</b>
                                                            </li>
                                                            <li>
                                                                Đơn vị tính: <b>{{ $item->product->unit }}</b>
                                                            </li>
                                                            <li>
                                                                Số lượng: <b>{{ number_format($item->product->count) }}</b>
                                                            </li>
                                                            {{-- <li>
                                                                Danh mục:
                                                            @foreach ($item->product->categories as $item->products)
                                                                <b class="text-primary">{{ $item->products->category->name }}</b>,
                                                            @endforeach
                                                            </li> --}}
                                                            <li>
                                                                Mô tả: <b>{{ $item->product->description }}</b>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        @if ($item->product->status==1)
                                                            <button type="button" class="btn-change btn btn-success has-ripple ld-over" data-id="{{ $item->product->id }}" data-status="1" data-route="{{ route('change-product') }}">
                                                                <div class="ld ld-ring ld-spin"></div>
                                                                <b><i class="feather mr-2 icon-check-circle"></i>Hoạt động</b>
                                                                <span class="ripple ripple-animate" style="height: 112.828px; width: 112.828px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -26.781px; left: 12.6565px;"></span>
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn-change btn btn-secondary has-ripple ld-over" data-id="{{ $item->product->id }}" data-status="0" data-route="{{ route('change-product') }}">
                                                                <div class="ld ld-ring ld-spin"></div>
                                                                <b><i class="feather mr-2 icon-slash"></i>Ngưng hoạt động</b>
                                                                <span class="ripple ripple-animate" style="height: 112.828px; width: 112.828px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -26.781px; left: 12.6565px;"></span>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-icon btn-primary btn-view ld-over" data-id="{{ $item->product->id }}">
                                                            <i class="fas fa-eye"></i>
                                                            <div class="ld ld-ring ld-spin"></div>
                                                        </button>
                                                        <button type="button" class="btn btn-icon btn-success btn-edit ld-over" data-id="{{ $item->product->id }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            <div class="ld ld-ring ld-spin"></div>
                                                        </button>
                                                        <button type="button" class="btn btn-icon btn-danger btn-delete ld-over" data-id="{{ $item->product->id }}" data-route="{{ route('delete-product') }}" data-route-data="{{ route('view-category-products', ['id'=>$category->id]) }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                            <div class="ld ld-ring ld-spin"></div>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row my-2">
                                <div class="col-md-12">
                                    {{ $lists->links('pagination.custom') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(".btn-edit").click(function(){
        _this = $(this);
        _this.addClass('running');
        id = _this.data('id');
        window.location.href = '{{ route("edit-product") }}/'+id;
    })
    $("#add").click(function(){
        toastr.clear()
        let name = $("#product_name").val();
        let description = $("#product_description").val();
        let price = $("#product_price").val();
        let unit = $("#product_unit").val();
        let count = $("#product_count").val();
        if(name==''){
            toastr.error('Chưa nhập tên sản phẩm!');
        }
        if(name!=''){
            $('#add-form').addClass('running');
            resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (img) {
                let _token   = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{route('add-product')}}",
                    type: "POST",
                    data: {
                        _token: _token,
                        name: name,
                        description: description,
                        image:img,
                        cost_price:price,
                        unit: unit,
                        count: count
                    },
                    success: function (data) {
                        $('#add-form').removeClass('running');
                        if(data.status==1){
                            toastr.clear()
                            toastr.success(data.msg);
                            console.log(data.id)
                            window.location.href = '{{ route("edit-product") }}/'+data.id;
                        }
                        if(data.status==-1){
                            toastr.clear()
                            toastr.error(data.msg);
                        }
                        if(data.status==0){
                            toastr.clear()
                            let errors = data.errors;
                            $.each(errors, function(index, value) {
                                toastr.error(value);
                            });
                        }
                    },
                    error: function (data) {
                        $('#add-form').removeClass('running');
                        toastr.clear()
                        toastr.error("Lỗi! Không thể thêm sản phẩm.");
                    }
                });
            });
        }
    });
    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: 300,
            height: 300,
            type: 'square' //square
        },
        boundary: {
            width: 350,
            height: 350
        }
    });
    $('#image').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            resize.croppie('bind',{
                url: e.target.result
            }).then(function(){ });
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection
