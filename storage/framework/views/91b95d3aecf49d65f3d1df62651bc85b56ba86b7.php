<?php
    $attributes = $row['pt'];
?>
<?php if(!empty($attributes)): ?>
    <div class="g-attributes pb-30">
        <h3 class="text-22 fw-500 pt-40 border-top-light mb-20">Property Type</h3>
        <div class="list-attributes d-flex flex-wrap">
            <div class="item ">
                
                    <i class="icon-check text-blue-1"></i>
                
                <?php echo e(ucwords(strtolower($attributes))); ?>

            </div>
        </div>
    </div>
<?php endif; ?>

<?php
    $attributes = $row['fl'];
?>
<?php if(!empty($attributes)): ?>
    <div class="g-attributes pb-30">
        <h3 class="text-22 fw-500 pt-40 border-top-light mb-20">Facilities / Hotel Service </h3>
        <div class="list-attributes d-flex flex-wrap">
            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item ">
                    
                        <i class="icon-check text-blue-1"></i>
                    
                    <?php echo e($term); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<div class="border-bottom-light"></div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\roamnfly\themes/GoTrip/Hotel/Views/frontend/layouts/details/hotel-attributes.blade.php ENDPATH**/ ?>