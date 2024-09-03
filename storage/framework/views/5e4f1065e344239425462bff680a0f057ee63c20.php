<?php
    $style = $style ?? 'default';
    $classes =
        ' form-search-all-service mainSearch -col-5 border-light rounded-4 pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 mt-15';
    $button_classes = ' -dark-1 py-15 col-12 bg-blue-1 text-white w-100 rounded-4';
    if ($style == 'sidebar') {
        $classes = ' form-search-sidebar';
        $button_classes = ' -dark-1 py-15 col-12 bg-blue-1 h-60 text-white w-100 rounded-4';
    }
    if ($style == 'normal') {
        $classes =
            ' px-20 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-100 form-search-all-service mainSearch -w-900 bg-white';
        $button_classes = ' -dark-1 py-15 h-60 col-12 rounded-100 bg-blue-1 text-white w-100';
    }
    if ($style == 'normal2') {
        $classes = 'mainSearch bg-white pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 shadow-1';
        $button_classes = ' -dark-1 py-15 h-60 col-12 rounded-100 bg-blue-1 text-white w-100';
    }
    if ($style == 'carousel_v2') {
        $classes = ' w-100';
        $button_classes = ' -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-yellow-1 text-dark-1';
    }
    if ($style == 'flightCarousel') {
        $classes = ' w-100';
        $button_classes = ' -dark-1 py-15 col-12 bg-blue-1 h-60 text-white w-100 rounded-4';
    }
?>
<form  action="<?php echo e(route('flight.search')); ?>"
class="gotrip_form_search bravo_form_search bravo_form form <?php echo e($classes); ?>" method="get">

    <?php
        $flight_search_fields = setting_item_array('flight_search_fields');
        // dd($flight_search_fields);
        $flight_search_fields = array_values(
            \Illuminate\Support\Arr::sort($flight_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }),
        );

        $travelType = request('travel_type');
        $fromWhere = request('from_where', []);
        $toWhere = request('to_where', []);
        $dateRange = request('date');
        $SeatTypee = request('seat_type', []);
    ?>

    <script>
        // Define initialData variable globally
        window.initialData = {
            adults: <?php echo e(Request::query('seat_type')['adults'] ?? 0); ?>,
            children: <?php echo e(Request::query('seat_type')['children'] ?? 0); ?>,
            infants: <?php echo e(Request::query('seat_type')['infants'] ?? 0); ?>,
            flight_seat: []
        };
        console.log(window.initialData);
    </script>
<Style>
.bravo_wrap .form-search-all-service .tabs__pane.-tab-item-flight .bravo_form  {
    max-width: 100% !important;
    width: 100%;
    padding: 95px 0px 6rem 0px !important;
}
    .gotrip_form_search {
    padding: 1rem 0 !important;
display: block !important;
height: auto !important;
}
.adjust-border {
    height: 120px !important;
}
.hotel-heading{
text-align: center;
color: #8f8f8f;
font-weight: 500;
font-size: 20px;
}
.smart-search-location,
.js-first-date,
.js-last-date,
.render .adults,
.render .children,
.render{
font-size: 16px !important; 
color: #d1d1d1;
}
.bravo_wrap .gotrip_form_search .field-items > .row > div{
padding: 8px 9px 0 !important;

}
.field-items h4{
font-size: 14px !important;

}
.field-items .row{
    height: 100% !important;
}

.searchMenu-loc__field > div{
    
     position: fixed !important;
     box-shadow: 0 10px 10px #dfd6d6
    
}


.header-row{
    
}
.check-in-out-render{
    & span{

        font-size: 15px !important;
    }
}
</Style>
<style>

    .col-lg-2{
        & button{
            position: relative;
    top: 20px;
    left: 5px;
    padding: 5px 10px;
        }
    }

    /* .bravo_wrap .gotrip_form_search .field-items:nth-child(1){
        padding: 65px 20px 20px;
    } */
    .bravo_wrap .bravo_search_flight .bravo_form_search {
        display: flex;
    justify-content: space-between;
    align-items: start;

    }
    .tabs.-underline .tabs__controls .tabs__button::after{
        background-color: orange;
    }
.button-city-add{
    background: transparent !important;
    color: orange;
    border: 1px solid orange;
    border-radius: 4px;
    padding: 20px !important;
    margin-top: 10px
}
.gotrip_form_search{
    padding: 0px !important;
    border: none !important;

}
.border-light {
border: none;
}
.field-items{
    padding-top: 10px !important;
    .row{
        /* background: hsla(0, 0%, 100%, .1) !important;  */
        color: white;
        gap: 10px !important;
        .col-lg-2,
        .col-lg-3,
        .col-lg-1{
        background: hsla(0, 0%, 100%, .1) !important;
        border-radius: 4px !important;
        }
    }
}

