<?php
/*
Template Name: Datenschutz
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['datenschutz_preambel_title'] = pll__('Datenschutz');
$context['datenschutz_preambel'] = pll__(get_field('datenschutz-preambel', 'options'));

$context['datenschutz_like_title'] = pll__('Datenschutzerklärung für die Nutzung von Facebook-Plugins (Like-Button)');
$context['datenschutz_like'] = pll__(get_field('datenschutz-like', 'options'));

$context['datenschutz_analytics_title'] = pll__('Datenschutzerklärung für die Nutzung von Google Analytics');
$context['datenschutz_analytics'] = pll__(get_field('datenschutz-analytics', 'options'));

$context['datenschutz_adsense_title'] = pll__('Datenschutzerklärung für die Nutzung von Google Adsense');
$context['datenschutz_adsense'] = pll__(get_field('datenschutz-adsense', 'options'));

$context['datenschutz_plus_title'] = pll__('Datenschutzerklärung für die Nutzung von Google +1');
$context['datenschutz_plus'] = pll__(get_field('datenschutz-plus', 'options'));

$context['datenschutz_twitter_title'] = pll__('Datenschutzerklärung für die Nutzung von Twitter');
$context['datenschutz_twitter'] = pll__(get_field('datenschutz-twitter', 'options'));

Timber::render(array('page-datenschutz.twig', 'page.twig'), $context);