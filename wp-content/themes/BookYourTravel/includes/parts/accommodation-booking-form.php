<?php global $accommodation_obj, $currency_symbol, $enc_key, $add_captcha_to_forms;$c_val_1 = mt_rand(1, 20);$c_val_2 = mt_rand(1, 20);$c_val_1_str = contact_encrypt($c_val_1, $enc_key);$c_val_2_str = contact_encrypt($c_val_2, $enc_key);$accommodation_check_in_time = $accommodation_obj->get_custom_field('check_in_time');$accommodation_check_out_time = $accommodation_obj->get_custom_field('check_out_time');?>	<script>			window.datepickerDateFormat = 'yy-mm-dd';		window.InvalidCaptchaMessage = <?php echo json_encode(__('Invalid captcha, please try again!', 'bookyourtravel')); ?>;		window.bookingDateFrom = null;		window.bookingDateTo = null;		window.bookingFormFirstNameError = <?php echo json_encode(__('Please enter your first name', 'bookyourtravel')); ?>;		window.bookingFormLastNameError = <?php echo json_encode(__('Please enter your last name', 'bookyourtravel')); ?>;		window.bookingFormEmailError = <?php echo json_encode(__('Please enter valid email address', 'bookyourtravel')); ?>;		window.bookingFormPhoneError = <?php echo json_encode(__('Please enter your phone number', 'bookyourtravel')); ?>;		window.bookingFormConfirmEmailError1 = <?php echo json_encode(__('Please provide a confirm email', 'bookyourtravel')); ?>;		window.bookingFormConfirmEmailError2 = <?php echo json_encode(__('Please enter the same email as above', 'bookyourtravel')); ?>;		window.bookingFormAddressError = <?php echo json_encode(__('Please enter your address', 'bookyourtravel')); ?>;		window.bookingFormCityError = <?php echo json_encode(__('Please enter your city', 'bookyourtravel')); ?>;				window.bookingFormZipError = <?php echo json_encode(__('Please enter your zip code', 'bookyourtravel')); ?>;				window.bookingFormDatesError = <?php echo json_encode(__('Please select booking dates', 'bookyourtravel')); ?>;				window.bookingFormCountryError = <?php echo json_encode(__('Please enter your country', 'bookyourtravel')); ?>;				</script>		<?php do_action( 'byt_show_accommodation_booking_form_before' ); ?>	<form id="accommodation-booking-form" method="post" action="" class="booking" style="display:none">		<fieldset>			<h3><span>01 </span><?php _e('Submit booking', 'bookyourtravel') ?></h3>			<div class="error" style="display:none;"><div><p></p></div></div>			<div class="row twins">				<div class="f-item">					<label for="first_name"><?php _e('First name', 'bookyourtravel') ?></label>					<input type="text" id="first_name" name="first_name" data-required />				</div>				<div class="f-item">					<label for="last_name"><?php _e('Last name', 'bookyourtravel') ?></label>					<input type="text" id="last_name" name="last_name" data-required />				</div>			</div>						<div class="row twins">				<div class="f-item">					<label for="email"><?php _e('Email address', 'bookyourtravel') ?></label>					<input type="email" id="email" name="email" data-required />				</div>				<div class="f-item">					<label for="confirm_email"><?php _e('Confirm email address', 'bookyourtravel') ?></label>					<input type="email" id="confirm_email" name="confirm_email" data-required data-conditional="confirm" />				</div>				<span class="info"><?php _e('You\'ll receive a confirmation email', 'bookyourtravel') ?></span>			</div>									<div class="row">				<div class="f-item">					<label for="phone"><?php _e('Phone', 'bookyourtravel') ?></label>					<input type="text" id="phone" name="phone" data-required />				</div>			</div>						<div class="row twins">				<div class="f-item">					<label for="address"><?php _e('Street Address and Number', 'bookyourtravel') ?></label>					<input type="text" id="address" name="address" data-required />				</div>				<div class="f-item">					<label for="town"><?php _e('Town / City', 'bookyourtravel') ?></label>					<input type="text" id="town" name="town" data-required />				</div>			</div>			<div class="row twins">				<div class="f-item">					<label for="zip"><?php _e('ZIP Code', 'bookyourtravel') ?></label>					<input type="text" id="zip" name="zip" data-required />				</div>				<div class="f-item">					<label for="country"><?php _e('Country', 'bookyourtravel') ?></label>					<input type="text" id="country" name="country" data-required />				</div>			</div>					<div class="row calendar">				<div class="f-item">					<label><?php _e('Booking dates', 'bookyourtravel') ?></label>					<div id="accommodation_vacancy_datepicker"></div>				</div>			</div>			<div class="row loading" id="datepicker_loading" style="display:none">				<div class="ball"></div>				<div class="ball1"></div>			</div>			<div class="row twins dates_row" style="display:none">				<div class="f-item">					<label><?php _e('Check-in from', 'bookyourtravel') ?></label>					<span id="date_from_text"></span>					<input type="hidden" name="selected_date_from" id="selected_date_from" value="" />					<?php if (!empty($accommodation_check_in_time)) { echo ' ' . $accommodation_check_in_time; } ?>				</div>				<div class="f-item">					<label><?php _e('Check out at', 'bookyourtravel') ?></label>					<span id="date_to_text"></span>					<input type="hidden" name="selected_date_to" id="selected_date_to" value="" />					<?php if (!empty($accommodation_check_out_time)) { echo ' ' . $accommodation_check_out_time; } ?>				</div>			</div>			<div class="row triplets bf_room_type_row">				<div class="f-item">					<label for="booking_form_adults"><?php _e('Adults', 'bookyourtravel') ?></label>					<select id="booking_form_adults" name="booking_form_adults"></select>				</div>				<div class="f-item booking_form_children">					<label for="booking_form_children"><?php _e('Children', 'bookyourtravel') ?></label>					<select id="booking_form_children" name="booking_form_children"></select>				</div>				<div class="f-item bf_room_type_cell">					<label><?php _e('Room type', 'bookyourtravel') ?></label>					<span id="room_type"></span>					<input type="hidden" name="room_type_id" id="room_type_id" />				</div>			</div>						<div class="row price_row" style="display:none">				<div class="f-item">					<script>						window.adultCountLabel = <?php echo json_encode(__('Adults', 'bookyourtravel')); ?>;						window.pricePerAdultLabel = <?php echo json_encode(__('Price per adult', 'bookyourtravel')); ?>;						window.childCountLabel = <?php echo json_encode(__('Children', 'bookyourtravel')); ?>;						window.pricePerChildLabel = <?php echo json_encode(__('Price per child', 'bookyourtravel')); ?>;						window.pricePerDayLabel = <?php echo json_encode(__('Price per day', 'bookyourtravel')); ?>;						<?php							$total_price_label = __('Total price', 'bookyourtravel');							if ($accommodation_obj->get_is_price_per_person() && $accommodation_obj->get_count_children_stay_free() > 0)								$total_price_label = sprintf(__('Total price (first %d children stay free)', 'bookyourtravel'), $accommodation_obj->get_count_children_stay_free());							?>						window.priceTotalLabel = <?php echo json_encode($total_price_label); ?>;						window.dateLabel = <?php echo json_encode(__('Date', 'bookyourtravel')); ?>;					</script>					<table class="breakdown tablesorter">						<thead></thead>						<tfoot></tfoot>						<tbody></tbody>					</table>				</div>			</div>					<div class="row">				<div class="f-item">					<label><?php _e('Special requirements: <span>(Not Guaranteed)</span>', 'bookyourtravel') ?></label>					<textarea id="requirements" name="requirements" rows="10" cols="10"></textarea>				</div>				<span class="info"><?php _e('Please write your requests in English.', 'bookyourtravel') ?></span>			</div>			<?php if ($add_captcha_to_forms) { ?>			<div class="row captcha">				<div class="f-item">					<label><?php echo sprintf(__('How much is %d + %d', 'bookyourtravel'), $c_val_1, $c_val_2) ?>?</label>					<input type="text" required="required" id="c_val_s" name="c_val_s" />					<input type="hidden" name="c_val_1" id="c_val_1" value="<?php echo $c_val_1_str; ?>" />					<input type="hidden" name="c_val_2" id="c_val_2" value="<?php echo $c_val_2_str; ?>" />				</div>			</div>			<?php } ?>			<input type="hidden" name="room_count" id="room_count" value="1" />			<?php byt_render_submit_button("gradient-button", "submit-accommodation-booking", __('Submit booking', 'bookyourtravel')); ?>			<?php byt_render_link_button("#", "gradient-button cancel-accommodation-booking", "cancel-accommodation-booking", __('Cancel', 'bookyourtravel')); ?>		</fieldset>	</form>	<div class="loading" id="wait_loading" style="display:none">		<div class="ball"></div>		<div class="ball1"></div>	</div>		<?php do_action( 'byt_show_accommodation_booking_form_after' ); ?>