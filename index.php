<html>
<head>
    <title>Hikori.pl - anime openings & endings</title>
    <meta name="title" property="og:title" content="Hikori.pl - anime openings & endings"/>
    <meta name="keywords" content="Anime, Openings, Endings, Online, Watch, Listen, autoplay">
    <meta name="description" content="Hikori.pl is service that allows you to watch your favourite anime openings and endings in one place!">
    <meta charset="UTF-8">
    <meta name="author" content="Arkadiusz 'Mole' Sygulski">
    <meta name="robots" content="all"/>
    <link href="favicon.ico" rel="icon" type="image/x-icon"/>
    <!--[if lt IE 9]>
    <script>
        document.createElement('video');
    </script>
    <![endif]-->
    <!-- custom style -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- external scripts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/jquery.cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="//remysharp.com/downloads/jquery.marquee.js" type="text/javascript"></script>
</head>
<body>
    <video autoplay id="bgvid">
        <source src="" type="video/mp4">
    </video>
    <div class="controls">
        <button id="vidVolDown">-</button>
        <div id="vidVolume"></div>
        <button id="vidVolUp">+</button>
        <div id="vidTitle"></div>
        <button id="vidPrev">Prev</button>
        <button id="vidPause">Pause</button>
        <button id="vidNext">Next</button>
        <br><br>
        <button id="qualitySettingsToggle">Quality</button>
        <button id="trackListToggle">List</button>
        <button id="generalSettingsToggle">Settings</button>
    </div>
    <div id="generalSettings" class="controls" style="display: none;">
        <div class="description">Remember settings (using <a style="text-decoration: none; color: #00aada;" target="_blank" href="http://www.freenetlaw.com/free-cookies-policy/">cookies</a>)</div>
        <button id="useCookiesYes">Yes</button>
        <button id="useCookiesNo">No</button>
        <div class="description" style="margin-top: 5px;">Enable volume boost (up to 200%)</div>
        <button id="useVolumeBoostYes">Yes</button>
        <button id="useVolumeBoostNo">No</button>
    </div>
    <div id="qualitySettings" class="controls" style="display: none;">
        <button data-quality="0" id="qualityLow">Low (lowest possible)</button>
        <button data-quality="1" id="qualityMedium">Medium (360p ~ 480p)</button>
        <button data-quality="2" id="qualityHigh">High (highest possible)</button>
    </div>
    <div id="trackList" class="controls" style="display:none;">

    </div>
    <div id="about" style="display: none;">
        <i id="aboutClose" style="float:right; cursor: pointer;" class="fa fa-times"></i>
        <h1>About Hikori.pl</h1>
        <p>Hikori.pl is service where you can watch your favourites anime openings and endings in endless loop!</p>
        <h1>FAQ</h1>
        <p><span style="color: #00aada;">How many tracks is in your database?</span></p>
        <p>At this moment 59, giving total of 1.8GB</p>
        <p><span style="color: #00aada;">What does "200% volume" mean?</span></p>
        <p>It's a bit tricky. Scale (0% - 100%) is really 0-50% scale - we use this trick to keep the best user experience and in care of your ears.</p>
        <p><span style="color: #00aada;">Can I check source code?</span></p>
        <p>Sure, here's <a style="text-decoration: none; color: #00aada;" href="https://github.com/Aareksio/aop-project">our GitHub page</a></p>
    </div>
    <div id="footer">
        aareksio@gmail.com | <span id="aboutButton">About site</span> | Current video quality: <span id="qualityInfo"></span>
    </div>
    <!-- custom script -->
    <script src="js/script.js"></script>
</body>
</html>