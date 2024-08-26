<style>
    .searchMenu-loc__field {
        height:300px;
        max-height:auto;
        overflow:hidden;
    }
    .js-results {
        height: 300px !important;
        overflow-y: scroll;
    }
    .js-results::-webkit-scrollbar{
        width: 5px;
        background:rgb(155 155 155 / 50%);
    }
    </style>
<?php if($airports = \Modules\Flight\Models\Airport::where('status', 'publish')->get()): ?>
    <div class="searchMenu-loc js-form-dd js-liverSearch item">
        <span class="clear-loc absolute bottom-0 text-12"><i class="icon-close"></i></span>
        <div data-x-dd-click="searchMenu-loc">
            <h4 class="text-15 fw-500 ls-2 lh-16"><?php echo e(__(ucwords(str_replace('_',' ',$inputName)))); ?></h4>
            <div class="text-15 text-light-1 ls-2 lh-16 smart-search">
                <!-- Retrieve the value from the URL or set to an empty string -->
                <input type="hidden" name="<?php echo e($inputName); ?>[]" class="js-search-get-id" value="<?php echo e(Request::query($inputName)[0] ?? ''); ?>">
                <!-- Display the selected airport name or placeholder -->
                <input type="text" autocomplete="off" readonly class="smart-search-location parent_text js-search js-dd-focus" 
                    placeholder="<?php echo e(__('Select ' . ucwords(str_replace('_', ' ', $inputName)))); ?>" 
                    value="<?php echo e($airports->where('code', Request::query($inputName)[0] ?? '')->first()->name ?? ''); ?>">
            </div>
        </div>
        <div class="searchMenu-loc__field asdsads shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
            <div class="bg-white px-0 py-10 sm:px-0 sm:py-15 rounded-4">
            <input type="text" autocomplete="nope" aria-autocomplete="list" aria-controls="react-autowhatever-1" class="react-autosuggest__input react-autosuggest__input--open" placeholder="From" title="Where do you want to stay?" value="" __cpp="1" data-listener-added_bee54b3e="true">
                <div class="y-gap-5 js-results">
                    <?php $__currentLoopData = $airports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option" data-id="<?php echo e($term->code); ?>">
                            <div class="d-flex align-items-center">
                                <div class="fa fa-plane text-light-1 text-20 pt-4"></div>
                                <div class="ml-10">
                                    <div class="text-15 lh-12 fw-500 js-search-option-target"><?php echo e($term->name .' | '. $term->code .' | '. $term->address); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('.react-autosuggest__input');
    const resultsContainer = document.querySelector('.js-results');
    const searchOptions = Array.from(resultsContainer.querySelectorAll('.js-search-option'));

    searchInput.addEventListener('keyup', function () {
        const query = searchInput.value.toLowerCase().trim();

        if (query.length > 0) {
            resultsContainer.style.display = 'block'; // Show the results container

            let hasVisibleOptions = false; // Track if any option is visible

            searchOptions.forEach(option => {
                const airportText = option.querySelector('.js-search-option-target').textContent.toLowerCase();

                if (airportText.includes(query)) {
                    option.style.display = 'block'; // Show matching result
                    hasVisibleOptions = true; // Mark that we have at least one visible option
                } else {
                    option.style.display = 'none'; // Hide non-matching result
                }
            });

            // Hide the results container if no options are visible
            if (!hasVisibleOptions) {
                resultsContainer.style.display = 'none';
            }
        } else {
            resultsContainer.style.display = 'none'; // Hide results container if input is empty
        }
    });

    // Optional: Hide results if clicked outside the search input or results container
    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !resultsContainer.contains(e.target)) {
            resultsContainer.style.display = 'none';
        }
    });
});


    </script><?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Layout/common/search/fields/airport.blade.php ENDPATH**/ ?>