<?php
/**
 * Created by PhpStorm.
 * User: bjoernmartensen
 * Date: 22.09.14
 * Time: 16:31
 * Template Name: Impressum
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

// disclaimer
$context['show_disclaimer'] = get_field('disclaimer_anzeigen', 'option');
$context['title_disclaimer'] = translate('Disclaimer', 'euw');

$context['haftung_fuer_inhalte_title'] = translate('Haftung für Inhalte', 'euw');
$context['haftung_fuer_inhalte'] = get_field('haftung-fuer-inhalte', 'option');

$context['haftung_fuer_links_title'] = translate('Haftung für Inhalte', 'euw');
$context['haftung_fuer_links'] = get_field('haftung-fuer-inhalte', 'option');

$context['urheberrecht_title'] = translate('Urheberrecht', 'euw');
$context['urheberrecht'] = get_field('urheberrecht', 'option');

// tmg
$context['title_tmg'] = translate('Angaben gemäß § 5 TMG:', 'euw');

$context['firmenbezeichnung'] = get_field('firmenbezeichnung', 'option');
$context['strasse_hausnummer'] = get_field('strasse_hausnummer', 'option');
$context['postleitzahl'] = get_field('postleitzahl', 'option');
$context['ort'] = get_field('ort', 'option');

$context['vertretungsberechtigt_title'] = translate('Vertreten durch:', 'euw');
$context['vertretungsberechtigt'] = get_field('vertretungsberechtigt', 'option');

$context['kontakt_title'] = translate('Kontakt', 'euw');
$context['telefon_label'] = translate('Telefon:', 'euw');
$context['telefon'] = get_field('telefon', 'option');
$context['telefax_label'] = translate('Telefax:', 'euw');
$context['telefax'] = get_field('telefax', 'option');
$context['email_label'] = translate('E-Mail:', 'euw');
$context['email'] = get_field('e-mail', 'option');

$context['registereintrag_title'] = translate('Registereintrag', 'euw');
$context['registereintrag_art'] = get_field('registereintrag-art', 'option');
$context['registergericht'] = get_field('registergericht', 'option');
$context['registernummer'] = get_field('registernummer', 'option');

$context['ust_id_title'] = translate('Umsatzsteuer-ID:', 'euw');
$context['ust_id_label'] = translate('Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:', 'euw');
$context['ust_id'] = get_field('ust-id', 'option');

Timber::render(array('page-impressum.twig', 'page.twig'), $context);