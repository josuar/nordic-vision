<?php get_header(); byt_breadcrumbs();get_sidebar('under-header');global $post, $car_rental_obj, $current_user, $currency_symbol, $price_decimal_places, $default_location_tabs, $default_location_extra_fields;$location_extra_fields = of_get_option('location_extra_fields');if (!is_array($location_extra_fields) || count($location_extra_fields) == 0)	$location_extra_fields = $default_location_extra_fields;$tab_array = of_get_option('location_tabs');if (!is_array($tab_array) || count($tab_array) == 0)	$tab_array = $default_location_tabs;if ( have_posts() ) {	the_post();	$location_id = $post->ID;			$enable_car_rentals = of_get_option('enable_car_rentals', 1); 	$enable_accommodations = of_get_option('enable_accommodations', 1); 	$enable_tours = of_get_option('enable_tours', 1);		$location_obj = new byt_location($post); ?>	<!--three-fourth content-->	<section class="three-fourth">		<h1><?php echo $location_obj->get_title(); ?></h1>			<?php $location_obj->render_image_gallery(); ?>		<!--inner navigation-->		<nav class="inner-nav">			<ul>				<?php do_action( 'byt_show_single_location_tab_items_before' ); ?>				<?php				$first_display_tab = '';							if (is_array($tab_array) && count($tab_array) > 0) {					foreach ($tab_array as $tab) {											if (!isset($tab['hide']) || $tab['hide'] != '1') {													$tab_label = '';							if (isset($tab['label'])) {								$tab_label = $tab['label'];								$tab_label = get_translated_dynamic_string(get_option_id_context('location_tabs') . ' ' . $tab['label'], $tab_label);							}													if ($tab['id'] == 'sports_and_nature' && $location_obj->get_custom_field('sports_and_nature')) {								if(empty($first_display_tab)) $first_display_tab = $tab['id'];								byt_render_tab("location", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');							} elseif ($tab['id'] == 'culture' && $location_obj->get_custom_field('culture_and_history')) {								if(empty($first_display_tab)) $first_display_tab = $tab['id'];								byt_render_tab("location", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');							} elseif ($tab['id'] == 'nightlife' && $location_obj->get_custom_field('nightlife')) {								if(empty($first_display_tab)) $first_display_tab = $tab['id'];								byt_render_tab("location", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');							} elseif ($tab['id'] == 'hotels' || $tab['id'] == 'self-catered') {								if ($enable_accommodations) { 									if(empty($first_display_tab)) $first_display_tab = $tab['id'];									byt_render_tab("location", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');								}							} elseif ($tab['id'] == 'tours') {								if ($enable_tours) {									if(empty($first_display_tab)) $first_display_tab = $tab['id'];									byt_render_tab("location", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');								}							} else {								if(empty($first_display_tab)) $first_display_tab = $tab['id'];								byt_render_tab("location", $tab['id'], '',  '<a href="#' . $tab['id'] . '" title="' . $tab_label . '">' . $tab_label . '</a>');							}						}					}				} 				?>				<?php do_action( 'byt_show_single_location_tab_items_after' ); ?>			</ul>		</nav>		<!--//inner navigation-->		<?php do_action( 'byt_show_single_location_tab_content_before' ); ?>		<!--General information-->		<section id="general_info" class="tab-content <?php echo $first_display_tab == 'general_info' ? 'initial' : ''; ?>">			<article>				<h1><?php echo $location_obj->get_title(); ?></h1>				<?php 				$location_image = $location_obj->get_main_image();					if (empty($location_image)) {					$location_image = get_byt_file_uri('/images/uploads/img.jpg');				}				?>				<figure class="left_pic"><img src="<?php echo $location_image; ?>" alt="<?php _e('Things to do - general', 'bookyourtravel'); ?>" /></figure>				<?php echo $location_obj->get_description(); ?>				<table>					<?php if ($location_obj->get_custom_field('country')) { ?>					<tr>						<th><?php _e('Country', 'bookyourtravel'); ?></th>						<td><?php echo $location_obj->get_custom_field('country'); ?></td>					</tr>					<?php } ?>					<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, 'general_info', $location_obj, '', false, true, true); ?>				</table>				</article>		</section>		<!--//General information-->						<?php if ($location_obj->get_custom_field('sports_and_nature')) { ?>		<!--Sports and nature-->		<section id="sports_and_nature" class="tab-content <?php echo $first_display_tab == 'sports_and_nature' ? 'initial' : ''; ?>">			<article>				<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, 'sports_and_nature', $location_obj, '', true ); ?>				</article>		</section>		<!--//Sports and nature-->		<?php } ?>				<?php if ($location_obj->get_custom_field('nightlife')) { ?>		<!--Nightlife-->		<section id="nightlife" class="tab-content <?php echo $first_display_tab == 'nightlife' ? 'initial' : ''; ?>">			<article>				<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, 'nightlife', $location_obj, '', true ); ?>				</article>		</section>		<!--//Nightlife-->		<?php } ?>				<?php if ($location_obj->get_custom_field('culture_and_history')) { ?>		<!--Culture and history-->		<section id="culture" class="tab-content <?php echo $first_display_tab == 'culture' ? 'initial' : ''; ?>">			<article>				<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, 'culture', $location_obj, '', true ); ?>						</article>		</section>		<!--//Culture and history-->		<?php } ?>		<?php if ($enable_accommodations) { ?>		<!--Hotels-->		<section id="hotels" class="tab-content <?php echo $first_display_tab == 'hotels' ? 'initial' : ''; ?>">			<div class="deals">			<?php			$hotel_results = list_accommodations(0, 0, 'post_title', 'ASC', $location_id, false, false);			if ( count($hotel_results) > 0 && $hotel_results['total'] > 0 ) {				foreach ($hotel_results['results'] as $hotel_result) {					global $post, $accommodation_class;					$post = $hotel_result;					setup_postdata( $post ); 					$accommodation_class = 'full-width';					get_template_part('includes/parts/accommodation', 'item');				}			} else {				echo '<p>' . __('Unfortunately there are no hotels at this location at the moment.', 'bookyourtravel') . '</p>';			} ?>			<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, 'hotels', $location_obj); ?>			</div>		</section>				<!--/Hotels-->				<!--Self catered-->		<section id="self-catered" class="tab-content <?php echo $first_display_tab == 'self-catered' ? 'initial' : ''; ?>">			<div class="deals">			<?php 			$self_catered_results = list_accommodations(0, 0, 'post_title', 'ASC', $location_id, false, true);			if ( count($self_catered_results) > 0 && $self_catered_results['total'] > 0 ) {				foreach ($self_catered_results['results'] as $self_catered_result) {					global $post, $accommodation_class;					$post = $self_catered_result;					setup_postdata( $post ); 					$accommodation_class = 'full-width';					get_template_part('includes/parts/accommodation', 'item');				}			} else {				echo '<p>' . __('Unfortunately there are no self-catering offers at this location at the moment.', 'bookyourtravel') . '</p>';			} ?>			<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, 'self-catered', $location_obj); ?>			</div>		</section>				<!--/Self catered-->			<?php } ?>				<?php if ($enable_tours) { ?>		<!--Tours-->		<section id="tours" class="tab-content <?php echo $first_display_tab == 'tours' ? 'initial' : ''; ?>">			<div class="deals">			<?php 			$tour_results = list_tours(0, 0, '', '', $location_id);				if ( count($tour_results) > 0 && $tour_results['total'] > 0 ) {				foreach ($tour_results['results'] as $tour_result) { 					global $post, $tour_class;					$post = $tour_result;					setup_postdata( $post ); 					$tour_class = 'full-width';					get_template_part('includes/parts/tour', 'item');				}				wp_reset_postdata();			} else { 				echo '<p>' . __('Unfortunately there are no tour offers at this location at the moment.', 'bookyourtravel') . '</p>';			} ?>			<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, 'tours', $location_obj); ?>			</div>		</section>				<!--/Tours-->		<?php } ?>				<?php		foreach ($tab_array as $tab) {			if (count(byt_array_search($default_location_tabs, 'id', $tab['id'])) == 0) {			?>				<section id="<?php echo $tab['id']; ?>" class="tab-content <?php echo ($first_display_tab == $tab['id'] ? 'initial' : ''); ?>">					<article>						<?php do_action( 'byt_show_single_location_' . $tab['id'] . '_before' ); ?>						<?php byt_render_tab_extra_fields('location_extra_fields', $location_extra_fields, $tab['id'], $location_obj); ?>						<?php do_action( 'byt_show_single_location_' . $tab['id'] . '_after' ); ?>					</article>				</section>			<?php			}		}			do_action( 'byt_show_single_location_tab_content_after' ); ?>	</section><?php	get_sidebar('right');} // end ifget_footer(); ?>