
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/flight/css/flight.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
    <style>
        .bravo_wrap .bravo_search_flight .bravo_form_search{
            margin-bottom: 0px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_search_flight">
        <div class="container">
            <div class=" pt-20 pb-15">
                <div class=" d-none text-center">
                    <h1 class="text-30 fw-600">
                        <?php echo e(setting_item_with_lang("flight_page_search_title")); ?>

                    </h1>
                </div>

                <?php echo $__env->make('Flight::frontend.layouts.search.form-return-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <style>
            .bgGradient {
background-image: linear-gradient(0deg, #15457b, #051423);
width: 100%;
position: absolute;
top: 0;
left: 0;
z-index: -1 !important;
min-height: 160px;
}
        </style>
        <div class="layout-pt-md layout-pb-md bg-light-2" style="position: relative; z-index:2 !important;">
            <div class="container">
                <div class="row">
                    <span class="bgGradient"></span>
                    <div class="col-xl-3 col-lg-4">
                        <?php echo $__env->make('Flight::frontend.layouts.search.filter-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <?php echo $__env->make('Flight::frontend.layouts.return.search.list-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Define initialData variable globally
        window.initialData = {
            adults: <?php echo e(Request::query('seat_type')['adults'] ?? 0); ?>,
            children: <?php echo e(Request::query('seat_type')['children'] ?? 0); ?>,
            infants: <?php echo e(Request::query('seat_type')['infants'] ?? 0); ?>,
            flight_seat: [] 
        };
        console.log(window.initialData);
    </script>
    <?php echo $__env->make('Flight::frontend.layouts.return.search.modal-form-book', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/filter.js?_ver='.config('app.asset_version'))); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('themes/gotrip/module/flight/js/flight.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Flight/Views/frontend/returnSearch.blade.php ENDPATH**/ ?>