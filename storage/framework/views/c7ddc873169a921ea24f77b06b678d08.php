

<?php $__env->startSection('title', 'Category List'); ?>

<?php $__env->startSection('content'); ?>


<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


<div class="category-page">

    

    <div class="category-header">

        <div class="category-heading">

            <div class="category-eyebrow">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                CATALOG MANAGEMENT
            </div>

            <h1>
                Category List
            </h1>

            <p>
                Organize and manage your store categories.
            </p>

        </div>


        <a href="<?php echo e(route('category.create')); ?>"
           class="premium-add-btn">

            <span class="add-icon">
                <i class="bi bi-plus-lg"></i>
            </span>

            <span>
                Add Category
            </span>

        </a>

    </div>


    

    <div class="category-summary">

        

        <div class="summary-card">

            <div class="summary-icon purple">
                <i class="bi bi-tags-fill"></i>
            </div>

            <div>

                <div class="summary-label">
                    Total Categories
                </div>

                <div class="summary-number">
                    <?php echo e($categories->count()); ?>

                </div>

            </div>

        </div>


        

        <div class="summary-card">

            <div class="summary-icon blue">
                <i class="bi bi-images"></i>
            </div>

            <div>

                <div class="summary-label">
                    With Images
                </div>

                <div class="summary-number">
                    <?php echo e($categories->whereNotNull('CategoryImage')->count()); ?>

                </div>

            </div>

        </div>


        

        <div class="summary-card">

            <div class="summary-icon green">
                <i class="bi bi-check-circle-fill"></i>
            </div>

            <div>

                <div class="summary-label">
                    Active
                </div>

                <div class="summary-number">
                    <?php echo e($categories->count()); ?>

                </div>

            </div>

        </div>

    </div>


    

    <div class="category-card">

        

        <div class="category-card-header">

            <div>

                <div class="table-title">
                    All Categories
                </div>

                <div class="table-subtitle">
                    Manage your product categories and images
                </div>

            </div>


            <div class="category-count">

                <i class="bi bi-collection"></i>

                <?php echo e($categories->count()); ?> Categories

            </div>

        </div>


        

        <div class="category-table-wrapper">

            <table class="premium-category-table">

                <thead>

                    <tr>

                        <th class="id-column">
                            ID
                        </th>

                        <th>
                            Category
                        </th>

                        <th class="image-column text-center">
                            Image
                        </th>

                        <th class="actions-column text-center">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            

                            <td>

                                <span class="category-id">
                                    #<?php echo e($c->id); ?>

                                </span>

                            </td>


                            

                            <td>

                                <div class="category-name-wrapper">

                                    <div class="category-mini-icon">

                                        <i class="bi bi-tag-fill"></i>

                                    </div>


                                    <div>

                                        <div class="category-name">
                                            <?php echo e($c->CategoryName); ?>

                                        </div>


                                        <div class="category-status">

                                            <span></span>

                                            Active

                                        </div>

                                    </div>

                                </div>

                            </td>


                            

                            <td class="text-center">

                                <?php if($c->CategoryImage): ?>

                                    <div class="category-image-wrapper">

                                        <img
                                            src="<?php echo e(asset('img/product/'.$c->CategoryImage)); ?>"
                                            alt="<?php echo e($c->CategoryName); ?>"
                                            class="category-image"
                                        >


                                        <div class="image-overlay">

                                            <i class="bi bi-eye"></i>

                                        </div>

                                    </div>

                                <?php else: ?>

                                    <div class="no-image">

                                        <i class="bi bi-image"></i>

                                        <span>
                                            No Image
                                        </span>

                                    </div>

                                <?php endif; ?>

                            </td>


                            

                            <td class="text-center">

                                <div class="category-actions">

                                    

                                    <a
                                        href="<?php echo e(url('categoryEdit/'.$c->id)); ?>"
                                        class="category-action edit"
                                        title="Edit Category"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                        <span>
                                            Edit
                                        </span>

                                    </a>


                                    

                                    <a
                                        href="<?php echo e(url('categoryDelete/'.$c->id)); ?>"
                                        class="category-action delete"
                                        title="Delete Category"

                                        onclick="return confirm('Are you sure you want to delete this category?')"
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

                            <td colspan="4">

                                <div class="empty-category">

                                    <div class="empty-category-icon">

                                        <i class="bi bi-folder2-open"></i>

                                    </div>


                                    <h4>
                                        No Categories Found
                                    </h4>


                                    <p>
                                        You haven't created any product categories yet.
                                    </p>


                                    <a
                                        href="<?php echo e(route('category.create')); ?>"
                                        class="empty-add-btn"
                                    >

                                        <i class="bi bi-plus-lg"></i>

                                        Create First Category

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>




