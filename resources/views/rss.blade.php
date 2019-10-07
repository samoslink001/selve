<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SELVE NEWS</title>
 
    <!-- ① CSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">
 
    <!-- ② JavaScript を追加 -->
    <script src="/js/app.js" defer></script>
</head>
<body>
<ul class="wnTopic__list">
    @foreach(FeedReader::read('https://media.moneyforward.com/feeds/index')->get_items() as $item)
    <li class="wnTopic__item">
        <span class="wnTopic__date">[{{$item->get_date('Y/m/d')}}]</span>
        <a href="{{ $item->get_permalink() }}" target="_parent" class="wnTopic__title">{{ $item->get_title() }}</a>
    </li>
    @endforeach
</ul>
<ul class="wnTopic__list">
    @foreach($parsed as $parserName => $link)
    <li class="wnTopic__item">
        <img src="{{ $link->getImage() }}" alt="画像">
        <a href="{{ $link->getUrl() }}" target="_parent" class="wnTopic__title">{{ mb_convert_encoding($link->getTitle(), "auto") }}</a>
    </li>
    @endforeach
</ul>
</body>
</html>