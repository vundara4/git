

<?php $__env->startSection('title', 'Product List'); ?>

<?php $__env->startSection('content'); ?>

<div class="product-page">

    

    <div class="product-header">

        <div>
            <div class="product-eyebrow">
                <i class="bi bi-box-seam-fill"></i>
                CATALOG MANAGEMENT
            </div>

            <h1 class="product-title">
                Products
            </h1>

            <p class="product-subtitle">
                Manage, update and organize all products in your store.
            </p>
        </div>

        <a href="<?php echo e(url('/product')); ?>" class="add-product-btn">
            <span class="add-product-icon">
                <i class="bi bi-plus-lg"></i>
            </span>
            Add Product
        </a>

    </div>


    

    <div class="product-summary-row">

        <div class="summary-card">

            <div class="summary-icon blue">
                <i class="bi bi-box-seam-fill"></i>
            </div>

            <div>
                <div class="summary-label">
                    Total Products
                </div>

                <div class="summary-number">
                    <?php echo e($Products->count()); ?>

                </div>
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon green">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <div>
                <div class="summary-label">
                    Product Status
                </div>

                <div class="summary-status">
                    <span></span>
                    Active
                </div>
            </div>

        </div>


        <div class="summary-card summary-action">

            <div>
                <div class="summary-label">
                    Need to add something?
                </div>

                <div class="summary-help">
                    Create a new product for your store.
                </div>
            </div>

            <a href="<?php echo e(url('/product')); ?>" class="small-add-btn">
                <i class="bi bi-plus-lg"></i>
            </a>

        </div>

    </div>


    

    <div class="product-card">

        

        <div class="product-card-header">

            <div>
                <h5 class="product-card-title">
                    Product Inventory
                </h5>

                <p class="product-card-subtitle">
                    All products currently available in your catalog.
                </p>
            </div>


            

            <div class="product-search">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    id="productSearch"
                    placeholder="Search products..."
                    autocomplete="off"
                >

            </div>

        </div>


        

        <div class="table-responsive">

            <table class="premium-product-table" id="productTable">

                <thead>

                    <tr>

                        <th style="width:75px;">
                            ID
                        </th>

                        <th>
                            Product
                        </th>

                        <th style="width:180px;">
                            Category
                        </th>

                        <th style="width:130px;">
                            Price
                        </th>

                        <th style="width:150px;" class="text-center">
                            Image
                        </th>

                        <th style="width:180px;" class="text-center">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="product-table-row">

                            

                            <td>

                                <span class="product-id">
                                    #<?php echo e($Product->id); ?>

                                </span>

                            </td>


                            

                            <td>

                                <div class="product-name-wrapper">

                                    <div class="product-small-icon">
                                        <i class="bi bi-box-seam"></i>
                                    </div>

                                    <div>

                                        <div class="product-name">
                                            <?php echo e($Product->ProductName); ?>

                                        </div>

                                        <div class="product-description">
                                            Store product
                                        </div>

                                    </div>

                                </div>

                            </td>


                            

                            <td>

                                <?php if($Product->category): ?>

                                    <span class="category-badge">

                                        <i class="bi bi-tag-fill"></i>

                                        <?php echo e($Product->category->CategoryName); ?>


                                    </span>

                                <?php else: ?>

                                    <span class="category-badge empty">
                                        No Category
                                    </span>

                                <?php endif; ?>

                            </td>


                            

                            <td>

                                <div class="product-price">
                                    $<?php echo e(number_format($Product->Price, 2)); ?>

                                </div>

                            </td>


                            

                            <td class="text-center">

                                <?php if(!empty($Product->ProductImage)): ?>

                                    <div class="product-image-wrapper">

                                        <img
                                            src="<?php echo e(asset('img/product/'.$Product->ProductImage)); ?>"
                                            alt="<?php echo e($Product->ProductName); ?>"
                                            class="product-image"
                                        >

                                        <div class="image-overlay">
                                            <i class="bi bi-eye-fill"></i>
                                        </div>

                                    </div>

                                <?php else: ?>

                                    <div class="no-product-image">

                                        <i class="bi bi-image"></i>

                                        <span>
                                            No Image
                                        </span>

                                    </div>

                                <?php endif; ?>

                            </td>


                            

                            <td>

                                <div class="product-actions">

                                    <a
                                        href="<?php echo e(url('productEdit/'.$Product->id)); ?>"
                                        class="action-btn edit"
                                        title="Edit Product"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                        <span>
                                            Edit
                                        </span>

                                    </a>


                                    <a
                                        href="<?php echo e(url('productDelete/'.$Product->id)); ?>"
                                        class="action-btn delete"
                                        title="Delete Product"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                    >

                                        <i class="bi bi-trash3-fill"></i>

                                        <span>
                                            Delete
                                        </span>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="6">

                                <div class="empty-products">

                                    <div class="empty-product-icon">
                                        <i class="bi bi-box-seam"></i>
                                    </div>

                                    <h5>
                                        No Products Found
                                    </h5>

                                    <p>
                                        Your store doesn't have any products yet.
                                    </p>

                                    <a
                                        href="<?php echo e(url('/product')); ?>"
                                        class="empty-add-btn"
                                    >

                                        <i class="bi bi-plus-lg"></i>

                                        Add Your First Product

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        

        <?php if(method_exists($Products, 'links')): ?>

            <div class="product-pagination">

                <div class="pagination-info">

                    Showing

                    <strong>
                        <?php echo e($Products->firstItem() ?? 0); ?>

                    </strong>

                    to

                    <strong>
                        <?php echo e($Products->lastItem() ?? 0); ?>

                    </strong>

                    of

                    <strong>
                        <?php echo e($Products->total()); ?>

                    </strong>

                    products

                </div>


                <div>
                    <?php echo e($Products->links()); ?>

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>