<style>

/* =========================================================
   PAGE
========================================================= */

.category-page {
    width: 100%;
    padding-bottom: 30px;
}


/* =========================================================
   HEADER
========================================================= */

.category-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;

    margin-bottom: 25px;

}

.category-heading {
    min-width: 0;
}

.category-eyebrow {

    display: flex;

    align-items: center;

    gap: 7px;

    color: #4f46e5;

    font-size: 10px;

    font-weight: 800;

    letter-spacing: 1.5px;

    margin-bottom: 7px;

}

.category-heading h1 {

    margin: 0;

    color: #111827;

    font-size: 28px;

    font-weight: 800;

    letter-spacing: -.8px;

}

.category-heading p {

    margin: 6px 0 0;

    color: #94a3b8;

    font-size: 13px;

}


/* =========================================================
   ADD BUTTON
========================================================= */

.premium-add-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 10px;

    padding: 10px 16px;

    border-radius: 12px;

    color: #fff;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    text-decoration: none;

    font-size: 12px;

    font-weight: 700;

    white-space: nowrap;

    box-shadow:
        0 8px 20px rgba(79,70,229,.22);

    transition: all .25s ease;

}

.premium-add-btn:hover {

    color: #fff;

    transform: translateY(-2px);

    box-shadow:
        0 12px 28px rgba(79,70,229,.30);

}

.add-icon {

    width: 30px;

    height: 30px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 8px;

    background:
        rgba(255,255,255,.16);

}


/* =========================================================
   SUMMARY
========================================================= */

.category-summary {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 16px;

    margin-bottom: 20px;

}

.summary-card {

    display: flex;

    align-items: center;

    gap: 13px;

    padding: 17px;

    border-radius: 16px;

    background:
        rgba(255,255,255,.96);

    border: 1px solid #e5e7eb;

    box-shadow:
        0 6px 20px rgba(15,23,42,.04);

    transition:
        transform .25s ease,
        box-shadow .25s ease;

}

.summary-card:hover {

    transform: translateY(-3px);

    box-shadow:
        0 12px 28px rgba(15,23,42,.08);

}

.summary-icon {

    width: 44px;

    height: 44px;

    min-width: 44px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 13px;

    font-size: 18px;

}

.summary-icon.purple {

    background: #f5f3ff;

    color: #7c3aed;

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

    font-size: 11px;

    font-weight: 600;

}

.summary-number {

    margin-top: 2px;

    color: #111827;

    font-size: 21px;

    font-weight: 800;

}


/* =========================================================
   MAIN CARD
========================================================= */

.category-card {

    position: relative;

    overflow: hidden;

    width: 100%;

    background:
        rgba(255,255,255,.97);

    border: 1px solid #e5e7eb;

    border-radius: 20px;

    box-shadow:
        0 10px 30px rgba(15,23,42,.055);

}

.category-card::before {

    content: "";

    position: absolute;

    top: 0;

    left: 0;

    width: 100%;

    height: 3px;

    background:
        linear-gradient(
            90deg,
            #4f46e5,
            #7c3aed,
            #a855f7
        );

}


/* =========================================================
   CARD HEADER
========================================================= */

.category-card-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    padding: 21px 23px;

    border-bottom:
        1px solid #eef2f7;

}

.table-title {

    color: #111827;

    font-size: 16px;

    font-weight: 750;

}

.table-subtitle {

    margin-top: 3px;

    color: #94a3b8;

    font-size: 11px;

}

.category-count {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 6px;

    padding: 7px 10px;

    border-radius: 9px;

    background: #f8fafc;

    color: #64748b;

    font-size: 10px;

    font-weight: 700;

    white-space: nowrap;

}


/* =========================================================
   TABLE WRAPPER
========================================================= */

.category-table-wrapper {

    width: 100%;

    overflow-x: auto;

    overflow-y: hidden;

    -webkit-overflow-scrolling: touch;

    scrollbar-width: thin;

}


