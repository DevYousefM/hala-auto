<script>
    $("#materialSelect").select2({
        minimumResultsForSearch: -1,
        placeholder: "Select Material",
        ajax: {
            url: "{{ route('api.materials') }}",
            processResults: function(data) {
                return {
                    results: data.materials.map(function(material) {
                        return {
                            id: material.id,
                            text: material.name
                        };
                    })
                };
            }
        }
    });
    $("#styleSelect").select2({
        minimumResultsForSearch: -1,
        placeholder: "Select Style",
        ajax: {
            url: "{{ route('api.styles') }}",
            processResults: function(data) {
                return {
                    results: data.styles.map(function(style) {
                        return {
                            id: style.id,
                            text: style.name
                        };
                    })
                };
            }
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        let allFiles = [];

        document.getElementById('product_images').addEventListener('change', function(event) {
            const newFiles = Array.from(event.target.files);

            allFiles = [...allFiles, ...newFiles];

            allFiles = allFiles.filter((file, index, self) =>
                index === self.findIndex((t) => (
                    t.name === file.name && t.size === file.size
                ))
            );

            updateFileList();

        });

        function updateFileList() {
            const fileList = document.getElementById('fileList');
            fileList.innerHTML = '';

            allFiles.forEach((file, index) => {
                const listItem = document.createElement('li');
                listItem.textContent = `${file.name} (${file.size} bytes) `;

                const deleteIcon = document.createElement('a');
                deleteIcon.href = '#';
                deleteIcon.classList.add('remove');
                deleteIcon.innerHTML = '<i class="uil uil-trash-alt"></i>';
                deleteIcon.onclick = function() {
                    allFiles.splice(index, 1);
                    updateFileList();
                    return false;
                };

                listItem.appendChild(deleteIcon);
                fileList.appendChild(listItem);
            });
        }

        document.getElementById('productForm').addEventListener('submit', function() {
            const dataTransfer = new DataTransfer();

            allFiles.forEach(file => dataTransfer.items.add(file));

            document.getElementById('product_images').files = dataTransfer.files;
        });
    });
</script>
