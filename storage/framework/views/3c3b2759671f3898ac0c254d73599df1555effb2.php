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
    padding: 6rem 0 !important;
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
font-size: 22px !important; 
}
.bravo_wrap .gotrip_form_search .field-items > .row > div{
padding: 27px 30px 0 !important;
height: 100% !important;

}
.field-items {
height: 120px !important;

}
.field-items h4{
font-size: 17px !important;
}
.field-items .row{
    height: 100% !important;
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

</style>

<script>
  if (window.location.pathname === '/flight') {
    document.styleSheets[0].addRule('.bravo_wrap .bravo_search_flight .bravo_form_search', 'margin-top: 10px !important;');
    document.styleSheets[0].addRule('.bravo_wrap .gotrip_form_search .field-items:nth-child(1)', 'padding: 20px 20px 20px !important');
  }
</script>


    <div class="row w-100" id="multiCityDivContainer">
        <div class="col-md-12">
<?php $attr = "travel-type";
     $inputName = "travel_type";
?>
            <?php if(!empty($attr) and !empty($attr = \Modules\Core\Models\Attributes::where('slug', $attr)->first())): ?>
            <div class="searchMenu-loc js-form-dd js-liverSearch item">
                
                <div data-x-dd-click="searchMenu-loc"  class="d-none">
                    <h4 class="text-15 fw-500 ls-2 lh-16"><?php echo e($attr->name); ?></h4>
                    <div class="text-15 text-light-1 ls-2 lh-16 smart-search">
                        <!-- Retrieve value from URL or set to empty -->
                        <input type="hidden" id="<?php echo e($inputName); ?>" name="<?php echo e($inputName); ?>" class="js-search-get-id" value="<?php echo e(Request::query($inputName) ?? ''); ?>">
                        <!-- Display selected term name or placeholder -->
                        <input type="text"  autocomplete="off" readonly class="smart-search-location parent_text js-search js-dd-focus" 
                            placeholder="<?php echo e(__('Select Type')); ?>" 
                            value="<?php echo e(optional($attr->terms->where('name', Request::query($inputName))->first())->name ?? ''); ?>">
                    </div>            
                </div>
                <div data-x-dd="searchMenu-loc">
                    <div>
                        <div class="y-gap-5 js-results">
                            <div class="d-flex ms-4" style="color: black; font-size:18px;">
                            <?php $__currentLoopData = $attr->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $translate = $term->translate(); ?>
                                <div class=" js-search-option getMultiRow" data-id="<?php echo e($translate->name); ?>">
<div class="d-flex ms-4" style="justify-content: center;" onclick="document.getElementById('<?php echo e($translate->name); ?>').checked = true;">
    <input type="radio" id="<?php echo e($translate->name); ?>" class="me-2" name="travel_type" value="<?php echo e($translate->name); ?>">
    <label for="<?php echo e($translate->name); ?>" style="white-space: nowrap;" class="js-search-option-target"><?php echo e($translate->name); ?></label>
</div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="field-items">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0 adjust-border" style="color: orange;">
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-<?php echo e($field['size']); ?> align-self-center px-10 lg:py-5 lg:px-0">
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
        </div>

        <!-- Repeat for multiCityDiv1 -->
        <div class="col-md-12 d-none" id="multiCityDiv1">
            
            <div class="field-items d-block">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($field['size'] ?? '6'); ?> align-self-center px-10 lg:py-5 lg:px-0">
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
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv2">
            
            <div class="field-items d-block">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($field['size'] ?? '6'); ?> align-self-center px-10 lg:py-5 lg:px-0">
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
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv3">
            
            <div class="field-items d-block">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($field['size'] ?? '6'); ?> align-self-center px-10 lg:py-5 lg:px-0">
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
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv4">
            
            <div class="field-items d-block">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($field['size'] ?? '6'); ?> align-self-center px-10 lg:py-5 lg:px-0">
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
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv5">
            
            <div class="field-items d-block">
                <?php if(!empty($flight_search_fields)): ?>
                    <div class="row w-100 m-0" style="color: orange;">
                        <?php $__currentLoopData = $flight_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($field['field'] != 'travel_type' && $field['field'] != 'seat_type'): ?>
                                <div class="col-lg-<?php echo e($field['size'] ?? '6'); ?> align-self-center px-10 lg:py-5 lg:px-0">
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
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="button-item">
        <button class="mainSearch__submit button <?php echo e($button_classes); ?>" id="flightSearch" type="submit">
            <i class="icon-search text-20 mr-10"></i>
            <span class="text-search"><?php echo e(__('SEARCH')); ?></span>
        </button>
    </div>
    <input type="hidden" id="cityCount" value="1">
</form>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Flight/Views/frontend/layouts/search/form-search.blade.php ENDPATH**/ ?>