/* =========================================================
   TABLE
========================================================= */

.premium-category-table {

    width: 100%;

    margin: 0;

    border-collapse: separate;

    border-spacing: 0;

}

.premium-category-table thead th {

    padding: 14px 18px;

    background: #f8fafc;

    border-bottom:
        1px solid #e5e7eb;

    color: #64748b;

    font-size: 10px;

    font-weight: 800;

    letter-spacing: .7px;

    text-transform: uppercase;

    white-space: nowrap;

}

.premium-category-table tbody td {

    padding: 15px 18px;

    border-bottom:
        1px solid #f1f5f9;

    vertical-align: middle;

    background: #fff;

}

.premium-category-table tbody tr:last-child td {

    border-bottom: 0;

}

.premium-category-table tbody tr {

    transition: background .2s ease;

}

.premium-category-table tbody tr:hover td {

    background: #fafbff;

}


/* =========================================================
   COLUMN WIDTHS
========================================================= */

.id-column {
    width: 80px;
}

.image-column {
    width: 160px;
}

.actions-column {
    width: 220px;
}


/* =========================================================
   ID
========================================================= */

.category-id {

    display: inline-flex;

    padding: 5px 8px;

    border-radius: 7px;

    background: #f8fafc;

    color: #64748b;

    font-size: 10px;

    font-weight: 700;

}


/* =========================================================
   CATEGORY NAME
========================================================= */

.category-name-wrapper {

    display: flex;

    align-items: center;

    gap: 12px;

}

.category-mini-icon {

    width: 40px;

    height: 40px;

    min-width: 40px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 11px;

    background:
        linear-gradient(
            135deg,
            #eef2ff,
            #f5f3ff
        );

    color: #4f46e5;

    font-size: 15px;

    transition:
        transform .25s ease,
        box-shadow .25s ease;

}

.premium-category-table tbody tr:hover
.category-mini-icon {

    transform:
        scale(1.07)
        rotate(-3deg);

    box-shadow:
        0 6px 15px rgba(79,70,229,.12);

}

.category-name {

    color: #1e293b;

    font-size: 13px;

    font-weight: 700;

}

.category-status {

    display: flex;

    align-items: center;

    gap: 5px;

    margin-top: 4px;

    color: #94a3b8;

    font-size: 9px;

    font-weight: 600;

}

.category-status span {

    width: 6px;

    height: 6px;

    border-radius: 50%;

    background: #10b981;

    box-shadow:
        0 0 0 3px rgba(16,185,129,.10);

}


/* =========================================================
   IMAGE
========================================================= */

.category-image-wrapper {

    position: relative;

    display: inline-flex;

    width: 70px;

    height: 55px;

    overflow: hidden;

    border-radius: 11px;

    background: #f8fafc;

    border: 1px solid #e5e7eb;

    box-shadow:
        0 4px 12px rgba(15,23,42,.06);

}

.category-image {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition:
        transform .3s ease;

}

.category-image-wrapper:hover
.category-image {

    transform: scale(1.1);

}

.image-overlay {

    position: absolute;

    inset: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    background:
        rgba(15,23,42,.45);

    color: #fff;

    opacity: 0;

    transition:
        opacity .25s ease;

}

.category-image-wrapper:hover
.image-overlay {

    opacity: 1;

}


/* =========================================================
   NO IMAGE
========================================================= */

.no-image {

    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 7px 10px;

    border-radius: 9px;

    background: #f8fafc;

    color: #94a3b8;

    font-size: 10px;

    font-weight: 600;

}


/* =========================================================
   ACTIONS
========================================================= */

.category-actions {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

}

.category-action {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 6px;

    min-width: 70px;

    padding: 8px 10px;

    border-radius: 9px;

    text-decoration: none;

    font-size: 10px;

    font-weight: 700;

    transition:
        all .22s ease;

}

.category-action.edit {

    background: #fff7ed;

    color: #ea580c;

}

.category-action.edit:hover {

    background: #ea580c;

    color: #fff;

    transform: translateY(-2px);

}

.category-action.delete {

    background: #fef2f2;

    color: #dc2626;

}

.category-action.delete:hover {

    background: #dc2626;

    color: #fff;

    transform: translateY(-2px);

}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-category {

    text-align: center;

    padding: 65px 20px;

}

