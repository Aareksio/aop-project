<head>
    <title>Hikori.pl - anime openings & endings</title>
    <meta name="title" property="og:title" content="Hikori.pl - anime openings & endings"/>
    <meta name="keywords" content="Anime, Openings, Endings, Online, Watch, Listen, autoplay">
    <meta name="description"
          content="Hikori.pl is service that allows you to watch your favourite anime openings and endings in one place!">
    <meta charset="UTF-8">
    <meta name="author" content="Arkadiusz 'Mole' Sygulski">
    <meta name="robots" content="none"/>
    <!--[if lt IE 9]>
    <script>
        document.createElement('video');
    </script>
    <![endif]-->
    <style>
        body {
            margin: 0;
            background: #000;
            font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
            font-weight: 100;
        }

        video {
            display: block;
        }

        video#bgvid {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            background-size: cover;
        }

        video#bgvid {
            transition: 1s opacity;
        }

        .stopfade {
            opacity: .5;
        }

        #about {
            position: fixed;
            left: 50%;
            top: 25px;
            margin-left: -200px;
            padding: 20px;
            border-radius: 15px;
            width: 400px;
            background: rgba(0, 0, 0, 0.3);
            font-size: 20px;
            color: #fff;
            text-align: justify;
        }

        #aboutButton {
            cursor: pointer;
        }

        .controls {
            position: relative;
            float: left;
            margin: 25px 0 0 25px;
            width: 400px;
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 15px;
            transition: transform 1s;
        }

        .controls button {
            cursor: pointer;
        }

        .controls#qualitySettings,
        .controls#generalSettings {
            clear: left;
        }

        .controls#trackList {
            position: fixed;
            right: 0;
            margin: 0;
            border-radius: 0;
            margin-right: -17px;
            max-height: 100%;
            overflow-y: scroll;
            padding: 20px;
            box-sizing: border-box;
        }

        .controls#trackList button {
            width: 100%;
            margin-top: 5px;
        }

        .controls#trackList button:first-child {
            margin: 0;
        }

        .controls button:hover,
        .controls button.active {
            background: rgba(0, 0, 0, 0.5);
        }

        .controls button,
        .controls #vidTitle,
        .controls #vidVolume,
        .controls .description {
            display: inline-block;
            padding: 5px;
            border: none;
            font-size: 20px;
            background: rgba(255, 255, 255, 0.30);
            color: #fff;
            border-radius: 3px;
            transition: .3s background;
            text-align: center;
        }

        .controls button#vidPrev,
        .controls button#vidNext,
        .controls button#vidpause,
        .controls button#qualitySettingsToggle,
        .controls button#trackListToggle,
        .controls button#generalSettingsToggle {
            margin: 5px 0;
            width: 130px;
        }


        .controls button#vidVolUp,
        .controls button#vidVolDown {
            width: 30px;
        }

        .controls #vidVolume {
            width: 60px;
        }

        .controls .description {
            width: 390px;
        }

        .controls #vidTitle {
            width: 246px;
            position: relative;
            top: 5px;
        }

        .controls#qualitySettings button,
        .controls#qualitySettings button {
            margin: 5px 0 0 0;
            width: 100%;
        }

        .controls#generalSettings button {
            margin-top: 5px;
            width: 197.5px;
        }

        .controls#qualitySettings button:first-child {
            margin: 0;
        }

        #footer {
            color: #c7c7c7;
            position: fixed;
            bottom: 0;
            padding: 10px 20px;
            border-radius: 0 10px 0 0;
            background: rgba(0, 0, 0, 0.3);
        }
    </style>
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
        <p>At this moment 59, giving total of 1.8G</p>
        <p><span style="color: #00aada;">What does "200% volume" mean?</span></p>
        <p>It's a bit tricky. Scale (0% - 100%) is really 0-50% scale - we use this trick to keep the best user experience and in care of your ears.</p>
        <p><span style="color: #00aada;">Can I check source code?</span></p>
        <p>Sure, here's <a style="text-decoration: none; color: #00aada;" href="https://github.com/Aareksio/aop-project">our GitHub page</a></p>
    </div>
    <div id="footer">
        aareksio@gmail.com | <span id="aboutButton">About site</span> | Current video quality: <span id="qualityInfo"></span>
    </div>
    <script>
        //JSON list load
        var opList = (function () {
            var json = null;
            $.ajax({
                'async': false,
                'global': false,
                'url': 'storage/items.json',
                'dataType': "json",
                'success': function (data) {
                    json = data;
                }
            });
            return json;
        })();

        //video variables
        var vid = document.getElementById("bgvid");
        var vidSource = document.querySelector("#bgvid > source");
        var pauseButton = document.getElementById("vidPause");
        var prevButton = document.getElementById("vidPrev");
        var nextButton = document.getElementById("vidNext");
        var volUpButton = document.getElementById("vidVolUp");
        var volDownButton = document.getElementById("vidVolDown");
        var vidVolume = document.getElementById("vidVolume");
        var vidTitle = document.getElementById("vidTitle");
        var trackList = document.getElementById("trackList");
        var trackListToggleButton = document.getElementById("trackListToggle");
        var generalSettings = document.getElementById("generalSettings");
        var generalSettingsToggleButton = document.getElementById("generalSettingsToggle");
        var qualitySettings = document.getElementById("qualitySettings");
        var qualitySettingsToggleButton = document.getElementById("qualitySettingsToggle");
        var controlsBoxes = document.getElementsByName('controls');
        var qualityLowButton = document.getElementById('qualityLow');
        var qualityMediumButton = document.getElementById('qualityMedium');
        var qualityHighButton = document.getElementById('qualityHigh');
        var useCookiesNoButton = document.getElementById('useCookiesNo');
        var useCookiesYesButton = document.getElementById('useCookiesYes');
        var useVolumeBoostNoButton = document.getElementById('useVolumeBoostNo');
        var useVolumeBoostYesButton = document.getElementById('useVolumeBoostYes');
        var aboutButton = document.getElementById('aboutButton');
        var aboutClose = document.getElementById('aboutClose');
        var qualityInfo = document.getElementById('qualityInfo');
        var opListLength = opList.items.length;
        var qualityButtons = [qualityLowButton, qualityMediumButton, qualityHighButton];
        var quality;
        var volume;
        var volumeBoost;
        var currentVideoId;
        var currentQuality;

        //user set variables
        var startingVolume = 0.4; //Starting volume
        var startingQuality = 2; //0 - worst, 1 - medium, 2 - best
        var allowCookies = false; //Block cookies by default


        //list load
        $.each(opList.items, function (i, item) {
            $('#trackList').append('<button class="trackListElement" data-id="' + i + '">' + opList.items[i].title + '</button>');
        });
        var trackListElements = document.getElementsByClassName('trackListElement');

        //functions
        function vidFade() {
            vid.classList.add("stopfade");
        }

        function getQuality(id, qualitySettings) {
            var qualityListLength = opList.items[id].file.length;
            if(qualityListLength == 1) {
                return 0;
            } else {
                var qualityList = [];
                $.each(opList.items[id].file, function(i, item) {
                    qualityList[i] = opList.items[id].file[i].quality;
                });
                if(qualitySettings == 2) {
                    var a = qualityList.indexOf('1080p');
                    if (a > -1) {
                        return a;
                    } else {
                        a = qualityList.indexOf('720p');
                        if (a > -1) {
                            return a;
                        } else {
                            a = qualityList.indexOf('480p');
                            if (a > -1) {
                                return a;
                            } else {
                                a = qualityList.indexOf('360p');
                                if (a > -1) {
                                    return a;
                                } else {
                                    return 0;
                                }
                            }
                        }
                    }
                } else if (qualitySettings == 1) {
                    var a = qualityList.indexOf('480p');
                    if (a > -1) {
                        return a;
                    } else {
                        a = qualityList.indexOf('360p');
                        if (a > -1) {
                            return a;
                        } else {
                            return 0;
                        }
                    }
                } else {
                    var a = qualityList.indexOf('360p');
                    if (a > -1) {
                        return a;
                    } else {
                        a = qualityList.indexOf('480p');
                        if (a > -1) {
                            return a;
                        } else {
                            a = qualityList.indexOf('720p');
                            if (a > -1) {
                                return a;
                            } else {
                                a = qualityList.indexOf('1080p');
                                if (a > -1) {
                                    return a;
                                } else {
                                    return 0;
                                }
                            }
                        }
                    }
                }
            }
        }

        function vidPlay() {
            var videoQuality = getQuality(currentVideoID, quality);
            var baseDir;
            if(opList.items[currentVideoID].file[videoQuality].normalized) {
                baseDir = 'storage/normalized/';
            } else {
                baseDir = 'storage/';
            }
            vidSource.src = baseDir + opList.items[currentVideoID].file[videoQuality].filename;
            vidTitle.innerHTML = '<marquee behavior="scroll" scrollamount="3" direction="left" width="246">' + opList.items[currentVideoID].title + '</marquee>';
            qualityInfo.innerHTML = opList.items[currentVideoID].file[videoQuality].quality;
            vid.load();
            vid.classList.remove("stopfade");
            pauseButton.innerHTML = "Pause";
        }

        function vidNext() {
            if(currentVideoID < opListLength - 1) {
                currentVideoID += 1;
            } else {
                currentVideoID = 0;
            }
            vidPlay()
        }

        function vidPrev() {
            if (currentVideoID > 0) {
                currentVideoID -= 1;
            } else {
                currentVideoID = opListLength - 1;
            }
            vidPlay()
        }

        function vidRandom() {
            currentVideoID = Math.floor((Math.random() * opListLength));
            vidPlay()
        }

        function vidPlayId(id) {
            currentVideoID = id;
            vidPlay()
        }

        function vidVolPlus() {
            if(volumeBoost) {
                if ((Math.round(vid.volume * 100) / 100) <= 0.95) {
                    vid.volume = (Math.round(vid.volume * 100) / 100) + 0.05;
                    vidVolume.innerHTML = Math.round(vid.volume * 2 * 100) + "%";
                    if (allowCookies) {
                        $.cookie('volume', (Math.round(vid.volume * 200) / 100), {expires: 30});
                    }
                }
            } else {
                if ((Math.round(vid.volume * 100) / 100) <= 0.45) {
                    vid.volume = (Math.round(vid.volume * 100) / 100) + 0.05;
                    vidVolume.innerHTML = Math.round(vid.volume * 2 * 100) + "%";
                    if(allowCookies) {
                        $.cookie('volume', (Math.round(vid.volume * 200) / 100), {expires: 30});
                    }
                }
            }
        }

        function vidVolMinus() {
            if(volumeBoost) {
                if ((Math.round(vid.volume * 100) / 100) >= 0.05) {
                    vid.volume = (Math.round(vid.volume * 100) / 100) - 0.05;
                    vidVolume.innerHTML = Math.round(vid.volume * 2 * 100) + "%";
                    if (allowCookies) {
                        $.cookie('volume', (Math.round(vid.volume * 200) / 100), {expires: 30});
                    }
                }
            } else {
                if ((Math.round(vid.volume * 100) / 100) >= 0.05) {
                    vid.volume = (Math.round(vid.volume * 100) / 100) - 0.05;
                    vidVolume.innerHTML = Math.round(vid.volume * 2 * 100) + "%";
                    if (allowCookies) {
                        $.cookie('volume', (Math.round(vid.volume * 200) / 100), {expires: 30});
                    }
                }
            }
        }

        //Events listeners
        pauseButton.addEventListener("click", function () {
            vid.classList.toggle("stopfade");
            if (vid.paused) {
                vid.play();
                pauseButton.innerHTML = "Pause";
            } else {
                vid.pause();
                pauseButton.innerHTML = "Play";
            }
        });
        volUpButton.addEventListener("click", function() {
            vidVolPlus();
        });
        volDownButton.addEventListener("click", function() {
            vidVolMinus();
        });
        nextButton.addEventListener("click", function() {
            vidNext();
        });
        prevButton.addEventListener("click", function() {
            vidPrev();
        });
        vid.addEventListener("ended", function() {
            vidRandom();
        });
        for (var i = 0; i < trackListElements.length; i++) {
            trackListElements[i].addEventListener('click', function () {vidPlayId(parseInt(this.getAttribute("data-id")));});
        }
        trackListToggleButton.addEventListener("click", function() {
            this.classList.toggle('active');
            if (trackList.style.display == 'block') {
                trackList.style.display = 'none';
            } else {
                trackList.style.display = 'block';
            }
        });
        qualitySettingsToggleButton.addEventListener("click", function() {
            this.classList.toggle('active');
            if (qualitySettings.style.display == 'block') {
                qualitySettings.style.display = 'none';
            } else {
                qualitySettings.style.display = 'block';
            }
        });
        generalSettingsToggleButton.addEventListener("click", function() {
            this.classList.toggle('active');
            if (generalSettings.style.display == 'block') {
                generalSettings.style.display = 'none';
            } else {
                generalSettings.style.display = 'block';
            }
        });
        for (var i = 0; i < qualityButtons.length; i++) {
            qualityButtons[i].addEventListener("click", function () {
                for (var j = 0; j < qualityButtons.length; j++) {
                    qualityButtons[j].classList.remove('active');
                }
                this.classList.add('active');
                quality = this.getAttribute('data-quality');
                if(allowCookies) {
                    $.cookie('quality', quality, {expires: 30});
                }
                var currentTime = vid.currentTime;
                vidPlayId(currentVideoID);
                vid.currentTime = currentTime;
            });
        }
        useCookiesNoButton.addEventListener("click", function() {
            useCookiesYesButton.classList.remove('active');
            this.classList.add('active');
            $.removeCookie('quality');
            $.removeCookie('volume');
            $.removeCookie('volumeBoost');
            allowCookies = false;
        });
        useCookiesYesButton.addEventListener("click", function() {
            useCookiesNoButton.classList.remove('active');
            this.classList.add('active');
            $.cookie('quality', quality, {expires: 30});
            allowCookies = true;
            if(volumeBoost) {
                $.cookie('volumeBoost', true, {expires: 30});
                $.cookie('volume', (Math.round(vid.volume * 200) / 100), {expires: 30});
            } else {
                $.cookie('volume', (Math.round(vid.volume * 200) / 100), {expires: 30});
            }
        });
        useVolumeBoostNoButton.addEventListener("click", function() {
            useVolumeBoostYesButton.classList.remove('active');
            this.classList.add('active');
            volumeBoost = false;
            if(allowCookies) {
                $.removeCookie('volumeBoost');
            }
            if (vid.volume > 0.5) {
                vid.volume = 0.5;
                vidVolume.innerHTML = Math.round(vid.volume * 2 * 100) + "%";
                if (allowCookies) {
                    $.cookie('volume', (Math.round(vid.volume * 200) / 100), {expires: 30});
                }
            }
        });
        useVolumeBoostYesButton.addEventListener("click", function () {
            useVolumeBoostNoButton.classList.remove('active');
            this.classList.add('active');
            volumeBoost = true;
            if (allowCookies) {
                $.cookie('volumeBoost', true, {expires: 30});
            }

        });
        aboutButton.addEventListener("click", function() {
            $('#about').toggle();
        });
        aboutClose.addEventListener("click", function () {
            $('#about').toggle();
        });
        //init settings
        var cookieQuality = $.cookie('quality');
        var cookieVolume = $.cookie('volume');
        var cookieVolumeBoost = $.cookie('volumeBoost');
        if(cookieQuality != undefined) {
            quality = cookieQuality;
            allowCookies = true;
            useCookiesYesButton.classList.add('active');
        } else {
            quality = startingQuality;
            useCookiesNoButton.classList.add('active');
        }
        if(cookieVolume != undefined) {
            volume = cookieVolume;
        } else {
            volume = startingVolume;
        }
        if(cookieVolumeBoost) {
            useVolumeBoostYesButton.classList.add('active');
            volumeBoost = true;
        } else {
            useVolumeBoostNoButton.classList.add('active');
        }

        vidPlayId(Math.round(Math.random() * opListLength)); //First video

        vid.volume = volume/2;
        vidVolume.innerHTML = Math.round(vid.volume * 200) + "%";

        qualityButtons[quality].classList.add('active');
    </script>
</body>
</html>