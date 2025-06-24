document.addEventListener('DOMContentLoaded', function () {
    // Handle referral name field visibility
    const howFoundUsSelect = document.getElementById('how_found_us');
    const referralNameField = document.querySelector('.referral-name-field');

    if (howFoundUsSelect && referralNameField) {
        howFoundUsSelect.addEventListener('change', function () {
            referralNameField.style.display = this.value === 'referral' ? 'block' : 'none';
        });

        // Show/hide field based on initial value
        referralNameField.style.display = howFoundUsSelect.value === 'referral' ? 'block' : 'none';
    }

    // Handle file uploads
    const editPhotoBtn = document.querySelector('.edit-photo-btn');
    const editCvBtn = document.querySelector('.edit-cv-btn');
    const editFormBtn = document.querySelector('.edit-form-btn');

    if (editPhotoBtn) {
        editPhotoBtn.addEventListener('click', function () {
            handleFileUpload('photo');
        });
    }

    if (editCvBtn) {
        editCvBtn.addEventListener('click', function () {
            handleFileUpload('cv');
        });
    }

    if (editFormBtn) {
        editFormBtn.addEventListener('click', function () {
            handleFileUpload('form');
        });
    }

    function handleFileUpload(type) {
        const input = document.createElement('input');
        input.type = 'file';

        if (type === 'photo') {
            input.accept = 'image/*';
        } else {
            input.accept = '.pdf,.doc,.docx';
        }

        input.onchange = function (e) {
            const file = e.target.files[0];
            if (!file) return;

            const formData = new FormData();
            formData.append('file', file);
            formData.append('type', type);

            fetch('/admin/candidates/upload', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateFileDisplay(type, data.url);
                    } else {
                        alert(data.message || 'Upload failed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Upload failed');
                });
        };

        input.click();
    }

    function updateFileDisplay(type, url) {
        const wrapper = document.querySelector(`.candidate-${type}-wrapper`);
        if (!wrapper) return;

        if (type === 'photo') {
            const img = wrapper.querySelector('img');
            if (img) {
                img.src = url;
            }
        } else {
            const link = wrapper.querySelector('.view-file-link');
            if (link) {
                link.href = url;
            }
        }
    }
});