.empty-category-icon {

    width: 75px;

    height: 75px;

    margin:
        0 auto 18px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 22px;

    background:
        linear-gradient(
            135deg,
            #eef2ff,
            #f5f3ff
        );

    color: #4f46e5;

    font-size: 28px;

    box-shadow:
        0 12px 30px rgba(79,70,229,.10);

}

.empty-category h4 {

    margin: 0;

    color: #1e293b;

    font-size: 16px;

    font-weight: 750;

}

.empty-category p {

    margin: 7px 0 18px;

    color: #94a3b8;

    font-size: 12px;

    line-height: 1.5;

}

.empty-add-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    padding: 10px 15px;

    border-radius: 10px;

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
        0 8px 20px rgba(79,70,229,.20);

    transition:
        all .25s ease;

}

.empty-add-btn:hover {

    color: #fff;

    transform: translateY(-2px);

}


/* =========================================================
   TABLET
   768px
========================================================= */

@media (max-width: 768px) {

    .category-page {
        min-width: 0;
    }


    /* Header */

    .category-header {

        flex-direction: column;

        align-items: stretch;

        gap: 15px;

        margin-bottom: 18px;

    }

    .category-eyebrow {

        font-size: 9px;

        letter-spacing: 1.2px;

    }

    .category-heading h1 {

        font-size: 24px;

        letter-spacing: -.5px;

    }

    .category-heading p {

        font-size: 11px;

        line-height: 1.5;

    }


    /* Add */

    .premium-add-btn {

        width: 100%;

        padding: 11px 15px;

    }


    /* Summary */

    .category-summary {

        grid-template-columns: 1fr;

        gap: 10px;

        margin-bottom: 15px;

    }

    .summary-card {

        width: 100%;

        padding: 14px;

        border-radius: 14px;

    }

    .summary-icon {

        width: 40px;

        height: 40px;

        min-width: 40px;

        border-radius: 11px;

        font-size: 16px;

    }

    .summary-label {

        font-size: 10px;

    }

    .summary-number {

        font-size: 19px;

    }


    /* Card */

    .category-card {

        border-radius: 15px;

    }


    /* Card Header */

    .category-card-header {

        flex-direction: column;

        align-items: stretch;

        gap: 12px;

        padding: 16px;

    }

    .table-title {

        font-size: 15px;

    }

    .table-subtitle {

        font-size: 10px;

        line-height: 1.5;

    }

    .category-count {

        width: 100%;

        padding: 8px;

    }


    /* Table */

    .category-table-wrapper {

        width: 100%;

        overflow-x: auto;

        overflow-y: hidden;

        -webkit-overflow-scrolling: touch;

        scrollbar-width: thin;

    }

    .premium-category-table {

        min-width: 720px;

        width: 720px;

    }

    .premium-category-table thead th {

        padding: 12px 14px;

        font-size: 9px;

    }

    .premium-category-table tbody td {

        padding: 13px 14px;

    }


    /* Category */

    .category-name-wrapper {

        gap: 9px;

    }

    .category-mini-icon {

        width: 36px;

        height: 36px;

        min-width: 36px;

        border-radius: 10px;

        font-size: 13px;

    }

    .category-name {

        font-size: 12px;

    }

    .category-status {

        font-size: 8px;

    }


    /* Image */

    .category-image-wrapper {

        width: 65px;

        height: 50px;

    }

    .no-image {

        font-size: 9px;

        padding: 6px 8px;

    }


    /* Actions */

    .category-actions {

        gap: 6px;

    }

    .category-action {

        min-width: 65px;

        padding: 7px 9px;

        font-size: 9px;

    }


    /* Empty */

    .empty-category {

        padding: 45px 15px;

    }

}


/* =========================================================
   MOBILE
   480px
========================================================= */

