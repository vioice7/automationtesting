<?php

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

// Important object #1
$driver = new GoutteDriver();

//$driver = new Selenium2Driver();

// Important object #2
$session = new Session($driver);

$session->start();
$session->visit('http://automationpractice.com/index.php');



//echo "Status code: ". $session->getStatusCode() . "\n";
//echo "Current URL: ". $session->getCurrentUrl() . "\n";

$page = $session->getPage();


$selectorsHandler = $session->getSelectorsHandler();
$linkEl = $page->find(
    'named',
    array(
        'link',
        $selectorsHandler->xpathLiteral('Add to cart')
    )
);
echo "The link href is: ". $linkEl->getAttribute('href') . "\n";

$linkEl->click();
echo "Page URL after click: ". $session->getCurrentUrl() . "\n";

$linkEl = $page->find(
    'named',
    array(
        'link',
        $selectorsHandler->xpathLiteral('Proceed to checkout')
    )
);

echo "Page URL after click: ". $session->getCurrentUrl() . "\n";

$linkEl = $page->find(
    'named',
    array(
        'link',
        $selectorsHandler->xpathLiteral('Proceed to checkout')
    )
);

echo "Page URL after click: ". $session->getCurrentUrl() . "\n";

$linkEl = $page->find(
    'named',
    array(
        'link',
        $selectorsHandler->xpathLiteral('Proceed to checkout')
    )
);

echo "Page URL after click: ". $session->getCurrentUrl() . "\n";


$session->stop();