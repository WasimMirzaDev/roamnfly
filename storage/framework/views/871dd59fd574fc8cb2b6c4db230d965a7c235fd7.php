<div id="flightFormSelectModalMulti" class="fade"> 
    <div class="flight-info-box" >
        <div class="flight-info mt-2" v-for="(ONEflight, index) in flights" :key="index">
            <div class="d-flex align-items-center">
                <img v-if="ONEflight.code" :src="getAssetUrl(ONEflight.logo)" class="img-fluid mr-10" alt="Image-Description">
                <div class="text-14">{{ONEflight.title}} | {{ONEflight.code}}</div>
            </div>
            <div class="d-flex align-items-start">
                <div class="mr-15">
                    <i class="icofont-airplane text-22 text-dark-4"></i>
                </div>
                <div class="text-left">
                    <h6 class="fw-500 text-22 text-gray-5 mb-0" v-html="ONEflight.departure_time_html"></h6>
                    <div class="text-14 text-gray-5" v-html="ONEflight.departure_date_html"></div>
                    <span class="text-14 text-gray-1" v-html="ONEflight.airport_from"></span>
                </div>
            </div>
            <div class="mx-2 d-flex">
                <div class="mr-15">
                    <i class="d-block rotate-90 icofont-airplane-alt text-22 text-dark-4"></i>
                </div>
                <div class="text-left">
                    <h6 class="fw-500 text-22 text-gray-5 mb-0" v-html="ONEflight.arrival_time_html"></h6>
                    <div class="text-14 text-gray-5" v-html="ONEflight.arrival_date_html"></div>
                    <span class="text-14 text-gray-1" v-html="ONEflight.airport_to"></span>
                </div>
            </div>
            <ul class="d-flex justify-content-between list-group list-group-borderless list-group-horizontal list-group-flush no-gutters border-bottom-light " v-for="(flight_seat,key) in ONEflight.flight_seat" :key="key" v-if="flight_seat.max_passengers > 0">
                <li id="adult-price-item" class="mb-3 mt-3 justify-content-between list-group-item py-0 border-0">
                    <div class="fw-500 text-dark"><?php echo e(__('Adult Price')); ?></div>
                    <span id="adult-price" class="text-gray-1" v-html="adult_total_price_show_multiple(index)"></span>
                </li>
                
                <li id="child-price-item" class="mb-3 mt-3 justify-content-between list-group-item py-0 border-0" v-if="flight_seat.Child_price_html">
                    <div class="fw-500 text-dark"><?php echo e(__('Child Price')); ?></div>
                    <span id="child-price" class="text-gray-1" v-html="child_total_price_show_multiple(index)"></span>
                </li>
                
                <li id="infant-price-item" class="mb-3 mt-3 justify-content-between list-group-item py-0 border-0" v-if="flight_seat.Infants_price_html">
                    <div class="fw-500 text-dark"><?php echo e(__('Infants Price')); ?></div>
                    <span id="infant-price" class="text-gray-1" v-html="infant_total_price_show_multiple(index)"></span>
                </li>
                <li id="infant-price-item" class="mb-3 mt-3 justify-content-between list-group-item py-0 border-0" >
                    <div class="fw-500 text-dark"><?php echo e(__('Flight Price')); ?></div>
                    <span id="infant-price" class="text-gray-1" v-html="each_price(index)"></span>
                </li>
            </ul>
        </div>
        <ul class="list-unstyled font-size-1 mb-0 font-size-16">
            <li class="d-flex justify-content-between py-2">
                <span class="fw-500"><?php echo e(__('Pay Amount')); ?></span>
                <span class="fw-500" v-html="total_price_html"></span>
            </li>
            <li class="d-flex justify-content-center py-2 font-size-17 font-weight-bold">
                <a @click="MultiflightCheckOut()" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">
                    <?php echo e(__('Book Now')); ?>

                    <div class="icon-arrow-top-right ml-15"></div>
                    <i v-show="onSubmit" class="fa fa-spinner fa-spin"></i>
                </a>
            </li>
        </ul>
    </div>
</div>



<style>
.flight-info-box {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    max-height: 300px;
    overflow-y: scroll;
    overflow-x: hidden;
    background-color: #333;
    color: white;
    padding: 15px;
    text-align: center;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
}

.flight-info {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    font-size: 16px;
}

.flight-info span {
    margin: 0 15px;
}
</style><?php /**PATH C:\Users\ADMIN\Documents\projects\roamnfly\themes/GoTrip/Flight/Views/frontend/layouts/return/search/flightFormSelectModalMulti.blade.php ENDPATH**/ ?>