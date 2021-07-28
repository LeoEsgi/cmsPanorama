<?php
/*
Plugin Name: Panorama CMS
Description: Plugin de génération de cms fait par Léo Jehane Saousenne et Nicolas
Version: 1
*/

add_action('init', 'cmspanorama_init');	

/**
* Permet d'initialiser les fonctionalités liées au carrousel
**/
function cmspanorama_init(){

	$labels = array(
	  'name' => 'Slide',
	  'singular_name' => 'Slide',
	  'add_new' => 'Ajouter un Slide',
	  'add_new_item' => 'Ajouter un nouveau Slide',
	  'edit_item' => 'Editer un Slide',
	  'new_item' => 'Nouvelle Slide',
	  'view_item' => 'Voir l\'Slide',
	  'search_items' => 'Rechercher un Slide',
	  'not_found' =>  'Aucun Slide',
	  'not_found_in_trash' => 'Aucun Slide dans la corbeille',
	  'parent_item_colon' => '',
	  'menu_name' => 'Slides'
	);

	register_post_type('slide', array(
		'public' => true,
		'publicly_queryable' => false,
		'labels' => $labels,
		'menu_position' => 9,
		'capability_type'=>'post',
		'supports' => array('title', 'thumbnail'),
	));

	add_image_size('slider',1000,300,true);

}

?>