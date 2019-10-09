<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LinkPreview\LinkPreview;
use Awjudd\FeedReader\Facade as FeedReader;

class RssController extends Controller
{
    // プレビューデータを取得
    public function preview() {
        // title文字化け対策が必要な場合
        $rss_url_conv[] = "https://media.moneyforward.com/feeds/index";
        for ($i=0; $i<count($rss_url_conv); $i++ ) {
            foreach(FeedReader::read($rss_url_conv[$i])->get_items() as $item) {
                $linkPreview = new LinkPreview($item->get_permalink());
                $parsed = $linkPreview->getParsed();
                foreach ($parsed as $parserName => $link) {
                    $title[] = mb_convert_encoding($link->getTitle(), "auto");
                    $image[] = $link->getImage();
                    $url[] = $link->getUrl();
                }
            }
        }
        // title文字化け対策が不要な場合
        // 処理が重い部分を一時的に消す
        // $rss_url_notconv[] = "https://headlines.yahoo.co.jp/rss/suumoj-c_life.xml";
        $rss_url_notconv[] = "https://headlines.yahoo.co.jp/rss/nkgendai-c_life.xml";
        for ($i=0; $i<count($rss_url_notconv); $i++ ) {
            foreach(FeedReader::read($rss_url_notconv[$i])->get_items() as $item) {
                $linkPreview = new LinkPreview($item->get_permalink());
                $parsed = $linkPreview->getParsed();
                foreach ($parsed as $parserName => $link) {
                    $title[] = $link->getTitle();
                    $image[] = $link->getImage();
                    $url[] = $link->getUrl();
                }
            }
        }

        return view('rss', compact('title', 'image', 'url'));
    }
}
