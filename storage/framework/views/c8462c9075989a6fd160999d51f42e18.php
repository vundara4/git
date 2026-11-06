

<?php $__env->startSection('title', 'Edit Product'); ?>

<?php $__env->startSection('content'); ?>

<div class="product-edit-page">

    

    <div class="edit-header">

        <div class="edit-header-content">

            <div class="edit-eyebrow">
                <i class="bi bi-box-seam-fill"></i>
                CATALOG MANAGEMENT
            </div>

            <h1 class="edit-title">
                Edit Product
            </h1>

            <p class="edit-subtitle">
                Update product information, pricing, category and image.
            </p>

        </div>


        <a
            href="<?php echo e(url('/productList')); ?>"
            class="back-product-btn"
        >
            <i class="bi bi-arrow-left"></i>
            <span>Back to Products</span>
        </a>

    </div>


    

    <div class="edit-card">

        

        <div class="edit-card-header">

            <div class="edit-card-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>

                <h4>
                    Product Information
                </h4>

                <p>
                    Update the details of your existing product.
                </p>

            </div>

        </div>


        

        <form
            action="<?php echo e(url('productUpdate/'.$Product->id)); ?>"
            method="POST"
            enctype="multipart/form-data"
        >

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>


            

            <?php if($errors->any()): ?>

                <div class="edit-alert">

                    <div class="edit-alert-icon">
                        <i class="bi bi-exclamation-circle-fill"></i>
                    </div>

                    <div>

                        <strong>
                            Please check the following:
                        </strong>

                        <ul>

                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li>
                                    <?php echo e($error); ?>

                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>

                    </div>

                </div>

            <?php endif; ?>


            

            <?php if(session('success')): ?>

                <div class="edit-success">

                    <i class="bi bi-check-circle-fill"></i>

                    <span>
                        <?php echo e(session('success')); ?>

                    </span>

                </div>

            <?php endif; ?>


            

            <div class="edit-section">

                <div class="section-heading">

                    <div class="section-number">
                        01
                    </div>

                    <div>

                        <h5>
                            Basic Information
                        </h5>

                        <p>
                            Enter the main information about this product.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    

                    <div class="col-12">

                        <label class="edit-label">
                            Product Name
                            <span>*</span>
                        </label>

                        <div class="edit-input-wrapper">

                            <i class="bi bi-box-seam"></i>

                            <input
                                type="text"
                                name="productName"
                                value="<?php echo e(old('productName', $Product->ProductName)); ?>"
                                class="edit-input"
                                placeholder="Enter product name"
                                autocomplete="off"
                                required
                            >

                        </div>

                        <small class="edit-help">
                            Enter a clear and recognizable product name.
                        </small>

                    </div>


                    

                    <div class="col-md-6">

                        <label class="edit-label">
                            Category
                            <span>*</span>
                        </label>

                        <div class="edit-input-wrapper select-wrapper">

                            <i class="bi bi-tags-fill"></i>

                            <select
                                name="CategoryID"
                                class="edit-input edit-select"
                                required
                            >

                                <option value="">
                                    Select Category
                                </option>

                                <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option
                                        value="<?php echo e($Category->id); ?>"
                                        <?php echo e(old('CategoryID', $Product->CategoryID) == $Category->id ? 'selected' : ''); ?>

                                    >
                                        <?php echo e($Category->CategoryName); ?>

                                    </option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                            <i class="bi bi-chevron-down select-arrow"></i>

                        </div>

                        <small class="edit-help">
                            Select the category for this product.
                        </small>

                    </div>


                    

                    <div class="col-md-6">

                        <label class="edit-label">
                            Price
                            <span>*</span>
                        </label>

                        <div class="edit-input-wrapper">

                            <span class="currency-symbol">
                                $
                            </span>

                            <input
                                type="number"
                                name="price"
                                value="<?php echo e(old('price', $Product->Price)); ?>"
                                class="edit-input price-input"
                                placeholder="0.00"
                                min="0"
                                step="0.01"
                                required
                            >

                        </div>

                        <small class="edit-help">
                            Enter the selling price in USD.
                        </small>

                    </div>

                    <div class="col-md-6">
                        <label class="edit-label">Stock <span>*</span></label>
                        <div class="edit-input-wrapper">
                            <i class="bi bi-boxes"></i>
                            <input
                                type="number"
                                name="stock"
                                value="<?php echo e(old('stock', $Product->stock)); ?>"
                                class="edit-input"
                                min="0"
                                step="1"
                                required
                            >
                        </div>
                        <small class="edit-help">Enter the number of units available.</small>
                    </div>

                </div>

            </div>


            

            <div class="edit-section">

                <div class="section-heading">

                    <div class="section-number">
                        02
                    </div>

                    <div>

                        <h5>
                            Product Image
                        </h5>

                        <p>
                            Update the product image if needed.
                        </p>

                    </div>

                </div>


                

                <?php if(!empty($Product->ProductImage)): ?>

                    <div class="current-image-card">

                        <div class="current-image-header">

                            <div>

                                <div class="current-image-title">
                                    <i class="bi bi-image-fill"></i>
                                    Current Product Image
                                </div>

                                <div class="current-image-name">
                                    <?php echo e($Product->ProductImage); ?>

                                </div>

                            </div>

                            <span class="current-badge">
                                Current
                            </span>

                        </div>


                        <div class="current-image-content">

                            <div class="current-image-wrapper">

                                <img
                                    src="<?php echo e(asset('img/product/'.$Product->ProductImage)); ?>"
                                    alt="<?php echo e($Product->ProductName); ?>"
                                    class="current-product-image"
                                    id="currentProductImage"
                                >

                            </div>

                            <div class="current-image-info">

                                <h6>
                                    <?php echo e($Product->ProductName); ?>

                                </h6>

                                <p>
                                    Your current product image will remain unchanged unless you upload a new image.
                                </p>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>


                

                <label
                    class="product-upload-box"
                    id="productUploadBox"
                    for="productImageInput"
                >

                    <input
                        type="file"
                        name="productImage"
                        id="productImageInput"
                        accept="image/png,image/jpeg,image/jpg,image/webp"
                        onchange="previewProductImage(event)"
                    >

                    <div class="upload-inner">

                        <div class="upload-big-icon">
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                        </div>

                        <h6>
                            <?php echo e(!empty($Product->ProductImage) ? 'Upload New Image' : 'Upload Product Image'); ?>

                        </h6>

                        <p>
                            Click to browse or drag and drop an image here.
                        </p>

                        <span>
                            JPG, PNG, WEBP • Maximum 5MB
                        </span>

                        <div class="choose-image-btn">
                            <i class="bi bi-image"></i>
                            Choose Image
                        </div>

                    </div>

                </label>


                

                <div
                    class="new-preview-card"
                    id="newPreviewContainer"
                >

                    <div class="new-preview-header">

                        <div class="new-preview-title">

                            <i class="bi bi-eye-fill"></i>

                            New Image Preview

                        </div>

                        <button
                            type="button"
                            class="remove-image-btn"
                            onclick="removeProductPreview()"
                        >

                            <i class="bi bi-x-lg"></i>

                            Remove

                        </button>

                    </div>


                    <div class="new-preview-body">

                        <img
                            src=""
                            id="productImagePreview"
                            class="new-product-preview"
                            alt="New Product Preview"
                        >

                        <div class="preview-file-info">

                            <div class="preview-file-name" id="previewFileName">
                                New image
                            </div>

                            <div class="preview-file-size" id="previewFileSize">
                                0 KB
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            

            <div class="edit-section summary-section">

                <div class="section-heading">

                    <div class="section-number">
                        03
                    </div>

                    <div>

                        <h5>
                            Product Summary
                        </h5>

                        <p>
                            Review the information before saving your changes.
                        </p>

                    </div>

                </div>


                <div class="product-preview-summary">

                    <div class="summary-product-icon">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                    <div class="summary-product-content">

                        <div class="summary-product-name">
                            <?php echo e($Product->ProductName); ?>

                        </div>

                        <div class="summary-product-id">
                            Product ID #<?php echo e($Product->id); ?>

                        </div>

                    </div>

                    <div class="summary-product-price">

                        <small>
                            Current Price
                        </small>

                        <strong>
                            $<?php echo e(number_format($Product->Price, 2)); ?>

                        </strong>

                    </div>

                </div>

            </div>


            

            <div class="edit-actions">

                <a
                    href="<?php echo e(url('/productList')); ?>"
                    class="cancel-product-btn"
                >

                    <i class="bi bi-x-lg"></i>

                    <span>
                        Cancel
                    </span>

                </a>


                <button
                    type="submit"
                    class="update-product-btn"
                >

                    <i class="bi bi-check2-circle"></i>

                    <span>
                        Update Product
                    </span>

                </button>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>




