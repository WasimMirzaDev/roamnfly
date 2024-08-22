<?php if(!empty($attr) and !empty($attr = \Modules\Core\Models\Attributes::where('slug',$attr)->first())): ?>
    <div class="searchMenu-loc js-form-dd js-liverSearch item">
        <span class="clear-loc absolute bottom-0 text-12"><i class="icon-close"></i></span>
        <div data-x-dd-click="searchMenu-loc">
            <h4 class="text-15 fw-500 ls-2 lh-16"><?php echo e($attr->name); ?></h4>
            <div class="text-15 text-light-1 ls-2 lh-16 smart-search">
                <input type="hidden" id="<?php echo e($inputName); ?>" name="<?php echo e($inputName); ?>" class="js-search-get-id" value="">
                <input type="text" autocomplete="off" readonly class="smart-search-location parent_text js-search js-dd-focus" placeholder="<?php echo e(__("Select Type")); ?>" value="">
            </div>
        </div>
        <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
            <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                <div class="y-gap-5 js-results">
                    <?php $__currentLoopData = $attr->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $translate = $term->translate();
                        ?>
                        <div class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option getMultiRow" data-id="<?php echo e($translate->name); ?>">
                            <div class="d-flex align-items-center">
                                <div class="<?php echo e($term->icon); ?> text-light-1 text-20 pt-4"></div>
                                <div class="ml-10">
                                    <div class="text-15 lh-12 fw-500 js-search-option-target"><?php echo e($translate->name); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/u510181259/domains/roamnfly.com/public_html/themes/GoTrip/Layout/common/search/fields/customAttr.blade.php ENDPATH**/ ?>