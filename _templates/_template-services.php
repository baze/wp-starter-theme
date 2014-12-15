<?php
/*
Template Name: Services
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$services = Timber::get_posts( [
	'post_type'  => 'service',
	'order_by'   => 'title',
	'order'      => 'ASC',
	'showposts'  => 5
] );

$context['services'] = $services;

Timber::render(array('page-services.twig', 'page.twig'), $context);