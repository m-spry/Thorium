<html>

<head>
    <title id='name'></title>
    <link rel="stylesheet" href="settings/style.css">
    <link rel="stylesheet" href="settings/simple-grid.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Lato|Source+Sans+Pro" rel="stylesheet">
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="refresh" content="3600;url='http://localhost'">
</head>

<body

    <div class="row header">
        <div class="col-7">
            <h1 class="headerText"><img src="/assets/logo.png" /></h1>
        </div>
        <div class="col-2">
        </div>
        <div class="col-3">
            <div class="headerList">
                <!-- the social media stuff gets called from config.js in /settings -->
                <ul>
                    <li><i class='fa fa-facebook fa-lg'></i><span id='facebook' class="socialText"></span></li>
                    <li><i class='fa fa-twitter fa-lg'></i><span id='twitter' class="socialText"></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row col-12 panel">
        <!-- the banner stuff gets called here, currently it's defined in a config.js file -->
        <div class="col-9">
            <?php
                // add the password file
                require('scripts/password.php');
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT id, icon, notice FROM noticebar";
                $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            echo "<p class='panelText'><i class='" . $row["icon"] . "'></i>". $row["notice"] . " ";
         }
        mysqli_close($conn);
        ?>
        </div>
        <div class="col-3">
            <p id='date' style="text-align:right;"></p>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="slider datePanel">
                <ul>
                    <!-- the google calendar gets placed here -->
                    <ul id="events-upcoming">
                    </ul>
                </ul>
            </div>

        </div>
        <div class="col-6">
            <div id="slider">





                <ul>
                    <!-- this is a bit of php i found online, it looks for the images folder then every image inside becomes a li, then the slideshow displays it -->
                    <?php
                $dirname = "images/";
                $images = glob($dirname."*.*");

                foreach($images as $image) {
                echo "<li><img src='".$image."' /><br /></li>";
            }
                ?>
                </ul>
            </div>
        </div>
        <div class="col-2">
            <!-- the twitter iframe gets called here, I would like to use the Twitter API instead, but not super important right now -->
            <ul>
                <a class="twitter-timeline" href="https://twitter.com/poole_high" data-chrome="noscrollbar" data-width="400" data-height="500" tweet-limit="3">
                </a>
            </ul>
        </div>
    </div>


</body>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<!-- Site config file -->
<script type="text/javascript" src="settings/config.js"></script>

<!-- Google Calendar bits -->
<script src="js/format-google-calendar.js"></script>
<script>formatGoogleCalendar.init({
    calendarUrl: 'https://www.googleapis.com/calendar/v3/calendars/sc5iifhgog618b68u6gfbheb68@group.calendar.google.com/events?key=AIzaSyBjVT0Svkp9vP9Mn4Vsafhi2agFJcaheDo',
    past: false,
    upcomingTopN: 3,
    format: ['*summary*', '*date*', '*description*', '*location*'],
});</script>

<!-- Twitter stuff -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js"></script>
<script type="text/javascript" src="js/twitterFetcher.js"></script>
<script type="text/javascript" src="js/exampleUsage.js"></script>

<!-- Slider for the gallery -->
<script>
    jQuery(document).ready(function($) {
        $('#checkbox').ready(function() {
            setInterval(function() {
                moveRight();
            }, 3000);
        });
        var slideCount = $('#slider ul li').length;
        var slideWidth = $('#slider ul li').width();
        var slideHeight = $('#slider ul li').height();
        var sliderUlWidth = slideCount * slideWidth;
        $('#slider').css({
            width: slideWidth,
            height: slideHeight
        });
        $('#slider ul').css({

        });
        $('#slider ul li:last-child').prependTo('#slider ul');

        function moveLeft() {
            $('#slider ul').animate({
                left: +slideWidth
            }, 200, function() {
                $('#slider ul li:last-child').prependTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        function moveRight() {
            $('#slider ul').animate({
                left: -slideWidth
            }, 200, function() {
                $('#slider ul li:first-child').appendTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };
        $('a.control_prev').click(function() {
            moveLeft();
        });
        $('a.control_next').click(function() {
            moveRight();
        });
    });

</script>

<!-- Slider for the twitter stuff -->
<script>
jQuery(document).ready(function($) {
    $('#checkbox').ready(function() {
        setInterval(function() {
            moveRight();
        }, 3000);
    });
    var slideCount = $('#slider2 ul li').length;
    var slideWidth = $('#slider2 ul li').width();
    var slideHeight = $('#slider2 ul li').height();
    var slider2UlWidth = slideCount * slideWidth;
    $('#slider2').css({
        width: slideWidth,
        height: slideHeight
    });
    $('#slider2 ul').css({
        });
    $('#slider2 ul li:last-child').prependTo('#slider2 ul');
        function moveLeft() {
        $('#slider2 ul').animate({
            left: +slideWidth
        }, 200, function() {
            $('#slider2 ul li:last-child').prependTo('#slider2 ul');
            $('#slider2 ul').css('left', '');
        });
    };
        function moveRight() {
        $('#slider2 ul').animate({
            left: -slideWidth
        }, 200, function() {
            $('#slider2 ul li:first-child').appendTo('#slider2 ul');
            $('#slider2 ul').css('left', '');
        });
    };
    $('a.control_prev').click(function() {
        moveLeft();
    });
    $('a.control_next').click(function() {
        moveRight();
    });
});
</script>

<!-- Twitter iFrame stuff, will remove when Twitter slider is complete -->
<script>
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };
        return t;
    }(document, "script", "twitter-wjs"));

</script>

<!-- To put the date in the noticebar -->
<script>
    var today = new Date();
    $('#date').html(today.toDateString());

</script>

<!-- I should probably call this from my own website... Oh well -->
<script>
    console.log("Hi! This digital signage.... thing... was made by Daniel Pullan (https://danielpullan.co.uk)")
    console.log("Bugs can be reported to the current email address on my website. There will be some.")
</script>

</html>
