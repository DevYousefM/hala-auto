@extends('dashboard.layouts.main')
@section('content')
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">{{ __('site.dashboard') }}</h4>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-4 col-sm-6 mb-25">
                        <!-- Card 1  -->
                        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                            <div class="overview-content w-100">
                                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                    <div class="ap-po-details__titlebar">
                                        <h1 class="color-primary">52</h1>
                                        <p>Name 1</p>
                                    </div>
                                    <div class="ap-po-details__icon-area">
                                        <div class="svg-icon order-bg-opacity-primary color-primary">

                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ap-po-details-time">
                                    <span class="color-success">
                                        <i class="las la-arrow-up"></i>
                                        <strong class="color-success">50%</strong>
                                    </span>
                                    <small>{{ __('site.since_last_month') }}</small>
                                </div>
                            </div>

                        </div>
                        <!-- Card 1 End  -->
                    </div>
                    <div class="col-xxl-4 col-sm-6 mb-25">
                        <!-- Card 2 -->
                        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                            <div class="overview-content w-100">
                                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                    <div class="ap-po-details__titlebar">
                                        <h1 class="color-info">20</h1>
                                        <p>Name 2</p>
                                    </div>
                                    <div class="ap-po-details__icon-area">
                                        <div class="svg-icon order-bg-opacity-info color-info">

                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ap-po-details-time">
                                    <span class="color-success">
                                        <i class="las la-arrow-up"></i>
                                        <strong class="color-success">32%</strong>
                                    </span>
                                    <small>{{ __('site.since_last_month') }}</small>
                                </div>
                            </div>

                        </div>
                        <!-- Card 2 End  -->
                    </div>
                    <div class="col-xxl-4 col-sm-6 mb-25">
                        <!-- Card 3 -->
                        <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                            <div class="overview-content w-100">
                                <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                    <div class="ap-po-details__titlebar">
                                        <h1 class="color-secondary">25</h1>
                                        <p>Name 3</p>
                                    </div>
                                    <div class="ap-po-details__icon-area">
                                        <div class="svg-icon order-bg-opacity-secondary color-secondary">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ap-po-details-time">
                                    <span class="color-danger">
                                        <i class="las la-arrow-up color-success"></i>
                                        <strong class="color-success">44%</strong>
                                    </span>
                                    <small>{{ __('site.since_last_month') }}</small>
                                </div>
                            </div>

                        </div>
                        <!-- Card 3 End  -->
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            {{ __('site.asks') }}
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="numberOfApplications"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