<?php $__env->startPush('scripts'); ?>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const uploadBox =
        document.getElementById('productUploadBox');

    const input =
        document.getElementById('productImageInput');


    if (!uploadBox || !input) {
        return;
    }


    /* =====================================================
       DRAG OVER
    ====================================================== */

    uploadBox.addEventListener('dragover', function (event) {

        event.preventDefault();

        uploadBox.classList.add('dragging');

    });


    /* =====================================================
       DRAG LEAVE
    ====================================================== */

    uploadBox.addEventListener('dragleave', function () {

        uploadBox.classList.remove('dragging');

    });


    /* =====================================================
       DROP
    ====================================================== */

    uploadBox.addEventListener('drop', function (event) {

        event.preventDefault();

        uploadBox.classList.remove('dragging');

        const files =
            event.dataTransfer.files;

        if (!files.length) {
            return;
        }


        try {

            input.files = files;

            previewProductImage({
                target: input
            });

        } catch (error) {

            console.error(
                'Unable to process dropped file.',
                error
            );

        }

    });

});


/* =========================================================
   IMAGE PREVIEW
========================================================= */

function previewProductImage(event)
{

    const input =
        event.target;

    const preview =
        document.getElementById(
            'productImagePreview'
        );

    const container =
        document.getElementById(
            'newPreviewContainer'
        );

    const fileName =
        document.getElementById(
            'previewFileName'
        );

    const fileSize =
        document.getElementById(
            'previewFileSize'
        );

    const uploadBox =
        document.getElementById(
            'productUploadBox'
        );


    const file =
        input.files?.[0];


    if (!file) {

        container.style.display = 'none';

        preview.src = '';

        return;

    }


    /* =====================================================
       VALIDATE FILE TYPE
    ====================================================== */

    const allowedTypes = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp'
    ];


    if (!allowedTypes.includes(file.type)) {

        alert(
            'Please select a JPG, PNG or WEBP image.'
        );

        input.value = '';

        container.style.display = 'none';

        preview.src = '';

        return;

    }


    /* =====================================================
       VALIDATE FILE SIZE
    ====================================================== */

    const maxSize =
        5 * 1024 * 1024;


    if (file.size > maxSize) {

        alert(
            'Image size must be less than 5MB.'
        );

        input.value = '';

        container.style.display = 'none';

        preview.src = '';

        return;

    }


    /* =====================================================
       CREATE PREVIEW
    ====================================================== */

    const imageUrl =
        URL.createObjectURL(file);


    preview.src =
        imageUrl;


    fileName.textContent =
        file.name;


    fileSize.textContent =
        formatFileSize(file.size);


    container.style.display =
        'block';


    uploadBox.classList.add(
        'has-image'
    );


    /* =====================================================
       MOBILE SCROLL
    ====================================================== */

    if (window.innerWidth <= 768) {

        setTimeout(function () {

            container.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });

        }, 100);

    }

}


