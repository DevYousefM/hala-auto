<script>
    document.addEventListener('DOMContentLoaded', function() {
        let allFiles = [];

        document.getElementById('slider_image').addEventListener('change', function(event) {
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

        document.getElementById('sliderForm').addEventListener('submit', function() {
            const dataTransfer = new DataTransfer();

            allFiles.forEach(file => dataTransfer.items.add(file));

            document.getElementById('slider_image').files = dataTransfer.files;
        });
    });
</script>
