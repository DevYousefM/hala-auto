<script>
    $("#name").keyup(function() {
        var name = $(this).val();
        $("#slug").val(slugify(name));
    });
    $("#addStyleBtn").click(function() {
        let style_name = $("input[name=style_name]").val();
        $.ajax({
            type: "post",
            url: "{{ route('dashboard.styles.store') }}",
            data: {
                _token: "{{ csrf_token() }}",
                style_name
            },
            success: function(response) {
                $("#add-style").modal('hide');
                $("#styleSelect").append('<option value="' + response.style.id +
                    '" selected>' +
                    response.style.name + '</option>');
                toastr.success(response.message);
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });
    $("#addMaterialBtn").click(function() {
        let material_name = $("input[name=material_name]").val();
        $.ajax({
            type: "post",
            url: "{{ route('dashboard.materials.store') }}",
            data: {
                _token: "{{ csrf_token() }}",
                material_name
            },
            success: function(response) {
                $("#add-material").modal('hide');
                $("#materialSelect").append('<option value="' + response.material.id +
                    '" selected>' +
                    response.material.name + '</option>');
                toastr.success(response.message);
            },
            error: function(xhr) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    });
</script>
