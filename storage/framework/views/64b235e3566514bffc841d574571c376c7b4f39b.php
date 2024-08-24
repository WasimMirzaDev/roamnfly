<?php if(!empty($row['ad']['adr'])): ?>
    <section class="pb-40">
        <div class="<?php echo e($class_container ?? "container"); ?>">
            <h3 class="text-22 fw-500 mb-10"><?php echo e(__('Where you’ll be')); ?></h3>
            <div class="mb-20"><?php echo e($row['ad']['adr'] ?? ''); ?></div>
            <?php if($row['gl']['lt'] && $row['gl']['ln']): ?>
                <div class="g-location">
                    <div class="location-map">
                        <div id="map_content" class="map rounded-4 map-500"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Hotel/Views/frontend/layouts/details/map.blade.php ENDPATH**/ ?>