
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('themes/gotrip/dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/fotorama/fotorama.css")); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_detail bravo_hotel_detail">
        
        <div class="bravo_content">
            <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container">
                <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-rules-policy', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="mt-40">
                <?php echo $__env->make('Hotel::frontend.layouts.details.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            

            <?php echo $__env->make('Hotel::frontend.layouts.details.hotel-related', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="bravo-more-book-mobile">
            <div class="container">
                <div class="left">
                    <div class="g-price">
                        <div class="prefix">
                            <span class="fr_text"><?php echo e(__("from")); ?></span>
                        </div>
                        <div class="price">
                            <span class="onsale"></span>
                            <span class="text-price"><?php echo e($row['pops'][0]['tpc'] ?? 0); ?></span>
                        </div>
                    </div>
                    
                </div>
                <div class="right">
                    
                        <a class="rounded-4 bg-blue-1 text-white cursor-pointer btn-primary gotrip-detail-hotel-book-mobile"><?php echo e(__("Book Now")); ?></a>
                    
                        
                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            <?php if($row['gl']['lt'] && $row['gl']['ln']): ?>
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e($row['gl']['lt']); ?>, <?php echo e($row['gl']['ln']); ?>],
                zoom:<?php echo e($row->map_zoom ?? "8"); ?>,
                ready: function (engineMap) {
                    engineMap.addMarker([<?php echo e($row['gl']['lt']); ?>, <?php echo e($row['gl']['ln']); ?>], {
                        icon_options: {
                            iconUrl:"<?php echo e(get_file_url(setting_item("hotel_icon_marker_map"),'full') ?? url('images/icons/png/pin.png')); ?>"
                        }
                    });
                }
            });
            <?php endif; ?>
        })
    </script>
    <script>
        var bravo_booking_data = <?php echo json_encode($booking_data); ?>

        var bravo_booking_i18n = {
			no_date_select:'<?php echo e(__('Please select Start and End date')); ?>',
            no_guest_select:'<?php echo e(__('Please select at least one guest')); ?>',
            load_dates_url:'<?php echo e(route('space.vendor.availability.loadDates')); ?>',
            name_required:'<?php echo e(__("Name is Required")); ?>',
            email_required:'<?php echo e(__("Email is Required")); ?>',
        };
    </script>
    <script type="text/javascript" src="<?php echo e(asset("libs/fotorama/fotorama.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/hotel/js/single-hotel.js?_ver='.config('app.asset_version'))); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Hotel/Views/frontend/detail.blade.php ENDPATH**/ ?>