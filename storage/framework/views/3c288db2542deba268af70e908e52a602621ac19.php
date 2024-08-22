<div class="g-rules border-bottom-light mt-40 pb-50">
    <h3 class="text-22 fw-500"><?php echo e(__("Hotel Rules - Policies")); ?></h3>
    <div class="description pt-10">
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check In")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value">	12:00AM </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="key"><?php echo e(__("Check Out")); ?></div>
            </div>
            <div class="col-lg-8">
                <div class="value">	11:00AM </div>
            </div>
        </div>
        <?php if(isset($row['inst'])): ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="key"><?php echo e(__("Hotel Policies")); ?></div>
                </div>
                <div class="col-lg-8">
                    <?php $__currentLoopData = $row['inst']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item <?php if($key > 1): ?> d-none <?php endif; ?>">
                            <div class="strong fw-500"><?php echo e(str_replace('_',' ',$item['type'])); ?></div>
                            <div class="context">
                                <?php $__currentLoopData = json_decode($item['msg']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $item; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if( count($row['inst']) > 2): ?>
                        <div class="btn-show-all text-blue-1 fw-500">
                            <span class="text"><?php echo e(__("Show All")); ?></span>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u510181259/domains/roamnfly.com/public_html/themes/GoTrip/Hotel/Views/frontend/layouts/details/hotel-rules-policy.blade.php ENDPATH**/ ?>