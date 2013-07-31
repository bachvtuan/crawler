<?php

require 'httpreq.php';

$website_url = "http://dethoima.com";


$content = httpReq($website_url);

$dom = new DOMDocument();
$dom->preserveWhiteSpace = false;
$dom->recover = true;
$dom->strictErrorChecking = false;
$dom->encoding = 'UTF-8';

$dom->loadHTML($content);

$dom_xpath = new DOMXPath( $dom );

//xpath value to get all titles
$elements = $dom_xpath->query("//h2[@class='entry-title']/a");

$arr = array();

if (!is_null($elements)) 
	foreach ($elements as $element) 
		$arr[] = $element->nodeValue;

print_r( $arr );
