<?php

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Session;

// Important object #1
$driver = new GoutteDriver();

// $driver = new Selenium2Driver();

// Important object #2
$session = new Session($driver);

$session->start();
$session->visit('http://jurassicpark.wikia.com');

// no status code for selenium
echo "Status code: ". $session->getStatusCode() . "\n"; 
echo "Current URL: ". $session->getCurrentUrl() . "\n";

// Important object #3 DocumentElement
$page = $session->getPage();

$subNav = $page->find('css', '.wds-tabs');
$link = $subNav->find('css', 'li a');
// var_dump($subNav->getHtml());

// var_dump($link->getText());
// find link
$linkEl = $page->findLink('Books');
echo "The link href is: ". $linkEl->getAttribute('href') . "\n";
// find field (name selector of the field)
// $linkEl = $page->findField('');
// find button
// $linkEl = $page->findButton('');

$linkEl->click();
echo "Page URL after click: ". $session->getCurrentUrl() . "\n";

$session->stop();