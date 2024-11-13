<div class="row">
    <div class="col-lg-12">
        <div class="userDatatable global-shadow border-light-0 p-30 bg-white radius-xl w-100 mb-30">
            <form id="variantForm"
                class="table-responsive">
                <table class="table mb-0 table-borderless">
                    <thead>
                        <tr class="userDatatable-header">
                            <th style="width:25%">
                                <span class="userDatatable-title">Color</span>
                            </th>
                            <th style="width:25%">
                                <span class="userDatatable-title">Size</span>
                            </th>
                            <th style="width:15%">
                                <span class="userDatatable-title">Price</span>
                            </th>
                            <th style="width:15%">
                                <span class="userDatatable-title">Price After Discount</span>
                            </th>
                            <th style="width:15%">
                                <span class="userDatatable-title">Quantity</span>
                            </th>
                            <th style="width:5%">
                                <span class="userDatatable-title">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="variantTableBody" style="width: 100%">
                        @foreach ($product->variants as $index => $variant)
                            <tr style="width:100%">
                                <td class="px-2" style="width:25%">
                                    <div class="col-12">
                                        <div class="d-flex col-12">
                                            <div class="col-9 pe-1">
                                                <select name="variants[{{ $index }}][color_id]"
                                                    id="colorSelect{{ $index }}"
                                                    class="form-control form-control-default"></select>
                                            </div>
                                            <button type="button"
                                                class="align-items-center btn btn-success btn-sm col-2 d-flex justify-content-center px-0 text-center"
                                                data-bs-toggle="modal" data-bs-target="#add-color">
                                                <i class="uil uil-plus mx-2 mx-lg-3"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2" style="width:25%">
                                    <div class="col-12">
                                        <div class="d-flex col-12">
                                            <div class="col-9 pe-1">
                                                <select name="variants[{{ $index }}][size_id]"
                                                    id="sizeSelect{{ $index }}"
                                                    class="form-control form-control-default"></select>
                                            </div>
                                            <button type="button"
                                                class="align-items-center btn btn-success btn-sm col-2 d-flex justify-content-center px-0 text-center"
                                                data-bs-toggle="modal" data-bs-target="#add-size">

                                                <i class="uil uil-plus mx-2 mx-lg-3"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2" style="width:15%">
                                    <input type="text" class="form-control form-control-default short-input"
                                        name="variants[{{ $index }}][price]" value="{{ $variant->price }}">
                                </td>
                                <td class="px-2" style="width:15%">
                                    <input type="text" class="form-control form-control-default short-input"
                                        name="variants[{{ $index }}][price_after_discount]"
                                        value="{{ $variant->price_after_discount }}">
                                </td>
                                <td class="px-2" style="width:15%">
                                    <input type="text" class="form-control form-control-default short-input"
                                        name="variants[{{ $index }}][quantity]"
                                        value="{{ $variant->quantity }}">
                                </td>
                                <td class="px-2 text-center" style="width:5%">
                                    <a href="#" class="remove remove-variant"
                                        onclick="remove_variant(event, {{ $variant->id }})">
                                        <i class="uil uil-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            <div class="d-flex justify-content-end pt-30" style="gap: 10px">
                <button id="addRow" type="button" class="btn btn-primary">Add Row</button>
                <button id="saveVariants"
                    onclick="saveVariants({{ $product->id }})" type="button"
                    class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
