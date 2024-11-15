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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> {{ trans('site.slider') }} </h4>
                            </div>
                        </div>
                        <div class="action-btn d-flex" style="gap: 10px">
                            <a href="{{ route('dashboard.sliders.create') }}" class="btn px-15 btn-primary">
                                <i class="las la-plus fs-16"></i> {{ trans('site.add') }} {{ trans('site.slider') }}
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="userDatatable global-shadow border-light-0 p-30 bg-white radius-xl w-100 mb-30">
                        <div class="project-top-wrapper d-flex justify-content-between flex-wrap mb-25 mt-n10">
                            <div class="d-flex align-items-center flex-wrap justify-content-center">
                                <div class="project-search order-search  global-shadow mt-10">
                                    <form action="/" class="order-search__form">
                                        <img src="{{ asset('dashboard/img/svg/search.svg') }}" alt="search"
                                            class="svg">
                                        <input class="form-control me-sm-2 border-0 box-shadow-none" id="search-input"
                                            type="search" placeholder="Filter by keyword" aria-label="Search">
                                    </form>
                                </div><!-- End: .project-search -->

                            </div><!-- End: .d-flex -->
                        </div><!-- End: .project-top-wrapper -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped " id="sliders_table">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title"> {{ trans('site.image') }} </span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title"> {{ trans('site.slider_title') }} </span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Status</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title "> {{ trans('site.action') }} </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="slidersTableBody">
                                    @include('dashboard.sliders.partials._sliders', [
                                        'sliders' => $sliders,
                                    ])
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end pt-30" id="pagination-container">
                            {{ $sliders->appends(['search' => request('search')])->links('dashboard.components.custom-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modalDeleteSlider modal fade" id="modalDeleteSlider" tabindex="1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-info" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-info-body d-flex">
                        <div class="modal-info-icon warning">
                            <img src="{{ asset('dashboard/img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                        </div>
                        <div class="modal-info-text">
                            <h6> {{ trans('site.delete_slider_confirm') }} </h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-outlined btn-sm" data-bs-dismiss="modal">
                        {{ trans('site.cancel') }} </button>
                    <button type="button" class="btn btn-info btn-sm" data-bs-dismiss="modal" id="confirmDelete">
                        {{ trans('site.confirm') }} </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#modalDeleteSlider').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var sliderId = button.data('slider-id');

            $('#confirmDelete').off('click').on('click', function() {
                $.ajax({
                    url: "{{ route('dashboard.sliders.destroy', ':id') }}"
                        .replace(':id', sliderId),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $(`#u_${sliderId}`).remove();
                        $('#modalDeleteSlider').modal('hide');
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON.message);
                    }
                });
            });
        });

        function changeStatus(e, id) {
            console.log(e);

            $.ajax({
                url: "{{ route('dashboard.sliders.changeStatus', ':id') }}".replace(':id', id),
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    e.target.checked = !e.target.checked
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
        activateSearchInput("{{ route('dashboard.sliders.index') }}", 'slidersTableBody', 'pagination-container');
    </script>
@endsection