<style>

/* =========================================================
   PAGE
========================================================= */

.product-page {
    padding-bottom: 40px;
    animation: productPageIn .45s ease both;
}

@keyframes productPageIn {

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

.product-header {

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 20px;

    margin-bottom: 25px;

}

.product-eyebrow {

    display: flex;
    align-items: center;

    gap: 7px;

    color: #4f46e5;

    font-size: 10px;
    font-weight: 800;

    letter-spacing: 1.5px;

    margin-bottom: 6px;

}

.product-title {

    margin: 0;

    color: #111827;

    font-size: 29px;
    font-weight: 800;

    letter-spacing: -.9px;

}

.product-subtitle {

    margin: 6px 0 0;

    color: #94a3b8;

    font-size: 13px;

}


/* =========================================================
   ADD PRODUCT BUTTON
========================================================= */

.add-product-btn {

    display: inline-flex;
    align-items: center;

    gap: 9px;

    padding: 10px 14px;

    border-radius: 11px;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    color: #fff;

    text-decoration: none;

    font-size: 11px;
    font-weight: 700;

    box-shadow:
        0 8px 20px rgba(79,70,229,.22);

    transition: all .25s ease;

}

.add-product-btn:hover {

    color: #fff;

    transform: translateY(-2px);

    box-shadow:
        0 12px 28px rgba(79,70,229,.32);

}

.add-product-icon {

    width: 25px;
    height: 25px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: rgba(255,255,255,.15);

}


/* =========================================================
   SUMMARY
========================================================= */

.product-summary-row {

    display: grid;

    grid-template-columns:
        1fr
        1fr
        1.4fr;

    gap: 15px;

    margin-bottom: 20px;

}

.summary-card {

    min-height: 92px;

    display: flex;
    align-items: center;

    gap: 13px;

    padding: 16px;

    border-radius: 16px;

    background: rgba(255,255,255,.95);

    border: 1px solid #e5e7eb;

    box-shadow:
        0 7px 20px rgba(15,23,42,.04);

    transition: all .25s ease;

}

.summary-card:hover {

    transform: translateY(-3px);

    box-shadow:
        0 12px 28px rgba(15,23,42,.07);

}

.summary-icon {

    width: 43px;
    height: 43px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    font-size: 17px;

}

.summary-icon.blue {

    background: #eef2ff;
    color: #4f46e5;

}

.summary-icon.green {

    background: #ecfdf5;
    color: #059669;

}

.summary-label {

    color: #94a3b8;

    font-size: 10px;
    font-weight: 600;

    margin-bottom: 2px;

}

.summary-number {

    color: #111827;

    font-size: 22px;
    font-weight: 800;

}

.summary-status {

    display: flex;
    align-items: center;

    gap: 6px;

    color: #059669;

    font-size: 12px;
    font-weight: 700;

}

.summary-status span {

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #10b981;

    box-shadow:
        0 0 0 4px rgba(16,185,129,.10);

}

.summary-action {

    justify-content: space-between;

}

.summary-help {

    color: #64748b;

    font-size: 10px;

}

.small-add-btn {

    width: 36px;
    height: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #eef2ff;

    color: #4f46e5;

    text-decoration: none;

    transition: all .2s ease;

}

.small-add-btn:hover {

    background: #4f46e5;

    color: #fff;

    transform: rotate(90deg);

}


/* =========================================================
   MAIN CARD
========================================================= */

.product-card {

    overflow: hidden;

    background: rgba(255,255,255,.97);

    border: 1px solid #e5e7eb;

    border-radius: 20px;

    box-shadow:
        0 10px 30px rgba(15,23,42,.05);

}


/* =========================================================
   CARD HEADER
========================================================= */

.product-card-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

    padding: 22px;

    border-bottom: 1px solid #eef2f7;

}

