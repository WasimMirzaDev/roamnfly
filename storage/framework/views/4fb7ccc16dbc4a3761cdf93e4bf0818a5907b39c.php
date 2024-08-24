<div class="form-checkout" id="form-checkout">
    <input type="hidden" name="code" value="<?php echo e($booking->code); ?>">
    <input type="hidden" name="type" value="<?php echo e($booking->object_model); ?>">
    <div class="form-section">
        <div class="row x-gap-20 y-gap-20 pt-20">

            <?php if(is_enable_guest_checkout() && is_enable_registration()): ?>
                <div class="col-12">
                    <div class="">
                        <label for="confirmRegister" class="flex ">
                            <input style="width: auto" type="checkbox" name="confirmRegister" id="confirmRegister"
                                value="1">
                            <?php echo e(__('Create a new account?')); ?>

                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(is_enable_guest_checkout()): ?>
                <div class="col-12 d-none" id="confirmRegisterContent">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-input ">
                                <input type="password" class="form-control" name="password" autocomplete="off">
                                <label class="lh-1 text-16 text-light-1"><?php echo e(__('Password')); ?> <span
                                        class="required">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-input ">
                                <input type="password" class="form-control" name="password_confirmation"
                                    autocomplete="off">
                                <label class="lh-1 text-16 text-light-1"><?php echo e(__('Password confirmation')); ?> <span
                                        class="required">*</span></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            <?php endif; ?>

            <div class="p-4 mb-3" style="background-color: rgba(245, 245, 245, 0.685)">
                <center>
                    <h3>Passengers</h3>
                </center>
                <?php
                    if ($booking->adults != 0 && $booking->adults != null) {
                        $adultsString = $booking->adults;

                        $adultsForarray = json_decode($adultsString, true);
                        // Use a regular expression to extract the number before the '*'
                        if (is_array($adultsForarray) && !empty($adultsForarray)) {
                            // Get the first item from the array
                            $firstAdultString = $adultsForarray[0];
                            // Use a regular expression to extract the number before the '*'
                            if (preg_match('/^\d+/', $firstAdultString, $matches)) {
                                $adultsNumber = (int) $matches[0];
                                if ($adultsNumber == 0) {
                                    $adultsArray = [];
                                } else {
                                    // Create an array from 1 to the extracted number
                                    $adultsArray = range(1, $adultsNumber);
                                }
                            } else {
                                $adultsArray = [];
                            }
                        } else {
                            if (preg_match('/^\d+/', $adultsString, $matches)) {
                                $adultsNumber = (int) $matches[0];
                                if ($adultsNumber == 0) {
                                    $adultsArray = [];
                                } else {
                                    $adultsArray = range(1, $adultsNumber);
                                }
                                // Create an array from 1 to the extracted number
                            } else {
                                $adultsArray = [];
                            }
                        }
                    } else {
                        $adultsArray = [];
                    }

                    if ($booking->children != 0 && $booking->children != null) {
                        $childrenString = $booking->children;

                        $childForarray = json_decode($childrenString, true);
                        // Use a regular expression to extract the number before the '*'
                        if (is_array($childForarray) && !empty($childForarray)) {
                            // Get the first item from the array
                            $firstChildString = $childForarray[0];
                            // Use a regular expression to extract the number before the '*'
                            // Use a regular expression to extract the number before the '*'
                            if (preg_match('/^\d+/', $firstChildString, $matches)) {
                                $childrenNumber = (int) $matches[0];
                                if ($childrenNumber == 0) {
                                    $childrenArray = [];
                                } else {
                                    $childrenArray = range(1, $childrenNumber);
                                }
                                // Create an array from 1 to the extracted number
                            } else {
                                $childrenArray = [];
                            }
                        } else {
                            // Use a regular expression to extract the number before the '*'
                            if (preg_match('/^\d+/', $childrenString, $matches)) {
                                $childrenNumber = (int) $matches[0];
                                if ($childrenNumber == 0) {
                                    $childrenArray = [];
                                } else {
                                    $childrenArray = range(1, $childrenNumber);
                                }
                                // Create an array from 1 to the extracted number
                            } else {
                                $childrenArray = [];
                            }
                        }
                    } else {
                        $childrenArray = [];
                    }
                    if ($booking->infants != 0 && $booking->infants != null) {
                        $infantsString = $booking->infants;

                        $infantsForarray = json_decode($infantsString, true);
                        // Use a regular expression to extract the number before the '*'
                        if (is_array($infantsForarray) && !empty($infantsForarray)) {
                            // Get the first item from the array
                            $FirstinfantsString = $infantsForarray[0];
                            // Use a regular expression to extract the number before the '*'
                            if (preg_match('/^\d+/', $FirstinfantsString, $matches)) {
                                $infantsNumber = (int) $matches[0];
                                if ($infantsNumber == 0) {
                                    $infantsArray = [];
                                } else {
                                    $infantsArray = range(1, $infantsNumber);
                                }
                                // Create an array from 1 to the extracted number
                            } else {
                                $infantsArray = [];
                            }
                        } else {
                            // Use a regular expression to extract the number before the '*'
                            if (preg_match('/^\d+/', $infantsString, $matches)) {
                                $infantsNumber = (int) $matches[0];
                                if ($infantsNumber == 0) {
                                    $infantsArray = [];
                                } else {
                                    $infantsArray = range(1, $infantsNumber);
                                }
                                // Create an array from 1 to the extracted number
                            } else {
                                $infantsArray = [];
                            }
                        }
                    } else {
                        $infantsArray = [];
                    }
                ?>
                <?php if(!empty($adultsArray)): ?>
                    <?php $__currentLoopData = $adultsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $adult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-3">
                            <h5 class="mb-2">Adult <?php echo e($adult); ?></h5>

                            <div class="row gy-2">
                                <input type="text" class="form-control" value="ADULT"
                                    name="adults[<?php echo e($index); ?>][type]" hidden>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control" value="<?php echo e($user->first_name ?? ''); ?>"
                                            name="adults[<?php echo e($index); ?>][first_name]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('First Name')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control" value="<?php echo e($user->last_name ?? ''); ?>"
                                            name="adults[<?php echo e($index); ?>][last_name]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('Last Name')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12 field-Expire-line-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Date of Birth')); ?> </label>
                                        <input type="date" placeholder="<?php echo e(__('Date of Birth')); ?>"
                                            class="form-control" value="<?php echo e($user->dob ?? ''); ?>"
                                            name="adults[<?php echo e($index); ?>][dob]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control" value="<?php echo e($user->pan ?? ''); ?>"
                                            name="adults[<?php echo e($index); ?>][pan]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('PAN')); ?> <span
                                                class="required">*</span></label>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control" value="<?php echo e($user->passport ?? ''); ?>"
                                            name="adults[<?php echo e($index); ?>][passport]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('Passport')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6 field-Expire-line-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Issue Date')); ?> </label>
                                        <input type="date" placeholder="<?php echo e(__('Passport Issue Date')); ?>"
                                            class="form-control" value="<?php echo e($user->pid ?? ''); ?>"
                                            name="adults[<?php echo e($index); ?>][pid]">
                                    </div>
                                </div>
                                <div class="col-md-6 field-Expire-line-2">
                                    <div class="form-group">
                                        <label><?php echo e(__('Expire Date')); ?> </label>
                                        <input type="date" placeholder="<?php echo e(__('Passport Expire Date')); ?>"
                                            class="form-control" value="<?php echo e($user->eD ?? ''); ?>"
                                            name="adults[<?php echo e($index); ?>][eD]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


                <?php if(!empty($childrenArray)): ?>
                    <?php $__currentLoopData = $childrenArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-3">
                            <h5 class="mb-2">Child <?php echo e($child); ?></h5>


                            <div class="row gy-2">
                                <input type="text" class="form-control" value="CHILD"
                                    name="children[<?php echo e($index); ?>][type]" hidden>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control"
                                            value="<?php echo e($user->first_name ?? ''); ?>"
                                            name="children[<?php echo e($index); ?>][first_name]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('First Name')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control"
                                            value="<?php echo e($user->last_name ?? ''); ?>"
                                            name="children[<?php echo e($index); ?>][last_name]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('Last Name')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12 field-Expire-line-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Date of Birth')); ?> </label>
                                        <input type="date" placeholder="<?php echo e(__('Date of Birth')); ?>"
                                            class="form-control" value="<?php echo e($user->dob ?? ''); ?>"
                                            name="children[<?php echo e($index); ?>][dob]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control" value="<?php echo e($user->pan ?? ''); ?>"
                                            name="children[<?php echo e($index); ?>][pan]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('PAN')); ?> <span
                                                class="required">*</span></label>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control"
                                            value="<?php echo e($user->passport ?? ''); ?>"
                                            name="children[<?php echo e($index); ?>][passport]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('Passport')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6 field-Expire-line-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Issue Date')); ?> </label>
                                        <input type="date" placeholder="<?php echo e(__('Passport Issue Date')); ?>"
                                            class="form-control" value="<?php echo e($user->pid ?? ''); ?>"
                                            name="children[<?php echo e($index); ?>][pid]">
                                    </div>
                                </div>
                                <div class="col-md-6 field-Expire-line-2">
                                    <div class="form-group">
                                        <label><?php echo e(__('Expire Date')); ?> </label>
                                        <input type="date" placeholder="<?php echo e(__('Passport Expire Date')); ?>"
                                            class="form-control" value="<?php echo e($user->eD ?? ''); ?>"
                                            name="children[<?php echo e($index); ?>][eD]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


                <?php if(!empty($infantsArray)): ?>
                    <?php $__currentLoopData = $infantsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $infant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-3">
                            <h5 class="mb-2">Infant <?php echo e($infant); ?></h5>


                            <div class="row gy-2">
                                <input type="text" class="form-control" value="INFANT"
                                    name="infants[<?php echo e($index); ?>][type]" hidden>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control"
                                            value="<?php echo e($user->first_name ?? ''); ?>"
                                            name="infants[<?php echo e($index); ?>][first_name]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('First Name')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input ">
                                        <input type="text" class="form-control"
                                            value="<?php echo e($user->last_name ?? ''); ?>"
                                            name="infants[<?php echo e($index); ?>][last_name]">
                                        <label class="lh-1 text-16 text-light-1"><?php echo e(__('Last Name')); ?> <span
                                                class="required">*</span></label>
                                    </div>
                                </div>
                                <div class="col-md-12 field-Expire-line-1">
                                    <div class="form-group">
                                        <label><?php echo e(__('Date of Birth')); ?> </label>
                                        <input type="date" placeholder="<?php echo e(__('Date of Birth')); ?>"
                                            class="form-control" value="<?php echo e($user->dob ?? ''); ?>"
                                            name="infants[<?php echo e($index); ?>][dob]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>


            <div class="col-md-6 field-email">
                <div class="form-input ">
                    <input type="email" class="form-control" value="<?php echo e($user->email ?? ''); ?>" name="email">
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('Email')); ?> <span
                            class="required">*</span></label>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-input ">
                    <input type="text" class="form-control" value="<?php echo e($user->phone ?? ''); ?>" name="phone">
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('Phone')); ?> <span
                            class="required">*</span></label>
                </div>
            </div>
            <div class="col-md-6 field-address-line-1">
                <div class="form-input ">
                    <input type="text" class="form-control" value="<?php echo e($user->address ?? ''); ?>"
                        name="address_line_1">
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('Address line 1')); ?> </label>

                </div>
            </div>
            <div class="col-md-6 field-address-line-2">
                <div class="form-input ">
                    <input type="text" class="form-control" value="<?php echo e($user->address2 ?? ''); ?>"
                        name="address_line_2">
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('Address line 2')); ?> </label>

                </div>
            </div>
            <div class="col-md-6 field-city">
                <div class="form-input ">
                    <input type="text" class="form-control" value="<?php echo e($user->city ?? ''); ?>" name="city">
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('City')); ?> </label>

                </div>
            </div>
            <div class="col-md-6 field-state">
                <div class="form-input ">
                    <input type="text" class="form-control" value="<?php echo e($user->state ?? ''); ?>" name="state">
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('State/Province/Region')); ?> </label>

                </div>
            </div>
            <div class="col-md-6 field-zip-code">
                <div class="form-input ">
                    <input type="text" class="form-control" value="<?php echo e($user->zip_code ?? ''); ?>" name="zip_code">
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('ZIP code/Postal code')); ?> </label>
                </div>
            </div>
            <div class="col-md-6 field-country">
                <div class="form-input ">
                    <select name="country" class="form-control">
                        <option value=""><?php echo e(__('-- Select --')); ?></option>
                        <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(($user->country ?? '') == $id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>">
                                <?php echo e($name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('Country')); ?> <span class="required">*</span>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-input">
                    <textarea name="customer_notes" cols="30" rows="6" class="form-control"></textarea>
                    <label class="lh-1 text-16 text-light-1"><?php echo e(__('Special Requirements')); ?> </label>
                </div>
            </div>
        </div>
    </div>


    <?php echo $__env->make('Booking::frontend/booking/checkout-passengers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Booking::frontend/booking/checkout-deposit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make($service->checkout_form_payment_file ?? 'Booking::frontend/booking/checkout-payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php
        $term_conditions = setting_item('booking_term_conditions');
    ?>
    <?php if(setting_item('booking_enable_recaptcha')): ?>
        <div class="form-input ">
            <?php echo e(recaptcha_field('booking')); ?>

        </div>
    <?php endif; ?>
    <div class="html_before_actions"></div>

    <p class="alert-text mt10" v-show=" message.content" v-html="message.content"
        :class="{ 'danger': !message.type, 'success': message.type }"></p>

    <div class="row y-gap-20 items-center justify-between mb-40">
        <div class="col-auto">
            <div class="d-flex items-center">
                <div class="form-checkbox ">
                    <input type="checkbox" name="term_conditions">
                    <div class="form-checkbox__mark">
                        <div class="form-checkbox__icon icon-check"></div>
                    </div>
                </div>
                <div class="text-14 lh-10 text-light-1 ml-10"><?php echo e(__('I have read and accept the')); ?> <a
                        target="_blank"
                        href="<?php echo e(get_page_url($term_conditions)); ?>"><?php echo e(__('terms and conditions')); ?></a></div>

            </div>
        </div>

        <div class="col-auto">
            <button class="button h-60 px-24 -dark-1 bg-blue-1 text-white" @click="doCheckout">
                <?php echo e(__('Book Now')); ?>

                <div class="icon-arrow-top-right ml-15"></div>
                <i class="fa fa-spin fa-spinner" v-show="onSubmit"></i>
            </button>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\ADMIN\Documents\projects\RoamnFlyGitHub\roamnfly\themes/GoTrip/Booking/Views/frontend/booking/checkout-form.blade.php ENDPATH**/ ?>