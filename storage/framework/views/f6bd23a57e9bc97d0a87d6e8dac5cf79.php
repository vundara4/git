<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>


<div class="dashboard-header mb-4">

    <div>
        <div class="text-uppercase small fw-bold text-primary mb-1"
             style="letter-spacing: 1.5px;">
            Overview
        </div>

        <h1 class="dashboard-title mb-1">
            Admin Dashboard
        </h1>

        <p class="dashboard-subtitle mb-0">
            Welcome back, <?php echo e(auth()->user()->name); ?> 👋
            Here's what's happening with your store today.
        </p>
    </div>

    <div class="dashboard-date">
        <i class="bi bi-calendar3"></i>
        <?php echo e(now()->format('F d, Y')); ?>

    </div>

</div>



<div class="row g-4 mb-4">

    
    <div class="col-xl-4 col-md-6">

        <div class="premium-stat-card">

            <div class="stat-card-top">

                <div class="stat-icon stat-blue">
                    <i class="bi bi-box-seam-fill"></i>
                </div>

                <span class="stat-badge">
                    <i class="bi bi-arrow-up"></i>
                    Active
                </span>

            </div>

            <div class="stat-label">
                Total Products
            </div>

            <div class="stat-number">
                <?php echo e($productCount); ?>

            </div>

            <a href="<?php echo e(route('product.list')); ?>"
               class="stat-link">

                Manage products
                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    
    <div class="col-xl-4 col-md-6">

        <div class="premium-stat-card">

            <div class="stat-card-top">

                <div class="stat-icon stat-purple">
                    <i class="bi bi-tags-fill"></i>
                </div>

                <span class="stat-badge purple">
                    <i class="bi bi-grid"></i>
                    Organized
                </span>

            </div>

            <div class="stat-label">
                Total Categories
            </div>

            <div class="stat-number">
                <?php echo e($categoryCount); ?>

            </div>

            <a href="<?php echo e(route('category.list')); ?>"
               class="stat-link">

                Manage categories
                <i class="bi bi-arrow-right"></i>

            </a>

        </div>

    </div>


    
    <div class="col-xl-4 col-md-12">

        <div class="premium-action-card">

            <div class="action-icon">
                <i class="bi bi-plus-lg"></i>
            </div>

            <div class="flex-grow-1">

                <h5 class="mb-1">
                    Add New Product
                </h5>

                <p class="mb-0">
                    Create a product and publish it to your online shop.
                </p>

            </div>

            <a href="<?php echo e(route('product.create')); ?>"
               class="action-button">

                <i class="bi bi-arrow-up-right"></i>

            </a>

        </div>

    </div>

</div>



<div class="row g-4 mb-4">

    
    <div class="col-xl-8">

        <div class="premium-card h-100">

            <div class="premium-card-header">

                <div>

                    <h5 class="premium-card-title">
                        Sales Overview
                    </h5>

                    <p class="premium-card-subtitle">
                        Order revenue for the last 7 days
                    </p>

                </div>

                <div class="chart-badge">

                    <i class="bi bi-graph-up-arrow"></i>
                    Revenue

                </div>

            </div>

            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>

        </div>

    </div>


    
    <div class="col-xl-4">

        <div class="premium-card h-100">

            <div class="premium-card-header">

                <div>

                    <h5 class="premium-card-title">
                        Quick Actions
                    </h5>

                    <p class="premium-card-subtitle">
                        Manage your store
                    </p>

                </div>

            </div>


            <div class="quick-actions">

                
                <a href="<?php echo e(route('product.create')); ?>"
                   class="quick-action">

                    <div class="quick-action-icon blue">
                        <i class="bi bi-plus-square-fill"></i>
                    </div>

                    <div>

                        <div class="quick-action-title">
                            Add Product
                        </div>

                        <div class="quick-action-text">
                            Create new product
                        </div>

                    </div>

                    <i class="bi bi-chevron-right ms-auto"></i>

                </a>


                
                <a href="<?php echo e(route('product.list')); ?>"
                   class="quick-action">

                    <div class="quick-action-icon green">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div>

                        <div class="quick-action-title">
                            Products
                        </div>

                        <div class="quick-action-text">
                            View all products
                        </div>

                    </div>

                    <i class="bi bi-chevron-right ms-auto"></i>

                </a>


                
                <a href="<?php echo e(route('category.list')); ?>"
                   class="quick-action">

                    <div class="quick-action-icon purple">
                        <i class="bi bi-tags-fill"></i>
                    </div>

                    <div>

                        <div class="quick-action-title">
                            Categories
                        </div>

                        <div class="quick-action-text">
                            Manage categories
                        </div>

                    </div>

                    <i class="bi bi-chevron-right ms-auto"></i>

                </a>


                
                <a href="<?php echo e(route('orders.history')); ?>"
                   class="quick-action">

                    <div class="quick-action-icon orange">
                        <i class="bi bi-receipt"></i>
                    </div>

                    <div>

                        <div class="quick-action-title">
                            Orders
                        </div>

                        <div class="quick-action-text">
                            View order history
                        </div>

                    </div>

                    <i class="bi bi-chevron-right ms-auto"></i>

                </a>

            </div>

        </div>

    </div>