.product-card-title {

    margin: 0 0 4px;

    color: #111827;

    font-size: 15px;

    font-weight: 750;

}

.product-card-subtitle {

    margin: 0;

    color: #94a3b8;

    font-size: 11px;

}


/* =========================================================
   SEARCH
========================================================= */

.product-search {

    position: relative;

    width: 230px;

}

.product-search i {

    position: absolute;

    left: 12px;
    top: 50%;

    transform: translateY(-50%);

    color: #94a3b8;

    font-size: 13px;

}

.product-search input {

    width: 100%;
    height: 38px;

    padding: 0 12px 0 35px;

    border: 1px solid #e2e8f0;

    border-radius: 10px;

    background: #f8fafc;

    color: #334155;

    font-size: 11px;

    outline: none;

    transition: all .2s ease;

}

.product-search input:focus {

    background: #fff;

    border-color: #818cf8;

    box-shadow:
        0 0 0 4px rgba(99,102,241,.08);

}


/* =========================================================
   TABLE
========================================================= */

.premium-product-table {

    width: 100%;

    margin: 0;

    border-collapse: separate;

    border-spacing: 0;

}

.premium-product-table thead th {

    padding: 13px 18px;

    background: #f8fafc;

    border-bottom: 1px solid #e2e8f0;

    color: #64748b;

    font-size: 9px;

    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: .7px;

    white-space: nowrap;

}

.premium-product-table tbody td {

    padding: 15px 18px;

    border-bottom: 1px solid #f1f5f9;

    vertical-align: middle;

}

.product-table-row {

    transition:
        background .2s ease,
        transform .2s ease;

}

.product-table-row:hover {

    background: #fafbff;

}

.product-table-row:last-child td {

    border-bottom: 0;

}


/* =========================================================
   ID
========================================================= */

.product-id {

    color: #94a3b8;

    font-size: 10px;

    font-weight: 700;

}


/* =========================================================
   PRODUCT NAME
========================================================= */

.product-name-wrapper {

    display: flex;

    align-items: center;

    gap: 11px;

}

.product-small-icon {

    width: 39px;
    height: 39px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: #eef2ff;

    color: #4f46e5;

    font-size: 15px;

}

.product-name {

    max-width: 220px;

    overflow: hidden;

    color: #1e293b;

    font-size: 12px;

    font-weight: 700;

    white-space: nowrap;

    text-overflow: ellipsis;

}

.product-description {

    margin-top: 3px;

    color: #a0aec0;

    font-size: 9px;

}


/* =========================================================
   CATEGORY
========================================================= */

.category-badge {

    display: inline-flex;

    align-items: center;

    gap: 5px;

    padding: 6px 9px;

    border-radius: 20px;

    background: #eef2ff;

    color: #4f46e5;

    font-size: 9px;

    font-weight: 700;

}

.category-badge.empty {

    background: #f1f5f9;

    color: #94a3b8;

}


/* =========================================================
   PRICE
========================================================= */

.product-price {

    color: #111827;

    font-size: 13px;

    font-weight: 800;

}


/* =========================================================
   IMAGE
========================================================= */

.product-image-wrapper {

    position: relative;

    width: 60px;
    height: 60px;

    margin: auto;

    overflow: hidden;

    border-radius: 12px;

    background: #f8fafc;

    border: 1px solid #e2e8f0;

}

.product-image {

    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform .3s ease;

}

.product-image-wrapper:hover .product-image {

    transform: scale(1.08);

}

