<?php
/*
Template Name: Produkte
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['categories'] = Timber::get_terms('produkt-kategorie', array('parent' => 0));

Timber::render(array('page-produkte.twig', 'page.twig'), $context);