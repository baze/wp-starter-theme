<?php
/*
Template Name: About
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$members = Timber::get_posts( [
	'post_type' => 'mitarbeiter',
	'order_by'  => 'menu_order',
	'order'     => 'DESC'
] );
$context['members'] = $members;

Timber::render(array('page-about.twig', 'page.twig'), $context);