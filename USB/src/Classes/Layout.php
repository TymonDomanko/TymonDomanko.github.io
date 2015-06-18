<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tymon
 * Date: 28-Apr-15
 * Time: 1:49 PM
 */

class Layout {
    public $PageName;
    public $PageContent;
    public $Active;
    public $SubActive;
    public $StyleSheet;
    public $Conditions;
    public $DistanceFromRoot;

    public function __construct($PageName, $PageContent, $Active, $SubActive = Null, $StyleSheet = Null, $Conditions = Null, $DistanceFromRoot = 0){
        if (empty($PageName)){
            $this->PageNameShort = 'Epping Rovers';
            $this->PageNameLong = 'Epping Rovers';
        } else {
            $this->PageNameShort = 'ER: ' . $PageName;
            $this->PageNameLong = 'Epping Rovers: ' . $PageName;
            if (strpos($Conditions, 'NoMobileTitle') === False) {
                $this->PageName = $PageName;
            }
        }
        switch(strtoupper($Active)) {
            case 'HOME';
                $this->Home = ' class="active"';
                break;
            case 'CALENDAR';
                $this->Calendar = ' class="active"';
                break;
            case 'RESOURCES';
                $this->Resources = ' class="active"';
                break;
            case 'CONTACTUS';
                $this->ContactUs = ' class="active"';
                break;
            case 'ABOUTUS';
                $this->AboutUs = ' active';
                switch(strtoupper($SubActive)){
                    case 'ABOUTUS';
                        $this->AboutUsSub = ' class="active"';
                        break;
                    case 'FAQ';
                        $this->FAQ = ' class="active"';
                        break;
                    case 'HISTORY';
                        $this->History = ' class="active"';
                        break;
                    case 'ACHIEVEMENTS';
                        $this->Achievements = ' class="active"';
                        break;
                    default;
                        $this->AboutUsSub = ' class="active"';
                        break;
                };
                break;
            default;
                break;
        }

        if (empty($StyleSheet)){}else{
            $this->StyleSheet = '<link href="ResourcesFolder/CSS/' . $StyleSheet . '.css" rel="stylesheet"/>';
        }

        $Root = Null;
        if ($DistanceFromRoot != 0){
            for ($i = 1; $i <= $DistanceFromRoot; $i++){
                $Root = $Root . '../';
            }
        }
        $this->Root = $Root;
        $this->PageContent = $PageContent;
        $this->Facebook = 'https://www.facebook.com/EppingRovers';
        $this->Twitter = 'https://twitter.com/eppingrovers';
        $this->GooglePlus = 'https://plus.google.com/102127383348701692591';
        $this->Flickr = 'https://www.flickr.com/photos/131599674@N08/';
    }


