@php
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
@endphp
<form action="{{ route('flight.search') }}"
    class="gotrip_form_search bravo_form_search bravo_form form {{ $classes }}" method="get">
    @php
        $flight_search_fields = setting_item_array('flight_search_fields');
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
    @endphp

    <script>
        // Define initialData variable globally
        window.initialData = {
            adults: {{ Request::query('seat_type')['adults'] ?? 0 }},
            children: {{ Request::query('seat_type')['children'] ?? 0 }},
            infants: {{ Request::query('seat_type')['infants'] ?? 0 }},
            flight_seat: []
        };
        console.log(window.initialData);
    </script>

    <div class="row" id="multiCityDivContainer">
        <div class="col-md-12">
            <div class="field-items d-block">
                @if (!empty($flight_search_fields))
                    <div class="row w-100 m-0">
                        @foreach ($flight_search_fields as $field)
                            <div class="col-lg-{{ $field['size'] ?? '6' }} align-self-center px-10 lg:py-5 lg:px-0">
                                @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                                @switch($field['field'])
                                    @case ('date')
                                        @include('Layout::common.search.fields.date')
                                    @break

                                    @case ('seat_type')
                                        @include('Layout::common.search.fields.seat_type', [
                                            'SeatTypee' => $SeatTypee,
                                        ])
                                    @break

                                    @case ('from_where')
                                        @include('Layout::common.search.fields.airport', [
                                            'inputName' => 'from_where',
                                            'fromWhere' => $fromWhere,
                                        ])
                                    @break

                                    @case ('to_where')
                                        @include('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                            'toWhere' => $toWhere,
                                        ])
                                    @break

                                    @case ('type')
                                        @include('Layout::common.search.fields.customAttr', [
                                            'attr' => 'travel-type',
                                            'inputName' => 'travel_type',
                                            'travelType' => $travelType,
                                        ])
                                    @break
                                @endswitch
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Repeat for multiCityDiv1 -->
        <div class="col-md-12 d-none" id="multiCityDiv1">
            <hr>
            <div class="field-items d-block">
                @if (!empty($flight_search_fields))
                    <div class="row w-100 m-0">
                        @foreach ($flight_search_fields as $field)
                            @if ($field['field'] != 'travel_type' && $field['field'] != 'seat_type')
                                <div class="col-lg-{{ $field['size'] ?? '6' }} align-self-center px-10 lg:py-5 lg:px-0">
                                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                                    @switch($field['field'])
                                        @case ('date')
                                            @include('Layout::common.search.fields.date')
                                        @break

                                        @case ('from_where')
                                            @include('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                                'fromWhere' => $fromWhere,
                                            ])
                                        @break
                                        @case ('to_where')
                                        @include('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                            'toWhere' => $toWhere,
                                        ])
                                    @break
                                    @endswitch
                                </div>
                            @endif
                        @endforeach
                        <div class="col-lg-3">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv2">
            <hr>
            <div class="field-items d-block">
                @if (!empty($flight_search_fields))
                    <div class="row w-100 m-0">
                        @foreach ($flight_search_fields as $field)
                            @if ($field['field'] != 'travel_type' && $field['field'] != 'seat_type')
                                <div class="col-lg-{{ $field['size'] ?? '6' }} align-self-center px-10 lg:py-5 lg:px-0">
                                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                                    @switch($field['field'])
                                    @case ('date')
                                    @include('Layout::common.search.fields.date')
                                @break
                                        
                                        @case ('from_where')
                                            @include('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ])
                                        @break
                                        @case ('to_where')
                                        @include('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ])
                                    @break
                                    @endswitch
                                </div>
                            @endif
                        @endforeach
                        <div class="col-lg-3">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv3">
            <hr>
            <div class="field-items d-block">
                @if (!empty($flight_search_fields))
                    <div class="row w-100 m-0">
                        @foreach ($flight_search_fields as $field)
                            @if ($field['field'] != 'travel_type' && $field['field'] != 'seat_type')
                                <div class="col-lg-{{ $field['size'] ?? '6' }} align-self-center px-10 lg:py-5 lg:px-0">
                                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                                    @switch($field['field'])
                                    @case ('date')
                                    @include('Layout::common.search.fields.date')
                                @break
                                        
                                        @case ('from_where')
                                            @include('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ])
                                        @break
                                        @case ('to_where')
                                        @include('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ])
                                    @break
                                    @endswitch
                                </div>
                            @endif
                        @endforeach
                        <div class="col-lg-3">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv4">
            <hr>
            <div class="field-items d-block">
                @if (!empty($flight_search_fields))
                    <div class="row w-100 m-0">
                        @foreach ($flight_search_fields as $field)
                            @if ($field['field'] != 'travel_type' && $field['field'] != 'seat_type')
                                <div class="col-lg-{{ $field['size'] ?? '6' }} align-self-center px-10 lg:py-5 lg:px-0">
                                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                                    @switch($field['field'])
                                    @case ('date')
                                    @include('Layout::common.search.fields.date')
                                @break
                                        
                                        @case ('from_where')
                                            @include('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ])
                                        @break
                                        @case ('to_where')
                                        @include('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ])
                                    @break
                                    @endswitch
                                </div>
                            @endif
                        @endforeach
                        <div class="col-lg-3">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-12 d-none" id="multiCityDiv5">
            <hr>
            <div class="field-items d-block">
                @if (!empty($flight_search_fields))
                    <div class="row w-100 m-0">
                        @foreach ($flight_search_fields as $field)
                            @if ($field['field'] != 'travel_type' && $field['field'] != 'seat_type')
                                <div class="col-lg-{{ $field['size'] ?? '6' }} align-self-center px-10 lg:py-5 lg:px-0">
                                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                                    @switch($field['field'])
                                    @case ('date')
                                    @include('Layout::common.search.fields.date')
                                @break
                                        
                                        @case ('from_where')
                                            @include('Layout::common.search.fields.airport', [
                                                'inputName' => 'from_where',
                                            ])
                                        @break
                                        @case ('to_where')
                                        @include('Layout::common.search.fields.airport', [
                                            'inputName' => 'to_where',
                                        ])
                                    @break
                                    @endswitch
                                </div>
                            @endif
                        @endforeach
                        <div class="col-lg-3">
                            <button type="button"
                                class="button -dark-1 py-15 h-20 col-12 rounded-100 bg-blue-1 text-white addCity">
                                <i class="icon-plus text-15 mr-10"></i> Add Another City
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <div class="button-item">
        <button class="mainSearch__submit button {{ $button_classes }}" id="flightSearch" type="submit">
            <i class="icon-search text-20 mr-10"></i>
            <span class="text-search">{{ __('Search') }}</span>
        </button>
    </div>
    <input type="hidden" id="cityCount" value="1">
</form>
