
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ url('lg.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.min.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('plugins/croppie.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/loading.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/ldbtn.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
</head>
<body class="">
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	@include('dashboards.layouts.nav')
	@include('dashboards.layouts.header')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            @yield('content')
        </div>
    </div>
<script src="{{ url('admin/js/vendor-all.min.js') }}"></script>
<script src="{{ url('admin/js/jquery.min.js') }}"></script>
<script src="{{ url('admin/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ url('admin/js/ripple.js') }}"></script>
<script src="{{ url('admin/js/pcoded.min.js') }}"></script>
<script src="{{ url('plugins/croppie.js') }}"></script>
<script src="{{ url('plugins/toastr.min.js') }}"></script>
<script src="{{ url('plugins/summernote-bs4.min.js') }}"></script>
<script src="{{ url('js/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    let _token   = $('meta[name="csrf-token"]').attr('content');
    $('.limit').change(function(){
        let limit = $(this).val();
        let route_data = $(this).data('route-data');
        $.ajax({
            url: "{{route('add-session-pagginate')}}",
            type: "POST",
            data: {
                _token: _token,
                limit: limit,
            },
            success: function (data) {
                if(data == '1'){
                    $("#table-body").addClass('running');
                    $.ajax({
                        url: route_data,
                        type: "GET",
                        data: {
                            ajax: true,
                            page: {{ request()->get('page')?request()->get('page'):1 }},
                        },
                        success: function (data) {
                            $("#table-body").removeClass('running');
                            $("#table-content").html(data);
                        }
                    });
                }
                else
                toastr.error('L???i ph??n trang!');
            }
        });
    })
    $('.sort').change(function(){
        let sort = $(this).val();
        let type = $(this).data('type');
        let sorts = $(this).find('option:selected').data('sort');
        let route_data = $(this).data('route-data');
        $.ajax({
            url: "{{route('add-session-sort')}}",
            type: "POST",
            data: {
                _token: _token,
                type: type,
                sort: sort,
                sorts: sorts,
            },
            success: function (data) {
                if(data == '1'){
                    toastr.clear();
                    toastr.success('S???p x???p th??nh c??ng!');
                    $("#table-body").addClass('running');
                    $.ajax({
                        url: route_data,
                        type: "GET",
                        data: {
                            ajax: true,
                            page: {{ request()->get('page')?request()->get('page'):1 }},
                        },
                        success: function (data) {
                            $("#table-body").removeClass('running');
                            $("#table-content").html(data);
                        }
                    });
                }
                else
                toastr.error('L???i s???p x???p!');
            },
            error: function (data) {
                toastr.error('L???i s???p x???p!');
            }
        });
    })
    let check = false;
    $("#select-all").on('click', function(){
        $(".icheck").prop('checked', !check);
        check = !check;
    });
    $("#check-all").on('click', function(){
        if($("#check-all:checked").length==1){
            $(".ichecks").prop('checked', true);
        }else{
            $(".ichecks").prop('checked', false);
        }
    });
    $(".ichecks").on('click', function(){
        $("#check-all").prop('checked', false);
        let check = true;
        let cb = $(".ichecks").length;
        let cbc = $(".ichecks:checked").length;
        if(cb==cbc){
            $("#check-all").prop('checked', true);
        }
    });
    $("#delete-all").click(function(){
        let id = [];
        let route = $(this).data('route');
        let route_data = $(this).data('route-data');
        $('input.icheck[name ="id[]"]:checkbox:checked').each(function() {
            id.push($(this).val());
        });
        if(id.length>0){
            Swal.fire({
                title: '',
                text: 'Xa??c nh????n xoa?? m???c ???? ch???n?',
                icon: 'question',
                showCancelButton: true,
                showConfirmButton: true,
                cancelButtonText: "Huy??",
                confirmButtonText: "Xoa??",
                focusConfirm: false,
                preConfirm: () => {
                    $.ajax({
                        url: route,
                        type: "POST",
                        data: {
                            _token: _token,
                            ids: id,
                        },
                        success: function (data) {
                            if(data == '1'){
                                check = !check;
                                toastr.clear();
                                toastr.success('X??a th??nh c??ng!');
                                $("#table-body").addClass('running');
                                $.ajax({
                                    url: route_data,
                                    type: "GET",
                                    data: {
                                        ajax: true,
                                        page: {{ request()->get('page')?request()->get('page'):1 }},
                                    },
                                    success: function (data) {
                                        $("#table-body").removeClass('running');
                                        $("#table-content").html(data);
                                    }
                                });
                            }
                            else{
                                toastr.clear();
                                toastr.error('X??a g???p l???i!');
                            }
                        },
                        error: function(){
                            toastr.clear();
                            toastr.error('X??a g???p l???i!');
                        }
                    });
                }
            })
        }else{
            toastr.clear();
            toastr.error('Kh??ng c?? m???c n??o ???????c ch???n!');
        }

    })
    $(".btn-change").click(function(){
        _this = $(this);
        id = _this.data('id');
        status = _this.data('status');
        if(status==0){
            status = 1;
        }else{
            status = 0;
        }
        route = _this.data('route');
        _this.addClass('running');
        $.ajax({
            url: route,
            type: "POST",
            data: {
                _token: _token,
                id: id,
                status: status
            },
            success: function (data) {
                if(data == '1'){
                    toastr.clear();
                    toastr.success('Thay ?????i th??nh c??ng!');
                    _this.removeClass('running');
                    _this.data('status', status);
                    if(status==1){
                        _this.addClass("btn-success");
                        _this.removeClass("btn-secondary");
                        _this.find('b').html('<i class="feather mr-2 icon-check-circle"></i>Ho???t ?????ng');
                    }else{
                        _this.addClass("btn-secondary");
                        _this.removeClass("btn-success");
                        _this.find('b').html('<i class="feather mr-2 icon-slash"></i>Ng??ng ho???t ?????ng');
                    }
                }
                else{
                    _this.removeClass('running');
                    toastr.clear();
                    toastr.error('Thay ?????i th???t b???i!');
                }
            },
            error: function(){
                toastr.clear();
                toastr.error('Thay ?????i g???p l???i!');
            }
        });

    })
    $(".btn-delete").click(function(){
        let id = $(this).data('id');
        let route = $(this).data('route');
        let route_data = $(this).data('route_data');
        Swal.fire({
            title: '',
            text: 'Xa??c nh????n xoa???',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: "Huy??",
            confirmButtonText: "Xoa??",
            focusConfirm: false,
            preConfirm: () => {
                $.ajax({
                    url: route,
                    type: "POST",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function (data) {
                        if(data == '1'){
                            toastr.clear();
                            toastr.success('X??a th??nh c??ng!');
                            $("#table-body").addClass('running');
                            $.ajax({
                                url: route_data,
                                type: "GET",
                                data: {
                                    ajax: true,
                                    page: {{ request()->get('page')?request()->get('page'):1 }},
                                },
                                success: function (data) {
                                    $("#table-body").removeClass('running');
                                    $("#table-content").html(data);
                                }
                            });
                        }
                        else{
                            $("#table-body").removeClass('running');
                            toastr.clear();
                            toastr.error('X??a g???p l???i!');
                        }
                    },
                    error: function(){
                        $("#table-body").removeClass('running');
                        toastr.clear();
                        toastr.error('X??a g???p l???i!');
                    }
                });
            }
        })
    })
    var _changeInterval = null;
    $("input.search-table").keyup(function() {
        let _this = $(this);
        clearInterval(_changeInterval)
        _changeInterval = setInterval(function() {
            clearInterval(_changeInterval)
            $("#table-body").addClass('running');
            let key = _this.val();
            let route = _this.data('route');
            $.ajax({
                url: route,
                type: "POST",
                data: {
                    _token: _token,
                    key: key,
                },
                success: function (data) {
                    if(data != '0'){
                        $("#table-body").removeClass('running');
                        $("#table-content").html(data);
                    }
                    else
                    toastr.error('L???i t??m ki???m!');
                },
                error: function (data) {
                    toastr.error('L???i t??m ki???m!');
                }
            });
        }, 1000);
    });
</script>
@yield('script')

{{-- <script src="{{ url('admin/js/plugins/apexcharts.min.js') }}"></script> --}}
{{-- <script src="{{ url('admin/js/pages/dashboard-main.js') }}"></script> --}}
</body>

</html>