@media (max-width: 480px) {

    /* Header */

    .category-eyebrow {

        font-size: 8px;

        letter-spacing: 1px;

        gap: 5px;

    }

    .category-heading h1 {

        font-size: 21px;

    }

    .category-heading p {

        font-size: 10px;

        margin-top: 5px;

    }


    /* Add Button */

    .premium-add-btn {

        font-size: 11px;

        padding: 10px 13px;

        border-radius: 10px;

    }

    .add-icon {

        width: 27px;

        height: 27px;

        border-radius: 7px;

    }


    /* Summary */

    .category-summary {

        gap: 8px;

    }

    .summary-card {

        padding: 12px;

        gap: 10px;

        border-radius: 12px;

    }

    .summary-icon {

        width: 37px;

        height: 37px;

        min-width: 37px;

        border-radius: 10px;

        font-size: 14px;

    }

    .summary-label {

        font-size: 9px;

    }

    .summary-number {

        font-size: 17px;

    }


    /* Card */

    .category-card {

        border-radius: 13px;

    }


    /* Card Header */

    .category-card-header {

        padding: 14px;

        gap: 10px;

    }

    .table-title {

        font-size: 14px;

    }

    .table-subtitle {

        font-size: 9px;

    }

    .category-count {

        font-size: 9px;

        padding: 7px;

    }


    /* Table */

    .premium-category-table {

        min-width: 680px;

        width: 680px;

    }

    .premium-category-table thead th {

        padding: 11px 12px;

        font-size: 8px;

    }

    .premium-category-table tbody td {

        padding: 12px;

    }


    /* Category */

    .category-mini-icon {

        width: 34px;

        height: 34px;

        min-width: 34px;

        font-size: 12px;

    }

    .category-name {

        font-size: 11px;

    }

    .category-status {

        font-size: 7px;

    }


    /* Image */

    .category-image-wrapper {

        width: 60px;

        height: 46px;

    }


    /* Actions */

    .category-action {

        min-width: 60px;

        padding: 7px 8px;

        font-size: 8px;

    }


    /* Empty */

    .empty-category {

        padding: 40px 12px;

    }

    .empty-category-icon {

        width: 58px;

        height: 58px;

        font-size: 22px;

    }

    .empty-category h4 {

        font-size: 14px;

    }

    .empty-category p {

        font-size: 10px;

    }

    .empty-add-btn {

        font-size: 9px;

        padding: 9px 12px;

    }

}


/* =========================================================
   VERY SMALL MOBILE
   360px
========================================================= */

@media (max-width: 360px) {

    .category-heading h1 {

        font-size: 19px;

    }

    .category-heading p {

        font-size: 9px;

    }

    .category-eyebrow {

        font-size: 7px;

        letter-spacing: .8px;

    }


    /* Add */

    .premium-add-btn {

        font-size: 10px;

        padding: 9px 11px;

    }

    .add-icon {

        width: 25px;

        height: 25px;

    }


    /* Summary */

    .summary-card {

        padding: 10px;

    }

    .summary-icon {

        width: 34px;

        height: 34px;

        min-width: 34px;

        font-size: 13px;

    }

    .summary-label {

        font-size: 8px;

    }

    .summary-number {

        font-size: 16px;

    }


    /* Card */

    .category-card-header {

        padding: 12px;

    }

    .table-title {

        font-size: 13px;

    }

    .table-subtitle {

        font-size: 8px;

    }

    .category-count {

        font-size: 8px;

    }


    /* Table */

    .premium-category-table {

        min-width: 650px;

        width: 650px;

    }

    .premium-category-table thead th {

        padding: 10px;

        font-size: 7px;

    }

    .premium-category-table tbody td {

        padding: 10px;

    }


    /* Category */

    .category-mini-icon {

        width: 31px;

        height: 31px;

        min-width: 31px;

        font-size: 11px;

    }

    .category-name {

        font-size: 10px;

    }


    /* Image */

    .category-image-wrapper {

        width: 55px;

        height: 42px;

    }


    /* Actions */

    .category-action {

        min-width: 55px;

        padding: 6px;

        font-size: 7px;

        gap: 4px;

    }


    /* Empty */

    .empty-category {

        padding: 35px 10px;

    }

    .empty-category-icon {

        width: 52px;

        height: 52px;

        font-size: 20px;

    }

    .empty-category h4 {

        font-size: 13px;

    }

    .empty-category p {

        font-size: 9px;

    }

}


/* =========================================================
   ANIMATION
========================================================= */

.category-header,
.summary-card,
.category-card {

    animation:
        categoryFade .45s ease both;

}

.summary-card:nth-child(2) {

    animation-delay: .08s;

}

.summary-card:nth-child(3) {

    animation-delay: .16s;

}

.category-card {

    animation-delay: .22s;

}

@keyframes categoryFade {

    from {

        opacity: 0;

        transform:
            translateY(10px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/category_list.blade.php ENDPATH**/ ?>