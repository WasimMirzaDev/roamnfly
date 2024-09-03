
                            
                        
                    
            
            
            
        




<div class="py-30 px-30 bg-white rounded-4 base-tr mt-30 <?php echo e($wrap_class ?? ''); ?>" data-x="flight-item-<?php echo e($row['sI'][0]['id'] ?? ''); ?>" data-x-toggle="shadow-<?php echo e($row['sI'][0]['id'] ?? ''); ?>">
    <div class="row justify-content-between">
        <div class="col-7">
            <div class="row y-gap-10 items-center" style="gap: 35px;">
                <div class="col-sm-auto col-3 d-flex align-items-center">
                    <div class="has-skeleton">
                        <?php
                            $logo = isset($row['sI'][0]['fD']['aI']['code'])
                                ? \Modules\Flight\Services\FlightService::getAirLineLogo($row['sI'][0]['fD']['aI']['code'], true)
                                : 'default-logo.png';
                        ?>
                        <img class="size-40" src="<?php echo e(asset('images/a.png')); ?>" alt="<?php echo e($row['sI'][0]['fD']['aI']['name'] ?? 'Airline'); ?>">
                    </div>
                    <div class="content-wrapper px-2">
                        <div class="h3-heading">
                            IndiGo
                        </div>
                        <span style="font-size: 12px;">
                            6E716B,6E1431
                        </span>
                    </div>
                </div>
                <div class="col p-0">
                    <div class="row x-gap-20 items-end">
                        <div class="col-auto">
                            <div class="has-skeleton">
                                <div class="lh-15 fw-500"><?php echo e(isset($row['sI'][0]['dt']) ? \Carbon\Carbon::parse($row['sI'][0]['dt'])->format('H:i') : '19:30'); ?></div>
                                <div class="text-15 lh-15 text-light-1" style="width: 120px; text-overflow: ellipsis; overflow: hidden; "><?php echo e($row['sI'][0]['da']['name'] ?? 'Indore'); ?></div>
                            </div>
                        </div>

                        <div class="col text-center">
                            <div class="col-md-auto">
                                <div class="text-15 text-light-1 px-20 md:px-0 has-skeleton"><?php echo e(isset($row['sI'][0]['duration']) ? number_format($row['sI'][0]['duration']/60,2).'h' : 'Duration N/A'); ?></div>
                            </div>
                            <div class="flightLine">
                                <div></div>
                                <div></div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="has-skeleton">
                                <div class="lh-15 fw-500"><?php echo e(isset($row['sI'][0]['at']) ? \Carbon\Carbon::parse($row['sI'][0]['at'])->format('H:i') : '21:00'); ?></div>
                                <div class="text-15 lh-15 text-light-1"><?php echo e($row['sI'][0]['aa']['name'] ?? 'Abu Dubai'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
        <div class="col-md-auto col-5">
            <div class="has-skeleton">
                <div class="d-flex items-center h-full justify-content-between">
                    

                    <div class="btn-flight-content d-flex ">
                        <?php
                        $index;
                        // print_r($index);
                        $publishedPrices = collect($row['totalPriceList'] ?? [])->filter(function($price) {
                            return $price['fareIdentifier'] === 'PUBLISHED';
                        })->values()->all();
                        $publishedPrice = $publishedPrices[0]['fd']['ADULT']['fC']['TF'] ?? ($row['totalPriceList'][0]['fd']['ADULT']['fC']['TF'] ?? 0);
                        $publishedPriceId = $publishedPrices[0]['id'] ?? ($row['totalPriceList'][0]['id'] ?? 0);
                    ?>
                    <div class="text-right md:text-left mb-10">
                        <div class="text-18 lh-16 fw-500"><?php echo e(format_money($publishedPrice ?? '30000')); ?></div>
                        <div class="text-15 lh-16 text-light-1"><?php echo e(__('avg/person')); ?></div>
                    </div>
                    <div class="accordion__button mx-4">
                        
                            <a data-id="<?php echo e($publishedPriceId ?? 'awojdioawjdi'); ?>" data-index="<?php echo e($index ?? '1'); ?>" href="" onclick="event.preventDefault()" class="button -dark-1 px-30 h-50 bg-blue-1 text-white btn-Select-flight btn-flight-link"  style=" background: transparent !important;
    color: #ff624d;
    border: 1px solid #ff624d;
    border-radius: 25px;"  onmouseover="this.style.backgroundColor='blue';"><?php echo e(__("Select Flight")); ?> <div class="icon-arrow-top-right ml-15"></div></a>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card w-100 shadow-hover-3 mb-4 d-none">
    <a href="#" class="d-block mb-0 mx-1 mt-1 p-3" tabindex="0">
        <img class="card-img-top" src="" alt="<?php echo e($row['sI'][0]['fD']['aI']['name'] ?? 'Airline'); ?>">
    </a>
    <div class="card-body px-3 pt-0 pb-3 my-0 mx-1">
        <div class="row">
            <div class="col-7">
                <a href="#" class="card-title text-dark font-size-17 font-weight-bold" tabindex="0"><?php echo e($row['sI'][0]['da']['name'] ?? 'Destination'); ?></a>
            </div>
            <div class="col-5">
                <div class="text-right">
                    <h6 class="font-weight-bold font-size-17 text-gray-3 mb-0"><?php echo e(format_money($publishedPrice ?? '4000')); ?></h6>
                    <span class="font-weight-normal font-size-12 d-block text-color-1"><?php echo e(__('avg/person')); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="border-bottom pb-3 mb-3">
            <div class="px-3">
                <div class="d-flex mx-1">
                    <i class="icofont-airplane font-size-30 text-primary mr-3"></i>
                    <div class="d-flex flex-column">
                        <span class="font-weight-normal text-gray-5"><?php echo e(__('Take off')); ?></span>
                        <span class="font-size-14 text-gray-1"><?php echo e(isset($row['sI'][0]['dt']) ? \Carbon\Carbon::parse($row['sI'][0]['dt'])->format('H:i A') : 'N/A'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom pb-3 mb-3">
            <div class="px-3">
                <div class="d-flex mx-1">
                    <i class="d-block rotate-90 icofont-airplane-alt font-size-30 text-primary mr-3"></i>
                    <div class="d-flex flex-column">
                        <span class="font-weight-normal text-gray-5"><?php echo e(__('Landing')); ?></span>
                        <span class="font-size-14 text-gray-1"><?php echo e(isset($row['sI'][0]['at']) ? \Carbon\Carbon::parse($row['sI'][0]['at'])->format('H:i A') : 'N/A'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center pl-3 pr-3">
            
            
            <a @click="SelectedPriceID('<?php echo e($publishedPriceId  ?? 'awdjiawda'); ?>')" href="" onclick="event.preventDefault()" class="btn btn-primary text-white btn-choose w-100"><?php echo e(__("Select flight")); ?></a>
            
        </div>
    </div>
</div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Flight/Views/frontend/layouts/return/search/multi-loop-grid.blade.php ENDPATH**/ ?>