/* =========================================================
   REMOVE PREVIEW
========================================================= */

function removeProductPreview()
{

    const input =
        document.getElementById(
            'productImageInput'
        );

    const preview =
        document.getElementById(
            'productImagePreview'
        );

    const container =
        document.getElementById(
            'newPreviewContainer'
        );

    const uploadBox =
        document.getElementById(
            'productUploadBox'
        );


    input.value = '';

    preview.src = '';

    container.style.display = 'none';

    uploadBox.classList.remove(
        'has-image'
    );

}


/* =========================================================
   FORMAT FILE SIZE
========================================================= */

function formatFileSize(bytes)
{

    if (bytes === 0) {
        return '0 KB';
    }


    const units = [
        'Bytes',
        'KB',
        'MB'
    ];


    const index =
        Math.floor(
            Math.log(bytes) /
            Math.log(1024)
        );


    return (
        parseFloat(
            (bytes /
            Math.pow(1024, index))
            .toFixed(2)
        )
        + ' '
        + units[index]
    );

}

</script>

<?php $__env->stopPush(); ?>




<?php $__env->startPush('styles'); ?>

<style>

/* =========================================================
   PAGE
========================================================= */

.product-edit-page {

    width: 100%;

    max-width: 1100px;

    margin: 0 auto;

    padding-bottom: 40px;

    animation:
        productEditIn .45s ease both;
}


