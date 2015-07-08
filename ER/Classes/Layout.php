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

    public function __construct($PageName, $PageContent, $Active, $SubActive = Null, $StyleSheet = Null, $Conditions = Null, $DistanceFromRoot = 0, $JavaScript = Null){
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

        $Root = Null;
        if ($DistanceFromRoot != 0){
            for ($i = 1; $i <= $DistanceFromRoot; $i++){
                $Root = $Root . '../';
            }
        }
        $this->Root = $Root;

        if (empty($StyleSheet)) {$this->StyleSheet = Null;} else{
            $this->StyleSheet = '<link href="' . $this->Root . 'ResourcesFolder/CSS/' . $StyleSheet . '.css" rel="stylesheet"/>';
        }


        if (empty($JavaScript)) {$this->JavaScript = Null;} else{
            $this->JavaScript = '<script src="' . $this->Root . 'ResourcesFolder/JavaScript/' . $JavaScript . '.js"></script>';
        }


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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Makes the site more mobile friendly, maybe -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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

    </div>
</div>
<!-- End Jumbotron Setup -->

<!-- Sets up a social slider with links to social media -->
<div id="social_media_slider" class="social_media_slider">
    <div id="container">
        <!-- Directs them to the fb page -->
        <div id="facebook-slider" class="media-slider"><a href="' . $this->Facebook . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/FacebookIcon.png" alt="Facebook link" id="media"/></a></div>
        <!-- Directs them to the twitter page -->
        <div id="twitter-slider" class="media-slider"><a href="' . $this->Twitter . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/TwitterIcon.png" alt="Twitter link" id="media"/></a></div>
        <!-- Directs them to Google + -->
        <div id="google-plus-slider" class="media-slider"><a href="' . $this->GooglePlus . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/GooglePlusIcon.png" alt="Google+ link" id="media"/></a></div>
        <!-- Directs them to flickr -->
        <div id="flickr-slider" class="media-slider"><a href="' . $this->Flickr . '" target="_blank"><img src="' . $this->Root . 'ResourcesFolder/Images/FlickrIcon.png" alt="Flickr link" id="media"></a></div>
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
    <footer class="footer hidden-xs hidden-sm">

    </footer><!-- End Footer Setup -->
    <!-- Loads in JavaScript stuff -->
    ' . $this->JavaScript . '
    <script src="' . $this->Root . 'ResourcesFolder/JavaScript/Main.js"></script>
</body>
</html>';
    }
}