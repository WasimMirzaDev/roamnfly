
<div class="row x-gap-20 y-gap-20 <?php echo e($wrap_class ?? ''); ?>">
    <div class="col-md-auto">
        <div class="has-skeleton">
            <div class="cardImage ratio ratio-1:1 w-250 md:w-1/1 rounded-4">
                <div class="cardImage__content">
                    <a href="<?php echo e(\Modules\Hotel\Services\HotelService::getDetailUrl($row['id'])); ?>">
                        <?php if(isset($row['img'][0]['url'])): ?>
                            
                                <img  src="<?php echo e($row['img'][0]['url'] ?? ''); ?>" class="rounded-4 col-12 js-lazy" alt="<?php echo e($translation->title ?? 'image'); ?>">
                            
                        <?php endif; ?>
                    </a>
                </div>
                <div class="service-wishlist" data-id="<?php echo e($row['id']); ?>" data-type="<?php echo e($row['pt']); ?>">
                    <div class="cardImage__wishlist">
                        <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                            <i class="icon-heart text-12"></i>
                        </button>
                    </div>
                </div>
                <div class="cardImage__leftBadge">
                    
                        
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="d-flex flex-column h-full justify-between">
            <div class="has-skeleton">
                <?php if(!empty($row['ad']['adr'])): ?>
                    <?php $location =  $row['ad']['adr'] ?>
                <?php endif; ?>
                <h3 class="text-18 lh-16 fw-500">
                    <a href="<?php echo e(\Modules\Hotel\Services\HotelService::getDetailUrl($row['id'])); ?>"><?php echo e($row['name']); ?></a>
                    <?php if(isset($row['rt'])): ?>
                        <div class="star-rate d-inline-block ml-10">
                            <?php for($star = 1 ;$star <= $row['rt'] ; $star++): ?>
                                <i class="icon-star text-10 text-yellow-2"></i>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
                </h3>
                <?php if(!empty($location)): ?>
                    <p class="text-14 lh-14 mb-5"><?php echo e($location); ?></p>
                <?php endif; ?>
                <?php if(!empty($row['fl'])): ?>
                    <div class="terms">
                        <div class="g-attributes">
                            <span class="attr-title"><i class="icofont-medal"></i> Facilities: </span>
                            <?php $__currentLoopData = $row['fl']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="item <?php echo e($term); ?> term-<?php echo e($term); ?>"><?php echo e($term); ?></span>
                                <?php if($loop->iteration > 5): ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(!empty($row['fl'])): ?>
                <div class="row x-gap-10 y-gap-10 pt-20">
                    <?php
                        $i=0;
                    ?>
                    <?php $__currentLoopData = $row['fl']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(strlen($term) < 22 && $loop->iteration > 6): ?>
                            <?php
                                $i++;
                            ?>
                            <div class="col-auto">
                                <div class="has-skeleton border-light rounded-100 py-5 px-20 text-14 lh-14"><?php echo e($term); ?></div>
                            </div>
                            <?php if($i == 4): ?>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-auto text-right md:text-left">
        <div class="has-skeleton">
            
            <div class="text-14 text-light-1 mt-40 md:mt-20"><?php echo e(__('From')); ?></div>
            <div class="d-flex justify-content-md-end align-baseline mt-5">
                <div class="text-16 text-red-1 line-through mr-5"></div>
                <div class="text-22 lh-12 fw-600"><?php echo e(format_money($row['ops']['0']['ris'][0]['pis'][0]['fc']['TF'] ?? 0 )); ?></div>
            </div>
            <div class="text-14 text-light-1 mt-5"><?php echo e(__('/night')); ?></div>
            <a href="<?php echo e(\Modules\Hotel\Services\HotelService::getDetailUrl($row['id'])); ?>" class="button -md -dark-1 bg-blue-1 text-white mt-24">
                <?php echo e(__('See Availability')); ?> <div class="icon-arrow-top-right ml-15"></div>
            </a>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Hotel/Views/frontend/layouts/search/loop-list.blade.php ENDPATH**/ ?>