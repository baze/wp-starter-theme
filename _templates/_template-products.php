<?php
/*
Template Name: Products
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$categories = Timber::get_terms('product-categories', array('parent' => 0));
$context['categories'] = $categories;

Timber::render(array('page-products.twig', 'page.twig'), $context);