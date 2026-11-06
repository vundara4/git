<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title','Admin'); ?></title> 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background: #f3f4f5;
        }

        .sidebar {
            min-height: 100vh;
            background: #fff;
        }

        .sidebar a {
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #79e70b;
            padding-left: 25px;
        }

        .navbar {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .content-card {
            background: #c7d6e0;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Submenu Dropdown Arrow Animation */
        .menu-toggle {
            cursor: pointer;
            user-select: none;
        }

        .menu-toggle .chevron-icon {
            transition: transform 0.3s ease;
        }

        .menu-toggle[aria-expanded="true"] .chevron-icon {
            transform: rotate(180deg);
        }

        .report-link {
            font-size: 14px;
        }

        .report-link i {
            width: 22px;
        }
    </style>
</head>

<body> 
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid"> 
            <span class="navbar-brand fw-bold"> 
                <i class="bi bi-speedometer2"></i> Admin Panel 
            </span>
            <div class="ms-auto"> 
                <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-light btn-sm"> 
                    <i class="bi bi-house"></i> Home 
                </a>
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline"> 
                    <?php echo csrf_field(); ?> 
                    <button class="btn btn-outline-light btn-sm"> 
                        <i class="bi bi-box-arrow-right"></i> Log out 
                    </button> 
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row"> 
            
            <aside class="col-md-2 sidebar border-end p-0"> 
                
                
                <div class="p-3 border-bottom d-flex justify-content-between align-items-center menu-toggle" 
                     data-bs-toggle="collapse" 
                     data-bs-target="#adminMenuCollapse" 
                     aria-expanded="true">
                    <div>
                        <div class="fw-bold"> <i class="bi bi-grid-1x2-fill"></i> Dashboard </div> 
                        <small class="text-muted"> Admin Menu </small>
                    </div>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </div> 

                <div class="collapse show" id="adminMenuCollapse">
                    <div class="list-group list-group-flush"> 
                        <a href="<?php echo e(route('category.list')); ?>" class="list-group-item list-group-item-action"> 
                            <i class="bi bi-tags"></i> Categories 
                        </a> 
                        <a href="<?php echo e(url('/productList')); ?>" class="list-group-item list-group-item-action"> 
                            <i class="bi bi-box"></i> Products 
                        </a> 
                        <a href="<?php echo e(route('product.create')); ?>" class="list-group-item list-group-item-action">
                             <i class="bi bi-plus-square"></i> Add Product 
                        </a> 
                        <a href="<?php echo e(route('orders.history')); ?>" class="list-group-item list-group-item-action"> 
                            <i class="bi bi-receipt"></i> Orders History 
                        </a>
                        <a href="<?php echo e(url('/admin/api/categories')); ?>" class="list-group-item list-group-item-action"> 
                            <i class="bi bi-cloud"></i> Category API 
                        </a> 
                        <a href="<?php echo e(url('/admin/api/products')); ?>" class="list-group-item list-group-item-action"> 
                            <i class="bi bi-cart"></i> Product API 
                        </a> 
                    </div> 
                </div>

                
                <div class="p-3 bg-dark text-white fw-bold d-flex justify-content-between align-items-center menu-toggle mt-1" 
                     data-bs-toggle="collapse" 
                     data-bs-target="#reportsMenuCollapse" 
                     aria-expanded="false">
                    <span><i class="bi bi-bar-chart-fill me-2"></i> Reports</span>
                    <i class="bi bi-chevron-down chevron-icon"></i>
                </div>

                <div class="collapse" id="reportsMenuCollapse">
                    <div class="list-group list-group-flush"> 
                        <a href="<?php echo e(route('reports.sales')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-graph-up"></i> Sales Report 
                        </a> 
                        <a href="<?php echo e(route('reports.purchase')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-bag-check"></i> Purchase Report 
                        </a> 
                        <a href="<?php echo e(route('reports.products')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-box-seam"></i> Product Report 
                        </a>
                        <a href="<?php echo e(route('reports.categories')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-tags-fill"></i> Category Report 
                        </a>
                        <a href="<?php echo e(route('reports.customers')); ?>" class="list-group-item list-group-item-action report-link ps-4">
                            <i class="bi bi-people-fill"></i> Customer Report 
                        </a> 
                        <a href="<?php echo e(route('reports.suppliers')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-truck"></i> Supplier Report 
                        </a> 
                        <a href="<?php echo e(route('reports.stock')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-clipboard-data"></i> Stock Report 
                        </a> 
                        <a href="<?php echo e(route('reports.orders')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-receipt-cutoff"></i> Order Report 
                        </a> 
                        <a href="<?php echo e(route('reports.low-stock')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-exclamation-triangle-fill"></i> Low Stock Report 
                        </a> 
                        <a href="<?php echo e(route('reports.revenue')); ?>" class="list-group-item list-group-item-action report-link ps-4"> 
                            <i class="bi bi-cash-stack"></i> Revenue Report 
                        </a> 
                    </div>
                </div>

            </aside> 

            
            <main class="col-md-10 p-4">
                <div class="content-card"> 
                     
                    <?php if($errors->any()): ?> 
                    <div class="alert alert-danger">
                        <div class="fw-bold mb-1"> <i class="bi bi-exclamation-circle"></i> Validation errors </div>
                        <ul class="mb-0"> 
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <li> <?php echo e($error); ?> </li> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </ul>
                    </div> 
                    <?php endif; ?> 

                     
                    <?php if(session('success')): ?> 
                    <div class="alert alert-success"> 
                        <strong> <i class="bi bi-check-circle"></i> Success: </strong> <?php echo e(session('success')); ?> 
                    </div> 
                    <?php endif; ?> 

                     
                    <?php echo $__env->yieldContent('content'); ?> 
                </div>
            </main>
        </div>
    </div> 

    <?php echo $__env->yieldPushContent('styles'); ?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/layouts/admin.blade.php ENDPATH**/ ?>