<!DOCTYPE html>
<html lang="en" dir="auto">
<head>
    <meta charset="utf-8">
    <title>
        The War Costs - Ukraine & Russia
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
          integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
            integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="css/default.css" rel="stylesheet" media="screen" type="text/css">
    <link href="css/default-ar.css" rel="stylesheet" media="screen" type="text/css">
    <meta property="fb:admins" content="530511565,889125511,587820015,1190925712">
    <meta property="og:image" content="http://eldamelmasry.com/img/social.png">
    <link href='http://fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>

    <link rel="image_src" href="http://thewarcosts.com/img/social.png">
    <meta itemprop="image" content="http://thewarcosts.com/img/logo.png">
    <meta property="og:site_name" content="The war costs">
    <meta property="og:title" content="The war costs">
    <meta property="og:url" content="http://eldamelmasry.com">
    <meta property="og:type" content="website">
    <meta property="og:description"
          content="War is not cheap! This is a list of the cases of murder, injury, and migration that have occurred in both Ukraine and Russia since the beginning of the recent events. These are not just numbers, these are human lives!">
    <meta name="description"
          content="War is not cheap! This is a list of the cases of murder, injury, and migration that have occurred in both Ukraine and Russia since the beginning of the recent events. These are not just numbers, these are human lives!"/>
    <meta name="robots" content="index, follow">
</head>

<body>

<div class="ui container">
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</div>

<div>
    <canvas id="myCanvas2" width="340" height="140" style="z-index:-1"></canvas>
    <canvas id="myCanvas" width="340" height="140" style="z-index:-1"></canvas>
    <script src="js/waves.js"></script>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VFBSXH96BS"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-VFBSXH96BS');
</script>

</body>
</html>
