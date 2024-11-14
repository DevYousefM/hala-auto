@extends('dashboard.layouts.main')
@section('css')
    <style>
        .dm-pagination__item:not(:last-child) {
            margin-right: 5px !important;
        }
    </style>
@endsection
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main user-member justify-content-sm-between ">
                        <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> {{ trans('site.add_slider') }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default card-md mb-4">
                        <div class="card-body pb-md-30">
                            <form action="{{ route('dashboard.sliders.store') }}" id="sliderForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="title" class="il-gray fs-14 fw-500 align-center mb-10">Slider Title</label>
                                            <input type="text" class="form-control form-control-lg" id="title"
                                                name="title" value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <div class="dm-tag-wrap">
                                                <label for="image" class="il-gray fs-14 fw-500 align-center mb-10">
                                                    Image
                                                </label>
                                                <div class="dm-tag-wrap">
                                                    <div class="dm-upload">
                                                        <div class="dm-upload-avatar">
                                                            <img class="avatrSrc"
                                                                src="{{ asset('dashboard/img/upload.png') }}"
                                                                alt="Avatar Upload">
                                                        </div>
                                                        <div class="avatar-up">
                                                            <input type="file" name="image" id="slider_image"
                                                                class="upload-avatar-input">
                                                        </div>
                                                    </div>
                                                    @error('image')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-default btn-squared " type="submit">
                                        {{ trans('site.add_slider') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('dashboard.sliders.scripts.create_scripts')
@endsection
