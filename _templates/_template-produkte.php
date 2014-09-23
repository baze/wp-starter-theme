<?php
/*
Template Name: Produkte
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render(array('page-produkte.twig', 'page.twig'), $context);