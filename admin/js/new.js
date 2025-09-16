     const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('categoryImage');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const imageInfo = document.getElementById('imageInfo');
        const removeImageBtn = document.getElementById('removeImage');
        const categoryNameInput = document.getElementById('categoryName');
        const categoryPreview = document.getElementById('categoryPreview');
        const previewCardImg = document.getElementById('previewCardImg');
        const previewCardName = document.getElementById('previewCardName');

        // File upload handlers
        uploadArea.addEventListener('click', () => fileInput.click());
        uploadArea.addEventListener('dragover', handleDragOver);
        uploadArea.addEventListener('dragleave', handleDragLeave);
        uploadArea.addEventListener('drop', handleDrop);
        fileInput.addEventListener('change', handleFileSelect);
        removeImageBtn.addEventListener('click', removeImage);
        categoryNameInput.addEventListener('input', updatePreview);

        function handleDragOver(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        }

        function handleDrop(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFile(files[0]);
            }
        }

        function handleFileSelect(e) {
            const file = e.target.files[0];
            if (file) {
                handleFile(file);
            }
        }

        function handleFile(file) {
            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file.');
                return;
            }

            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB.');
                return;
            }

            // Create file reader
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewCardImg.src = e.target.result;
                imageInfo.textContent = `${file.name} (${(file.size / 1024).toFixed(1)} KB)`;
                imagePreview.style.display = 'block';
                uploadArea.style.display = 'none';
                updatePreview();
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            fileInput.value = '';
            imagePreview.style.display = 'none';
            uploadArea.style.display = 'block';
            categoryPreview.style.display = 'none';
        }

        function updatePreview() {
            const categoryName = categoryNameInput.value.trim();
            const hasImage = previewImg.src && previewImg.src !== '';
            
            if (categoryName && hasImage) {
                previewCardName.textContent = categoryName;
                categoryPreview.style.display = 'block';
            } else {
                categoryPreview.style.display = 'none';
            }
        }

        // Form submission
        document.getElementById('categoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = document.querySelector('.btn-submit');
            const originalText = submitBtn.textContent;
            
            // Validate required fields
            if (!categoryNameInput.value.trim()) {
                alert('Please enter a category name.');
                return;
            }
            
            if (!fileInput.files[0]) {
                alert('Please select a category image.');
                return;
            }
            
            submitBtn.textContent = 'Adding Category...';
            submitBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                const successMessage = document.getElementById('successMessage');
                successMessage.classList.add('show');
                
                // Log form data
                console.log('Category Data:', {
                    name: formData.get('categoryName'),
                    description: formData.get('categoryDescription'),
                    image: formData.get('categoryImage')
                });
                
                // Reset form after success
                setTimeout(() => {
                    this.reset();
                    removeImage();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    successMessage.classList.remove('show');
                }, 2000);
                
            }, 1500);
        });

        // Smooth focus animations
        const inputs = document.querySelectorAll('input[type="text"], textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });