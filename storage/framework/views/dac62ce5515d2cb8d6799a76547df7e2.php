

<?php $__env->startSection('title', 'Create Product'); ?>

<?php $__env->startSection('content'); ?>

<div class="create-product-page">

    

    <div class="create-header">

        <div>
            <div class="create-eyebrow">
                <i class="bi bi-box-seam-fill"></i>
                PRODUCT MANAGEMENT
            </div>

            <h1 class="create-title">
                Create Product
            </h1>

            <p class="create-subtitle">
                Add a new product to your store catalog.
            </p>
        </div>

        <a href="<?php echo e(url('/productList')); ?>" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Products
        </a>

    </div>


    

    <div class="row g-4">

        

        <div class="col-xl-8">

            <div class="premium-form-card">

                

                <div class="form-card-header">

                    <div class="form-header-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>
                        <h5>
                            Product Information
                        </h5>

                        <p>
                            Enter the basic details for your new product.
                        </p>
                    </div>

                </div>


                

                <form
                    action="<?php echo e(url('/productStore')); ?>"
                    method="POST"
                    enctype="multipart/form-data"
                    id="productForm"
                >

                    <?php echo csrf_field(); ?>


                    

                    <div class="form-section">

                        <div class="section-title">

                            <span class="section-number">
                                01
                            </span>

                            Category

                        </div>


                        <label class="premium-label">

                            Product Category

                            <span>*</span>

                        </label>


                        <div class="input-wrapper">

                            <i class="bi bi-tags-fill input-icon"></i>

                            <select
                                name="CategoryID"
                                class="premium-input premium-select"
                                required
                            >

                                <option value="">
                                    Select a category
                                </option>

                                <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option
                                        value="<?php echo e($Category->id); ?>"
                                        <?php echo e(old('CategoryID') == $Category->id ? 'selected' : ''); ?>

                                    >
                                        <?php echo e($Category->CategoryName); ?>

                                    </option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>

                            <i class="bi bi-chevron-down select-arrow"></i>

                        </div>


                        <?php $__errorArgs = ['CategoryID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            <div class="input-error">

                                <i class="bi bi-exclamation-circle"></i>

                                <?php echo e($message); ?>


                            </div>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>


                    

                    <div class="form-section">

                        <div class="section-title">

                            <span class="section-number">
                                02
                            </span>

                            Product Details

                        </div>


                        <div class="row g-3">

                            

                            <div class="col-md-4">

                                <label class="premium-label">

                                    Product Name

                                    <span>*</span>

                                </label>


                                <div class="input-wrapper">

                                    <i class="bi bi-box-seam input-icon"></i>

                                    <input
                                        type="text"
                                        name="productName"
                                        class="premium-input"
                                        value="<?php echo e(old('productName')); ?>"
                                        placeholder="Enter product name"
                                        required
                                    >

                                </div>


                                <?php $__errorArgs = ['productName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                    <div class="input-error">

                                        <i class="bi bi-exclamation-circle"></i>

                                        <?php echo e($message); ?>


                                    </div>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>


                            

                            <div class="col-md-4">

                                <label class="premium-label">

                                    Price

                                    <span>*</span>

                                </label>


                                <div class="input-wrapper">

                                    <span class="currency-symbol">
                                        $
                                    </span>

                                    <input
                                        type="number"
                                        name="price"
                                        class="premium-input price-input"
                                        value="<?php echo e(old('price')); ?>"
                                        placeholder="0.00"
                                        min="0"
                                        step="0.01"
                                        required
                                    >

                                </div>


                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                                    <div class="input-error">

                                        <i class="bi bi-exclamation-circle"></i>

                                        <?php echo e($message); ?>


                                    </div>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            </div>

                            <div class="col-md-4">
                                <label class="premium-label">Quantity <span>*</span></label>
                                <div class="input-wrapper">
                                    <i class="bi bi-boxes input-icon"></i>
                                    <input type="number" name="stock" class="premium-input" value="<?php echo e(old('stock', 0)); ?>" placeholder="0" min="0" step="1" required>
                                </div>
                                <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="input-error"><i class="bi bi-exclamation-circle"></i><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                        </div>

                    </div>


                    

                    <div class="form-section">

                        <div class="section-title">

                            <span class="section-number">
                                03
                            </span>

                            Product Image

                            <span class="optional-text">
                                Optional
                            </span>

                        </div>


                        <label class="premium-label">
                            Upload Product Image
                        </label>


                        <div
                            class="upload-area"
                            id="uploadArea"
                        >

                            <input
                                type="file"
                                name="productImage"
                                id="productImage"
                                accept="image/*"
                                hidden
                            >


                            

                            <div
                                class="upload-content"
                                id="uploadContent"
                            >

                                <div class="upload-icon">

                                    <i class="bi bi-cloud-arrow-up-fill"></i>

                                </div>


                                <h6>
                                    Upload Product Image
                                </h6>


                                <p>
                                    Click here to select an image
                                </p>


                                <span>
                                    PNG, JPG, JPEG up to 5MB
                                </span>


                                <button
                                    type="button"
                                    class="choose-image-btn"
                                    id="chooseImageBtn"
                                >

                                    <i class="bi bi-image"></i>

                                    Choose Image

                                </button>

                            </div>


                            

                            <div
                                class="preview-content d-none"
                                id="previewContent"
                            >

                                <div class="preview-image-wrapper">

                                    <img
                                        id="proPreview"
                                        src=""
                                        alt="Product Preview"
                                    >

                                </div>


                                <div class="preview-info">

                                    <div
                                        class="preview-file-name"
                                        id="previewFileName"
                                    >
                                        Product Image
                                    </div>


                                    <div
                                        class="preview-file-size"
                                        id="previewFileSize"
                                    >
                                        Image
                                    </div>


                                    <button
                                        type="button"
                                        class="remove-image-btn"
                                        id="removeImageBtn"
                                    >

                                        <i class="bi bi-trash3"></i>

                                        Remove Image

                                    </button>

                                </div>

                            </div>

                        </div>


                        <?php $__errorArgs = ['productImage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            <div class="input-error">

                                <i class="bi bi-exclamation-circle"></i>

                                <?php echo e($message); ?>


                            </div>

                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>


                    

                    <div class="form-actions">

                        <a
                            href="<?php echo e(url('/productList')); ?>"
                            class="cancel-btn"
                        >

                            <i class="bi bi-x-lg"></i>

                            Cancel

                        </a>


                        <button
                            type="submit"
                            class="save-product-btn"
                            id="saveProductBtn"
                        >

                            <i class="bi bi-check2-circle"></i>

                            Save Product

                        </button>

                    </div>

                </form>

            </div>

        </div>


        

        <div class="col-xl-4">

            <div class="side-column">


                

                <div class="preview-card">

                    <div class="preview-card-header">

                        <div>

                            <h5>
                                Product Preview
                            </h5>

                            <p>
                                How your product image will look.
                            </p>

                        </div>


                        <div class="preview-status">
                            Draft
                        </div>

                    </div>


                    <div class="product-preview-box">

                        <div
                            class="preview-placeholder"
                            id="sidePreviewPlaceholder"
                        >

                            <i class="bi bi-box-seam"></i>

                            <span>
                                No image selected
                            </span>

                        </div>


                        <img
                            src=""
                            id="sideProductPreview"
                            class="side-product-image d-none"
                            alt="Preview"
                        >

                    </div>


                    <div class="side-preview-info">

                        <div class="preview-product-title">

                            <span id="previewProductName">
                                Product Name
                            </span>

                        </div>


                        <div class="preview-product-category">

                            <i class="bi bi-tag"></i>

                            <span id="previewCategory">
                                Category
                            </span>

                        </div>


                        <div class="preview-product-price">

                            $<span id="previewPrice">
                                0.00
                            </span>

                        </div>

                    </div>

                </div>


                

                <div class="tips-card">

                    <div class="tips-icon">

                        <i class="bi bi-lightbulb-fill"></i>

                    </div>


                    <div>

                        <h6>
                            Product Tips
                        </h6>

                        <p>
                            Use a clear, high-quality image and a simple
                            product name to make your catalog look more professional.
                        </p>

                    </div>

                </div>


                

                <div class="checklist-card">

                    <h6>

                        <i class="bi bi-shield-check"></i>

                        Before Saving

                    </h6>


                    <div
                        class="check-item"
                        id="categoryCheck"
                    >

                        <i class="bi bi-circle"></i>

                        Select a category

                    </div>


                    <div
                        class="check-item"
                        id="nameCheck"
                    >

                        <i class="bi bi-circle"></i>

                        Enter product name

                    </div>


                    <div
                        class="check-item"
                        id="priceCheck"
                    >

                        <i class="bi bi-circle"></i>

                        Set product price

                    </div>


                    <div class="check-item optional">

                        <i class="bi bi-circle"></i>

                        Add product image

                        <span>
                            Optional
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>




<style>

/* =========================================================
   PAGE
========================================================= */

.create-product-page {
    padding-bottom: 40px;
    animation: createPageIn .45s ease both;
}

@keyframes createPageIn {

    from {
        opacity: 0;
        transform: translateY(12px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* =========================================================
   HEADER
========================================================= */

.create-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 25px;
}

.create-eyebrow {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 6px;
    color: #4f46e5;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.create-title {
    margin: 0;
    color: #111827;
    font-size: 29px;
    font-weight: 800;
    letter-spacing: -.9px;
}

.create-subtitle {
    margin: 6px 0 0;
    color: #94a3b8;
    font-size: 13px;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.back-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 14px;
    border-radius: 10px;
    background: #fff;
    border: 1px solid #e2e8f0;
    color: #475569;
    text-decoration: none;
    font-size: 11px;
    font-weight: 700;
    box-shadow: 0 5px 15px rgba(15,23,42,.04);
    transition: all .25s ease;
}

.back-btn:hover {
    color: #4f46e5;
    border-color: #c7d2fe;
    background: #eef2ff;
    transform: translateX(-2px);
}


/* =========================================================
   FORM CARD
========================================================= */

.premium-form-card {
    overflow: hidden;
    background: rgba(255,255,255,.97);
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(15,23,42,.05);
}


/* =========================================================
   FORM HEADER
========================================================= */

.form-card-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 22px;
    border-bottom: 1px solid #eef2f7;
    background: linear-gradient(
        135deg,
        #ffffff,
        #fafbff
    );
}

.form-header-icon {
    width: 43px;
    height: 43px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #eef2ff;
    color: #4f46e5;
    font-size: 18px;
}

.form-card-header h5 {
    margin: 0 0 3px;
    color: #111827;
    font-size: 15px;
    font-weight: 750;
}

.form-card-header p {
    margin: 0;
    color: #94a3b8;
    font-size: 10px;
}


/* =========================================================
   FORM SECTION
========================================================= */

.form-section {
    padding: 22px;
    border-bottom: 1px solid #f1f5f9;
}

.section-title {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 17px;
    color: #334155;
    font-size: 12px;
    font-weight: 750;
}

.section-number {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 25px;
    height: 25px;
    border-radius: 8px;
    background: #eef2ff;
    color: #4f46e5;
    font-size: 9px;
    font-weight: 800;
}

.optional-text {
    margin-left: 3px;
    padding: 4px 7px;
    border-radius: 20px;
    background: #f1f5f9;
    color: #94a3b8;
    font-size: 8px;
    font-weight: 600;
}


/* =========================================================
   LABEL
========================================================= */

.premium-label {
    display: block;
    margin-bottom: 7px;
    color: #475569;
    font-size: 10px;
    font-weight: 700;
}

.premium-label span {
    color: #ef4444;
}


/* =========================================================
   INPUT
========================================================= */

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    z-index: 2;
    top: 50%;
    left: 13px;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 13px;
    pointer-events: none;
    transition: color .2s ease;
}

.premium-input {
    width: 100%;
    height: 43px;
    padding: 0 13px 0 38px;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    background: #f8fafc;
    color: #334155;
    outline: none;
    font-size: 11px;
    transition:
        border .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.premium-input::placeholder {
    color: #b0bac7;
}

.premium-input:focus {
    background: #fff;
    border-color: #818cf8;
    box-shadow: 0 0 0 4px rgba(99,102,241,.08);
}

.premium-input:focus ~ .input-icon,
.input-wrapper:focus-within .input-icon {
    color: #4f46e5;
}


/* =========================================================
   SELECT
========================================================= */

.premium-select {
    appearance: none;
    cursor: pointer;
    padding-right: 40px;
}

.select-arrow {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 11px;
    pointer-events: none;
}


/* =========================================================
   PRICE
========================================================= */

.currency-symbol {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: #4f46e5;
    font-size: 13px;
    font-weight: 800;
    z-index: 2;
}

.price-input {
    padding-left: 32px;
}


/* =========================================================
   ERROR
========================================================= */

.input-error {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 6px;
    color: #dc2626;
    font-size: 9px;
}


/* =========================================================
   UPLOAD AREA
========================================================= */

.upload-area {
    min-height: 210px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    border: 1.5px dashed #cbd5e1;
    border-radius: 15px;
    background: linear-gradient(
        135deg,
        #fafbff,
        #f8fafc
    );
    transition:
        border .25s ease,
        background .25s ease,
        transform .25s ease;
}

.upload-area:hover {
    border-color: #818cf8;
    background: #fafaff;
}

.upload-area.dragging {
    border-color: #4f46e5;
    background: #eef2ff;
    transform: scale(1.005);
}


/* =========================================================
   UPLOAD CONTENT
========================================================= */

.upload-content {
    text-align: center;
}

.upload-icon {
    width: 58px;
    height: 58px;
    margin: 0 auto 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 17px;
    background: #eef2ff;
    color: #4f46e5;
    font-size: 24px;
}

.upload-content h6 {
    margin: 0 0 5px;
    color: #334155;
    font-size: 13px;
    font-weight: 750;
}

.upload-content p {
    margin: 0 0 4px;
    color: #64748b;
    font-size: 10px;
}

.upload-content > span {
    display: block;
    margin-bottom: 13px;
    color: #a0aec0;
    font-size: 8px;
}


/* =========================================================
   CHOOSE IMAGE
========================================================= */

.choose-image-btn {
    border: 0;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    border-radius: 8px;
    background: #4f46e5;
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    cursor: pointer;
    transition: all .2s ease;
}

.choose-image-btn:hover {
    background: #3730a3;
    transform: translateY(-2px);
}


/* =========================================================
   PREVIEW CONTENT
========================================================= */

.preview-content {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 8px;
}

.preview-image-wrapper {
    width: 120px;
    height: 120px;
    flex-shrink: 0;
    overflow: hidden;
    border-radius: 15px;
    border: 1px solid #e2e8f0;
    background: #fff;
}

.preview-image-wrapper img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
}

.preview-info {
    min-width: 0;
}

.preview-file-name {
    margin-bottom: 5px;
    color: #334155;
    font-size: 12px;
    font-weight: 750;
    word-break: break-word;
}

.preview-file-size {
    margin-bottom: 12px;
    color: #94a3b8;
    font-size: 9px;
}

.remove-image-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 7px 9px;
    border: 0;
    border-radius: 8px;
    background: #fef2f2;
    color: #dc2626;
    font-size: 9px;
    font-weight: 700;
    cursor: pointer;
    transition: all .2s ease;
}

.remove-image-btn:hover {
    background: #dc2626;
    color: #fff;
}


/* =========================================================
   FORM ACTIONS
========================================================= */

.form-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 9px;
    padding: 18px 22px;
    background: #fafbfc;
}

.cancel-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 15px;
    border: 1px solid #e2e8f0;
    border-radius: 9px;
    background: #fff;
    color: #64748b;
    text-decoration: none;
    font-size: 10px;
    font-weight: 700;
    transition: all .2s ease;
}

.cancel-btn:hover {
    color: #334155;
    background: #f8fafc;
}

.save-product-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 10px 17px;
    border: 0;
    border-radius: 9px;
    background: linear-gradient(
        135deg,
        #4f46e5,
        #7c3aed
    );
    color: #fff;
    font-size: 10px;
    font-weight: 750;
    cursor: pointer;
    box-shadow: 0 7px 18px rgba(79,70,229,.22);
    transition: all .25s ease;
}

.save-product-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 11px 25px rgba(79,70,229,.30);
}


/* =========================================================
   RIGHT COLUMN
========================================================= */

.side-column {
    display: flex;
    flex-direction: column;
    gap: 15px;
}


/* =========================================================
   PREVIEW CARD
========================================================= */

.preview-card {
    overflow: hidden;
    padding: 18px;
    border-radius: 18px;
    background: rgba(255,255,255,.97);
    border: 1px solid #e5e7eb;
    box-shadow: 0 9px 25px rgba(15,23,42,.05);
}

.preview-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 10px;
    margin-bottom: 15px;
}

.preview-card-header h5 {
    margin: 0 0 3px;
    color: #111827;
    font-size: 14px;
    font-weight: 750;
}

.preview-card-header p {
    margin: 0;
    color: #94a3b8;
    font-size: 9px;
}

.preview-status {
    padding: 5px 8px;
    border-radius: 20px;
    background: #fff7ed;
    color: #ea580c;
    font-size: 8px;
    font-weight: 750;
}


/* =========================================================
   SIDE PRODUCT IMAGE
========================================================= */

.product-preview-box {
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    border-radius: 14px;
    background: linear-gradient(
        135deg,
        #f8fafc,
        #eef2ff
    );
    border: 1px solid #e2e8f0;
}

.preview-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 7px;
    color: #a5b4fc;
    font-size: 10px;
}

.preview-placeholder i {
    font-size: 42px;
}

.side-product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


/* =========================================================
   SIDE INFO
========================================================= */

.side-preview-info {
    position: relative;
    padding-top: 15px;
}

.preview-product-title {
    padding-right: 80px;
    color: #1e293b;
    font-size: 13px;
    font-weight: 750;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.preview-product-category {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 5px;
    color: #94a3b8;
    font-size: 9px;
}

.preview-product-price {
    position: absolute;
    right: 0;
    top: 15px;
    color: #4f46e5;
    font-size: 15px;
    font-weight: 800;
}


/* =========================================================
   TIPS
========================================================= */

.tips-card {
    display: flex;
    gap: 12px;
    padding: 16px;
    border-radius: 16px;
    background: linear-gradient(
        135deg,
        #eef2ff,
        #f5f3ff
    );
    border: 1px solid #e0e7ff;
}

.tips-icon {
    width: 36px;
    height: 36px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #fff;
    color: #f59e0b;
    box-shadow: 0 4px 10px rgba(15,23,42,.05);
}

.tips-card h6 {
    margin: 1px 0 5px;
    color: #334155;
    font-size: 11px;
    font-weight: 750;
}

.tips-card p {
    margin: 0;
    color: #64748b;
    font-size: 9px;
    line-height: 1.6;
}


/* =========================================================
   CHECKLIST
========================================================= */

.checklist-card {
    padding: 17px;
    border-radius: 16px;
    background: #fff;
    border: 1px solid #e5e7eb;
    box-shadow: 0 7px 20px rgba(15,23,42,.04);
}

.checklist-card h6 {
    display: flex;
    align-items: center;
    gap: 7px;
    margin: 0 0 13px;
    color: #334155;
    font-size: 11px;
    font-weight: 750;
}

.checklist-card h6 i {
    color: #4f46e5;
    font-size: 14px;
}

.check-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 7px 0;
    color: #64748b;
    font-size: 9px;
}