</div>



<div class="premium-card recent-products-card">

    <div class="premium-card-header">

        <div>

            <div class="section-label">
                INVENTORY
            </div>

            <h5 class="premium-card-title">
                Recent Products
            </h5>

            <p class="premium-card-subtitle">
                Latest products added to your store
            </p>

        </div>

        <a href="<?php echo e(route('product.list')); ?>"
           class="view-all">

            View all
            <i class="bi bi-arrow-right"></i>

        </a>

    </div>


    
    <div class="products-list">

        <?php $__empty_1 = true; $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="product-row">

                
                <div class="product-info">

                    <div class="product-icon">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                    <div class="product-details">

                        <div class="product-name">
                            <?php echo e($product->ProductName); ?>

                        </div>

                        <div class="product-meta">

                            <i class="bi bi-tag me-1"></i>

                            <?php echo e(optional($product->category)->name ?? 'No Category'); ?>


                        </div>

                    </div>

                </div>


                
                <div class="product-price">

                    <span class="price-label">
                        Price
                    </span>

                    $<?php echo e(number_format($product->Price, 2)); ?>


                </div>


                
                <div class="product-arrow">
                    <i class="bi bi-arrow-up-right"></i>
                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            
            <div class="empty-products">

                <div class="empty-icon">

                    <i class="bi bi-box-seam"></i>

                </div>

                <h6>
                    No products yet
                </h6>

                <p>
                    Your store is waiting for its first product.
                </p>

                <a href="<?php echo e(route('product.create')); ?>"
                   class="btn btn-primary">

                    <i class="bi bi-plus-lg me-1"></i>

                    Add Product

                </a>

            </div>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>


<style>

/* =========================================================
   DASHBOARD HEADER
========================================================= */

.dashboard-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.dashboard-title {
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -1px;
    color: #111827;
}

.dashboard-subtitle {
    color: #64748b;
    font-size: 14px;
}

.dashboard-date {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    border-radius: 10px;
    background: #fff;
    border: 1px solid #e5e7eb;
    color: #64748b;
    font-size: 13px;
    box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
}


/* =========================================================
   STAT CARDS
========================================================= */

.premium-stat-card {
    position: relative;
    padding: 23px;
    min-height: 205px;
    border-radius: 20px;
    background: rgba(255, 255, 255, .95);
    border: 1px solid #e5e7eb;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
    transition: .3s ease;
    overflow: hidden;
}

.premium-stat-card::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    right: -45px;
    bottom: -50px;
    border-radius: 50%;
    background: rgba(99, 102, 241, .06);
}

.premium-stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(15, 23, 42, .10);
}

.stat-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.stat-blue {
    background: #eef2ff;
    color: #4f46e5;
}

.stat-purple {
    background: #f5f3ff;
    color: #7c3aed;
}

