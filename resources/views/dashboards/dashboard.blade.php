@extends('dashboards.layouts.app')
@section('title', 'Dashboard')
@section('content')

            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard Analytics</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
{{--                <div class="col-lg-7 col-md-12">--}}
{{--                    <!-- support-section start -->--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="card support-bar overflow-hidden">--}}
{{--                                <div class="card-body pb-0">--}}
{{--                                    <h2 class="m-0">350</h2>--}}
{{--                                    <span class="text-c-blue">Support Requests</span>--}}
{{--                                    <p class="mb-3 mt-3">Total number of support requests that come in.</p>--}}
{{--                                </div>--}}
{{--                                <div id="support-chart"></div>--}}
{{--                                <div class="card-footer bg-primary text-white">--}}
{{--                                    <div class="row text-center">--}}
{{--                                        <div class="col">--}}
{{--                                            <h4 class="m-0 text-white">10</h4>--}}
{{--                                            <span>Open</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <h4 class="m-0 text-white">5</h4>--}}
{{--                                            <span>Running</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <h4 class="m-0 text-white">3</h4>--}}
{{--                                            <span>Solved</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="card support-bar overflow-hidden">--}}
{{--                                <div class="card-body pb-0">--}}
{{--                                    <h2 class="m-0">350</h2>--}}
{{--                                    <span class="text-c-green">Support Requests</span>--}}
{{--                                    <p class="mb-3 mt-3">Total number of support requests that come in.</p>--}}
{{--                                </div>--}}
{{--                                <div id="support-chart1"></div>--}}
{{--                                <div class="card-footer bg-success text-white">--}}
{{--                                    <div class="row text-center">--}}
{{--                                        <div class="col">--}}
{{--                                            <h4 class="m-0 text-white">10</h4>--}}
{{--                                            <span>Open</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <h4 class="m-0 text-white">5</h4>--}}
{{--                                            <span>Running</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <h4 class="m-0 text-white">3</h4>--}}
{{--                                            <span>Solved</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- support-section end -->--}}
{{--                </div>--}}
                <div class="col-lg-12 col-md-12">
                    <!-- page statustic card start -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-yellow">{{ number_format(2310000) }} {{ trans('page.currency') }}</h4>
                                            <h6 class="text-muted m-b-0">Tổng hóa đơn</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-bar-chart-2 f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-yellow">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-green">290+</h4>
                                            <h6 class="text-muted m-b-0">Lượt Truy Cập</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-file-text f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red">145</h4>
                                            <h6 class="text-muted m-b-0">Đơn Hàng</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-calendar f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-down text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-blue">135</h4>
                                            <h6 class="text-muted m-b-0">Thanh Toán</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-thumbs-down f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-blue">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"></p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-down text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- page statustic card end -->
                </div>
                <!-- prject ,team member start -->
                <div class="col-xl-6 col-md-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Projects</h5>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="chk-option">
                                                <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            Assigned
                                        </th>
                                        <th>Name</th>
                                        <th>Due Date</th>
                                        <th class="text-right">Priority</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="chk-option">
                                                <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            <div class="d-inline-block align-middle">
                                                <img src="assets/images/user/avatar-4.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                <div class="d-inline-block">
                                                    <h6>John Deo</h6>
                                                    <p class="text-muted m-b-0">Graphics Designer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Able Pro</td>
                                        <td>Jun, 26</td>
                                        <td class="text-right"><label class="badge badge-light-danger">Low</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="chk-option">
                                                <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            <div class="d-inline-block align-middle">
                                                <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                <div class="d-inline-block">
                                                    <h6>Jenifer Vintage</h6>
                                                    <p class="text-muted m-b-0">Web Designer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Mashable</td>
                                        <td>March, 31</td>
                                        <td class="text-right"><label class="badge badge-light-primary">high</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="chk-option">
                                                <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            <div class="d-inline-block align-middle">
                                                <img src="assets/images/user/avatar-3.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                <div class="d-inline-block">
                                                    <h6>William Jem</h6>
                                                    <p class="text-muted m-b-0">Developer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Flatable</td>
                                        <td>Aug, 02</td>
                                        <td class="text-right"><label class="badge badge-light-success">medium</label></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="chk-option">
                                                <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label"></span>
                                                </label>
                                            </div>
                                            <div class="d-inline-block align-middle">
                                                <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                <div class="d-inline-block">
                                                    <h6>David Jones</h6>
                                                    <p class="text-muted m-b-0">Developer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Guruable</td>
                                        <td>Sep, 22</td>
                                        <td class="text-right"><label class="badge badge-light-primary">high</label></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Customers start -->
                <div class="col-lg-6 col-md-12">
                    <div class="card table-card review-card">
                        <div class="card-header borderless ">
                            <h5>Customer Reviews</h5>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="review-block">
                                <div class="row">
                                    <div class="col-sm-auto p-r-0">
                                        <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius profile-img cust-img m-b-15">
                                    </div>
                                    <div class="col">
                                        <h6 class="m-b-15">John Deo <span class="float-right f-13 text-muted"> a week ago</span></h6>
                                        <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                        <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                        <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                        <p class="m-t-15 m-b-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                            took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                        <a href="#!" class="m-r-30 text-muted"><i class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                                        <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                                        <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-auto p-r-0">
                                        <img src="assets/images/user/avatar-4.jpg" alt="user image" class="img-radius profile-img cust-img m-b-15">
                                    </div>
                                    <div class="col">
                                        <h6 class="m-b-15">Allina D’croze <span class="float-right f-13 text-muted"> a week ago</span></h6>
                                        <a href="#!"><i class="feather icon-star-on f-18 text-c-yellow"></i></a>
                                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                        <a href="#!"><i class="feather icon-star f-18 text-muted"></i></a>
                                        <p class="m-t-15 m-b-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                            took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                        <a href="#!" class="m-r-30 text-muted"><i class="feather icon-thumbs-up m-r-15"></i>Helpful?</a>
                                        <a href="#!"><i class="feather icon-heart-on text-c-red m-r-15"></i></a>
                                        <a href="#!"><i class="feather icon-edit text-muted"></i></a>
                                        <blockquote class="blockquote m-t-15 m-b-0">
                                            <h6>Allina D’croze</h6>
                                            <p class="m-b-0 text-muted">Lorem Ipsum is simply dummy text of the industry.</p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right  m-r-20">
                                <a href="#!" class="b-b-primary text-primary">View all Customer Reviews</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Power</h5>
                                    <h2>2789<span class="text-muted m-l-5 f-14">kw</span></h2>
                                    <div id="power-card-chart1"></div>
                                    <div class="row">
                                        <div class="col col-auto">
                                            <div class="map-area">
                                                <h6 class="m-0">2876 <span> kw</span></h6>
                                                <p class="text-muted m-0">month</p>
                                            </div>
                                        </div>
                                        <div class="col col-auto">
                                            <div class="map-area">
                                                <h6 class="m-0">234 <span> kw</span></h6>
                                                <p class="text-muted m-0">Today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Temperature</h5>
                                    <h2>7.3<span class="text-muted m-l-10 f-14">deg</span></h2>
                                    <div id="power-card-chart3"></div>
                                    <div class="row">
                                        <div class="col col-auto">
                                            <div class="map-area">
                                                <h6 class="m-0">4.5 <span> deg</span></h6>
                                                <p class="text-muted m-0">month</p>
                                            </div>
                                        </div>
                                        <div class="col col-auto">
                                            <div class="map-area">
                                                <h6 class="m-0">0.5 <span> deg</span></h6>

                                                <p class="text-muted m-0">Today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Latest Customers end -->
            </div>
            <!-- [ Main Content ] end -->
@endsection
