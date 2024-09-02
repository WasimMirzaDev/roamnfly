<div class="bravo-list-item">
    <div class="row y-gap-10 justify-between items-center">
        <div class="col-auto">
            <div class="text-18">
                <span class="fw-500 result-count">
                    <?php if($rows->total() > 1): ?>
                        <?php echo e(__(":count flights found",['count'=>$rows->total()])); ?>

                    <?php else: ?>
                        <?php echo e(__(":count flight found",['count'=>$rows->total()])); ?>

                    <?php endif; ?>
                </span>
            </div>
        </div>

        <div class="col-auto bc-form-order">
            <?php echo $__env->make('Layout::global.search.orderby',['routeName'=>'flight.search','hidden_map_button'=>1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="ajax-search-result" id="flightFormBook">
        <?php echo $__env->make('Flight::frontend.ajax.search-result',[ 'type'=> 'return'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Flight/Views/frontend/layouts/return/search/list-item.blade.php ENDPATH**/ ?>