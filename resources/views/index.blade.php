@php
    $config = [
        'appName' => config('app.name'),
        'locale' => $locale = app()->getLocale(),
        'locales' => config('app.locales'),
        'facebookClientId' => env('FB_APP_ID'),
        'googleClientId' => env('GOOGLE_CLIENT_ID'),
        'googleApiKey' => env('GOOGLE_API_KEY'),
        'gaID' => env('GOOGLE_GA_ID'),
    ];
@endphp
    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
{{--    <title>{{ config('app.name') }}</title>--}}
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css"
          integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css"
          integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
    <link rel="icon" href="https://cdn.basket.jo/assets/front/basket/new_design/images/favicon.png" type="image/png">

</head>
<body class="body-block">

<div id="app"></div>
<script>``
    window.config = @json($config);
</script>
<script src="{{ mix('dist/js/app.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->

{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165704563-1"></script>--}}
{{--<script>--}}
{{--    window.dataLayer = window.dataLayer || [];--}}
{{--    function gtag(){dataLayer.push(arguments);}--}}
{{--    gtag('js', new Date());--}}
{{--    gtag('config', 'UA-165704563-1');--}}
{{--</script>--}}
{{--<!-- Google Tag Manager -->--}}
{{--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
{{--            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
{{--        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
{{--        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
{{--    })(window,document,'script','dataLayer','GTM-T8WDRWK');</script>--}}
<!-- End Google Tag Manager -->
</body>
</html>
<style>
    * {
        font-family: 'Open Sans', 'Helvetica Neue', Arial, Helvetica, sans-serif;;
        /*font-family: "OpenSans-Bold";*/
    }

    html{
        height: 100%;
    }

    body{
        height: 100%;
        /*font-family: "OpenSans-Bold";*/
        /*font-family: 'Open Sans', 'Helvetica Neue', Arial, Helvetica, sans-serif;*/
        font-size: 14px;
        line-height: 1.42857143;
        color: #000;
    }

    #app{
        height: 100%;
        background: #f7f7f7;

    }

</style>
