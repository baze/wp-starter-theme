<?php
/*
Template Name: Impressum
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

// disclaimer
$context['title_disclaimer'] = pll__('Disclaimer');
$context['show_disclaimer'] = pll__(get_field('disclaimer_anzeigen', 'options'));

$context['haftung_fuer_inhalte_title'] = pll__('Haftung für Inhalte');
$context['haftung_fuer_inhalte'] = pll__(get_field('haftung-fuer-inhalte', 'options'));

$context['haftung_fuer_links_title'] = pll__('Haftung für Links');
$context['haftung_fuer_links'] = pll__(get_field('haftung-fuer-links', 'options'));

$context['urheberrecht_title'] = pll__('Urheberrecht');
$context['urheberrecht'] = pll__(get_field('urheberrecht', 'options'));

// tmg
$context['title_tmg'] = pll__('Angaben gemäß § 5 TMG:');

$context['firmenbezeichnung'] = get_field('firmenbezeichnung', 'options');
$context['strasse_hausnummer'] = get_field('strasse_hausnummer', 'options');
$context['postleitzahl'] = get_field('postleitzahl', 'options');
$context['ort'] = get_field('ort', 'options');

$context['vertretungsberechtigt_title'] = pll__('Vertreten durch:');
$context['vertretungsberechtigt'] = pll__(get_field('vertretungsberechtigt', 'options'));

$context['kontakt_title'] = pll__('Kontakt');
$context['telefon_label'] = pll__('Telefon:');
$context['telefon'] = pll__(get_field('telefon', 'options'));
$context['telefax_label'] = pll__('Telefax:');
$context['telefax'] = pll__(get_field('telefax', 'options'));
$context['email_label'] = pll__('E-Mail:');
$context['email'] = pll__(get_field('e-mail', 'options'));

$context['registereintrag_title'] = pll__('Registereintrag');
$context['registereintrag_art'] = pll__(get_field('registereintrag-art', 'options'));
$context['registergericht'] = pll__(get_field('registergericht', 'options'));
$context['registernummer'] = pll__(get_field('registernummer', 'options'));

$context['ust_id_title'] = pll__('Umsatzsteuer-ID:');
$context['ust_id_label'] = pll__('Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:');
$context['ust_id'] = pll__(get_field('ust-id', 'options'));

Timber::render(array('page-impressum.twig', 'page.twig'), $context);