.bravo_search_flight{
    background-color:  #041422 !important;
}
#search-title{
    display: none;
}

.header-row{
    gap: 10px !important;
    background: none;
    .col-lg-2,
    .col-lg-3{
    background: hsla(0, 0%, 100%, .1) !important;
        border-right: none !important;
        border-radius: 4px ;
    }
}
.js-search::placeholder{
    color: #d1d1d1 !important;
}

#multiCityDiv1,
#multiCityDiv2,
#multiCityDiv3,
#multiCityDiv4,
#multiCityDiv5{
    margin: 0 !important;
    max-width: 1181px !important;
    border: none !important;
}
.button-city-add{
    margin: 0 !important;
    top: 2px !important;
    left: 0 !important;
}
.trip-heading{
    & h4{
        padding: 13.5px 10px
    }
}

.last-tab{
    position: fixed !important;
    color: black;
    .row{
        color: orange;
    }
}
</style>

<script>
  if (window.location.pathname === '/flight') {
    document.styleSheets[0].addRule('.bravo_wrap .bravo_search_flight .bravo_form_search', 'margin-top: 10px !important;');
    document.styleSheets[0].addRule('.bravo_wrap .gotrip_form_search .field-items:nth-child(1)', 'padding: 20px 20px 20px !important');
  }
