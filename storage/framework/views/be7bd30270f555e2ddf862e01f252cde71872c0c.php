<?php   $lang_local = app()->getLocale() ?>
<div class="booking-review">
    <h4 class="booking-review-title"><?php echo e(__("Your Booking")); ?></h4>
    <div class="booking-review-content">
        
        <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            

            <div class="review-section">
                <div class="service-info">
                    <div>
                        <?php
                            $logo =\Modules\Flight\Services\FlightService::getAirLineLogo($row['code'], true);
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo e(asset('uploads/'.$logo)); ?>" class="img-responsive" alt="<?php echo clean($row['title']); ?>">
                            </div>
                            <div class="col-md-6">
                                <h2 class="service-name">Flight <?php echo e($index + 1); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h3 class="service-name"><?php echo clean($row['title']); ?></h3>
                    </div>
                    <div class="font-weight-medium  mb-3">
                        <p class="mb-1">
                            <?php echo e(__(':from to :to',['from'=>$row['airport_from'],'to'=>$row['airport_to']])); ?>

                        </p>
                        <?php echo e(__(":duration hrs",['duration'=>(number_format($row['duration']/60,2))])); ?>

                    </div>

                    <div class="flex-self-start justify-content-between">
                        <div class="flex-self-start">
                            <div class="mr-2">
                                <i class="icofont-airplane font-size-30 text-primary"></i>
                            </div>
                            <div class="text-lh-sm ml-1">
                                <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0"><?php echo e(\Carbon\Carbon::parse($row['departure_time_html'])->format('H:i')); ?></h6>
                                <span class="font-size-14 font-weight-normal text-gray-1"><?php echo e($row['arrival_date_html']); ?></span>
                            </div>
                        </div>
                        <div class="text-center d-none d-md-block d-lg-none">
                            <div class="mb-1">
                                <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0"><?php echo e(__(":duration hrs",['duration'=>(number_format($row['duration']/60,2))])); ?></h6>
                            </div>
                        </div>
                        <div class="flex-self-start">
                            <div class="mr-2">
                                <i class="d-block rotate-90 icofont-airplane-alt font-size-30 text-primary"></i>
                            </div>
                            <div class="text-lh-sm ml-1">
                                <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0"><?php echo e(\Carbon\Carbon::parse($row['arrival_time_html'])->format('H:i')); ?></h6>
                                <span class="font-size-14 font-weight-normal text-gray-1"><?php echo e($row['arrival_date_html']); ?></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="review-section">
            <ul class="review-list">
                <?php if($booking->start_date): ?>
                    <li>
                        <div class="label"><?php echo e(__("Start Date")); ?></div>
                        <div class="val">
                            <?php echo e(display_date($booking->start_date)); ?>

                        </div>
                    </li>
                    
                    <li>
                        <div class="label"><?php echo e(__("end Date")); ?></div>
                        <div class="val">
                            <?php echo e(display_date($booking->end_date)); ?>

                        </div>
                    </li>
                    
                <?php endif; ?>
                <?php
                    $flight_seat = $booking->getJsonMeta('flight_seat');
                ?>
                <?php if(!empty($flight_seat)): ?>
                    <?php $__currentLoopData = $flight_seat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($type['number'])): ?>
                            <li>
                                <div class="label"><?php echo e(($loop->iteration > 1 ? 'Return ': 'Depart ').$type['seat_type']); ?>:</div>
                                <div class="val">
                                    <?php echo e($type['number']); ?>

                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="review-section total-review">
            <ul class="review-list">
                <?php $flight_seat = $booking->getJsonMeta('flight_seat')?>
                <?php $person_types = $booking->getJsonMeta('person_types') ?>
                <?php if(!empty($flight_seat)): ?>
                    <?php $__currentLoopData = $flight_seat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($type['number'])): ?>
                            <li>
                                <div class="label"><?php echo e(($loop->iteration > 1 ? 'Return ': 'Depart '). $type['seat_type']); ?>: <?php echo e($type['number']); ?> * <?php echo e(format_money($type['price'])); ?></div>
                                <div class="val">
                                    <?php echo e(format_money($type['price'] * $type['number'])); ?>

                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php $extra_price = $booking->getJsonMeta('extra_price') ?>
                <?php if(!empty($extra_price)): ?>
                    <li>
                        <div>
                            <?php echo e(__("Extra Prices:")); ?>

                        </div>
                    </li>
                    <?php $__currentLoopData = $extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="label"><?php echo e($type['name_'.$lang_local] ?? __($type['name'])); ?>:</div>
                            <div class="val">
                                <?php echo e(format_money($type['total'] ?? 0)); ?>

                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php
                    $list_all_fee = [];
                    if(!empty($booking->buyer_fees)){
                        $buyer_fees = json_decode($booking->buyer_fees , true);
                        $list_all_fee = $buyer_fees;
                    }
                    if(!empty($vendor_service_fee = $booking->vendor_service_fee)){
                        $list_all_fee = array_merge($list_all_fee , $vendor_service_fee);
                    }
                ?>
                <?php if(!empty($list_all_fee)): ?>
                    <?php $__currentLoopData = $list_all_fee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $fee_price = $item['price'];
                            if(!empty($item['unit']) and $item['unit'] == "percent"){
                                $fee_price = ( $booking->total_before_fees / 100 ) * $item['price'];
                            }
                        ?>
                        <li>
                            <div class="label">
                                <?php echo e($item['name_'.$lang_local] ?? $item['name']); ?>

                                <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e($item['desc_'.$lang_local] ?? $item['desc']); ?>"></i>
                                <?php if(!empty($item['per_person']) and $item['per_person'] == "on"): ?>
                                    : <?php echo e($booking->total_guests); ?> * <?php echo e(format_money( $fee_price )); ?>

                                <?php endif; ?>
                            </div>
                            <div class="val">
                                <?php if(!empty($item['per_person']) and $item['per_person'] == "on"): ?>
                                    <?php echo e(format_money( $fee_price * $booking->total_guests )); ?>

                                <?php else: ?>
                                    <?php echo e(format_money( $fee_price )); ?>

                                <?php endif; ?>
                            </div>
                        </li>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(!empty($booking->adults) && $booking->adults != null): ?>
                <?php
                    $adultsForarray = json_decode($booking->adults, true);
                ?>
                <?php if(is_array($adultsForarray) && !empty($adultsForarray)): ?>
                Adults :
                <?php $__currentLoopData = $adultsForarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="label">
                        <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top"></i>
                        <?php echo e("Flight ". $index + 1); ?>: <?php echo e(($price)); ?>

                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <li>
                    <div class="label">
                        Adults 
                        <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top"></i>
                            : <?php echo e($booking->adults); ?>

                    </div>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                <?php if(!empty($booking->children) && $booking->children != null): ?>
                <?php
                $childForarray = json_decode($booking->children, true);
            ?>
            <?php if(is_array($childForarray) && !empty($childForarray) ): ?>
            Children :
            <?php $__currentLoopData = $childForarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <div class="label">
                    <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top"></i>
                    <?php echo e("Flight ". $index + 1); ?> : <?php echo e(($price)); ?>

                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <li>
                <div class="label">
                    Children
                        <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top"></i>
                            : <?php echo e($booking->children); ?>

                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>


                    <?php if(!empty($booking->infants) && $booking->infants != null): ?>
                    <?php
                    $InfantsForarray = json_decode($booking->infants, true);
                ?>
                <?php if(is_array($InfantsForarray) && !empty($InfantsForarray)): ?>
                Infants :
                <?php $__currentLoopData = $InfantsForarray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="label">
                        <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top"></i>
                        <?php echo e("Flight ". $index + 1); ?> : <?php echo e(($price)); ?>

                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <li>
                <div class="label">
                    Infants
                        <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top"></i>
                            : <?php echo e($booking->infants); ?>

                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>

                <?php if ($__env->exists('Coupon::frontend/booking/checkout-coupon')) echo $__env->make('Coupon::frontend/booking/checkout-coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(!empty($booking->each_flight_price) && $booking->each_flight_price != null): ?>
                <?php
                    $each_flight_price = json_decode($booking->each_flight_price, true);
                ?>
                <?php if(is_array($each_flight_price) && !empty($each_flight_price)): ?>
                <?php $__currentLoopData = $each_flight_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                Total for flight <?php echo e($index + 1); ?> 
                        : <?php echo e(format_money($price)); ?>

                        <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php endif; ?>
                <li class="final-total d-block">
                    <div class="d-flex justify-content-between">
                        <div class="label"><?php echo e(__("Total:")); ?></div>
                        <div class="val"><?php echo e(format_money($booking->total)); ?></div>
                    </div>
                    <?php if($booking->status !='draft'): ?>
                        <div class="d-flex justify-content-between">
                            <div class="label"><?php echo e(__("Paid:")); ?></div>
                            <div class="val"><?php echo e(format_money($booking->paid)); ?></div>
                        </div>
                        <?php if($booking->paid < $booking->total ): ?>
                            <div class="d-flex justify-content-between">
                                <div class="label"><?php echo e(__("Remain:")); ?></div>
                                <div class="val"><?php echo e(format_money($booking->total - $booking->paid)); ?></div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </li>
                <?php echo $__env->make('Booking::frontend/booking/checkout-deposit-amount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </div>
    </div>
</div><?php /**PATH C:\Users\ADMIN\Documents\projects\roamnfly\themes/Base/Flight/Views/frontend/booking/multiFlightDetail.blade.php ENDPATH**/ ?>