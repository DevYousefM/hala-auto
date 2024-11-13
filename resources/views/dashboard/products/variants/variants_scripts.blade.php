<script>
    $(document).ready(function() {
        var rowIndex = {{ count($product->variants) }};

        function initializeSelect2(colorSelectId, sizeSelectId, selectedColorId = null, selectedSizeId = null,
            selectedSize = null, selectedColor = null) {
            $(colorSelectId).select2({
                minimumResultsForSearch: -1,
                placeholder: selectedColorId ? selectedColor : "Select Color",
                ajax: {
                    url: "{{ route('api.colors') }}",
                    processResults: function(data) {
                        return {
                            results: data.colors.map(function(color) {
                                return {
                                    id: color.id,
                                    text: color.name
                                };
                            })
                        };
                    }
                }
            });

            if (selectedColorId) {
                if (!$(colorSelectId).find("option[value='" + selectedColorId + "']").length) {
                    var newOption = new Option(selectedColor, selectedColorId, true, true);
                    $(colorSelectId).append(newOption).trigger('change');
                }
            }

            $(sizeSelectId).select2({
                minimumResultsForSearch: -1,
                placeholder: selectedSizeId ? selectedSize : "Select Size",
                ajax: {
                    url: "{{ route('api.sizes') }}",
                    processResults: function(data) {
                        return {
                            results: data.sizes.map(function(size) {
                                return {
                                    id: size.id,
                                    text: size.name,
                                    selected: size.id ===
                                        selectedSizeId
                                };
                            })
                        };
                    }
                }
            });
            if (selectedSizeId) {
                if (!$(sizeSelectId).find("option[value='" + selectedSizeId + "']").length) {
                    var newOption = new Option(selectedSize, selectedSizeId, true, true);
                    $(sizeSelectId).append(newOption).trigger('change');
                }
            }
        }

        @foreach ($product->variants()->with('color', 'size')->get() as $index => $variant)
            initializeSelect2(
                '#colorSelect{{ $index }}',
                '#sizeSelect{{ $index }}',
                {{ json_encode($variant->color_id) }},
                {{ json_encode($variant->size_id) }},
                "{{ json_decode($variant->size)->name }}",
                "{{ json_decode($variant->color)->name }}"
            );
        @endforeach

        function getNewRowHtml(index) {
            return `
                <tr style="width:100%">
                    <td class="px-2" style="width:25%">
                        <div class="col-12">
                            <div class="d-flex col-12">
                                <div class="col-9 pe-1">
                                    <select name="variants[${index}][color_id]"
                                        id="colorSelect${index}"
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
                    <td class="px-2" style="width:25%">
                        <div class="col-12">
                            <div class="d-flex col-12">
                                <div class="col-9 pe-1">
                                    <select name="variants[${index}][size_id]"
                                        id="sizeSelect${index}"
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
                            name="variants[${index}][price]">
                    </td>
                    <td class="px-2" style="width:15%">
                        <input type="text" class="form-control form-control-default short-input"
                            name="variants[${index}][price_after_discount]">
                    </td>
                    <td class="px-2" style="width:15%">
                        <input type="text" class="form-control form-control-default short-input"
                            name="variants[${index}][quantity]">
                    </td>
                    <td class="px-2 text-center" style="width:5%">
                        <a href="#" class="remove remove-variant"
                            onclick="remove_variant(event)">
                            <i class="uil uil-trash-alt text-danger"></i>
                        </a>
                    </td>
                </tr>`;
        }

        $('#addRow').click(function() {
            rowIndex++;
            var newRowHtml = getNewRowHtml(rowIndex);
            $('#variantTableBody').append(newRowHtml);
            initializeSelect2(`#colorSelect${rowIndex}`, `#sizeSelect${rowIndex}`);
        });



        $("#addColorBtn").click(function() {
            let color_name = $("input[name=color_name]").val();
            $.ajax({
                type: "post",
                url: "{{ route('dashboard.colors.store') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    color_name
                },
                success: function(response) {
                    $("#add-color").modal('hide');
                    $("#colorSelect" + rowIndex).append('<option value="' + response.color
                        .id + '" selected>' + response.color.name + '</option>');

                    toastr.success(response.message);
                    initializeSelect2(`#colorSelect${rowIndex}`, ``, response.color.id,
                        null, null, null, response.color.name);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });

        $("#addSizeBtn").click(function() {
            let size_name = $("input[name=size_name]").val();
            $.ajax({
                type: "post",
                url: "{{ route('dashboard.sizes.store') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    size_name
                },
                success: function(response) {
                    $("#add-size").modal('hide');
                    $("#sizeSelect" + rowIndex).append('<option value="' + response.size
                        .id + '" selected>' + response.size.name + '</option>');
                    toastr.success(response.message);
                    initializeSelect2(``, `#sizeSelect${rowIndex}`, null, response.size.id,
                        null, response.size.name);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        });

    });

    function remove_variant(e, $variant_id = null) {
        e.preventDefault();
        e.target.closest('tr').remove();

        if ($variant_id) {
            $.ajax({
                type: "POST",
                url: "{{ route('dashboard.products.delete_variant', ':id') }}".replace(':id', $variant_id),
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
    }

    function saveVariants(product_id) {

        let form = $("#variantForm");
        let url = "{{ route('dashboard.products.save_variants', ':id') }}".replace(':id', product_id);
        let formData = new FormData(form[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                console.log('Sending form data...');
            },
            success: function(response) {
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    }
</script>