.image-overlay {

    position: absolute;

    inset: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    background: rgba(79,70,229,.65);

    color: #fff;

    opacity: 0;

    transition: opacity .25s ease;

    pointer-events: none;

}

.product-image-wrapper:hover .image-overlay {

    opacity: 1;

}


/* =========================================================
   NO IMAGE
========================================================= */

.no-product-image {

    width: 60px;
    height: 60px;

    margin: auto;

    display: flex;

    flex-direction: column;

    align-items: center;
    justify-content: center;

    gap: 3px;

    border-radius: 12px;

    background: #f8fafc;

    border: 1px dashed #cbd5e1;

    color: #94a3b8;

    font-size: 9px;

}

.no-product-image i {

    font-size: 16px;

}


/* =========================================================
   ACTIONS
========================================================= */

.product-actions {

    display: flex;

    justify-content: center;

    gap: 6px;

}

.action-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 5px;

    min-width: 65px;

    padding: 7px 9px;

    border-radius: 8px;

    text-decoration: none;

    font-size: 9px;

    font-weight: 700;

    transition: all .2s ease;

}

.action-btn.edit {

    background: #fff7ed;

    color: #ea580c;

}

.action-btn.edit:hover {

    background: #ea580c;

    color: #fff;

    transform: translateY(-2px);

}

.action-btn.delete {

    background: #fef2f2;

    color: #dc2626;

}

.action-btn.delete:hover {

    background: #dc2626;

    color: #fff;

    transform: translateY(-2px);

}


/* =========================================================
   EMPTY
========================================================= */

.empty-products {

    text-align: center;

    padding: 60px 20px;

}

.empty-product-icon {

    width: 70px;
    height: 70px;

    margin: 0 auto 15px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 20px;

    background: #eef2ff;

    color: #4f46e5;

    font-size: 28px;

}

.empty-products h5 {

    margin-bottom: 5px;

    color: #1e293b;

    font-size: 15px;

    font-weight: 750;

}

.empty-products p {

    margin-bottom: 18px;

    color: #94a3b8;

    font-size: 11px;

}

.empty-add-btn {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 9px 13px;

    border-radius: 9px;

    background: #4f46e5;

    color: #fff;

    text-decoration: none;

    font-size: 10px;

    font-weight: 700;

}

.empty-add-btn:hover {

    background: #3730a3;

    color: #fff;

}


/* =========================================================
   PAGINATION
========================================================= */

.product-pagination {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    padding: 16px 20px;

    background: #fafbfc;

    border-top: 1px solid #eef2f7;

}

.pagination-info {

    color: #94a3b8;

    font-size: 10px;

}

.pagination-info strong {

    color: #475569;

}

.product-pagination .pagination {

    margin: 0;

}

.product-pagination .page-link {

    border: 0;

    margin: 0 2px;

    border-radius: 7px;

    color: #64748b;

    font-size: 10px;

}

