<section class="pt-40 g-gallery">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="galleryGrid -type-1 relative">
                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key > 4): ?> <?php continue; ?> <?php endif; ?>
                        <div class="galleryGrid__item">
                            
                                <img src="<?php echo e($item['url']); ?>" alt="<?php echo e(__("Gallery")); ?>" class="rounded-4">
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="absolute h-full col-12 z-2 px-20 py-20 d-flex justify-end items-end gotrip-banner">
                        
                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 0): ?>
                                <a href="<?php echo e($item['url']); ?>" class="button -blue-1 px-24 py-15 bg-white text-dark-1 js-gallery" data-gallery="gallery2">
                                    <?php echo e(__('See All :count Photos',['count'=>count($galleries)])); ?>

                                </a>
                            <?php else: ?>
                                <a href="<?php echo e($item['url']); ?>" class="js-gallery" data-gallery="gallery2"></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="video_popup_modal">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u510181259/domains/roamnfly.com/public_html/themes/GoTrip/Hotel/Views/frontend/layouts/details/gallery2.blade.php ENDPATH**/ ?>