.check-item i {
    color: #10b981;
    font-size: 12px;
}

.check-item.optional i {
    color: #cbd5e1;
}

.check-item.optional span {
    margin-left: auto;
    color: #94a3b8;
    font-size: 8px;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1199.98px) {

    .create-product-page {
        padding: 0 4px 35px;
    }

    .create-header {
        margin-bottom: 22px;
    }

    .create-title {
        font-size: 27px;
    }

    .premium-form-card,
    .preview-card {
        border-radius: 17px;
    }

    .product-preview-box {
        height: 240px;
    }

}


/* =========================================================
   TABLET / SMALL LAPTOP
========================================================= */

@media (max-width: 991.98px) {

    .create-header {
        align-items: flex-start;
    }

    .create-title {
        font-size: 26px;
    }

    .create-subtitle {
        font-size: 12px;
    }

    .back-btn {
        flex-shrink: 0;
    }

    .side-column {
        margin-top: 0;
    }

    .product-preview-box {
        height: 300px;
    }

    .side-product-image {
        object-fit: contain;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767.98px) {

    .create-product-page {
        padding: 0 0 25px;
        width: 100%;
        overflow-x: hidden;
    }


    /* HEADER */

    .create-header {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 14px;
        margin-bottom: 18px;
    }

    .create-eyebrow {
        font-size: 9px;
        letter-spacing: 1.2px;
        margin-bottom: 5px;
    }

    .create-title {
        font-size: 23px;
        line-height: 1.25;
        letter-spacing: -.5px;
    }

    .create-subtitle {
        margin-top: 5px;
        font-size: 11px;
        line-height: 1.5;
    }


    /* BACK BUTTON */

    .back-btn {
        width: 100%;
        min-height: 42px;
        justify-content: center;
        padding: 10px 14px;
        border-radius: 10px;
        font-size: 10px;
    }


    /* FORM CARD */

    .premium-form-card {
        width: 100%;
        border-radius: 15px;
        box-shadow: 0 7px 22px rgba(15,23,42,.05);
    }


    /* FORM HEADER */

    .form-card-header {
        padding: 17px;
        gap: 11px;
    }

    .form-header-icon {
        width: 39px;
        height: 39px;
        border-radius: 10px;
        font-size: 16px;
    }

    .form-card-header h5 {
        font-size: 13px;
    }

    .form-card-header p {
        font-size: 9px;
        line-height: 1.4;
    }


    /* FORM SECTIONS */

    .form-section {
        padding: 17px;
    }

    .section-title {
        margin-bottom: 14px;
        font-size: 11px;
    }

    .section-number {
        width: 23px;
        height: 23px;
        border-radius: 7px;
        font-size: 8px;
    }


    /* LABEL */

    .premium-label {
        margin-bottom: 6px;
        font-size: 9px;
    }


    /* INPUT */

    .premium-input {
        height: 45px;
        padding-left: 37px;
        font-size: 11px;
        border-radius: 9px;
    }

    .price-input {
        padding-left: 32px;
    }

    .input-icon {
        left: 12px;
        font-size: 12px;
    }

    .currency-symbol {
        left: 12px;
        font-size: 12px;
    }


    /* NAME + PRICE */

    .form-section .row {
        --bs-gutter-x: 0;
        --bs-gutter-y: 14px;
    }

    .form-section .col-md-8,
    .form-section .col-md-4 {
        width: 100%;
    }


    /* SELECT */

    .premium-select {
        padding-right: 38px;
    }

    .select-arrow {
        right: 12px;
        font-size: 10px;
    }


    /* UPLOAD */

    .upload-area {
        min-height: 220px;
        padding: 18px 12px;
        border-radius: 13px;
    }

    .upload-icon {
        width: 52px;
        height: 52px;
        margin-bottom: 10px;
        border-radius: 15px;
        font-size: 21px;
    }

    .upload-content h6 {
        font-size: 12px;
    }

    .upload-content p {
        font-size: 9px;
    }

    .upload-content > span {
        margin-bottom: 12px;
        font-size: 7px;
    }

    .choose-image-btn {
        padding: 9px 12px;
        font-size: 9px;
        border-radius: 8px;
    }


    /* IMAGE PREVIEW */

    .preview-content {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
        padding: 5px;
    }

    .preview-image-wrapper {
        width: 100%;
        height: 190px;
        border-radius: 12px;
    }

    .preview-info {
        width: 100%;
    }

    .preview-file-name {
        font-size: 11px;
    }

    .preview-file-size {
        font-size: 8px;
        margin-bottom: 10px;
    }

    .remove-image-btn {
        width: 100%;
        justify-content: center;
        padding: 9px;
        font-size: 9px;
    }


    /* FORM BUTTONS */

    .form-actions {
        display: flex;
        flex-direction: column-reverse;
        align-items: stretch;
        gap: 8px;
        padding: 15px 17px;
    }

    .cancel-btn,
    .save-product-btn {
        width: 100%;
        min-height: 43px;
        justify-content: center;
        border-radius: 9px;
        font-size: 10px;
    }


    /* RIGHT COLUMN */

    .side-column {
        width: 100%;
        gap: 12px;
        margin-top: 0;
    }


    /* PREVIEW CARD */

    .preview-card {
        padding: 15px;
        border-radius: 15px;
    }

    .preview-card-header {
        margin-bottom: 12px;
    }

    .preview-card-header h5 {
        font-size: 13px;
    }

    .preview-card-header p {
        font-size: 8px;
    }

    .preview-status {
        padding: 4px 7px;
        font-size: 7px;
    }


    /* PRODUCT IMAGE */

    .product-preview-box {
        width: 100%;
        height: 230px;
        border-radius: 12px;
    }

    .preview-placeholder i {
        font-size: 36px;
    }

    .preview-placeholder span {
        font-size: 9px;
    }

    .side-product-image {
        object-fit: contain;
        padding: 8px;
    }


    /* PREVIEW INFO */

    .side-preview-info {
        padding-top: 13px;
    }

    .preview-product-title {
        padding-right: 90px;
        font-size: 12px;
    }

    .preview-product-category {
        font-size: 8px;
    }

    .preview-product-price {
        top: 13px;
        font-size: 14px;
    }


    /* TIPS */

    .tips-card {
        padding: 14px;
        gap: 10px;
        border-radius: 14px;
    }

    .tips-icon {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        font-size: 13px;
    }

    .tips-card h6 {
        font-size: 10px;
    }

    .tips-card p {
        font-size: 8px;
        line-height: 1.6;
    }


    /* CHECKLIST */

    .checklist-card {
        padding: 15px;
        border-radius: 14px;
    }

    .checklist-card h6 {
        font-size: 10px;
    }

    .check-item {
        padding: 6px 0;
        font-size: 8px;
    }

    .check-item i {
        font-size: 11px;
    }

}


/* =========================================================
   SMALL PHONE
========================================================= */

@media (max-width: 480px) {

    .create-product-page {
        padding-left: 0;
        padding-right: 0;
    }

    .create-header {
        gap: 12px;
        margin-bottom: 15px;
    }

    .create-title {
        font-size: 21px;
    }

    .create-subtitle {
        font-size: 10px;
    }

    .create-eyebrow {
        font-size: 8px;
        letter-spacing: 1px;
    }

    .back-btn {
        min-height: 40px;
        font-size: 9px;
    }

    .premium-form-card {
        border-radius: 13px;
    }

    .form-card-header {
        padding: 15px;
    }

    .form-header-icon {
        width: 36px;
        height: 36px;
        font-size: 15px;
    }

    .form-card-header h5 {
        font-size: 12px;
    }

    .form-card-header p {
        font-size: 8px;
    }

    .form-section {
        padding: 15px;
    }

    .section-title {
        font-size: 10px;
    }

    .premium-input {
        height: 43px;
        font-size: 10px;
    }

    .upload-area {
        min-height: 205px;
    }

    .preview-image-wrapper {
        height: 170px;
    }

    .product-preview-box {
        height: 210px;
    }

    .form-actions {
        padding: 14px 15px;
    }

    .cancel-btn,
    .save-product-btn {
        min-height: 42px;
    }

}


/* =========================================================
   VERY SMALL PHONE
========================================================= */

@media (max-width: 360px) {

    .create-title {
        font-size: 19px;
    }

    .create-subtitle {
        font-size: 9px;
    }

    .form-card-header,
    .form-section {
        padding: 13px;
    }

    .form-header-icon {
        width: 34px;
        height: 34px;
    }

    .premium-input {
        height: 42px;
    }

    .upload-area {
        min-height: 195px;
    }

    .upload-icon {
        width: 47px;
        height: 47px;
        font-size: 19px;
    }

    .upload-content h6 {
        font-size: 11px;
    }

    .product-preview-box {
        height: 190px;
    }

    .preview-product-title {
        font-size: 11px;
    }

    .preview-product-price {
        font-size: 13px;
    }

}

</style>




<script>

document.addEventListener('DOMContentLoaded', function () {

    const productName = document.querySelector(
        'input[name="productName"]'
    );

    const price = document.querySelector(
        'input[name="price"]'
    );

    const category = document.querySelector(
        'select[name="CategoryID"]'
    );

    const uploadArea = document.getElementById(
        'uploadArea'
    );

    const fileInput = document.getElementById(
        'productImage'
    );

    const chooseImageBtn = document.getElementById(
        'chooseImageBtn'
    );

    const removeImageBtn = document.getElementById(
        'removeImageBtn'
    );


    /* =====================================================
       CHOOSE IMAGE
    ====================================================== */

    if (chooseImageBtn && fileInput) {

        chooseImageBtn.addEventListener('click', function () {

            fileInput.click();

        });

    }


    /* =====================================================
       FILE INPUT
    ====================================================== */

    if (fileInput) {

        fileInput.addEventListener('change', function () {

            previewProductImage(this);

        });

    }


    /* =====================================================
       PRODUCT NAME
    ====================================================== */

    if (productName) {

        productName.addEventListener('input', function () {

            const preview =
                document.getElementById(
                    'previewProductName'
                );

            if (preview) {

                preview.textContent =
                    this.value.trim() ||
                    'Product Name';

            }


            updateChecklist();

        });

    }


    /* =====================================================
       PRICE
    ====================================================== */

    if (price) {

        price.addEventListener('input', function () {

            const preview =
                document.getElementById(
                    'previewPrice'
                );

            const value =
                parseFloat(this.value);


            if (preview) {

                preview.textContent =
                    !isNaN(value)
                        ? value.toFixed(2)
                        : '0.00';

            }


            updateChecklist();

        });

    }


    /* =====================================================
       CATEGORY
    ====================================================== */

    if (category) {

        category.addEventListener('change', function () {

            const preview =
                document.getElementById(
                    'previewCategory'
                );

            const selected =
                this.options[
                    this.selectedIndex
                ];


            if (preview) {

                preview.textContent =
                    this.value
                        ? selected.text
                        : 'Category';

            }


            updateChecklist();

        });

    }


    /* =====================================================
       REMOVE IMAGE
    ====================================================== */

    if (removeImageBtn) {

        removeImageBtn.addEventListener(
            'click',
            function () {

                removeProductImage();

            }
        );

    }


    /* =====================================================
       DRAG & DROP
    ====================================================== */

    if (uploadArea) {

        uploadArea.addEventListener(
            'dragover',
            function (event) {

                event.preventDefault();

                uploadArea.classList.add(
                    'dragging'
                );

            }
        );


        uploadArea.addEventListener(
            'dragleave',
            function () {

                uploadArea.classList.remove(
                    'dragging'
                );

            }
        );


        uploadArea.addEventListener(
            'drop',
            function (event) {

                event.preventDefault();

                uploadArea.classList.remove(
                    'dragging'
                );


                const files =
                    event.dataTransfer.files;


                if (files.length > 0) {

                    try {

                        const dataTransfer =
                            new DataTransfer();

                        dataTransfer.items.add(
                            files[0]
                        );

                        fileInput.files =
                            dataTransfer.files;

                    } catch (error) {

                        console.log(
                            'File assignment error:',
                            error
                        );

                    }


                    previewProductImage({
                        target: fileInput
                    });

                }

            }
        );

    }


    /* =====================================================
       INITIAL CHECKLIST
    ====================================================== */

    updateChecklist();

});


/* =========================================================
   IMAGE PREVIEW
========================================================= */

function previewProductImage(input) {

    const file =
        input.files?.[0];


    if (!file) {

        return;

    }


    /* VALIDATE IMAGE */

    if (!file.type.startsWith('image/')) {

        alert(
            'Please select a valid image file.'
        );

        removeProductImage();

        return;

    }


    /* MAX 5MB */

    const maxSize =
        5 * 1024 * 1024;


    if (file.size > maxSize) {

        alert(
            'Image size must be less than 5MB.'
        );

        removeProductImage();

        return;

    }


    /* CREATE IMAGE URL */

    const imageUrl =
        URL.createObjectURL(file);


    /* MAIN PREVIEW */

    const preview =
        document.getElementById(
            'proPreview'
        );


    if (preview) {

        preview.src =
            imageUrl;

    }


    /* FILE NAME */

    const fileName =
        document.getElementById(
            'previewFileName'
        );


    if (fileName) {

        fileName.textContent =
            file.name;

    }


    /* FILE SIZE */

    const fileSize =
        document.getElementById(
            'previewFileSize'
        );


    if (fileSize) {

        fileSize.textContent =
            formatFileSize(file.size);

    }


    /* HIDE UPLOAD */

    const uploadContent =
        document.getElementById(
            'uploadContent'
        );


    if (uploadContent) {

        uploadContent.classList.add(
            'd-none'
        );

    }


    /* SHOW PREVIEW */

    const previewContent =
        document.getElementById(
            'previewContent'
        );


    if (previewContent) {

        previewContent.classList.remove(
            'd-none'
        );

    }


    /* SIDE PREVIEW */

    const sidePreview =
        document.getElementById(
            'sideProductPreview'
        );


    if (sidePreview) {

        sidePreview.src =
            imageUrl;

        sidePreview.classList.remove(
            'd-none'
        );

    }


    /* HIDE PLACEHOLDER */

    const placeholder =
        document.getElementById(
            'sidePreviewPlaceholder'
        );


    if (placeholder) {

        placeholder.classList.add(
            'd-none'
        );

    }


    /* UPDATE CHECKLIST */

    updateChecklist();

}


/* =========================================================
   REMOVE IMAGE
========================================================= */

function removeProductImage() {

    const input =
        document.getElementById(
            'productImage'
        );


    if (input) {

        input.value = '';

    }


    /* SHOW UPLOAD */

    const uploadContent =
        document.getElementById(
            'uploadContent'
        );


    if (uploadContent) {

        uploadContent.classList.remove(
            'd-none'
        );

    }


    /* HIDE PREVIEW */

    const previewContent =
        document.getElementById(
            'previewContent'
        );


    if (previewContent) {

        previewContent.classList.add(
            'd-none'
        );

    }


    /* REMOVE SIDE IMAGE */

    const sidePreview =
        document.getElementById(
            'sideProductPreview'
        );


    if (sidePreview) {

        sidePreview.src = '';

        sidePreview.classList.add(
            'd-none'
        );

    }


    /* SHOW PLACEHOLDER */

    const placeholder =
        document.getElementById(
            'sidePreviewPlaceholder'
        );


    if (placeholder) {

        placeholder.classList.remove(
            'd-none'
        );

    }


    updateChecklist();

}


/* =========================================================
   FILE SIZE
========================================================= */

function formatFileSize(bytes) {

    if (bytes === 0) {

        return '0 Bytes';

    }


    const units = [
        'Bytes',
        'KB',
        'MB',
        'GB'
    ];


    const i =
        Math.floor(
            Math.log(bytes) /
            Math.log(1024)
        );


    return (
        parseFloat(
            (
                bytes /
                Math.pow(1024, i)
            ).toFixed(2)
        )
        + ' '
        + units[i]
    );

}


/* =========================================================
   CHECKLIST
========================================================= */

function updateChecklist() {

    const category =
        document.querySelector(
            'select[name="CategoryID"]'
        );

    const productName =
        document.querySelector(
            'input[name="productName"]'
        );

    const price =
        document.querySelector(
            'input[name="price"]'
        );


    updateCheckItem(
        'categoryCheck',
        category &&
        category.value
    );


    updateCheckItem(
        'nameCheck',
        productName &&
        productName.value.trim()
    );


    updateCheckItem(
        'priceCheck',
        price &&
        price.value &&
        parseFloat(price.value) >= 0
    );

}


/* =========================================================
   CHECK ITEM
========================================================= */

function updateCheckItem(id, completed) {

    const item =
        document.getElementById(id);


    if (!item) {

        return;

    }


    const icon =
        item.querySelector('i');


    if (completed) {

        item.classList.add(
            'completed'
        );

        if (icon) {

            icon.className =
                'bi bi-check-circle-fill';

        }

    } else {

        item.classList.remove(
            'completed'
        );

        if (icon) {

            icon.className =
                'bi bi-circle';

        }

    }

}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/product.blade.php ENDPATH**/ ?>