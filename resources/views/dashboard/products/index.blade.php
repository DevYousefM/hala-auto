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
                                <h4 class="text-capitalize fw-500 breadcrumb-title"> {{ trans('site.product') }} </h4>
                            </div>
                        </div>
                        <div class="action-btn d-flex" style="gap: 10px">
                            <a href="{{ route('dashboard.products.create') }}" class="btn px-15 btn-primary">
                                <i class="las la-plus fs-16"></i> {{ trans('site.add') }} {{ trans('site.product') }}
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
                                <div class="project-category d-flex align-items-center ms-md-30 mt-xxl-10 mt-15">
                                    <p class="fs-14 color-gray text-capitalize mb-10 mb-md-0  me-10">Status :</p>
                                    <div class="project-tap order-project-tap global-shadow">
                                        <ul class="nav px-1" id="ap-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="ap-overview-tab" data-bs-toggle="pill"
                                                    href="#ap-overview" role="tab" aria-selected="true">All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- End: .project-category -->
                            </div><!-- End: .d-flex -->
                        </div><!-- End: .project-top-wrapper -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped " id="products_table">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title"> {{ trans('site.image') }} </span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title"> {{ trans('site.product_title') }} </span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Status</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title "> {{ trans('site.action') }} </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="productsTableBody">
                                    @include('dashboard.products.partials._products', [
                                        'products' => $products,
                                    ])
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end pt-30" id="pagination-container">
                            {{ $products->appends(['search' => request('search')])->links('dashboard.components.custom-pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modalDeleteproduct modal fade" id="modalDeleteproduct" tabindex="1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-info" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-info-body d-flex">
                        <div class="modal-info-icon warning">
                            <img src="{{ asset('dashboard/img/svg/alert-circle.svg') }}" alt="alert-circle" class="svg">
                        </div>
                        <div class="modal-info-text">
                            <h6> {{ trans('site.delete_product_confirm') }} </h6>
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
        $('#modalDeleteproduct').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var productId = button.data('product-id');

            $('#confirmDelete').off('click').on('click', function() {
                $.ajax({
                    url: "{{ route('dashboard.products.destroy', ':id') }}"
                        .replace(':id', productId),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $(`#u_${productId}`).remove();
                        $('#modalDeleteproduct').modal('hide');
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
                url: "{{ route('dashboard.products.changeStatus', ':id') }}".replace(':id', id),
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
        activateSearchInput("{{ route('dashboard.products.index') }}", 'productsTableBody', 'pagination-container');
    </script>
@endsection
