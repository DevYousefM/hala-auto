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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> {{ trans('site.add_branch') }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default card-md mb-4">
                        <div class="card-body pb-md-30">
                            <form action="{{ route('dashboard.branches.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $locale)
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="title"
                                                    class="il-gray fs-14 fw-500 align-center mb-10">{{ $locale['name'] }}
                                                    Branch Name</label>
                                                <input type="text"
                                                    class="form-control form-control-lg @error($localeCode . '.branch_name') is-invalid @enderror"
                                                    id="branch_name" name="{{ $localeCode }}[branch_name]"
                                                    value="{{ old($localeCode . '.branch_name') }}">
                                                @error($localeCode . '.branch_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $locale)
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="title"
                                                    class="il-gray fs-14 fw-500 align-center mb-10">{{ $locale['name'] }}
                                                    Branch Address</label>
                                                <input type="text"
                                                    class="form-control form-control-lg @error($localeCode . '.branch_address') is-invalid @enderror"
                                                    id="branch_address" name="{{ $localeCode }}[branch_address]"
                                                    value="{{ old($localeCode . '.branch_address') }}">
                                                @error($localeCode . '.branch_address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach

                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $locale)
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="branch_services"
                                                    class="il-gray fs-14 fw-500 align-center mb-10">{{ $locale['name'] }}
                                                    Branch Services</label>
                                                <input type="text"
                                                    class="form-control form-control-lg @error($localeCode . '.branch_services') is-invalid @enderror"
                                                    id="branch_services" name="{{ $localeCode }}[branch_services]"
                                                    value="{{ old($localeCode . '.branch_services') }}">
                                                @error($localeCode . '.branch_services')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="branch_services" class="il-gray fs-14 fw-500 align-center mb-10">
                                                Branch Phone</label>
                                            <input type="text"
                                                class="form-control form-control-lg @error('branch_phone') is-invalid @enderror"
                                                id="branch_phone" name="branch_phone" value="{{ old('branch_phone') }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <button class="btn btn-primary btn-default btn-squared " type="submit">
                                        {{ trans('site.add_branch') }}
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
