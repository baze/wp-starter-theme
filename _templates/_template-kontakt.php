<?php
/*
Template Name: Kontakt
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render(array('page-kontakt.twig', 'page.twig'), $context);