<script>
    $("#materialSelect").select2({
        minimumResultsForSearch: -1,
    });
    $("#styleSelect").select2({
        minimumResultsForSearch: -1,
    });

    $('#customFile').on('change', function() {
        var formData = new FormData();
        var files = $('#customFile')[0].files;

        for (var i = 0; i < files.length; i++) {
            formData.append('product_images[]', files[i]);
        }

        $.ajax({
            url: '{{ route('dashboard.products.uploadImage', ':id') }}'.replace(':id',
                {{ $product->id }}),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#customFile').val('');

                response.urls.forEach(function(url, index) {
                    $('#imageList').append(`
                            <li id="image-${response.ids[index]}" class="d-flex flex-column text-center "
                                                    style="justify-content: flex-start;width: fit-content;flex-direction: column">
                                <a href="${url}" class="file-name">
                                    <img src="${url}" height="100" class="m-0">
                                </a>
                                 <i data-id="${response.ids[index]}" class="uil uil-trash delete-image-btn" style="font-size: 1.2rem;cursor: pointer;margin-top: 10px;color: red"></i>
                            </li>
                        `);
                });
            },
            error: function(xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });
    $(document).on('click', '.delete-image-btn', function() {
        var imageId = $(this).data('id');

        $.ajax({
            url: '{{ route('dashboard.products.deleteImage') }}',
            type: 'POST',
            data: {
                image_id: imageId
            },
            success: function(response) {
                $('#image-' + imageId).remove();
            },
            error: function(xhr, status, error) {
                console.error('Delete failed:', error);
            }
        });
    });


</script>