.product-pagination .page-item.active .page-link {

    background: #4f46e5;

    color: #fff;

}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 992px) {

    .product-summary-row {

        grid-template-columns: repeat(2, 1fr);

    }

    .summary-action {

        grid-column: span 2;

    }

    .product-card-header {

        gap: 15px;

    }

    .product-search {

        width: 210px;

    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    /* PAGE */

    .product-page {

        padding: 0 0 30px;

    }


    /* HEADER */

    .product-header {

        display: flex;

        flex-direction: column;

        align-items: stretch;

        gap: 16px;

        margin-bottom: 20px;

    }

    .product-eyebrow {

        font-size: 9px;

        letter-spacing: 1.2px;

    }

    .product-title {

        font-size: 25px;

        line-height: 1.15;

    }

    .product-subtitle {

        font-size: 11px;

        line-height: 1.6;

        max-width: 300px;

    }

    .add-product-btn {

        width: 100%;

        min-height: 44px;

        justify-content: center;

        font-size: 11px;

    }


    /* SUMMARY */

    .product-summary-row {

        display: grid;

        grid-template-columns: 1fr;

        gap: 10px;

        margin-bottom: 15px;

    }

    .summary-card {

        min-height: 78px;

        padding: 13px;

        border-radius: 14px;

    }

    .summary-icon {

        width: 39px;
        height: 39px;

        border-radius: 10px;

        font-size: 15px;

    }

    .summary-number {

        font-size: 20px;

    }

    .summary-label {

        font-size: 9px;

    }

    .summary-status {

        font-size: 11px;

    }

    .summary-help {

        font-size: 9px;

        line-height: 1.4;

    }

    .summary-action {

        grid-column: auto;

    }


    /* MAIN CARD */

    .product-card {

        border-radius: 15px;

        overflow: hidden;

    }


    /* CARD HEADER */

    .product-card-header {

        display: flex;

        flex-direction: column;

        align-items: stretch;

        gap: 13px;

        padding: 16px;

    }

    .product-card-title {

        font-size: 14px;

    }

    .product-card-subtitle {

        font-size: 10px;

        line-height: 1.5;

    }


    /* SEARCH */

    .product-search {

        width: 100%;

    }

    .product-search input {

        height: 42px;

        font-size: 11px;

        border-radius: 10px;

    }


    /* =====================================================
       MOBILE TABLE -> CARD
    ===================================================== */

    .table-responsive {

        overflow: visible !important;

    }

    .premium-product-table {

        width: 100%;

        min-width: 0 !important;

        display: block;

    }

    .premium-product-table thead {

        display: none;

    }

    .premium-product-table tbody {

        display: block;

        padding: 10px;

    }

    .premium-product-table tbody tr.product-table-row {

        display: grid;

        grid-template-columns: 1fr auto;

        gap: 0;

        margin-bottom: 10px;

        padding: 13px;

        background: #ffffff;

        border: 1px solid #e8edf3;

        border-radius: 14px;

        box-shadow:
            0 4px 14px rgba(15,23,42,.035);

    }

    .premium-product-table tbody tr.product-table-row:last-child {

        margin-bottom: 0;

    }

    .premium-product-table tbody td {

        display: block;

        padding: 0;

        border: 0;

    }


    /* ID */

    .premium-product-table tbody td:first-child {

        grid-column: 2;

        grid-row: 1;

        text-align: right;

        padding-bottom: 5px;

    }

    .product-id {

        display: inline-flex;

        padding: 4px 7px;

        border-radius: 6px;

        background: #f8fafc;

        font-size: 8px;

    }


    /* PRODUCT */

    .premium-product-table tbody td:nth-child(2) {

        grid-column: 1 / -1;

        grid-row: 2;

        padding: 7px 0 12px;

    }

    .product-name-wrapper {

        gap: 10px;

    }

    .product-small-icon {

        width: 42px;

        height: 42px;

        border-radius: 11px;

        font-size: 15px;

    }

    .product-name {

        max-width: 210px;

        font-size: 12px;

    }

    .product-description {

        font-size: 9px;

    }


    /* CATEGORY */

    .premium-product-table tbody td:nth-child(3) {

        grid-column: 1;

        grid-row: 3;

        padding-top: 8px;

    }

    .premium-product-table tbody td:nth-child(3)::before {

        content: "CATEGORY";

        display: block;

        margin-bottom: 5px;

        color: #94a3b8;

        font-size: 7px;

        font-weight: 800;

        letter-spacing: .7px;

    }

    .category-badge {

        padding: 5px 8px;

        font-size: 8px;

    }


    /* PRICE */

    .premium-product-table tbody td:nth-child(4) {

        grid-column: 2;

        grid-row: 3;

        text-align: right;

        padding-top: 8px;

    }

    .premium-product-table tbody td:nth-child(4)::before {

        content: "PRICE";

        display: block;

        margin-bottom: 5px;

        color: #94a3b8;

        font-size: 7px;

        font-weight: 800;

        letter-spacing: .7px;

    }

    .product-price {

        font-size: 12px;

    }


    /* IMAGE */

    .premium-product-table tbody td:nth-child(5) {

        grid-column: 1;

        grid-row: 4;

        margin-top: 12px;

        padding-top: 12px;

        border-top: 1px solid #f1f5f9;

        text-align: left !important;

    }

    .premium-product-table tbody td:nth-child(5)::before {

        content: "PRODUCT IMAGE";

        display: block;

        margin-bottom: 7px;

        color: #94a3b8;

        font-size: 7px;

        font-weight: 800;

        letter-spacing: .7px;

    }

    .product-image-wrapper,
    .no-product-image {

        width: 55px;

        height: 55px;

        margin: 0;

        border-radius: 10px;

    }

    .no-product-image {

        font-size: 8px;

    }

    .no-product-image i {

        font-size: 14px;

    }


    /* ACTIONS */

    .premium-product-table tbody td:nth-child(6) {

        grid-column: 2;

        grid-row: 4;

        align-self: end;

        margin-top: 12px;

        padding-top: 12px;

        border-top: 1px solid #f1f5f9;

    }

    .premium-product-table tbody td:nth-child(6)::before {

        content: "ACTIONS";

        display: block;

        margin-bottom: 7px;

        color: #94a3b8;

        font-size: 7px;

        font-weight: 800;

        letter-spacing: .7px;

        text-align: right;

    }

    .product-actions {

        display: flex;

        justify-content: flex-end;

        gap: 5px;

    }

    .action-btn {

        min-width: 34px;

        width: 34px;

        height: 34px;

        padding: 0;

        border-radius: 9px;

        font-size: 12px;

    }

    .action-btn span {

        display: none;

    }


    /* EMPTY */

    .empty-products {

        padding: 45px 15px;

    }

    .empty-product-icon {

        width: 60px;

        height: 60px;

        border-radius: 17px;

        font-size: 24px;

    }

    .empty-products h5 {

        font-size: 14px;

    }

    .empty-products p {

        font-size: 10px;

    }

    .empty-add-btn {

        font-size: 9px;

    }


    /* PAGINATION */

    .product-pagination {

        display: flex;

        flex-direction: column;

        align-items: center;

        gap: 10px;

        padding: 14px;

        text-align: center;

    }

    .pagination-info {

        font-size: 9px;

    }

    .product-pagination .pagination {

        flex-wrap: wrap;

        justify-content: center;

    }

    .product-pagination .page-link {

        min-width: 30px;

        height: 30px;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 9px;

    }

}


/* =========================================================
   SMALL PHONES
========================================================= */

@media (max-width: 400px) {

    .product-title {

        font-size: 23px;

    }

    .product-subtitle {

        font-size: 10px;

    }

    .summary-card {

        padding: 11px;

    }

    .summary-icon {

        width: 36px;

        height: 36px;

        font-size: 14px;

    }

    .summary-number {

        font-size: 18px;

    }

    .product-card-header {

        padding: 14px;

    }

    .premium-product-table tbody {

        padding: 8px;

    }

    .premium-product-table tbody tr.product-table-row {

        padding: 11px;

        border-radius: 12px;

    }

    .product-name {

        max-width: 165px;

        font-size: 11px;

    }

    .product-description {

        font-size: 8px;

    }

    .product-image-wrapper,
    .no-product-image {

        width: 50px;

        height: 50px;

    }

    .action-btn {

        width: 32px;

        height: 32px;

    }

}


/* =========================================================
   EXTRA SMALL PHONES
========================================================= */

@media (max-width: 340px) {

    .product-page {

        padding-left: 0;

        padding-right: 0;

    }

    .product-title {

        font-size: 21px;

    }

    .product-eyebrow {

        font-size: 8px;

    }

    .product-subtitle {

        font-size: 9px;

    }

    .summary-card {

        min-height: 70px;

    }

    .summary-number {

        font-size: 17px;

    }

    .product-card {

        border-radius: 12px;

    }

    .product-card-header {

        padding: 12px;

    }

    .premium-product-table tbody {

        padding: 6px;

    }

    .premium-product-table tbody tr.product-table-row {

        padding: 10px;

    }

    .product-small-icon {

        width: 38px;

        height: 38px;

    }

    .product-name {

        max-width: 135px;

        font-size: 10px;

    }

    .category-badge {

        font-size: 7px;

    }

    .product-price {

        font-size: 11px;

    }

}


/* =========================================================
   REDUCE MOTION
========================================================= */

@media (prefers-reduced-motion: reduce) {

    .product-page,
    .summary-card,
    .add-product-btn,
    .small-add-btn,
    .action-btn,
    .product-image,
    .image-overlay {

        animation: none !important;

        transition: none !important;

    }

}

</style>




<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('productSearch');

    const table =
        document.getElementById('productTable');

    if (!searchInput || !table) {
        return;
    }


    searchInput.addEventListener('input', function () {

        const search =
            this.value.toLowerCase().trim();

        const rows =
            table.querySelectorAll(
                'tbody .product-table-row'
            );


        rows.forEach(function (row) {

            const text =
                row.textContent.toLowerCase();

            row.style.display =
                text.includes(search)
                    ? ''
                    : 'none';

        });

    });

});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/productList.blade.php ENDPATH**/ ?>