<style>
    .searchMenu-loc__field {
        max-height: 300px; /* Set a fixed max height for consistency */
        overflow: hidden; /* Prevent overflowing */
    }
    .js-results {
        height: 300px; /* Ensure height is consistent */
        overflow-y: auto; /* Enable vertical scrolling */
    }
    .js-results::-webkit-scrollbar {
        width: 5px;
        background: rgba(155, 155, 155, 0.5); /* Improved syntax */
    }
    .js-results::-webkit-scrollbar-thumb {
        background: #888; /* Scrollbar color */
    }
</style>

@if($airports = \Modules\Flight\Models\Airport::where('status', 'publish')->get())
<div class="searchMenu-loc js-form-dd js-liverSearch item">
    <span class="clear-loc absolute bottom-0 text-12"><i class="icon-close"></i></span>
    <div data-x-dd-click="searchMenu-loc">
        <h4 class="text-15 fw-500 ls-2 lh-16">{{ __(ucwords(str_replace('_', ' ', $inputName))) }}</h4>
        <div class="text-15 text-light-1 ls-2 lh-16 smart-search">
            <!-- Retrieve the value from the URL or set to an empty string -->
            <input type="hidden" name="{{ $inputName }}[]" class="js-search-get-id" value="{{ Request::query($inputName)[0] ?? '' }}">
            <!-- Display the selected airport name or placeholder -->
            <input type="text" autocomplete="off" readonly class="smart-search-location parent_text js-search js-dd-focus" 
                placeholder="{{ __('Select ' . ucwords(str_replace('_', ' ', $inputName))) }}" 
                value="{{ $airports->where('code', Request::query($inputName)[0] ?? '')->first()->name ?? '' }}">
        </div>
    </div>
    <div class="searchMenu-loc__field asdsads shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
        <div class="bg-white px-0 py-10 sm:px-0 sm:py-15 rounded-4">
            <input type="text" autocomplete="nope" class="react-autosuggest__input" placeholder="Search Airports" title="Type to search for airports" value="">
            <div class="y-gap-5 js-results">
                @foreach($airports as $term)
                    <div class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option" data-id="{{ $term->code }}">
                        <div class="d-flex align-items-center">
                            <div class="fa fa-plane text-light-1 text-20 pt-4"></div>
                            <div class="ml-10">
                                <div class="text-15 lh-12 fw-500 js-search-option-target">{{ $term->name .' | '. $term->code .' | '. $term->address }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.querySelector('.react-autosuggest__input');
        const resultsContainer = document.querySelector('.js-results');
        const searchOptions = Array.from(resultsContainer.querySelectorAll('.js-search-option'));

        searchInput.addEventListener('input', function () {
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

        // Handle click events for selecting options
        searchOptions.forEach(option => {
            option.addEventListener('click', function () {
                const selectedCode = option.getAttribute('data-id');
                const selectedName = option.querySelector('.js-search-option-target').textContent;

                // Set the selected airport in the hidden input and visible input
                document.querySelector('.js-search-get-id').value = selectedCode;
                document.querySelector('.smart-search-location').value = selectedName;

                resultsContainer.style.display = 'none'; // Hide the results after selection
            });
        });

        // Optional: Hide results if clicked outside the search input or results container
        document.addEventListener('click', function (e) {
            if (!searchInput.contains(e.target) && !resultsContainer.contains(e.target)) {
                resultsContainer.style.display = 'none';
            }
        });
    });
</script>
