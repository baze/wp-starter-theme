<?php
/*
Template Name: Jobs
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$jobs = Timber::get_posts(['post_type' => 'job', 'order_by' => 'title', 'order' => 'ASC']);
$context['jobs'] = $jobs;

Timber::render(array('page-jobs.twig', 'page.twig'), $context);