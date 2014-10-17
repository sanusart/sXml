<?php
include_once '../Sxml.php';

$xml = new \Sanusart\sXml\Xml(true);

$xml->doctype();
$xml->open('users', array('requered' => 'true', 'type' => 'meta'));

$xml->open('user');
$xml->node('name', 'Sasha');
$xml->node('last_name', 'Khamkov');
$xml->node('alias', 'sanusart');
$xml->node('twitter', '@sanusart');
$xml->node('website', 'http://www.sanusart.com');
$xml->close('user');

$xml->open('no_closing_tag');
$xml->node('node', null, array('requered' => 'true', 'type' => 'data'));
$xml->node('node', null, array('requered' => 'false', 'type' => 'data'));
$xml->node('node', null);
$xml->close('no_closing_tag');

$xml->close('users');