<?php
/*
Template Name: Anfahrt
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;


Timber::render(array('page-anfahrt.twig', 'page.twig'), $context);