@keyframes productEditIn {

    from {

        opacity: 0;

        transform:
            translateY(12px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================================
   HEADER
========================================================= */

.edit-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;

    margin-bottom: 25px;

}


.edit-header-content {

    min-width: 0;

}


.edit-eyebrow {

    display: flex;

    align-items: center;

    gap: 7px;

    margin-bottom: 6px;

    color: #4f46e5;

    font-size: 10px;

    font-weight: 800;

    letter-spacing: 1.5px;

}


.edit-title {

    margin: 0;

    color: #111827;

    font-size: 29px;

    font-weight: 800;

    letter-spacing: -.9px;

}


.edit-subtitle {

    margin: 6px 0 0;

    color: #94a3b8;

    font-size: 13px;

}


/* =========================================================
   BACK BUTTON
========================================================= */

.back-product-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    min-height: 42px;

    padding: 0 15px;

    flex-shrink: 0;

    border: 1px solid #e2e8f0;

    border-radius: 11px;

    background: #fff;

    color: #475569;

    text-decoration: none;

    font-size: 11px;

    font-weight: 700;

    box-shadow:
        0 6px 18px rgba(15,23,42,.04);

    transition:
        all .25s ease;

}


.back-product-btn:hover {

    color: #4f46e5;

    background: #eef2ff;

    border-color: #c7d2fe;

    transform:
        translateY(-2px);

}


/* =========================================================
   MAIN CARD
========================================================= */

.edit-card {

    overflow: hidden;

    background:
        rgba(255,255,255,.97);

    border: 1px solid #e5e7eb;

    border-radius: 20px;

    box-shadow:
        0 10px 30px rgba(15,23,42,.05);

}


/* =========================================================
   CARD HEADER
========================================================= */

.edit-card-header {

    display: flex;

    align-items: center;

    gap: 14px;

    padding: 22px;

    background:
        linear-gradient(
            135deg,
            #ffffff,
            #fafbff
        );

    border-bottom:
        1px solid #eef2f7;

}


.edit-card-icon {

    width: 48px;

    height: 48px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 13px;

    background:
        linear-gradient(
            135deg,
            #eef2ff,
            #f5f3ff
        );

    color: #4f46e5;

    font-size: 19px;

}


.edit-card-header h4 {

    margin: 0;

    color: #111827;

    font-size: 16px;

    font-weight: 750;

}


.edit-card-header p {

    margin: 4px 0 0;

    color: #94a3b8;

    font-size: 11px;

}


/* =========================================================
   ALERT
========================================================= */

.edit-alert {

    display: flex;

    align-items: flex-start;

    gap: 10px;

    margin:
        20px 22px 0;

    padding: 13px;

    border:
        1px solid #fecdd3;

    border-radius: 12px;

    background: #fff1f2;

    color: #be123c;

    font-size: 11px;

    line-height: 1.5;

}


.edit-alert-icon {

    flex-shrink: 0;

    font-size: 15px;

}


.edit-alert strong {

    display: block;

    margin-bottom: 3px;

}


.edit-alert ul {

    margin: 4px 0 0;

    padding-left: 16px;

}


/* =========================================================
   SUCCESS
========================================================= */

.edit-success {

    display: flex;

    align-items: center;

    gap: 9px;

    margin:
        20px 22px 0;

    padding: 12px 14px;

    border:
        1px solid #a7f3d0;

    border-radius: 11px;

    background: #ecfdf5;

    color: #047857;

    font-size: 11px;

    font-weight: 600;

}


/* =========================================================
   SECTION
========================================================= */

.edit-section {

    padding: 25px 30px;

    border-bottom:
        1px solid #f1f5f9;

}


.section-heading {

    display: flex;

    align-items: flex-start;

    gap: 11px;

    margin-bottom: 22px;

}


.section-number {

    width: 28px;

    height: 28px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 8px;

    background: #eef2ff;

    color: #4f46e5;

    font-size: 9px;

    font-weight: 800;

}


.section-heading h5 {

    margin: 0;

    color: #1e293b;

    font-size: 14px;

    font-weight: 750;

}


.section-heading p {

    margin: 3px 0 0;

    color: #94a3b8;

    font-size: 10px;

}


/* =========================================================
   LABEL
========================================================= */

.edit-label {

    display: block;

    margin-bottom: 8px;

    color: #334155;

    font-size: 11px;

    font-weight: 700;

}


.edit-label span {

    color: #ef4444;

    margin-left: 2px;

}


/* =========================================================
   INPUT
========================================================= */

.edit-input-wrapper {

    position: relative;

    width: 100%;

}


.edit-input-wrapper > i {

    position: absolute;

    left: 14px;

    top: 50%;

    z-index: 2;

    transform:
        translateY(-50%);

    color: #94a3b8;

    pointer-events: none;

    font-size: 13px;

}


.edit-input {

    width: 100%;

    height: 48px;

    padding:
        0 14px 0 41px;

    border:
        1px solid #e2e8f0;

    border-radius: 11px;

    outline: none;

    background: #f8fafc;

    color: #1e293b;

    font-size: 12px;

    transition:
        all .2s ease;

}


.edit-input::placeholder {

    color: #a0aec0;

}


.edit-input:focus {

    background: #fff;

    border-color: #818cf8;

    box-shadow:
        0 0 0 4px
        rgba(99,102,241,.08);

}


.edit-input-wrapper:focus-within > i {

    color: #4f46e5;

}


.edit-help {

    display: block;

    margin-top: 6px;

    color: #94a3b8;

    font-size: 9px;

    line-height: 1.5;

}


/* =========================================================
   SELECT
========================================================= */

.select-wrapper {

    position: relative;

}


.select-wrapper .select-arrow {

    left: auto;

    right: 14px;

    color: #94a3b8;

}


.edit-select {

    appearance: none;

    -webkit-appearance: none;

    cursor: pointer;

    padding-right: 40px;

}


/* =========================================================
   PRICE
========================================================= */

.currency-symbol {

    position: absolute;

    left: 14px;

    top: 50%;

    z-index: 2;

    transform:
        translateY(-50%);

    color: #4f46e5;

    font-size: 13px;

    font-weight: 800;

}


.price-input {

    padding-left: 32px;

}


/* =========================================================
   CURRENT IMAGE
========================================================= */

.current-image-card {

    margin-bottom: 18px;

    padding: 15px;

    border:
        1px solid #e2e8f0;

    border-radius: 14px;

    background: #f8fafc;

}


.current-image-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

    margin-bottom: 14px;

}


