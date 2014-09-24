<?php
/*
Template Name: Mitarbeiter
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$mitarbeiter = Timber::get_posts(['post_type' => 'mitarbeiter', 'order_by' => 'title', 'order' => 'ASC']);
$context['mitarbeiter'] = $mitarbeiter;

Timber::render(array('page-mitarbeiter.twig', 'page.twig'), $context);