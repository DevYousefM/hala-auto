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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> {{ trans('site.add_product') }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default card-md mb-4">
                        <div class="card-body pb-md-30">
                            <form action="{{ route('dashboard.products.store') }}" id="productForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                                Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name"
                                                name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="slug" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                                Slug</label>
                                            <input type="text" class="form-control form-control-lg" id="slug"
                                                name="slug" value="{{ old('slug') }}">
                                            @error('slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label for="price" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                            Material</label>
                                        <div class="d-flex">
                                            <div class="col-10 pe-1">
                                                <select name="material_id" id="materialSelect"
                                                    class="form-control form-control-lg">
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-message col-2"
                                                data-bs-toggle="modal" data-bs-target="#add-material">New</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="price" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                            Style</label>
                                        <div class="d-flex">
                                            <div class="col-10 pe-1">
                                                <select name="style_id" id="styleSelect"
                                                    class="form-control form-control-lg">
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-message col-2"
                                                data-bs-toggle="modal" data-bs-target="#add-style">New</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="description" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                            Description</label>
                                        <textarea type="text" class="form-control form-control-lg" id="description" name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <div class="dm-tag-wrap">
                                                <label for="thumbnail" class="il-gray fs-14 fw-500 align-center mb-10">
                                                    Thumbnail
                                                </label>
                                                <div class="dm-tag-wrap">
                                                    <div class="dm-upload">
                                                        <div class="dm-upload-avatar">
                                                            <img class="avatrSrc"
                                                                src="{{ asset('dashboard/img/upload.png') }}"
                                                                alt="Avatar Upload">
                                                        </div>
                                                        <div class="avatar-up">
                                                            <input type="file" name="thumbnail" id="thumbnail"
                                                                class="upload-avatar-input">
                                                        </div>
                                                    </div>
                                                    @error('thumbnail')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="product_images" class="il-gray fs-14 fw-500 align-center mb-10">
                                                Product Images
                                            </label>
                                            <div class="dm-tag-wrap">
                                                <div class="dm-upload">
                                                    <div class="dm-upload__button">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-lg btn-outline-lighten btn-upload"
                                                            onclick="document.getElementById('product_images').click()">
                                                            <img class="svg"
                                                                src="{{ asset('dashboard/img/svg/upload.svg') }}"
                                                                alt="upload">
                                                            Click to Upload
                                                        </a>
                                                        <input type="file" name="product_images[]" class="d-none"
                                                            multiple id="product_images">
                                                    </div>
                                                    <div class="dm-upload__file">
                                                        <ul id="fileList"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('product_images')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary btn-default btn-squared " type="submit">
                                            {{ trans('site.add_product') }}
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.products.partials.modals')
@endsection
@section('js')
    @include('dashboard.products.scripts.common_scripts')
    @include('dashboard.products.scripts.create_scripts')
@endsection
