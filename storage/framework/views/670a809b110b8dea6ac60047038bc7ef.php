

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<style>

    .report-page {
        --primary: #111827;
        --secondary: #64748b;
        --border: #e5e7eb;
        --soft: #f8fafc;
        --success: #16a34a;
        --danger: #dc2626;
        --warning: #f59e0b;

        padding: 5px;
    }


    /* HEADER */

    .report-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        gap: 20px;
        margin-bottom: 25px;
    }


    .report-eyebrow {
        display: inline-flex;
        align-items: center;

        gap: 8px;

        font-size: 12px;
        font-weight: 700;

        letter-spacing: .12em;
        text-transform: uppercase;

        color: #64748b;

        margin-bottom: 8px;
    }


    .report-title {
        font-size: 30px;
        font-weight: 800;

        color: #111827;

        margin: 0;
    }


    .report-subtitle {
        color: #64748b;

        margin: 5px 0 0;
    }


    /* ACTIONS */

    .report-actions {
        display: flex;

        gap: 8px;

        flex-wrap: wrap;
    }


    .report-actions .btn {
        border-radius: 10px;

        font-weight: 600;

        padding: 9px 15px;
    }


    /* STAT CARD */

    .stat-card {
        background: #fff;

        border: 1px solid var(--border);

        border-radius: 18px;

        padding: 20px;

        height: 100%;

        position: relative;

        overflow: hidden;

        transition: .25s ease;
    }


    .stat-card:hover {
        transform: translateY(-3px);

        box-shadow:
            0 15px 35px
            rgba(15, 23, 42, .08);
    }


    .stat-icon {
        width: 44px;
        height: 44px;

        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        color: #111827;

        font-size: 20px;

        margin-bottom: 15px;
    }


    .stat-label {
        color: #64748b;

        font-size: 13px;

        font-weight: 600;

        margin-bottom: 4px;
    }


    .stat-value {
        color: #111827;

        font-size: 24px;

        font-weight: 800;
    }


    /* REPORT CARD */

    .report-card {
        background: #fff;

        border: 1px solid var(--border);

        border-radius: 18px;

        overflow: hidden;

        box-shadow:
            0 8px 25px
            rgba(15, 23, 42, .04);
    }


    .report-card-header {
        padding: 18px 20px;

        border-bottom:
            1px solid var(--border);

        display: flex;

        justify-content: space-between;

        align-items: center;
    }


    .report-card-title {
        margin: 0;

        font-size: 17px;

        font-weight: 700;

        color: #111827;
    }


    /* CHART */

    .chart-box {
        padding: 20px;

        height: 350px;

        position: relative;
    }


    /* TABLE */

    .table-wrap {
        overflow-x: auto;
    }


    .report-table {
        margin: 0;

        min-width: 700px;
    }


    .report-table thead th {
        background: #f8fafc;

        color: #64748b;

        font-size: 12px;

        text-transform: uppercase;

        letter-spacing: .05em;

        white-space: nowrap;

        border-bottom:
            1px solid #e5e7eb;

        padding: 14px 16px;
    }


    .report-table tbody td {
        padding: 14px 16px;

        vertical-align: middle;

        color: #334155;

        border-color: #f1f5f9;
    }


    .report-table tbody tr:hover {
        background: #f8fafc;
    }


    /* BADGE */

    .report-badge {
        display: inline-flex;

        padding: 5px 10px;

        border-radius: 999px;

        font-size: 11px;

        font-weight: 700;

        background: #f1f5f9;
    }


    /* MOBILE */

    @media (max-width: 768px) {

        .report-header {
            flex-direction: column;
        }


        .report-title {
            font-size: 24px;
        }


        .report-actions {
            width: 100%;
        }


        .report-actions .btn {
            flex: 1;
        }


        .chart-box {
            height: 300px;
        }
    }


    /* PRINT */

    @media print {

        body {
            background: #fff !important;
        }


        .sidebar,
        nav,
        .report-actions,
        .btn {
            display: none !important;
        }


        main {
            width: 100% !important;

            padding: 0 !important;
        }


        .content-card {
            box-shadow: none !important;

            background: #fff !important;

            padding: 0 !important;
        }


        .report-card,
        .stat-card {
            box-shadow: none !important;

            break-inside: avoid;
        }


        .report-title {
            font-size: 24px;
        }


        .chart-box {
            height: 300px;
        }
    }

</style>


