@extends('dashboard.layouts.main')
@section('css')
    <style>
        .dm-pagination__item:not(:last-child) {
            margin-right: 5px !important;
        }

        .location_link_instraction li {
            font-size: 12px
        }

        .select2-selection--single,
        .select2-container--default {
            height: 100% !important;
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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> {{ trans('site.edit_product') }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default card-md mb-4">
                        <div class="card-body pb-md-30">
                            <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                                Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name"
                                                name="name" value="{{ old('name', $product->name) }}">
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
                                                name="slug" value="{{ old('slug', $product->slug) }}">
                                            @error('slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-6 col-lg-4">
                                        <label for="price" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                            Material</label>
                                        <div class="d-flex">
                                            <div class="col-10 pe-1">
                                                <select name="material_id" id="materialSelect"
                                                    class="form-control form-control-lg">
                                                    @foreach ($materials as $material)
                                                        <option value="{{ $material->id }}"
                                                            {{ $material->id == $product->material_id ? 'selected' : '' }}>
                                                            {{ $material->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-message col-2"
                                                data-bs-toggle="modal" data-bs-target="#add-material">New</button>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <label for="price" class="il-gray fs-14 fw-500 align-center mb-10">Product
                                            Style</label>
                                        <div class="d-flex">
                                            <div class="col-10 pe-1">
                                                <select name="style_id" id="styleSelect"
                                                    class="form-control form-control-lg">
                                                    @foreach ($styles as $style)
                                                        <option value="{{ $style->id }}"
                                                            {{ $style->id == $product->style_id ? 'selected' : '' }}>
                                                            {{ $style->name }}</option>
                                                    @endforeach
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
                                        <textarea type="text" class="form-control form-control-lg" id="description" name="description">{{ old('description', $product->description) }}</textarea>
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
                                                            <img class="avatrSrc" src="{{ $product->thumbnail }}"
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
                                            <div class="dm-tag-wrap">
                                                <div class="dm-upload">
                                                    <div class="dm-upload__button">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-lg btn-outline-lighten btn-upload"
                                                            onclick="document.getElementById('customFile').click()">
                                                            <img class="svg"
                                                                src="{{ asset('dashboard/img/svg/upload.svg') }}"
                                                                alt="upload">
                                                            Click to Upload
                                                        </a>
                                                        <input type="file" name="product_images[]" class="d-none"
                                                            multiple id="customFile">
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="d-flex flex-wrap mt-3" id="imageList" style="gap: 10px">
                                                @foreach ($product->product_images as $image)
                                                    <li id="image-{{ $image->id }}"
                                                        class="d-flex flex-column text-center "
                                                        style="justify-content: flex-start;width: fit-content;flex-direction: column">
                                                        <a href="{{ $image->url }}" class="file-name">
                                                            <img src="{{ $image->url }}" height="100"
                                                                class="m-0">
                                                        </a>

                                                        <i class="uil uil-trash delete-image-btn"
                                                            style="font-size: 1.2rem;cursor: pointer;margin-top: 10px;color: red"
                                                            data-id="{{ $image->id }}"></i>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary btn-default btn-squared " type="submit">
                                            {{ trans('site.edit_product') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('dashboard.products.variants.variants')
    </div>
    @include('dashboard.products.partials.modals')
@endsection
@section('js')
    @include('dashboard.products.scripts.common_scripts')
    @include('dashboard.products.scripts.edit_scripts')
    @include('dashboard.products.variants.variants_scripts')
@endsection
