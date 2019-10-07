<html>
<body>
<ul class="wnTopic__list">
    @foreach(FeedReader::read('https://media.moneyforward.com/feeds/index')->get_items() as $item)
    <li class="wnTopic__item">
        <span class="wnTopic__date">[{{$item->get_date('Y/m/d')}}]</span>
        <a href="{{ $item->get_permalink() }}" target="_parent" class="wnTopic__title">{{ $item->get_title() }}</a>
    </li>
@endforeach
</ul>
</body>
</html>