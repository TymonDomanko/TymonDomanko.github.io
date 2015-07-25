var fbdiv = $('#fb-feed');
var footer = $('footer');
var MainContent = $("#main-content");


var $TotalHorizontalPadding = 75;

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
        '<p>?2015 1st Epping Rovers, <a href="http://www.scouts.com.au/">Scouts Australia</a>,' +
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
    var Width = $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding);
    if ($WindowWidth <= 768) {
        Width = $WindowWidth - $TotalHorizontalPadding;
    }
    MainContent.css('width', Width);
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

    var $WindowWidth = $(window).width();
    var $FacebookWidth = fbdiv.width();
    var Width = $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding);

    if ($WindowWidth <= 768) {
        Width = $WindowWidth - $TotalHorizontalPadding;
    }
    MainContent.css('width', Width);
};

$(document).load(main());