.stat-badge {
    padding: 5px 9px;
    border-radius: 20px;
    background: #ecfdf5;
    color: #059669;
    font-size: 10px;
    font-weight: 700;
}

.stat-badge.purple {
    background: #f5f3ff;
    color: #7c3aed;
}

.stat-label {
    color: #64748b;
    font-size: 13px;
    margin-bottom: 4px;
}

.stat-number {
    color: #111827;
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -1px;
    margin-bottom: 8px;
}

.stat-link {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #4f46e5;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s;
}

.stat-link:hover {
    color: #3730a3;
    gap: 10px;
}


/* =========================================================
   ADD PRODUCT CARD
========================================================= */

.premium-action-card {
    min-height: 205px;
    padding: 23px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    color: #fff;

    background:
        radial-gradient(
            circle at 100% 0%,
            rgba(255,255,255,.18),
            transparent 35%
        ),
        linear-gradient(
            135deg,
            #4f46e5,
            #7c3aed
        );

    box-shadow: 0 12px 30px rgba(79, 70, 229, .25);

    transition: .3s ease;
}

.premium-action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(79, 70, 229, .32);
}

.action-icon {
    width: 52px;
    height: 52px;
    flex-shrink: 0;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, .15);
    font-size: 22px;
}

.premium-action-card h5 {
    font-weight: 700;
    font-size: 16px;
}

.premium-action-card p {
    color: rgba(255, 255, 255, .75);
    font-size: 12px;
}

.action-button {
    width: 40px;
    height: 40px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    color: #4f46e5;
    background: #fff;
    text-decoration: none;
    transition: .25s;
}

.action-button:hover {
    transform: rotate(5deg) scale(1.05);
    color: #3730a3;
}


/* =========================================================
   PREMIUM CARD
========================================================= */

.premium-card {
    position: relative;
    background: rgba(255, 255, 255, .96);
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    padding: 24px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
}

.premium-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
}

.premium-card-title {
    color: #111827;
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 4px;
}

.premium-card-subtitle {
    color: #94a3b8;
    font-size: 12px;
    margin: 0;
}

.chart-badge {
    padding: 8px 12px;
    border-radius: 10px;
    background: #eef2ff;
    color: #4f46e5;
    font-size: 11px;
    font-weight: 600;
}


/* =========================================================
   CHART
========================================================= */

.chart-container {
    height: 300px;
    position: relative;
}


/* =========================================================
   QUICK ACTIONS
========================================================= */

.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.quick-action {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border-radius: 13px;
    text-decoration: none;
    color: #334155;
    background: #f8fafc;
    transition: .25s;
}

.quick-action:hover {
    background: #eef2ff;
    color: #4f46e5;
    transform: translateX(4px);
}

.quick-action-icon {
    width: 40px;
    height: 40px;
    border-radius: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.quick-action-icon.blue {
    background: #eef2ff;
    color: #4f46e5;
}

.quick-action-icon.green {
    background: #ecfdf5;
    color: #059669;
}

.quick-action-icon.purple {
    background: #f5f3ff;
    color: #7c3aed;
}

.quick-action-icon.orange {
    background: #fff7ed;
    color: #ea580c;
}

.quick-action-title {
    font-size: 13px;
    font-weight: 700;
}

.quick-action-text {
    font-size: 11px;
    color: #94a3b8;
}


/* =========================================================
   PREMIUM RECENT PRODUCTS
========================================================= */

.recent-products-card {
    position: relative;
    overflow: hidden;

    background:
        radial-gradient(
            circle at 100% 0%,
            rgba(79, 70, 229, .055),
            transparent 30%
        ),
        rgba(255, 255, 255, .96);

    box-shadow:
        0 10px 30px rgba(15, 23, 42, .055),
        0 2px 6px rgba(15, 23, 42, .025);
}


/* TOP GRADIENT LINE */

.recent-products-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;

    width: 100%;
    height: 3px;

    background: linear-gradient(
        90deg,
        #4f46e5,
        #7c3aed,
        #a855f7
    );
}