    public function Layout(){
        return '<!-- Written By Tymon Domanko. Contact at Tymon1996@gmail.com for support -->
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <!-- Name of page that will show up in the tab -->
    <title>' . $this->PageNameShort . '</title>
    <!-- Loads in jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Loading in bootstrap to make stuff easier -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Makes the site more mobile friendly, maybe -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Loads in BlogEntries Styles-->

    <!-- Loads in the stylesheets -->
    <link href="' . $this->Root . 'ResourcesFolder/CSS/Main.css" rel="stylesheet"/>
    ' . $this->StyleSheet . '
    <!-- Loads in the Epping Rovers Icon -->
    <link href="' . $this->Root . 'ResourcesFolder/Images/EppingRovers.ico" rel="icon" type="image/x-icon"/>
    <!-- Sets the site for search browsers to link to -->
    <link href="EppingRovers.com" rel="canonical"/>

</head>

<body>
<!-- Setup Facebook Java SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=650242765098592";
    fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
<!-- End Facebook Java SDK Setup -->

<!-- Sets up Navigation bar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navigation-Bar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#epping-rovers-navbar-collapse">
            <span class="sr-only">Epping Rovers</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">Epping Rovers</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="epping-rovers-navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
            <li' . @$this->Home . '><a href="' . $this->Root . 'index.php">Home</a></li>
            <li' . @$this->Calendar . '><a href="' . $this->Root . 'Calendar.php">Calendar</a></li>
            <li' . @$this->Resources . '><a href="' . $this->Root . 'Resources.php">Resources</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li' . @$this->ContactUs . '><a href="' . $this->Root . 'ContactUs.php">Contact Us</a></li>
            <li class="dropdown' . @$this->AboutUs . '">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">About Us <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li' . @$this->AboutUsSub . '><a href="' . $this->Root . 'AboutUs.php">About Us</a></li>
                    <li' . @$this->FAQ . '><a href="' . $this->Root . 'FAQ.php">FAQ</a></li>
                    <li' . @$this->History . '><a href="' . $this->Root . 'CrewHistory.php">History</a></li>
                    <li' . @$this->Achievements . '><a href="' . $this->Root . 'CrewAchievements.php">Crew Achievements</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<!-- End Navigation bar Setup -->


<!-- Jumbotron Setup -->
<div id="jumbotron" class="jumbotron hidden-xs hidden-sm">
    <div class="container">
        <h1>' . $this->PageNameLong . '</h1>
        <p class="catch-phrases"><span style="color: rgba(255, 255, 255, 0); text-shadow: 0 0 rgba(255, 255, 255, 0);">|</span></p>
        <script>
        // Catch phrase setup
        var $CatchPhrase = new Array();
        $CatchPhrase.push("The oldest continuously running Rover Crew in the World.");
        $CatchPhrase.push("We don\'t do things by halves.");
        $CatchPhrase.push("Do stuff.");

        $CatchPhrase = $CatchPhrase[Math.floor(Math.random()*$CatchPhrase.length)];
        $(".catch-phrases").append($CatchPhrase);
        </script>
    </div>
</div>
<!-- End Jumbotron Setup -->

<!-- Sets up a social slider with links to social media -->
<div id="social_media_slider" class="social_media_slider">
    <div id="container">
        <!-- Directs them to the fb page -->
        <div id="facebook-slider"><a href="' . $this->Facebook . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/FacebookIcon.png" alt="Facebook link"/></a></div>
        <!-- Directs them to the twitter page -->
        <div id="twitter-slider"><a href="' . $this->Twitter . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/TwitterIcon.png" alt="Twitter link"/></a></div>
        <!-- Directs them to Google + -->
        <div id="google-plus-slider"><a href="' . $this->GooglePlus . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/GooglePlusIcon.png" alt="Google+ link"/></a></div>
        <!-- Directs them to flickr -->
        <div id="flickr-slider"><a href="' . $this->Flickr . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/FlickrIcon.png" alt="Flickr link"></a></div>
    </div>
</div><!-- End Social Slider Setup -->

<!-- Mobile Title Setup -->
<div id="mobile-title" class="visible-xs visible-sm">
    <h2>' . $this->PageName . '</h2>
</div>
<!-- End Mobile Title Setup -->

<!-- Setup Main Content -->
<div id="main-content" class="main-content">
' . $this->PageContent . '
</div>
<!-- End Main Content Setup -->


<!-- Sets up Facebook feed -->
    <div id="fb-feed" class="fb-feed hidden-xs hidden-sm">
    </div>

    <!-- End Facebook feed Setup -->

<!-- Footer Setup -->
    <footer class="footer">

    </footer><!-- End Footer Setup -->
<script>
    // Start footer setup
    var $WindowHeight = $(window).height();
    var $NavagationBarHeight = $("nav").height();
    var $JumbotronHeight = $(".jumbotron").height() + 30;
    var $MobileTitle = $("#mobile-title").height();
    var $MainContentHeight = $("#main-content").height();
    var $FooterHeight = $("footer").height();

    if ($WindowHeight > ($JumbotronHeight + $NavagationBarHeight + $MobileTitle + $MainContentHeight + $FooterHeight + 96)) {
        var $NewHeight = $WindowHeight - ($NavagationBarHeight + $MobileTitle + $JumbotronHeight + $FooterHeight + 96);
        $(".main-content").height($NewHeight + 5);
    }
    var $footer = \'<div class="container-fluid"><div class="container-fluid" id="left-container">\' +
            \'<p>©2015 1st Epping Rovers, <a href="http://www.scouts.com.au/">Scouts Australia</a>,\' +
            \'<a href="http://www.rovers.com.au/"> Rovers Australia</a>, <a href="http://www.nsw.scouts.com.au/">Scouts NSW</a>,\' +
            \'<a href="http://nsw.rovers.com.au/"> Rovers NSW</a>, <a href="http://www.eppingscouts.com.au/"> Epping Scouts</a></p>\' +
            \'</div>\' +
            \'<div class="container-fluid" id="right-container">\' +
            \'<a href="mailto:CrewLeader#EppingRovers.com?subject=Website Contact" target="_blank">CrewLeader@EppingRovers.com</p>\' +
            \'</div> </div>\';
    $("footer").append($footer);
    // End footer setup

    // Start FB setup
    if ($MainContentHeight < $NewHeight){ $MainContentHeight = $NewHeight }
    $MainContentHeight = $MainContentHeight - 5;
    // Sets the containing div\'s height
    $("#fb-feed").height($MainContentHeight);
    // Changes the height of the page Plugin
    var $FBFeed = \'<div class="fb-page" data-href="https://www.facebook.com/EppingRovers" data-width="100%" data-height="\' + $MainContentHeight + \'" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">\' +
            \'<div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/EppingRovers"><a href="https://www.facebook.com/EppingRovers">1st Epping Rovers</a></blockquote></div> </div> </div>\';
    // Adds the page plugin with custom page height
    $(".fb-feed").append($FBFeed);
    // End FB setup


</script>
</body>
</html>';
    }
}