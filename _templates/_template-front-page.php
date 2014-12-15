<?php
/*
Template Name: Front Page
*/

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

$context['posts'] = Timber::get_posts( [
	'post_type' => 'post',
	'limit'     => 4,
	'order_by'  => 'date',
	'order'     => 'DESC'
] );

Timber::render( array( 'home.twig', 'page.twig' ), $context );