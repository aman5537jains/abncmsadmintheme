<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $theme->getSetting('PROJECT_NAME')}} - Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{$theme->getSetting('FAV_ICON')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{$theme->getSetting('FAV_ICON')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{$theme->getSetting('FAV_ICON')}}">
        {!! $theme->getSeo() !!}
        {!! $theme->loadStylesheets() !!}
</head>
 <body >
    <div class="page-dashboard">
        {!! $theme->getHeader() !!}
        <section class="dashboard">
            <div class="container-fluid">
                <div class="dRow">
                    {!! $theme->getSidebar() !!}
                    <div class="dbody">
                        <div class="dbody-inner">
                             {!! $theme->getPageContent() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

        {!! $theme->getFooter() !!}
</body>
{!! $theme->loadScripts() !!}
</html>