/* SECTION LABEL */

.section-label {
    color: #4f46e5;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.6px;
    margin-bottom: 5px;
}


/* HEADER */

.recent-products-card .premium-card-header {
    padding-bottom: 16px;
    margin-bottom: 0;
    border-bottom: 1px solid #eef2f7;
}

.recent-products-card .premium-card-title {
    font-size: 17px;
    letter-spacing: -.3px;
}

.recent-products-card .premium-card-subtitle {
    margin-top: 3px;
}


/* VIEW ALL */

.recent-products-card .view-all {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 8px 12px;

    border-radius: 10px;

    background: #f5f3ff;
    color: #4f46e5;

    transition: all .25s ease;
}

.recent-products-card .view-all:hover {
    background: #4f46e5;
    color: #fff;
    transform: translateX(2px);
}


/* PRODUCTS LIST */

.products-list {
    width: 100%;
}


/* PRODUCT ROW */

.recent-products-card .product-row {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin: 0 -8px;
    padding: 15px 13px;

    border-top: 1px solid #f1f5f9;
    border-radius: 13px;

    transition:
        transform .25s ease,
        background .25s ease,
        box-shadow .25s ease;
}


/* FIRST ROW */

.recent-products-card .product-row:first-child {
    border-top: 0;
}


/* HOVER */

.recent-products-card .product-row:hover {
    background: linear-gradient(
        90deg,
        #f8faff,
        #ffffff
    );

    transform: translateX(5px);

    box-shadow:
        0 6px 20px rgba(15, 23, 42, .05);
}


/* PRODUCT INFO */

.product-info {
    display: flex;
    align-items: center;
    gap: 12px;

    min-width: 0;
    flex: 1;
}


/* PRODUCT ICON */

.recent-products-card .product-icon {
    position: relative;

    width: 46px;
    height: 46px;

    flex-shrink: 0;

    border-radius: 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #eef2ff,
        #f5f3ff
    );

    color: #4f46e5;

    font-size: 18px;

    box-shadow:
        inset 0 0 0 1px rgba(79, 70, 229, .06),
        0 4px 12px rgba(79, 70, 229, .08);

    transition: all .25s ease;
}


/* ICON HOVER */

.recent-products-card .product-row:hover .product-icon {
    transform: scale(1.08) rotate(-3deg);

    box-shadow:
        0 7px 18px rgba(79, 70, 229, .15);
}


/* PRODUCT DETAILS */

.product-details {
    min-width: 0;
}


/* PRODUCT NAME */

.recent-products-card .product-name {
    font-size: 13px;
    font-weight: 700;

    color: #172033;

    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;

    transition: color .2s ease;
}

.recent-products-card .product-row:hover .product-name {
    color: #4f46e5;
}


/* CATEGORY */

.recent-products-card .product-meta {
    display: inline-flex;
    align-items: center;

    margin-top: 5px;
    padding: 3px 8px;

    border-radius: 20px;

    background: #f8fafc;

    color: #64748b;

    font-size: 10px;
    font-weight: 600;
}


/* PRICE */

.recent-products-card .product-price {
    display: flex;
    align-items: center;
    gap: 5px;

    padding: 7px 11px;

    border-radius: 9px;

    background: #f0fdf4;

    color: #059669;

    font-size: 13px;
    font-weight: 800;

    white-space: nowrap;
}


/* PRICE LABEL */

.price-label {
    color: #86efac;
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
}


/* ARROW */

.recent-products-card .product-arrow {
    width: 30px;
    height: 30px;

    flex-shrink: 0;

    border-radius: 9px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f8fafc;
    color: #94a3b8;

    transition: all .25s ease;
}


/* ARROW HOVER */

.recent-products-card .product-row:hover .product-arrow {
    background: #eef2ff;
    color: #4f46e5;

    transform: translateX(3px);
}


/* =========================================================
   EMPTY PRODUCTS
========================================================= */

.recent-products-card .empty-products {
    text-align: center;
    padding: 55px 20px;
}

