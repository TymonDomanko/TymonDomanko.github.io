var fbdiv = $('#fb-feed');
var footer = $('footer');
var MainContent = $("#main-content");

var $TotalHorizontalPadding = 75;

$(window).resize(function() {
    var $WindowHeight = $(window).height();
    var $NavagationBarHeight = $("nav").height();
    var $JumbotronHeight = $(".jumbotron").height() + 30;
    var $MobileTitle = $("#mobile-title").height();
    var $FooterHeight = footer.height();
    var $WindowWidth = $(window).width();

    // Start footer setup
    if ($WindowWidth <= 768) {MainContent.css('min-height', $WindowHeight - ($NavagationBarHeight + $MobileTitle + $FooterHeight));}
    else {MainContent.css('min-height', $WindowHeight - ($NavagationBarHeight + $JumbotronHeight + $FooterHeight));}
    // End footer setup

    var $FacebookWidth = fbdiv.width();
    var Width = $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding);
    if ($WindowWidth <= 768) {
        Width = $WindowWidth - $TotalHorizontalPadding;
    }
    if ($('.panel-group')[0]) {
        MainContent.css('width', Width);
    } else {
        MainContent.css('max-width', Width);
    }
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
    var $FooterHeight = footer.height();
    var $WindowWidth = $(window).width();

    // Start footer setup
    if ($WindowWidth <= 768) {MainContent.css('min-height', $WindowHeight - ($NavagationBarHeight + $MobileTitle + $FooterHeight));}
    else {MainContent.css('min-height', $WindowHeight - ($NavagationBarHeight + $JumbotronHeight + $FooterHeight));}

    var $footer = '<div class="container-fluid" id="footer-content"><div class="container-fluid" id="left-container">' +
        '<p>&copy; 2015 1st Epping Rovers, <a href="http://www.scouts.com.au/">Scouts Australia</a>,' +
        '<a href="http://www.rovers.com.au/"> Rovers Australia</a>, <a href="http://www.nsw.scouts.com.au/">Scouts NSW</a>,' +
        '<a href="http://nsw.rovers.com.au/"> Rovers NSW</a>, <a href="http://www.eppingscouts.com.au/"> Epping Scouts</a></p>' +
        '</div>' +
        '<div class="container-fluid" id="right-container">' +
        '<a href="mailto:CrewLeader#EppingRovers.com?subject=Website Contact" target="_blank"><p>CrewLeader@EppingRovers.com</p>' +
        '</div> </div>';
    footer.append($footer);
    // End footer setup

    var $FacebookWidth = fbdiv.width();
    var Width = $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding);

    if ($WindowWidth <= 768) {
        Width = $WindowWidth - $TotalHorizontalPadding;
    }
    if ($('.panel-group')[0]) {
        MainContent.css('width', Width);
    } else {
        MainContent.css('max-width', Width);
    };
};

$(document).load(main());