<div class="report-page">


    

    <div class="report-header">

        <div>

            <div class="report-eyebrow">

                <i class="bi bi-bar-chart-fill"></i>

                ROMDUL DELIVERY
                •
                REPORT CENTER

            </div>


            <h1 class="report-title">

                <?php echo e($title); ?>


            </h1>


            <p class="report-subtitle">

                <?php echo e($subtitle); ?>


            </p>

        </div>


        <div class="report-actions">


            

            <button
                type="button"
                onclick="window.print()"
                class="btn btn-outline-dark"
            >

                <i class="bi bi-printer"></i>

                Print

            </button>


            

            <a
                href="<?php echo e(route(
                    'reports.pdf',
                    request()->route('report') ?? ''
                )); ?>"
                class="btn btn-danger"
            >

                <i class="bi bi-file-earmark-pdf"></i>

                PDF

            </a>


            

            <a
                href="<?php echo e(route(
                    'reports.excel',
                    request()->route('report') ?? ''
                )); ?>"
                class="btn btn-success"
            >

                <i class="bi bi-file-earmark-excel"></i>

                Excel

            </a>

        </div>

    </div>



    

    <div class="row g-3 mb-4">


        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">


                    <div class="stat-icon">

                        <?php if(
                            str_contains(
                                strtolower($label),
                                'revenue'
                            )
                        ): ?>

                            <i class="bi bi-cash-stack"></i>

                        <?php elseif(
                            str_contains(
                                strtolower($label),
                                'sales'
                            )
                        ): ?>

                            <i class="bi bi-graph-up-arrow"></i>

                        <?php elseif(
                            str_contains(
                                strtolower($label),
                                'product'
                            )
                        ): ?>

                            <i class="bi bi-box-seam"></i>

                        <?php elseif(
                            str_contains(
                                strtolower($label),
                                'stock'
                            )
                        ): ?>

                            <i class="bi bi-boxes"></i>

                        <?php elseif(
                            str_contains(
                                strtolower($label),
                                'customer'
                            )
                        ): ?>

                            <i class="bi bi-people"></i>

                        <?php elseif(
                            str_contains(
                                strtolower($label),
                                'supplier'
                            )
                        ): ?>

                            <i class="bi bi-truck"></i>

                        <?php elseif(
                            str_contains(
                                strtolower($label),
                                'order'
                            )
                        ): ?>

                            <i class="bi bi-receipt"></i>

                        <?php else: ?>

                            <i class="bi bi-bar-chart"></i>

                        <?php endif; ?>

                    </div>


                    <div class="stat-label">

                        <?php echo e($label); ?>


                    </div>


                    <div class="stat-value">

                        <?php if(
                            str_contains(
                                strtolower($label),
                                'revenue'
                            )
                            ||
                            str_contains(
                                strtolower($label),
                                'value'
                            )
                            ||
                            str_contains(
                                strtolower($label),
                                'cost'
                            )
                            ||
                            str_contains(
                                strtolower($label),
                                'sale'
                            )
                            ||
                            str_contains(
                                strtolower($label),
                                'price'
                            )
                        ): ?>

                            $<?php echo e(number_format(
                                (float) $value,
                                2
                            )); ?>


                        <?php elseif(is_numeric($value)): ?>

                            <?php echo e(number_format(
                                (float) $value,
                                0
                            )); ?>


                        <?php else: ?>

                            <?php echo e($value); ?>


                        <?php endif; ?>

                    </div>


                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>



    

    <div class="report-card mb-4">


        <div class="report-card-header">

            <h5 class="report-card-title">

                <i class="bi bi-graph-up me-2"></i>

                Performance Overview

            </h5>


            <span class="text-muted small">

                Live report data

            </span>

        </div>


        <div class="chart-box">

            <canvas id="reportChart"></canvas>

        </div>


    </div>



    

    <div class="report-card">


        <div class="report-card-header">


            <h5 class="report-card-title">

                <i class="bi bi-table me-2"></i>

                Detailed Report

            </h5>


            <span class="report-badge">

                <?php echo e(count($rows)); ?>


                Records

            </span>


        </div>


        <div class="table-wrap">


            <table class="table report-table">


                <thead>

                    <tr>

                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <th>

                                <?php echo e($column); ?>


                            </th>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tr>

                </thead>


                <tbody>


                    <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <td>

                                    <?php if(
                                        is_numeric($value)
                                        &&
                                        $loop->last
                                    ): ?>

                                        $<?php echo e(number_format(
                                            (float) $value,
                                            2
                                        )); ?>


                                    <?php else: ?>

                                        <?php echo e($value); ?>


                                    <?php endif; ?>

                                </td>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>


                        <tr>

                            <td
                                colspan="<?php echo e(count($columns)); ?>"
                                class="text-center py-5 text-muted"
                            >

                                <i
                                    class="bi bi-inbox fs-2 d-block mb-2"
                                ></i>

                                No report data available.

                            </td>

                        </tr>


                    <?php endif; ?>


                </tbody>


            </table>

        </div>

    </div>


</div>





<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const canvas =
            document.getElementById(
                'reportChart'
            );


        if (!canvas) {

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | GET DATA FROM LARAVEL
        |--------------------------------------------------------------------------
        */

        const chartType =
            <?php echo json_encode($chart['type'] ?? 'bar', 15, 512) ?>;
        const labels =
            <?php echo json_encode($chart['labels'] ?? [], 15, 512) ?>;
        const values =
            <?php echo json_encode($chart['data'] ?? [], 15, 512) ?>;
        const label =
            <?php echo json_encode($chart['label'] ?? 'Report', 15, 512) ?>;


        /*
        |--------------------------------------------------------------------------
        | DEBUG
        |--------------------------------------------------------------------------
        */

        console.log(
            'Chart Type:',
            chartType
        );

        console.log(
            'Chart Labels:',
            labels
        );

        console.log(
            'Chart Values:',
            values
        );


        /*
        |--------------------------------------------------------------------------
        | CREATE CHART
        |--------------------------------------------------------------------------
        */

        new Chart(canvas, {

            type: chartType,


            data: {

                labels: labels,


                datasets: [{

                    label: label,

                    data: values,


                    borderWidth: 2,

                    tension: 0.35,


                    fill:
                        chartType === 'line',


                    borderRadius:
                        chartType === 'bar'
                            ? 8
                            : 0

                }]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,


                plugins: {

                    legend: {

                        display:
                            chartType !== 'bar'

                    }

                },


                scales:
                    ['pie', 'doughnut', 'polarArea'].includes(chartType)
                        ? {}
                        : {

                            y: {

                                beginAtZero: true

                            }

                        }

            }

        });

    }

);

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\year1\years2\S2\webbackend\Assignmentt\resources\views/admin/reports/report.blade.php ENDPATH**/ ?>