<?php
/*
Template Name: Produkte
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$categories = Timber::get_terms('produkt-kategorie', array('parent' => 0));
$context['categories'] = $categories;

Timber::render(array('page-produkte.twig', 'page.twig'), $context);