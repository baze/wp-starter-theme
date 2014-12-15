<?php
/*
Template Name: Events
*/

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

$events            = Timber::get_posts( [
	'post_type' => 'event',
	'order_by'  => 'title',
	'order'     => 'ASC',
	'showposts' => 3
] );
$context['events'] = $events;

$courses_open            = Timber::get_posts( [
	'post_type'  => 'event',
	'order_by'   => 'title',
	'order'      => 'ASC',
	'showposts'  => 3,
	'meta_key'   => 'status',
	'meta_value' => 'open'
] );

$context['courses_open'] = $courses_open;

$courses_closed            = Timber::get_posts( [
	'post_type'  => 'event',
	'order_by'   => 'title',
	'order'      => 'ASC',
	'showposts'  => 3,
	'meta_key'   => 'status',
	'meta_value' => 'closed'
] );
$context['courses_closed'] = $courses_closed;

Timber::render( array( 'page-events.twig', 'page.twig' ), $context );