<?php
$minValue = 0;
?>
<div class="clicked-class searchMenu-guests js-form-dd form-select-seat-type item">
    <div data-x-dd-click="searchMenu-guests" class="overflow-hidden seat-input">
        <h4 class="text-15 fw-500 ls-2 lh-16"><?php echo e($field['title']); ?></h4>

        <div class="text-15 text-light-1 ls-2 lh-16">
            <?php
                $seatTypeGet = request()->query('seat_type', []);
                $adults = $seatTypeGet['adults'] ?? $minValue;
                $children = $seatTypeGet['children'] ?? $minValue;
                $infants = $seatTypeGet['infants'] ?? $minValue;
                $seatClass = $seatTypeGet['class'] ?? $minValue; // Fetch the seat class
            ?>
            <div class="render text-13" id="renderTravellerCount">
                <?php echo e($adults); ?> Adults <?php echo e($children); ?> Child <?php echo e($infants); ?> Infant
            </div>
        </div>
    </div>
    <div class=" searchMenu-guests__field select-seat-type-dropdown shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
        <div class="bg-white px-30 py-30 rounded-4 last-tab" >
            <div class="row y-gap-10 justify-between items-center">
                
                <div class="col-auto">
                    <div class="text-15 fw-500"><?php echo e(__('Adults')); ?></div>
                </div>
                <?php
                    $inputName = 'seat_type_adults';
                    $inputValue = $adults;
                ?>
                <div class="col-auto">
                    <div class="d-flex items-center">
                        <span class="button -outline-blue-1 text-blue-1 size-38 rounded-4 btn-minus resetCountTravellers" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon-minus text-12"></i></span>
                        <span class="flex-center size-20 ml-15 mr-15 count-display">
                            <input class="countTravellers adult" id="<?php echo e($inputName); ?>" type="number" name="seat_type[adults]" value="<?php echo e($inputValue); ?>" min="<?php echo e($minValue); ?>">
                        </span>
                        <span class="button -outline-blue-1 text-blue-1 size-38 rounded-4 btn-add resetCountTravellers" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon-plus text-12"></i></span>
                    </div>
                </div>
            </div>
            
            <div class="row y-gap-10 justify-between items-center">
                <div class="col-auto">
                    <div class="text-15 fw-500"><?php echo e(__('Children')); ?></div>
                </div>
                <?php
                    $inputName = 'seat_type_children';
                    $inputValue = $children;
                ?>
                <div class="col-auto">
                    <div class="d-flex items-center">
                        <span class="button -outline-blue-1 text-blue-1 size-38 rounded-4 btn-minus resetCountTravellers" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon-minus text-12"></i></span>
                        <span class="flex-center size-20 ml-15 mr-15 count-display">
                            <input class="countTravellers children" id="<?php echo e($inputName); ?>" type="number" name="seat_type[children]" value="<?php echo e($inputValue); ?>" min="<?php echo e($minValue); ?>">
                        </span>
                        <span class="button -outline-blue-1 text-blue-1 size-38 rounded-4 btn-add resetCountTravellers" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon-plus text-12"></i></span>
                    </div>
                </div>
            </div>
            
            <div class="row y-gap-10 justify-between items-center">
                <div class="col-auto">
                    <div class="text-15 fw-500"><?php echo e(__('Infants')); ?></div>
                </div>
                <?php
                    $inputName = 'seat_type_infants';
                    $inputValue = $infants;
                ?>
                <div class="col-auto">
                    <div class="d-flex items-center">
                        <span class="button -outline-blue-1 text-blue-1 size-38 rounded-4 btn-minus resetCountTravellers" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon-minus text-12"></i></span>
                        <span class="flex-center size-20 ml-15 mr-15 count-display">
                            <input class="countTravellers infant" id="<?php echo e($inputName); ?>" type="number" name="seat_type[infants]" value="<?php echo e($inputValue); ?>" min="<?php echo e($minValue); ?>">
                        </span>
                        <span class="button -outline-blue-1 text-blue-1 size-38 rounded-4 btn-add resetCountTravellers" data-input="<?php echo e($inputName); ?>" data-input-attr="id"><i class="icon-plus text-12"></i></span>
                    </div>
                </div>
            </div>

            <div class="row y-gap-10">
                <?php $__currentLoopData = $seatType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $inputName = 'seat_type_'.$type->code;
                        $inputValue = $seatTypeGet[$type->code] ?? $minValue;
                    ?>

                    <div class="col-1">
                        <input style="width:auto;" data-name="<?php echo e(__($type->name)); ?>" class="form-check-input countTravellers class" type="radio" name="seat_type[class]" value="<?php echo e($type->code); ?>" id="seatType<?php echo e($type->code); ?>" <?php echo e($seatClass == $type->code ? 'checked' : ''); ?>>
                    </div>
                    <div class="col-5">
                        <label class="form-check-label" for="seatType<?php echo e($type->code); ?>">
                            <?php echo e(__($type->name)); ?>

                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Layout/common/search/fields/seat_type.blade.php ENDPATH**/ ?>