<div class="row">
    
    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $onward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($rows->total() > 0): ?>
    <div class="col-lg-6">
    <?php $__currentLoopData = $onward['ONWARD']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-12">
                <?php echo $__env->make('Flight::frontend.layouts.return.search.multi-loop-grid',['wrap_class'=>'item-loop-wrap inner-loop-wrap'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="col-lg-12">
        <?php echo e(__("Flight not found")); ?>

    </div>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="bravo-pagination">
    <?php echo e($rows->appends(request()->query())->links()); ?>

    <?php if($rows->total() > 0): ?>
        <div class="text-center mt-30 md:mt-10">
            <div class="text-14 text-light-1"><?php echo e(__("Showing :from - :to of :total flights",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Flight/Views/frontend/ajax/multi-search-result.blade.php ENDPATH**/ ?>