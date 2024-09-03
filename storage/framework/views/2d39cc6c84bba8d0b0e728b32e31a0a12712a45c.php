

<div class="row">
    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $onward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?php echo e($index == 0 ? 'active' : ''); ?>" id="home-tab<?php echo e($index); ?>" data-bs-toggle="tab" data-bs-target="#home-tab-pane<?php echo e($index); ?>" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><?php echo e($onward['ONWARD'][0]['sI'][0]['fD']['aI']['name'] .'  Filghts '. count($onward['ONWARD'])); ?></button>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>

      



        

        
    
   
      <div class="tab-content" id="myTabContent">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $onward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="tab-pane fade show <?php echo e($index == 0 ? 'active' : ''); ?>" id="home-tab-pane<?php echo e($index); ?>" role="tabpanel" aria-labelledby="home-tab<?php echo e($index); ?>" tabindex="0">

            <div class="col-lg-12 custom-cards">
                <?php $__currentLoopData = $onward['ONWARD']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12">
                            <?php echo $__env->make('Flight::frontend.layouts.return.search.multi-loop-grid',['wrap_class'=>'item-loop-wrap inner-loop-wrap'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>


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