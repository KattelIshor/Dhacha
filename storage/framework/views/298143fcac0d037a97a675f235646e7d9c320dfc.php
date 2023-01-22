<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('pagename', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials._message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 bg-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i
                            class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ <?php echo e(number_format($todaysSales)); ?></h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                        <span class="tx-11 tx-white-6">Gross Sales</span>
                        <h6 class="tx-white mg-b-0">৳ <?php echo e(number_format($totalSales)); ?></h6>
                    </div>
                </div><!-- -->
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i
                            class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ <?php echo e(number_format($currentWeekSales)); ?></h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                        <span class="tx-11 tx-white-6">Gross Sales</span>
                        <h6 class="tx-white mg-b-0">৳ <?php echo e(number_format($totalSales)); ?></h6>
                    </div>
                </div><!-- -->
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-purple">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i
                            class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ <?php echo e(number_format($currentMonthSales)); ?></h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                        <span class="tx-11 tx-white-6">Gross Sales</span>
                        <h6 class="tx-white mg-b-0">৳ <?php echo e(number_format($totalSales)); ?></h6>
                    </div>
                </div><!-- -->
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-sl-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i
                            class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">৳ <?php echo e(number_format($currentYearSales)); ?></h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                        <span class="tx-11 tx-white-6">Gross Sales</span>
                        <h6 class="tx-white mg-b-0">৳ <?php echo e(number_format($totalSales)); ?></h6>
                    </div>
                </div><!-- -->
            </div><!-- card -->
        </div><!-- col-3 -->
    </div><!-- row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\halumshop-master\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>