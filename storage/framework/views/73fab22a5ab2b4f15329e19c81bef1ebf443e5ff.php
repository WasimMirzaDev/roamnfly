<?php switch($style ?? ''):
    case ('style2'): ?> <?php echo $__env->make("Template::frontend.blocks.offer-block.style2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php break; ?>
    <?php default: ?> <?php echo $__env->make("Template::frontend.blocks.offer-block.style1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endswitch; ?>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Template/Views/frontend/blocks/offer-block/index.blade.php ENDPATH**/ ?>