<?php if($airports = \Modules\Flight\Models\Airport::where('status', 'publish')->get()): ?>
    <div class="searchMenu-loc js-form-dd js-liverSearch item">
        <span class="clear-loc absolute bottom-0 text-12"><i class="icon-close"></i></span>
        <div data-x-dd-click="searchMenu-loc">
            <h4 class="text-15 fw-500 ls-2 lh-16"><?php echo e(__(ucwords(str_replace('_',' ',$inputName)))); ?></h4>
            <div class="text-15 text-light-1 ls-2 lh-16 smart-search">
                <!-- Retrieve the value from the URL or set to an empty string -->
                <input type="hidden" name="<?php echo e($inputName); ?>[]" class="js-search-get-id" value="<?php echo e(Request::query($inputName)[0] ?? ''); ?>">
                <!-- Display the selected airport name or placeholder -->
                <input type="text" autocomplete="off" readonly class="smart-search-location parent_text js-search js-dd-focus" 
                    placeholder="<?php echo e(__('Select ' . ucwords(str_replace('_', ' ', $inputName)))); ?>" 
                    value="<?php echo e($airports->where('code', Request::query($inputName)[0] ?? '')->first()->name ?? ''); ?>">
            </div>
        </div>
        <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
            <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                <div class="y-gap-5 js-results">
                    <?php $__currentLoopData = $airports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option" data-id="<?php echo e($term->code); ?>">
                            <div class="d-flex align-items-center">
                                <div class="fa fa-plane text-light-1 text-20 pt-4"></div>
                                <div class="ml-10">
                                    <div class="text-15 lh-12 fw-500 js-search-option-target"><?php echo e($term->name .' | '. $term->code .' | '. $term->address); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\ADMIN\Documents\projects\roamnfly\themes/GoTrip/Layout/common/search/fields/airport.blade.php ENDPATH**/ ?>