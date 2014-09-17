<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 * Template Name: Startseite
 */

$context = Timber::get_context();
$post = new TimberPost();
//$jobs = new TimberPost(['post_type' => 'jobs']);
//$services = new TimberPost(['post_type' => 'services']);
$context['post'] = $post;
//$context['jobs'] = $jobs;
//$context['services'] = $services;
Timber::render(array('front-page.twig', 'page.twig'), $context);