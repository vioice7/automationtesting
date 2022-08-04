<?php

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

// Important object #1
//$driver = new GoutteDriver();

$driver = new Selenium2Driver();

// Important object #2
$session = new Session($driver);

$session->start();
$session->visit('http://jurassicpark.wikia.com');

echo "Status code: ". $session->getStatusCode() . "\n";
echo "Current URL: ". $session->getCurrentUrl() . "\n";

// Important object #3 DocumentElement
$page = $session->getPage();

echo "First 75 chars: ".substr($page->getText() , 0, 75) . "\n";

// Important object #4 NodeElement
$header = $page->find('css', '.fandom-community-header__community-name-wrapper a');

echo "The wiki site name is: ".$header->getText()."\n";

$subNav = $page->find('css', '.wds-tabs__tab-label');
var_dump($subNav->getHtml());

$selectorsHandler = $session->getSelectorsHandler();
$linkEl = $page->find(
    'named',
    array(
        'link',
        $selectorsHandler->xpathLiteral('Books')
    )
);
echo "The link href is: ". $linkEl->getAttribute('href') . "\n";

$linkEl->click();
echo "Page URL after click: ". $session->getCurrentUrl() . "\n";

$session->stop();