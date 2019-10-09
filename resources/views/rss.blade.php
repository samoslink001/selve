<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SELVE</title>
 
    <!-- ① CSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
 
    <!-- ② JavaScript を追加 -->
    <script src="/js/app.js" defer></script>

    <!-- navbar追加 -->
    @include('navbar')
</head>
<body>
    <div class="container">
        <div class="row">
            @for ($i=0; $i<count($title); $i++ )
                <div class="col-sm-6 col-lg-4 pt-3">
                    <div class="card">
                        <img src="{{ $image[$i] }}" class="card-img-top" alt="画面" height="200">
                        <div class="card-body">
                          <a href="{{ $url[$i] }}" class="card-text">{{ mb_strimwidth($title[$i], 0, 70, '...') }}</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</body>
</html>