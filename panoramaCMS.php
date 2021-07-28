<?php
/*
Plugin Name: Panorama CMS
Description: Plugin SLIDER Permet de mettre sous forme de diaporama des images.
Autheur: Saoussene , Nicolas, Léo , Jehane
Version: 1
*/

add_action('init', 'cmspanorama_init');
add_action('manage_edit-slide_columns', 'cmspanorama_columnfilter');
add_action('manage_posts_custom_column', 'cmspanorama_column');		

/**
* Permet d'initialiser les fonctionalités liées au Slider
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

/**
* Cette fonctionne va permettre la gestion des colonnes pour les slides
* @param array $columns tableau associatif contenant les column $id => $name
**/
function cmspanorama_columnfilter($columns){
	$thumb = array('thumbnail' => 'Image');
	$columns = array_slice($columns, 0, 1) + $thumb + array_slice($columns,1,null);
	return $columns;
}

/**
* ELle va permettre la gestion du contenu d'une colonne
* @param String $column Id de la colonne traitée
**/
function cmspanorama_column($column){
	global $post;
	if($column == 'thumbnail'){
		echo edit_post_link(get_the_post_thumbnail($post->ID),null,null,$post->ID);
	}
}



?>