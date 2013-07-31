<?php
$feed_uri = "http://dethoima.com/feed/";
$rss_source = file_get_contents($feed_uri);
$x = simplexml_load_string($rss_source);

if(count($x) == 0)
    return;
//arr contain all items
$arr = array();
//Every items inside channel tag <channel></channel>
foreach($x->channel->item as $item)
{
	//Each post is object, you can implement array instead
    $post = new stdClass();
    $post->date = (string) $item->pubDate;
    $post->ts = strtotime($item->pubDate);
    $post->link = (string) $item->link;
    $post->title = (string) $item->title;
    $post->text = (string) $item->description;

    $arr[] = $post;
}
//See you result
print_r($arr);