.current-image-title {

    display: flex;

    align-items: center;

    gap: 6px;

    color: #475569;

    font-size: 10px;

    font-weight: 800;

}


.current-image-title i {

    color: #4f46e5;

}


.current-image-name {

    margin-top: 3px;

    color: #94a3b8;

    font-size: 8px;

}


.current-badge {

    padding: 5px 8px;

    border-radius: 20px;

    background: #ecfdf5;

    color: #059669;

    font-size: 8px;

    font-weight: 800;

}


.current-image-content {

    display: flex;

    align-items: center;

    gap: 15px;

}


.current-image-wrapper {

    width: 110px;

    height: 90px;

    flex-shrink: 0;

    overflow: hidden;

    border:
        1px solid #e2e8f0;

    border-radius: 12px;

    background: #fff;

}


.current-product-image {

    width: 100%;

    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform .3s ease;

}


.current-image-wrapper:hover
.current-product-image {

    transform:
        scale(1.06);

}


.current-image-info h6 {

    margin: 0 0 4px;

    color: #334155;

    font-size: 11px;

    font-weight: 750;

}


.current-image-info p {

    max-width: 430px;

    margin: 0;

    color: #94a3b8;

    font-size: 9px;

    line-height: 1.6;

}


/* =========================================================
   UPLOAD BOX
========================================================= */

.product-upload-box {

    position: relative;

    display: block;

    width: 100%;

    min-height: 210px;

    padding: 30px 20px;

    border:
        2px dashed #cbd5e1;

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            #f8fafc,
            #fafbff
        );

    text-align: center;

    cursor: pointer;

    transition:
        all .25s ease;

}


.product-upload-box:hover {

    background: #eef2ff;

    border-color: #818cf8;

    transform:
        translateY(-1px);

}


.product-upload-box.dragging {

    background: #eef2ff;

    border-color: #4f46e5;

    transform:
        scale(1.01);

}


.product-upload-box.has-image {

    border-color: #a5b4fc;

    background: #f8f7ff;

}


.product-upload-box input {

    display: none;

}


.upload-inner {

    min-height: 150px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-direction: column;

}


.upload-big-icon {

    width: 52px;

    height: 52px;

    margin-bottom: 10px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 14px;

    background: #eef2ff;

    color: #4f46e5;

    font-size: 22px;

}


.upload-inner h6 {

    margin: 0;

    color: #334155;

    font-size: 13px;

    font-weight: 750;

}


.upload-inner p {

    margin: 5px 0;

    color: #94a3b8;

    font-size: 10px;

}


.upload-inner > span {

    color: #a5b4fc;

    font-size: 8px;

    font-weight: 700;

}


.choose-image-btn {

    display: inline-flex;

    align-items: center;

    gap: 6px;

    margin-top: 12px;

    padding: 8px 12px;

    border-radius: 8px;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    color: #fff;

    font-size: 9px;

    font-weight: 700;

    box-shadow:
        0 6px 15px
        rgba(79,70,229,.18);

}


/* =========================================================
   NEW PREVIEW
========================================================= */

.new-preview-card {

    display: none;

    margin-top: 15px;

    padding: 14px;

    border:
        1px solid #e2e8f0;

    border-radius: 13px;

    background: #f8fafc;

}


.new-preview-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

    margin-bottom: 12px;

}


.new-preview-title {

    display: flex;

    align-items: center;

    gap: 6px;

    color: #475569;

    font-size: 10px;

    font-weight: 750;

}


