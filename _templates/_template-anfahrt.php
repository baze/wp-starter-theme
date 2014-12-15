<?php
/*
Template Name: Anfahrt
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$adr_title = get_field('firmenbezeichnung', 'option');

$adr_arr = array();
$adr_arr[] = get_field('strasse_hausnummer', 'option');
$adr_arr[] = get_field('postleitzahl', 'option');
$adr_arr[] = get_field('ort', 'option');
$adr_arr[] = get_field('bundesland', 'option');
$adr_arr[] = get_field('land', 'option');

$adr_string = implode(' ', $adr_arr);

$mymap = new Mappress_Map();
$address = $adr_string;
$mypoi_1 = new Mappress_Poi(array("title" => $adr_title, "address" => $address));
$mypoi_1->geocode();
$mymap->pois = array($mypoi_1);

$mymap->width = '100%';
$mymap->height = 480;
$mymap->options->adaptive = true;
$mymap->options->alignment = 'default';
$mymap->options->border['style'] = '';
$mymap->options->directions = 'google';
$mymap->options->initialOpenInfo = true;
$mymap->options->onLoad = true;
$mymap->options->postTypes = array();

$context['map'] = $mymap;

Timber::render(array('page-anfahrt.twig', 'page.twig'), $context);