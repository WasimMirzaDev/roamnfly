<style>
.is-tab-el-active {
    color:#008cff;
}
.tabs.-underline .tabs__controls .tabs__button::after {
    background:#008cff;
}
.diabled-tabs {
    white-space: initial;
    word-break: break-all;
    width: 72px;
    font-weight: 400;
    line-height: 17px;
    font-size: 14px;
}
.tabs__button {
    font-size:14px;
}
</style>
<section data-anim-wrap class="form-search-all-service masthead -type-1 z-5">
    <div data-anim-child="fade" class="masthead__bg">
        <img src="<?php echo e($bg_image_url); ?>" alt="image" data-src="<?php echo e($bg_image_url); ?>" class="js-lazy">
    </div>

    <div class="container">
        <div class="row justify-center">
            <div class="col-auto">
                <div class="text-center d-none">
                    <h1 data-anim-child="slide-up delay-4" class="text-60 lg:text-40 md:text-30 text-white"><?php echo e($title); ?></h1>
                    <p data-anim-child="slide-up delay-5" class="text-white mt-6 md:mt-10"><?php echo e($sub_title); ?></p>
                </div>

                <?php if(empty($hide_form_search)): ?>
                    <div data-anim-child="slide-up delay-6" class="tabs -underline mt-60 js-tabs">
                        <div style="gap:25px" class="go-tabs bg-white tabs__controls d-flex justify-center sm:justify-start js-tabs-controls">
                            <?php if($service_types): ?>
                                <?php $allServices = get_bookable_services(); $number = 0; ?>
                                <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if(empty($allServices[$service_type])) continue;
                                        $service = $allServices[$service_type];
                                    ?>
                                    <div class="" style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img style="width:52px" src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button class="w-100 tabs__button text-15 fw-500 text-dark pb-4 js-tabs-button <?php if($number==0): ?> is-tab-el-active <?php endif; ?>" data-tab-target=".-tab-item-<?php echo e($service_type); ?>">
                                            <?php echo e($service::getModelName()); ?>

                                        </button>
                                    </div>
                                    
                                    <?php $number++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                    <div style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img class="" style="width:52px" src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button disabled class="diabled-tabs">
                                           Homestays&Villas
                                        </button>
                                    </div>
                                    <div style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img  src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button disabled class="diabled-tabs">
                                           Holiday<br>Packages
                                        </button>
                                    </div>
                                    <div style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img style="width:52px" src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button disabled class="diabled-tabs">
                                           Trains
                                        </button>
                                    </div>
                                    <div style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img style="width:52px" src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button disabled class="diabled-tabs">
                                           Buses
                                        </button>
                                    </div>
                                    <div style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img style="width:52px" src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button disabled class="diabled-tabs">
                                           Cabs
                                        </button>
                                    </div>
                                    <div style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img style="width:52px" src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button disabled class="diabled-tabs">
                                           ForexCard&Currency
                                        </button>
                                    </div>
                                    <div style="width:72px">
                                        <div class="image-wrapper-go">
                                            <img style="width:52px" src="<?php echo e(asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button disabled class="diabled-tabs">
                                           Travel<br>Insurance
                                        </button>
                                    </div>
                        </div>

                        <div class="tabs__content mt-30 md:mt-20 js-tabs-content">
                            <?php if($service_types): ?>
                                <?php $number = 0; ?>
                                <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if(empty($allServices[$service_type])) continue;
                                    ?>
                                    <div class="tabs__pane -tab-item-<?php echo e($service_type); ?> <?php if($number==0): ?> is-tab-el-active <?php endif; ?>">
                                        <?php echo $__env->make(ucfirst($service_type).'::frontend.layouts.search.form-search', ['style' => 'normal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                    <?php $number++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\laragon\www\roamnfly\themes/GoTrip/Template/Views/frontend/blocks/form-search-all-service/style-normal.blade.php ENDPATH**/ ?>