<div class="row">
    
    @foreach($rows as $index => $onward)
    @if($rows->total() > 0)
    <div class="col-lg-6">
    @foreach($onward['ONWARD'] as $row)
            <div class="col-lg-12">
                @include('Flight::frontend.layouts.return.search.multi-loop-grid',['wrap_class'=>'item-loop-wrap inner-loop-wrap'])
            </div>
    @endforeach
    </div>
    @else
    <div class="col-lg-12">
        {{__("Flight not found")}}
    </div>
@endif
    @endforeach
</div>

<div class="bravo-pagination">
    {{$rows->appends(request()->query())->links()}}
    @if($rows->total() > 0)
        <div class="text-center mt-30 md:mt-10">
            <div class="text-14 text-light-1">{{ __("Showing :from - :to of :total flights",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
        </div>
    @endif
</div>