.recent-products-card .empty-icon {
    width: 72px;
    height: 72px;

    margin: 0 auto 15px;

    border-radius: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #eef2ff,
        #f5f3ff
    );

    color: #4f46e5;

    font-size: 27px;

    box-shadow:
        0 12px 30px rgba(79, 70, 229, .10);
}

.recent-products-card .empty-products h6 {
    margin-top: 18px;

    font-size: 15px;
    font-weight: 700;

    color: #1e293b;
}

.recent-products-card .empty-products p {
    color: #94a3b8;
    font-size: 13px;

    margin-bottom: 18px;
}


/* ADD PRODUCT BUTTON */

.recent-products-card .empty-products .btn {
    border: 0;

    border-radius: 11px;

    padding: 10px 16px;

    font-size: 12px;
    font-weight: 700;

    background: linear-gradient(
        135deg,
        #4f46e5,
        #7c3aed
    );

    box-shadow:
        0 8px 20px rgba(79, 70, 229, .22);

    transition: all .25s ease;
}

.recent-products-card .empty-products .btn:hover {
    transform: translateY(-2px);

    box-shadow:
        0 12px 26px rgba(79, 70, 229, .30);
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .dashboard-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .dashboard-title {
        font-size: 25px;
    }

    .dashboard-date {
        width: 100%;
        justify-content: center;
    }

    .premium-card {
        padding: 18px;
    }

    .premium-card-header {
        align-items: flex-start;
        gap: 10px;
    }

    .chart-container {
        height: 250px;
    }
}


@media (max-width: 576px) {

    .recent-products-card {
        padding: 18px;
        border-radius: 17px;
    }

    .recent-products-card .premium-card-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .recent-products-card .view-all {
        margin-top: 4px;
    }

    .recent-products-card .product-row {
        gap: 8px;
        padding: 13px 8px;
    }

    .recent-products-card .product-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
    }

    .recent-products-card .product-name {
        max-width: 150px;
    }

    .recent-products-card .product-price {
        padding: 6px 8px;
        font-size: 11px;
    }

    .price-label {
        display: none;
    }

    .recent-products-card .product-arrow {
        display: none;
    }
}

/* =========================================================
   SMALL ANIMATION
========================================================= */
@keyframes dashboardFade {

    from {
        opacity: 0;
        transform: translateY(8px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}

.premium-stat-card,
.premium-action-card,
.premium-card {
    animation: dashboardFade .45s ease both;
}

</style>

<script>
/* =========================================================
   SALES CHART
========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('salesChart');

    if (!canvas) {
        return;
    }

    const ctx = canvas.getContext('2d');


    /* Gradient */
    const gradient = ctx.createLinearGradient(
        0,
        0,
        0,
        300
    );

    gradient.addColorStop(
        0,
        'rgba(79, 70, 229, 0.25)'
    );

    gradient.addColorStop(
        1,
        'rgba(79, 70, 229, 0.01)'
    );
    new Chart(ctx, {

        type: 'line',
        data: {
            datasets: [

                {
                    label: 'Sales ($)',
                    borderColor: '#4f46e5',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#4f46e5',
                    pointBorderWidth: 3
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {

                legend: {
                    display: false
                },

                tooltip: {

                    backgroundColor: '#111827',

                    padding: 12,

                    cornerRadius: 10,
                    displayColors: false,
                    callbacks: {

                        label: function (context) {

                            return ' $' +
                                Number(context.raw)
                                .toFixed(2)
                        }

                    }

                }
            },
            scales: {

                y: {

                    beginAtZero: true,

                    border: {

                        display: false

                    },

                    grid: {

                        color: '#eef2f7'

                    },

                    ticks: {

                        color: '#94a3b8',

                        callback: function (value) {

                            return '$' + value;

                        }

                    }

                },


                x: {

                    border: {

                        display: false

                    },

                    grid: {

                        display: false

                    },

                    ticks: {

                        color: '#94a3b8'
                    }

                }

            }
        }

    });

});

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>