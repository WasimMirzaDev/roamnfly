<?php
// Set default values
$defaultStartDate = date("Y-m-d");
$defaultEndDate = date("Y-m-d", strtotime("+1 day"));

// Get dates from URL or use default values
$startDate = Request::query('start[0]', $defaultStartDate);
$endDate = Request::query('end[0]', $defaultEndDate);
$dateRange = Request::query('date', "{$defaultStartDate} - {$defaultEndDate}");
?>
<div class="searchMenu-date form-date-search-hotel position-relative item">
    <div class="date-wrapper" data-x-dd-click="searchMenu-date">
        <h4 class="text-15 fw-500 ls-2 lh-16"><?php echo e($field['title']); ?></h4>

        <div class="text-14 text-light-1 ls-2 lh-16 check-in-out-render">
            <!-- Display start date or default to today -->
            <span class="js-first-date render check-in-render"><?php echo e($startDate); ?></span>
            -
            <!-- Display end date or default to tomorrow -->
            <span class="js-last-date render check-out-render"><?php echo e($endDate); ?></span>
        </div>
    </div>
    
    <!-- Hidden inputs to maintain state in form submission -->
    <input type="hidden" class="check-in-input" value="<?php echo e($startDate); ?>" name="start[]">
    <input type="hidden" class="check-out-input" value="<?php echo e($endDate); ?>" name="end[]">
    
    <!-- Invisible text input for date range -->
    <input type="text" class="check-in-out absolute invisible" name="date" value="<?php echo e($dateRange); ?>">
</div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Layout/common/search/fields/date.blade.php ENDPATH**/ ?>