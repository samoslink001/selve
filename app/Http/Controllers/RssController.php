<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LinkPreview\LinkPreview;
use Awjudd\FeedReader\Facade as FeedReader;

class RssController extends Controller
{
    // 関数
    public function preview() {
        $rss_url = "https://media.moneyforward.com/feeds/index";
        foreach(FeedReader::read($rss_url)->get_items() as $item) {
            $linkPreview = new LinkPreview($item->get_permalink());
            $parsed[] = $linkPreview->getParsed();
        }
        // foreach ($parsed as $parserName => $link) {
        //     echo $parserName . PHP_EOL . PHP_EOL;

        //     echo $link->getUrl() . PHP_EOL;
        //     echo $link->getRealUrl() . PHP_EOL;
        //     echo $link->getTitle() . PHP_EOL;
        //     echo $link->getDescription() . PHP_EOL;
        //     echo $link->getImage() . PHP_EOL;
        //     print_r($link->getPictures());
        // }
        return view('rss', compact('parsed'));
    }
}
