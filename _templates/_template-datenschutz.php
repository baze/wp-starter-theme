<?php
/**
 * Created by PhpStorm.
 * User: bjoernmartensen
 * Date: 22.09.14
 * Time: 15:56
 * Template Name: Datenschutz
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['datenschutz_preambel_title'] = translate('Datenschutz', 'euw');
$context['datenschutz_preambel'] = get_field('datenschutz-preambel', 'option');

$context['datenschutz_like_title'] = translate('Datenschutzerklärung für die Nutzung von Facebook-Plugins
(Like-Button)', 'euw');
$context['datenschutz_like'] = get_field('datenschutz-like', 'option');

$context['datenschutz_analytics_title'] = translate('Datenschutzerklärung für die Nutzung von Google Analytics', 'euw');
$context['datenschutz_analytics'] = get_field('datenschutz-analytics', 'option');

$context['datenschutz_adsense_title'] = translate('Datenschutzerklärung für die Nutzung von Google Adsense', 'euw');
$context['datenschutz_adsense'] = get_field('datenschutz-adsense', 'option');

$context['datenschutz_plus_title'] = translate('Datenschutzerklärung für die Nutzung von Google +1', 'euw');
$context['datenschutz_plus'] = get_field('datenschutz-plus', 'option');

$context['datenschutz_twitter_title'] = translate('Datenschutzerklärung für die Nutzung von Twitter', 'euw');
$context['datenschutz_twitter'] = get_field('datenschutz-twitter', 'option');

Timber::render(array('page-datenschutz.twig', 'page.twig'), $context);