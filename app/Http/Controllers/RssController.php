<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LinkPreview\LinkPreview;

class RssController extends Controller
{
    // 関数
    public function preview() {
        $linkPreview = new LinkPreview('https://media.moneyforward.com/articles/3724');
        $parsed = $linkPreview->getParsed();
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
