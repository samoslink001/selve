<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SELVE NEWS</title>
 
    <!-- ① CSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">
 
    <!-- ② JavaScript を追加 -->
    <script src="/js/app.js" defer></script>

    <!-- navbar追加 -->
    @include('navbar')
</head>
<body>
    <div class="container">
        <div class="row">
            @for ($i=0; $i<count($parsed); $i++ )
                @foreach($parsed[$i] as $parserName => $link)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card">
                            <img src="{{ $link->getImage() }}" class="card-img-top" alt="画面" height="200">
                            <div class="card-body">
                              <a href="{{ $link->getUrl() }}" class="card-text">{{ mb_convert_encoding($link->getTitle(), "auto") }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</body>
</html>