</script>


    
                
                        <!-- Retrieve value from URL or set to empty -->
                        
                        <!-- Display selected term name or placeholder -->
                        






            <div class="row field-items">
                <div class="col-lg-11">
                    <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0 adjust-border header-row" style="color: orange; ">
                        <style>
                        .js-results{
                               display: block !important;
                           }
                       </style>
                       
                       
                       <?php $attr = "travel-type";
                       $inputName = "travel_type";
                       ?>
                    <div class="col-lg-2 align-self-center px-10 lg:py-5 lg:px-0 ">
                       <?php if(!empty($attr) and !empty($attr = \Modules\Core\Models\Attributes::where('slug', $attr)->first())): ?>
                           <div class="searchMenu-loc js-form-dd js-liverSearch item">
                               <span class="clear-loc absolute bottom-0 text-12"><i class="icon-close"></i></span>
                               <div data-x-dd-click="searchMenu-loc">
                                   <h4 class="text-15 fw-500 ls-2 lh-16"><?php echo e($attr->name); ?></h4>
                                   <div class="text-15 text-light-1 ls-2 lh-16 smart-search">
                                       <!-- Retrieve value from URL or set to empty -->
                                       <input type="hidden" id="<?php echo e($inputName); ?>" name="<?php echo e($inputName); ?>" class="js-search-get-id" value="<?php echo e(Request::query($inputName) ?? ''); ?>">
                                       <!-- Display selected term name or placeholder -->
                                       <input type="text" autocomplete="off" readonly class="smart-search-location parent_text js-search js-dd-focus" 
                                           placeholder="<?php echo e(__('Select Type')); ?>" 
                                           value="<?php echo e(optional($attr->terms->where('name', Request::query($inputName))->first())->name ?? ''); ?>">
                                   </div>            
                               </div>
                               <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                                   <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                                       <div class="y-gap-5 js-results">
                                           <?php $__currentLoopData = $attr->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php $translate = $term->translate(); ?>
                                               <div class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option getMultiRow" data-id="<?php echo e($translate->name); ?>">
                                                   <div class="d-flex align-items-center">
                                                       <div class="<?php echo e($term->icon); ?> text-light-1 text-20 pt-4"></div>
                                                       <div class="ml-10">
                                                           <div class="text-15 lh-12 fw-500 js-search-option-target"><?php echo e($translate->name); ?></div>
                                                       </div>
                                                   </div>
                                               </div>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       <?php endif; ?>
                    </div>
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-<?php echo e($index == 1 ||  $index == 0 || $index == 3 || $index == 4 ? '2':'3'); ?> align-self-center px-10 lg:py-5 lg:px-0" style="<?php echo e($index == 3 ? 'white-space:nowrap;': ''); ?>">
                                <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>


                                <?php switch($field['field']):

                                    case ('date'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>

                                    <?php case ('seat_type'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.seat_type', [
                                            'SeatTypee' => $SeatTypee,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>

                                    <?php case ('from_where'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.airport', [
                                            'inputName' => 'from_where',
                                            'fromWhere' => $fromWhere,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>

                                    <?php case ('to_where'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                            'toWhere' => $toWhere,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>
                                <?php endswitch; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                <?php endif; ?>
                </div>
             <div class="col-lg-1 p-0">

                 <div class="button-item">
                     <button class="mainSearch__submit button <?php echo e($button_classes); ?>" id="flightSearch" type="submit">
                         <i class="icon-search text-20 mr-10"></i>
                         <span class="text-search"><?php echo e(__('SEARCH')); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Repeat for multiCityDiv1 -->
        <div class="col-md-12 mt-2 d-none" id="multiCityDiv1" style="border: 1px solid #e7e7e7; border-radius:10px; margin:0px 31px; width:auto !important;">
            
            <div class="field-items d-block" style="padding: 0px; margin:0px !important;">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <div class="col-lg-2 align-self-center px-10 lg:py-5 lg:px-0 trip-heading">
                            <h4>Trip 2</h4>
                        </div>
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($index == 1 ||  $index == 0 || $index == 3 || $index == 4 ? '2':'3'); ?> align-self-center px-10 lg:py-5 lg:px-0">
                                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                                    <?php switch($field['field']):
                                        case ('date'): ?>
                                            <?php echo $__env->make('Layout::common.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php break; ?>

                                        <?php case ('from_where'): ?>
                                            <?php echo $__env->make('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                                'fromWhere' => $fromWhere,
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php break; ?>
                                        <?php case ('to_where'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                            'toWhere' => $toWhere,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 m-0 p-0">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity button-city-add">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 mt-2 d-none" id="multiCityDiv2" style="    border: 1px solid #e7e7e7; border-radius:10px; margin:0px 31px; width:auto !important;">
            
            <div class="field-items d-block" style="padding: 0px; margin:0px !important;">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <div class="col-lg-2 align-self-center px-10 lg:py-5 lg:px-0 trip-heading">
                            <h4>Trip 3</h4>
                        </div>
                    <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($index == 1 ||  $index == 0 || $index == 3 || $index == 4 ? '2':'3'); ?> align-self-center px-10 lg:py-5 lg:px-0">
                                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                                    <?php switch($field['field']):
                                    case ('date'): ?>
                                    <?php echo $__env->make('Layout::common.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                                        
                                        <?php case ('from_where'): ?>
                                            <?php echo $__env->make('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php break; ?>
                                        <?php case ('to_where'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity button-city-add">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 mt-2 d-none" id="multiCityDiv3" style="    border: 1px solid #e7e7e7; border-radius:10px; margin:0px 31px; width:auto !important;">
            
            <div class="field-items d-block" style="padding: 0px; margin:0px !important;">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <div class="col-lg-2 align-self-center px-10 lg:py-5 lg:px-0 trip-heading">
                            <h4>Trip 3</h4>
                        </div>
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($index == 1 ||  $index == 0 || $index == 3 || $index == 4  ? '2':'3'); ?> align-self-center px-10 lg:py-5 lg:px-0">
                                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                                    <?php switch($field['field']):
                                    case ('date'): ?>
                                    <?php echo $__env->make('Layout::common.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                                        
                                        <?php case ('from_where'): ?>
                                            <?php echo $__env->make('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php break; ?>
                                        <?php case ('to_where'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity button-city-add">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 mt-2 d-none" id="multiCityDiv4" style="    border: 1px solid #e7e7e7; border-radius:10px; margin:0px 31px; width:auto !important;">
            
            <div class="field-items d-block" style="padding: 0px; margin:0px !important;">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <div class="col-lg-2 align-self-center px-10 lg:py-5 lg:px-0 trip-heading">
                            <h4>Trip 4</h4>
                        </div>
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($index == 1 ||  $index == 0 || $index == 3 || $index == 4  ? '2':'3'); ?> align-self-center px-10 lg:py-5 lg:px-0">
                                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                                    <?php switch($field['field']):
                                    case ('date'): ?>
                                    <?php echo $__env->make('Layout::common.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                                        
                                        <?php case ('from_where'): ?>
                                            <?php echo $__env->make('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php break; ?>
                                        <?php case ('to_where'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity button-city-add">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 mt-2 d-none" id="multiCityDiv5" style="    border: 1px solid #e7e7e7; border-radius:10px; margin:0px 31px; width:auto !important;">
            
            <div class="field-items d-block" style="padding: 0px; margin:0px !important;">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <div class="col-lg-2 align-self-center px-10 lg:py-5 lg:px-0 trip-heading">
                            <h4>Trip 5</h4>
                        </div>
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=> $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($index == 1 ||  $index == 0 || $index == 3 || $index == 4  ? '2':'3'); ?> align-self-center px-10 lg:py-5 lg:px-0">
                                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                                    <?php switch($field['field']):
                                    case ('date'): ?>
                                    <?php echo $__env->make('Layout::common.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                                        
                                        <?php case ('from_where'): ?>
                                            <?php echo $__env->make('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php break; ?>
                                        <?php case ('to_where'): ?>
                                        <?php echo $__env->make('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php break; ?>
                                    <?php endswitch; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2">
                            <button type="button" 
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity button-city-add">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>


    <input type="hidden" id="cityCount" value="1">
</form>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Flight/Views/frontend/layouts/search/form-return-search.blade.php ENDPATH**/ ?>