.new-preview-title i {

    color: #4f46e5;

}


.remove-image-btn {

    display: inline-flex;

    align-items: center;

    gap: 5px;

    border: none;

    padding: 6px 8px;

    border-radius: 7px;

    background: #fef2f2;

    color: #dc2626;

    font-size: 8px;

    font-weight: 700;

    cursor: pointer;

    transition:
        all .2s ease;

}


.remove-image-btn:hover {

    background: #dc2626;

    color: #fff;

}


.new-preview-body {

    display: flex;

    align-items: center;

    gap: 13px;

}


.new-product-preview {

    width: 100px;

    height: 80px;

    flex-shrink: 0;

    object-fit: cover;

    border:
        1px solid #e2e8f0;

    border-radius: 10px;

    background: #fff;

}


.preview-file-name {

    max-width: 300px;

    overflow: hidden;

    color: #334155;

    font-size: 10px;

    font-weight: 700;

    white-space: nowrap;

    text-overflow: ellipsis;

}


.preview-file-size {

    margin-top: 4px;

    color: #94a3b8;

    font-size: 8px;

}


/* =========================================================
   SUMMARY
========================================================= */

.summary-section {

    background: #fafbfc;

}


.product-preview-summary {

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 14px;

    border:
        1px solid #e2e8f0;

    border-radius: 13px;

    background: #fff;

}


.summary-product-icon {

    width: 42px;

    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 11px;

    background: #eef2ff;

    color: #4f46e5;

    font-size: 16px;

}


.summary-product-content {

    min-width: 0;

    flex: 1;

}


.summary-product-name {

    max-width: 400px;

    overflow: hidden;

    color: #1e293b;

    font-size: 11px;

    font-weight: 750;

    white-space: nowrap;

    text-overflow: ellipsis;

}


.summary-product-id {

    margin-top: 3px;

    color: #94a3b8;

    font-size: 8px;

}


.summary-product-price {

    text-align: right;

}


.summary-product-price small {

    display: block;

    color: #94a3b8;

    font-size: 8px;

}


.summary-product-price strong {

    display: block;

    margin-top: 2px;

    color: #111827;

    font-size: 13px;

    font-weight: 800;

}


/* =========================================================
   ACTIONS
========================================================= */

.edit-actions {

    display: flex;

    align-items: center;

    justify-content: flex-end;

    gap: 8px;

    padding: 18px 30px;

    background: #fafbfc;

}


.cancel-product-btn,
.update-product-btn {

    min-height: 42px;

    padding: 0 16px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    border-radius: 10px;

    font-size: 10px;

    font-weight: 750;

    text-decoration: none;

    transition:
        all .25s ease;

}


.cancel-product-btn {

    background: #f1f5f9;

    color: #475569;

}


.cancel-product-btn:hover {

    background: #e2e8f0;

    color: #334155;

}


.update-product-btn {

    border: none;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    color: #fff;

    cursor: pointer;

    box-shadow:
        0 8px 20px
        rgba(79,70,229,.22);

}


