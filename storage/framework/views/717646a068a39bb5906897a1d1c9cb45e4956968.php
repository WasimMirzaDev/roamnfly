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
.gotrip_form_search {
    /* width: 1200px !important; */
     /* height:315px; */
     padding: 20px 0;
    border-radius:15px;
    /* max-width:1110px; */
}
.button-item {
    position: absolute;
    left: 42%;
    top: 92%;
    bottom: 0px;
    z-index: 9;
    max-width: 200px !important;

}
.mainSearch__submit {
    height:44px !important;
    height: 50px !important;

}
.bravo_wrap .gotrip_form_search .field-items {
    /* width: 1080px; */
    margin: 0 auto;
    position: relative;
    /* z-index: 10; */
    margin: 0px 11px !important; 
    border-radius: 8px;
    /* box-shadow: 0 1px 5px 0 rgb(0 0 0 / 10%); */
    padding: 0 20px ;
}
.adjust-border{ 
    border:1px solid #e7e7e7;
    border-radius:10px;
    height:80px;
}
.react-autosuggest__input {
    background: #ffffff;
    box-shadow: 0 2px 3px 0 rgb(0 0 0 / 10%);
    padding: 11px 10px 11px 30px;
    outline: 0;
    border: 0;
    width: 100%;
    font-size: calc(var(--font-scale, 1) * 16px);
    color: #000000;
    font-weight: 700;
}
.bravo_wrap .gotrip_form_search .field-items > .row > div:not(:last-child) {
    height: 75px;
    padding-top: 10px;
}
.button-item .text-search,
.button-item .icon-search{
    font-size: 25px !important;
}
.bravo_wrap .gotrip_form_search .button-item .button{
    max-width: 235px !important;
}

</style>
<section data-anim-wrap class="form-search-all-service masthead -type-1 z-5">
    <div data-anim-child="fade" class="masthead__bg">
        <img src="<?php echo e($bg_image_url); ?>" alt="image" data-src="<?php echo e($bg_image_url); ?>" class="js-lazy">
    </div>

    <div class="container">
        <div class="row justify-center">
            <div class="">
                <div class="text-center d-none">
                    <h1 data-anim-child="slide-up delay-4" class="text-60 lg:text-40 md:text-30 text-white"><?php echo e($title); ?></h1>
                    <p data-anim-child="slide-up delay-5" class="text-white mt-6 md:mt-10"><?php echo e($sub_title); ?></p>
                </div>

                <?php if(empty($hide_form_search)): ?>
                    <div data-anim-child="slide-up delay-6" class="tabs -underline mt-60 js-tabs">
                        <center>
                        <div style="gap: 25px;
    position: fixed;
    left: 37%;
    top: -50px;
    z-index: 25;
    padding: 10px 0px;
    box-shadow: 0 2px 20px 0 rgb(0 0 0 / 10%);
    width: 320px;
    padding: 30px 60px;" class="go-tabs bg-white tabs__controls d-flex justify-center sm:justify-start js-tabs-controls">
                            <?php if($service_types): ?>
                                <?php $allServices = get_bookable_services(); $number = 0; ?>
                                <?php $__currentLoopData = $service_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $service_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if(empty($allServices[$service_type])) continue;
                                        $service = $allServices[$service_type];
                                    ?>
                                    <div class="" style="width:72px; color:orange;">
                                        <div class="image-wrapper-go">
                                            <img style="width:52px" src="<?php echo e($index == 0 ? asset('/images/hotels.png') : asset('/images/ap.png')); ?>"/>
                                        </div>
                                        <button class="w-100 tabs__button text-15 fw-500 text-dark pb-4 js-tabs-button <?php if($number==0): ?> is-tab-el-active <?php endif; ?>" data-tab-target=".-tab-item-<?php echo e($service_type); ?>" style="color: orange;">
                                            <?php echo e($service::getModelName()); ?>

                                        </button>
                                    </div>
                                    
                                    <?php $number++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                                    
                        </div>
                    </center>
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
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Template/Views/frontend/blocks/form-search-all-service/style-normal.blade.php ENDPATH**/ ?>