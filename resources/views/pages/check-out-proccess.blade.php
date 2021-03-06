@extends('pages.layouts.app')
@section('title', $title )
@section('content')
    <section class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-page">
                        <h4>{{ trans('page.check_out_proccess') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code--}}
{{--                    </h6>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="checkout__form">
                <h4>{{ trans('page.billing_detail') }}</h4>
                <div class="row">
                    <div class="col-md-12">
                        @if(isset($errors) && $errors->all())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning mr-2"></i>{{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <form action="{{ route('payment-check-out') }}" method="post">
                    @csrf
                    <input class="hidden" type="text" name="order_id" value="{{ $order_id }}">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>{{ trans('page.title_add_address') }}</h4>
                                <div class="checkout__input">
                                    @if(Auth::user()->address->count() == 0)
                                        <p class="text-danger">{{ trans('page.no_have_address') }}</p>
                                    @else
                                        <p>{!!  trans('page.you_have_address', ['count' => Auth::user()->address->count()]) !!}</p>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="site-btn" id="btn-add-address" type="button"><i
                                                    class="fa fa-plus mr-2"></i>Th??m ?????a ch??? m???i
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <h4>{{ trans('page.select_address') }}</h4>
                                <div class="checkout__input row">
                                    <div class="col-md-5">
                                        <p>{{ trans('page.select_your_address') }}<span>*</span></p>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="address_id" id="address-select" class="form-control vn-select w-100">
                                            <option value=""></option>
                                            @if(Auth::user()->address->count() > 0)
                                                @foreach(Auth::user()->address as $item)
                                                    <option value="{{ $item->id }}" @if(old('address_id') == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>{{ trans('page.your_order') }}</h4>
                                <div class="checkout__order__products">
                                    {{ trans('page.product') }}
                                    <span>{{ trans('page.total') }}</span>
                                </div>
                                <ul>
                                    @foreach($carts as $item)
                                        <li>
                                            {{ $item->product->name }}
                                            <span>
                                            {{ number_format(($item->product->sale_price?$item->product->sale_price*$item->quantity:$item->product->cost_price*$item->quantity)) }} {{ trans('page.currency') }}
                                        </span>
                                        </li>
                                        <input class="hidden" type="text" name="product_id[]"
                                               value="{{ $item->product->id }}">
                                        <input class="hidden" type="text" name="product_name[]"
                                               value="{{ $item->product->name }}">
                                        <input class="hidden" type="text" name="product_price[]"
                                               value="{{ $item->product->sale_price?$item->product->sale_price:$item->product->cost_price }}">
                                        <input class="hidden" type="text" name="product_quantity[]"
                                               value="{{ $item->quantity }}">
                                        <input class="hidden" type="text" name="product_total[]"
                                               value="{{ $item->product->sale_price?$item->product->sale_price*$item->quantity:$item->product->cost_price*$item->quantity }}">
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">{{ trans('page.sub_total') }}
                                    <span>{{ number_format($sub_total) }} {{ trans('page.currency') }}</span></div>
                                <input class="hidden" type="text" name="sub_total" value="{{ $sub_total }}">
                                <div class="checkout__order__total">{{ trans('page.total') }}
                                    <span>{{number_format($sub_total)  }} {{ trans('page.currency') }}</span></div>
                                <input class="hidden" type="text" name="total" value="{{ $sub_total }}">
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <p>{{ trans('page.select_payment') }}<span>*</span></p>
                                    </div>
                                    <div class="col-md-8 col-xs-12">
                                        @if(check_pay('vnpay'))
                                            <div class="col-md-12 form-check my-2">
                                                <input class="form-check-input" type="radio" name="payment" id="VNPAY" value="vnpay" @if(old('payment') == 'vnpay') checked @endif>
                                                <label class="form-check-label" for="VNPAY">
                                                    {{ trans('page.vnpay') }}
                                                </label>
                                            </div>
                                        @endif
                                        @if(check_pay('cod'))
                                            <div class="col-md-12 form-check my-2">
                                                <input class="form-check-input" type="radio" name="payment" id="COD" value="cod" @if(old('payment') == 'cod') checked @endif>
                                                <label class="form-check-label" for="COD">
                                                    {{ trans('page.cod') }}
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="site-btn">{{ trans('page.pay_ment') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div id="address" class="ws-over close">
        <div class="ws-container">
            <div class="ws-modal">
                <div class="close-modal"></div>
                <div class="ws-title">NH???P TH??NG TIN NH???N H??NG</div>
                <div class="ws-body">
                    <div class="ws-loading close">
                        <img src="{{ url('images/loading.gif') }}" alt="" width="40px" height="40px">
                    </div>
                    <div id="address-content">
                        <div class="checkout__input mt-2">
                            <p>T??n hi???n th???<span>*</span></p>
                            <input type="text" name="name" class="required">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>T??n ng?????i nh???n<span>*</span></p>
                                    <input type="text" name="customer_name" class="required">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>S??? ??i???n tho???i ng?????i nh???n<span>*</span></p>
                                    <input type="text" name="phone" class="required">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input row">
                            <div class="col-lg-4">
                                    <p>T???nh<span>*</span></p>
                                    <select name="province" class="form-control vn-select vn-province required"></select>
                            </div>
                            <div class="col-lg-4">
                                    <p>Huy???n<span>*</span></p>
                                    <select name="district" class="form-control vn-select vn-district required"></select>
                            </div>
                            <div class="col-lg-4">
                                    <p>X??<span>*</span></p>
                                    <select name="ward" class="form-control vn-select vn-ward required"></select>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>?????a ch??? nh??<span>*</span></p>
                            <input type="text" name="address" class="required">
                            <i>(T???, x??m, ng??, ng??ch, s??? nh??...)</i>
                        </div>
                        <div class="checkout__input">
                            <p>Email ng?????i nh???n</p>
                            <input type="text" name="email">
                        </div>
                        <div class="checkout__input">
                            <button type="submit" id="add_address" class="site-btn" name="add">Th??m</button>

                            <p class="my-2"><span class="text-danger">* </span>M???c b???t bu???c</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.layouts.sub_footer')
@endsection
@section('script')
    <script src="{{ url('js/vietnam/selector.js') }}"></script>
    <script>
        var localpicker = new LocalPicker({
            province: "province",
            district: "district",
            ward: "ward"
        });
        $('#address .close-modal').click(function (){
            ad_loading($('#address').find('.ws-loading'))
        });
        $('#add_address').click(function (e) {
            if($('#address').find('.ws-loading').hasClass('close')){
                ad_loading($('#address').find('.ws-loading'))
                var check = 1;
                $('#address-content input, #address-content select').each(function () {
                    if (($(this).val() == '' || $(this).val() == null)  && $(this).hasClass('required')) {
                        var tb = '';
                        if($(this).attr("name") === 'name'){
                            tb = 'Ch??a nh???p t??n hi???n th???!';
                        }else if($(this).attr("name") === 'customer_name'){
                            tb = 'Ch??a nh???p t??n ng?????i nh???n!';
                        }else if($(this).attr("name") === 'phone'){
                            tb = 'Ch??a nh???p s??? ??i???n tho???i ng?????i nh???n!';
                        }else if($(this).attr("name") === 'address'){
                            tb = 'Ch??a nh???p ?????a ch??? nh??!';
                        }else if($(this).attr("name") === 'province'){
                            tb = 'Ch??a ch???n t???nh/th??nh ph???!';
                        }else if($(this).attr("name") === 'district'){
                            tb = 'Ch??a ch???n qu???n/huy???n!';
                        }else if($(this).attr("name") === 'ward'){
                            tb = 'Ch??a ch???n x??/ph?????ng/th??? tr???n!';
                        }
                        if(tb!==''){
                            toastr.clear();
                            toastr.error(tb);
                        }

                        ad_loading($('#address').find('.ws-loading'))
                        $(this).focus();
                        check = 0;
                        return false;
                    }
                });
                if(check){
                        var name = $('#address-content input[name="name"]').val();
                        var customer_name = $('#address-content input[name="customer_name"]').val();
                        var phone = $('#address-content input[name="phone"]').val();
                        var address = $('#address-content input[name="address"]').val();
                        var email = $('#address-content input[name="email"]').val();

                        var province = $('#address-content .vn-province option:selected').text();
                        var district = $('#address-content .vn-district option:selected').text();
                        var ward = $('#address-content .vn-ward option:selected').text();
                        console.log(province);
                        console.log(district);
                        console.log(ward);
                        console.log(name);

                    $.ajax({
                        url: "{{route('add-address')}}",
                        type: "POST",
                        data: {
                            _token: _token,
                            name: name,
                            customer_name: customer_name,
                            phone: phone,
                            address: address,
                            email: email,
                            province: province,
                            district: district,
                            ward: ward
                        },
                        success: function (data) {
                            ad_loading($('#address').find('.ws-loading'))
                            if (data.status == 1) {
                                ad_reset();
                                if(data.msg) {
                                    toastr.clear();
                                    toastr.success(data.msg);
                                }
                                location.reload();
                            } else {
                                if(data.error){
                                    toastr.clear();
                                    toastr.error(data.error);
                                }

                            }
                        },
                        error: function (data) {
                            ad_loading($('#address').find('.ws-loading'))
                            toastr.clear();
                            toastr.error('{{ trans('alert.has_error') }}');
                        }
                    });
                }

            }

            return false;
        });

        $('#btn-add-address').click(function () {
            $('#address').removeClass('close');
            $('#address').addClass('open');
            if ($('#cart-content').children().length == 0) {
                toggle_loading($('#cart').find('.ws-loading'));
                load_cart();
                toggle_loading($('#cart').find('.ws-loading'));
            }

        });
        function ad_reset(){
            $('#address-content input, #address-content select').each(function () {
                $(this).val(null);
            });
        }

        function ad_loading(_this){
            if(_this.hasClass('close')){
                $('#address-content').hide();
                _this.removeClass('close');
                _this.addClass('open');
            }else{
                $('#address-content').show();
                _this.removeClass('open');
                _this.addClass('close');

            }

        }
    </script>
@endsection