.update-product-btn:hover {

    color: #fff;

    transform:
        translateY(-2px);

    box-shadow:
        0 12px 28px
        rgba(79,70,229,.32);

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 992px) {

    .product-edit-page {

        max-width: 100%;

        padding-left: 10px;

        padding-right: 10px;

    }


    .edit-header {

        gap: 15px;

    }


    .edit-section {

        padding:
            22px;

    }


    .edit-actions {

        padding:
            17px 22px;

    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .product-edit-page {

        padding:
            0 8px 30px;

    }


    /* HEADER */

    .edit-header {

        flex-direction: column;

        align-items: stretch;

        gap: 14px;

        margin-bottom: 18px;

    }


    .edit-eyebrow {

        font-size: 9px;

        letter-spacing: 1.2px;

    }


    .edit-title {

        font-size: 25px;

        line-height: 1.15;

    }


    .edit-subtitle {

        font-size: 10px;

        line-height: 1.6;

    }


    /* BACK */

    .back-product-btn {

        width: 100%;

        min-height: 43px;

        font-size: 10px;

    }


    /* CARD */

    .edit-card {

        border-radius: 16px;

    }


    .edit-card-header {

        padding: 17px;

        gap: 11px;

    }


    .edit-card-icon {

        width: 42px;

        height: 42px;

        border-radius: 11px;

        font-size: 17px;

    }


    .edit-card-header h4 {

        font-size: 13px;

    }


    .edit-card-header p {

        font-size: 9px;

    }


    /* ALERT */

    .edit-alert {

        margin:
            16px 17px 0;

        font-size: 9px;

    }


    .edit-success {

        margin:
            16px 17px 0;

        font-size: 9px;

    }


    /* SECTION */

    .edit-section {

        padding: 18px 17px;

    }


    .section-heading {

        margin-bottom: 17px;

    }


    .section-number {

        width: 25px;

        height: 25px;

        font-size: 8px;

        border-radius: 7px;

    }


    .section-heading h5 {

        font-size: 12px;

    }


    .section-heading p {

        font-size: 8px;

        line-height: 1.5;

    }


    /* INPUT */

    .edit-label {

        font-size: 10px;

    }


    .edit-input {

        height: 46px;

        font-size: 11px;

        border-radius: 10px;

    }


    .edit-input-wrapper > i {

        left: 13px;

        font-size: 12px;

    }


    .edit-help {

        font-size: 8px;

    }


    /* CURRENT IMAGE */

    .current-image-card {

        padding: 12px;

        border-radius: 11px;

    }


    .current-image-content {

        align-items: flex-start;

    }


    .current-image-wrapper {

        width: 85px;

        height: 70px;

        border-radius: 9px;

    }


    .current-image-info h6 {

        font-size: 10px;

    }


    .current-image-info p {

        font-size: 8px;

    }


    /* UPLOAD */

    .product-upload-box {

        min-height: 190px;

        padding:
            22px 12px;

        border-radius: 13px;

    }


    .upload-inner {

        min-height: 140px;

    }


    .upload-big-icon {

        width: 46px;

        height: 46px;

        border-radius: 12px;

        font-size: 20px;

    }


    .upload-inner h6 {

        font-size: 11px;

    }


    .upload-inner p {

        font-size: 8px;

        margin: 4px 0;

    }


    .upload-inner > span {

        font-size: 7px;

    }


    .choose-image-btn {

        margin-top: 10px;

        padding: 7px 10px;

        font-size: 8px;

    }


    /* PREVIEW */

    .new-preview-card {

        padding: 11px;

    }


    .new-preview-title {

        font-size: 9px;

    }


    .remove-image-btn {

        font-size: 7px;

    }


    .new-product-preview {

        width: 80px;

        height: 65px;

    }


    .preview-file-name {

        max-width: 180px;

        font-size: 9px;

    }


    .preview-file-size {

        font-size: 7px;

    }


    /* SUMMARY */

    .product-preview-summary {

        padding: 11px;

        gap: 9px;

    }


    .summary-product-icon {

        width: 37px;

        height: 37px;

        font-size: 14px;

    }


    .summary-product-name {

        max-width: 180px;

        font-size: 9px;

    }


    .summary-product-id {

        font-size: 7px;

    }


    .summary-product-price small {

        font-size: 7px;

    }


    .summary-product-price strong {

        font-size: 11px;

    }


    /* ACTIONS */

    .edit-actions {

        flex-direction: column-reverse;

        align-items: stretch;

        padding:
            15px 17px;

        gap: 8px;

    }


    .cancel-product-btn,
    .update-product-btn {

        width: 100%;

        min-height: 44px;

        font-size: 10px;

    }

}


/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 480px) {

    .product-edit-page {

        padding-left: 5px;

        padding-right: 5px;

    }


    .edit-title {

        font-size: 22px;

    }


    .edit-subtitle {

        font-size: 9px;

    }


    .edit-card {

        border-radius: 14px;

    }


    .edit-card-header {

        padding: 14px;

    }


    .edit-card-icon {

        width: 38px;

        height: 38px;

        font-size: 15px;

    }


    .edit-section {

        padding: 15px;

    }


    .current-image-content {

        gap: 10px;

    }


    .current-image-wrapper {

        width: 72px;

        height: 60px;

    }


    .current-image-info p {

        font-size: 7px;

    }


    .product-upload-box {

        min-height: 180px;

    }


    .new-product-preview {

        width: 70px;

        height: 58px;

    }


    .summary-product-name {

        max-width: 125px;

    }


    .edit-actions {

        padding:
            13px 15px;

    }

}


/* =========================================================
   EXTRA SMALL
========================================================= */

@media (max-width: 360px) {

    .edit-title {

        font-size: 20px;

    }


    .edit-eyebrow {

        font-size: 8px;

    }


    .edit-card-header h4 {

        font-size: 12px;

    }


    .edit-card-header p {

        font-size: 8px;

    }


    .edit-section {

        padding: 13px;

    }


    .section-heading h5 {

        font-size: 11px;

    }


    .edit-input {

        height: 44px;

        font-size: 10px;

    }


    .product-upload-box {

        min-height: 170px;

    }


    .upload-big-icon {

        width: 42px;

        height: 42px;

        font-size: 18px;

    }


    .summary-product-name {

        max-width: 100px;

        font-size: 8px;

    }


    .summary-product-price strong {

        font-size: 10px;

    }


    .cancel-product-btn,
    .update-product-btn {

        min-height: 42px;

        font-size: 9px;

    }

}


