var fbdiv = $('#fb-feed');
var footer = $('footer');
var MainContent = $("#main-content");

var $TotalHorizontalPadding = 70;

$(window).resize(function() {
    var $WindowHeight = $(window).height();
    var $NavagationBarHeight = $("nav").height();
    var $JumbotronHeight = $(".jumbotron").height() + 30;
    var $MobileTitle = $("#mobile-title").height();
    var $MainContentHeight = MainContent.height();
    var $FooterHeight = footer.height();

    // Start footer setup
    if ($WindowHeight > ($JumbotronHeight + $NavagationBarHeight + $MobileTitle + $MainContentHeight + $FooterHeight + 96)) {
        var $NewHeight = $WindowHeight - ($NavagationBarHeight + $MobileTitle + $JumbotronHeight + $FooterHeight + 96);
        $(".main-content").height($NewHeight + 5);
    }
    var $footer = '<div class="container-fluid" id="footer-content"><div class="container-fluid" id="left-container">' +
        '<p>©2015 1st Epping Rovers, <a href="http://www.scouts.com.au/">Scouts Australia</a>,' +
        '<a href="http://www.rovers.com.au/"> Rovers Australia</a>, <a href="http://www.nsw.scouts.com.au/">Scouts NSW</a>,' +
        '<a href="http://nsw.rovers.com.au/"> Rovers NSW</a>, <a href="http://www.eppingscouts.com.au/"> Epping Scouts</a></p>' +
        '</div>' +
        '<div class="container-fluid" id="right-container">' +
        '<a href="mailto:CrewLeader#EppingRovers.com?subject=Website Contact" target="_blank"><p>CrewLeader@EppingRovers.com</p>' +
        '</div> </div>';
    $('#footer-content').replaceWith($footer);
    // End footer setup

    var $WindowWidth = $(window).width();
    var $FacebookWidth = fbdiv.width();
    MainContent.css('width', $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding));
});

var main = function() {
    // Catch phrase setup
    var $CatchPhrase = new Array();
    $CatchPhrase.push("The oldest continuously running Rover Crew in the World.");
    $CatchPhrase.push("We don\'t do things by halves.");
    $CatchPhrase.push("Do stuff.");

    $CatchPhrase = $CatchPhrase[Math.floor(Math.random() * $CatchPhrase.length)];
    $(".catch-phrases").append($CatchPhrase);

    var $WindowHeight = $(window).height();
    var $NavagationBarHeight = $("nav").height();
    var $JumbotronHeight = $(".jumbotron").height() + 30;
    var $MobileTitle = $("#mobile-title").height();
    var $MainContentHeight = MainContent.height();
    var $FooterHeight = footer.height();

    // Start footer setup
    if ($WindowHeight > ($JumbotronHeight + $NavagationBarHeight + $MobileTitle + $MainContentHeight + $FooterHeight + 96)) {
        var $NewHeight = $WindowHeight - ($NavagationBarHeight + $MobileTitle + $JumbotronHeight + $FooterHeight + 96);
        $(".main-content").height($NewHeight + 5);
    }
    var $footer = '<div class="container-fluid" id="footer-content"><div class="container-fluid" id="left-container">' +
        '<p>©2015 1st Epping Rovers, <a href="http://www.scouts.com.au/">Scouts Australia</a>,' +
        '<a href="http://www.rovers.com.au/"> Rovers Australia</a>, <a href="http://www.nsw.scouts.com.au/">Scouts NSW</a>,' +
        '<a href="http://nsw.rovers.com.au/"> Rovers NSW</a>, <a href="http://www.eppingscouts.com.au/"> Epping Scouts</a></p>' +
        '</div>' +
        '<div class="container-fluid" id="right-container">' +
        '<a href="mailto:CrewLeader#EppingRovers.com?subject=Website Contact" target="_blank"><p>CrewLeader@EppingRovers.com</p>' +
        '</div> </div>';
    footer.append($footer);
    // End footer setup

    // Start FB setup
    if ($MainContentHeight < $NewHeight){ $MainContentHeight = $NewHeight }
    $MainContentHeight = $MainContentHeight - 5;
    // Sets the containing div\'s height
    fbdiv.height($MainContentHeight);
    // Changes the height of the page Plugin
    var $FBFeed = '<div class="fb-page" data-href="https://www.facebook.com/EppingRovers" data-width="100%" data-height="' + $MainContentHeight + '" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">' +
        '<div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/EppingRovers"><a href="https://www.facebook.com/EppingRovers">1st Epping Rovers</a></blockquote></div> </div> </div>';
    // Adds the page plugin with custom page height
    $(".fb-feed").append($FBFeed);
    // End FB setup

    var $WindowWidth = $(window).width();
    var $FacebookWidth = fbdiv.width();
    MainContent.css('width', $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding));
};

$(document).load(main());