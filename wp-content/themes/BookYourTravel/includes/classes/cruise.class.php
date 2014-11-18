<?php

class byt_cruise extends byt_entity
{
    public function __construct( $entity ) {
		parent::__construct( $entity, 'cruise' );	
    }
	
    public function get_type_name() {	
		$type_objs = wp_get_post_terms( $this->get_base_id(), 'cruise_type', array( "fields" => "all" ) );
		return $type_objs ? $type_objs[0]->name : '';
    }
	
    public function get_type_id() {	
		$type_objs = wp_get_post_terms( $this->get_base_id(), 'cruise_type', array( "fields" => "all" ) );
		return $type_objs ? $type_objs[0]->term_id : null;
    }
	
	public function get_type_is_repeated() {
		$type_id = $this->get_type_id();
		$term_meta = get_option( "taxonomy_$type_id" );
		return (int)$term_meta['cruise_type_is_repeated'];
	}
		
	public function get_type_day_of_week_day() {
		$day_of_week_index = $this->get_type_day_of_week_index();
		$days_of_week = bookyourtravel_get_days_of_week();
		if ($day_of_week_index > -1)
			return $days_of_week[$day_of_week_index];
		return '';
	}
	
	public function get_is_price_per_person() {
		return $this->get_custom_field( 'is_price_per_person' );
	}
	
	public function get_count_children_stay_free() {
		return $this->get_custom_field( 'count_children_stay_free' );
	}

	public function get_cabin_types() {
		return $this->get_custom_field( 'cabin_types', false );
	}
	
	public function get_facilities() {
		return wp_get_post_terms($this->get_base_id(), 'facility', array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all'));	
	}
	
	public function get_type_day_of_week_index() {
		$type_is_repeated = $this->get_type_is_repeated();
		if ($type_is_repeated == 3) {
			$type_id = $this->get_type_id();
			$term_meta = get_option( "taxonomy_$type_id" );
			return (int)$term_meta['cruise_type_day_of_week'];
		}
		return -1;
	}
}