/* =========================================================
   REDUCE MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .product-edit-page,
    .back-product-btn,
    .product-upload-box,
    .current-product-image,
    .update-product-btn {

        animation: none !important;

        transition: none !important;

    }

}

/* Premium modern refinement */
.product-edit-page {
    --premium-ink: #14213d;
    --premium-muted: #64748b;
    --premium-primary: #5b4bff;
    --premium-accent: #a855f7;
    --premium-surface: rgba(255, 255, 255, .92);
    max-width: 1180px;
    padding: 12px;
    border-radius: 28px;
    background:
        radial-gradient(circle at 5% 5%, rgba(168, 85, 247, .18), transparent 30%),
        radial-gradient(circle at 95% 15%, rgba(59, 130, 246, .18), transparent 28%),
        linear-gradient(135deg, #f8faff 0%, #f5f3ff 100%);
}

.edit-header {
    padding: 30px 34px;
    border: 1px solid rgba(255, 255, 255, .82);
    border-radius: 22px;
    background: linear-gradient(115deg, #172554, #4338ca 58%, #7e22ce);
    box-shadow: 0 18px 40px rgba(49, 46, 129, .22);
}

.edit-eyebrow,
.edit-title,
.edit-subtitle {
    color: #fff;
}

.edit-subtitle { opacity: .78; }

.back-product-btn {
    border: 1px solid rgba(255, 255, 255, .35);
    color: #fff;
    background: rgba(255, 255, 255, .12);
    backdrop-filter: blur(10px);
}

.back-product-btn:hover {
    color: #312e81;
    background: #fff;
    transform: translateY(-2px);
}

.edit-card {
    overflow: hidden;
    border: 1px solid rgba(226, 232, 240, .9);
    border-radius: 22px;
    background: var(--premium-surface);
    box-shadow: 0 24px 54px rgba(15, 23, 42, .10);
}

.edit-card-header {
    border-bottom: 1px solid #e9eaf7;
    background: linear-gradient(90deg, #fff, #f7f5ff);
}

.edit-card-icon,
.section-number {
    background: linear-gradient(135deg, var(--premium-primary), var(--premium-accent));
    box-shadow: 0 10px 20px rgba(91, 75, 255, .22);
}

.edit-section {
    border-bottom: 1px solid #edf0f6;
}

.edit-input-wrapper {
    border-radius: 14px;
    background: #f8fafc;
    transition: .2s ease;
}

.edit-input {
    border-radius: 14px;
    color: var(--premium-ink);
    font-weight: 600;
}

.edit-input:focus {
    border-color: var(--premium-primary);
    box-shadow: 0 0 0 4px rgba(91, 75, 255, .12);
    background: #fff;
}

.select-wrapper {
    overflow: hidden;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    background: #f8fafc;
}

.select-wrapper .select-arrow {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #5b4bff;
    font-size: 12px;
    pointer-events: none;
}

.current-image-card,
.new-preview-card,
.product-preview-summary {
    border: 1px solid rgba(148, 163, 184, .18);
    background: rgba(255, 255, 255, .9);
    box-shadow: 0 14px 28px rgba(15, 23, 42, .04);
}

.product-upload-box {
    border: 2px dashed #c4b5fd;
    border-radius: 18px;
    background: linear-gradient(135deg, #fafaff, #f5f3ff);
}

.product-upload-box:hover,
.product-upload-box.dragging {
    border-color: var(--premium-primary);
    background: #fff;
    box-shadow: 0 16px 28px rgba(91, 75, 255, .12);
}

.upload-inner {
    gap: 4px;
}

.update-product-btn {
    border: 0;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--premium-primary), #7c3aed);
    box-shadow: 0 12px 22px rgba(91, 75, 255, .26);
}

.update-product-btn:hover {
    background: linear-gradient(135deg, #4338ca, #6d28d9);
    box-shadow: 0 16px 28px rgba(91, 75, 255, .32);
}

.cancel-product-btn {
    border-radius: 14px;
    color: #475569;
    background: #f1f5f9;
}

@media (max-width: 768px) {
    .product-edit-page { padding: 0; }
    .edit-header { padding: 25px 22px; border-radius: 18px; }
    .edit-card { border-radius: 18px; }
}

</style>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/productEdit.blade.php ENDPATH**/ ?>