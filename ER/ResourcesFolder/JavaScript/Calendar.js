var main = function() {
    var $WindowWidth = $(window).width();
    var $FacebookWidth = $('#fb-feed').width();
    var $TotalHorizontalPadding = 70;
    var $Width =  $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding + 10);

    var $Calendar = '<div id="calendar"><div class="hidden-xs hidden-sm" id="normal-calendar">' +
    '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=calendar%40eppingrovers.com&amp;color=%23711616&amp;src=en.australian%23holiday%40group.v.calendar.google.com&amp;color=%236B3304&amp;src=s1tdda3klfbiufb4jpn1lq71c22ebj5q%40import.calendar.google.com&amp;color=%2342104A&amp;ctz=Australia%2FSydney" style=" border-width: 0 " width="' + $Width + '" height="600" frameborder="0" scrolling="no"></iframe>' +
    '</div>' +
    '<div class="visible-sm" id="tablet-calendar">' +
    '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=calendar%40eppingrovers.com&amp;color=%23711616&amp;src=en.australian%23holiday%40group.v.calendar.google.com&amp;color=%236B3304&amp;src=s1tdda3klfbiufb4jpn1lq71c22ebj5q%40import.calendar.google.com&amp;color=%2342104A&amp;ctz=Australia%2FSydney" style=" border-width:0 " width="' + $Width + '" height="575" frameborder="0" scrolling="no"></iframe>' +
    '</div>' +
    '<div class="visible-xs" id="mobile-calendar">' +
    '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;mode=AGENDA&amp;height=800&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=calendar%40eppingrovers.com&amp;color=%236B3304&amp;src=en.australian%23holiday%40group.v.calendar.google.com&amp;color=%230F4B38&amp;src=s1tdda3klfbiufb4jpn1lq71c22ebj5q%40import.calendar.google.com&amp;color=%2342104A&amp;ctz=Australia%2FSydney" style=" border-width:0 " width="' + $Width + '" height="800" frameborder="0" scrolling="no"></iframe>' +
    '</div></div>';
    $(".main-content").append($Calendar);
};
$(window).resize(function() {
    var $WindowWidth = $(window).width();
    var $FacebookWidth = $('#fb-feed').width();
    var $TotalHorizontalPadding = 70;
    var $Width =  $WindowWidth - ($FacebookWidth + $TotalHorizontalPadding);

    var $Calendar = '<div id="calendar"><div class="hidden-xs hidden-sm" id="normal-calendar">' +
        '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=calendar%40eppingrovers.com&amp;color=%23711616&amp;src=en.australian%23holiday%40group.v.calendar.google.com&amp;color=%236B3304&amp;src=s1tdda3klfbiufb4jpn1lq71c22ebj5q%40import.calendar.google.com&amp;color=%2342104A&amp;ctz=Australia%2FSydney" style=" border-width: 0 " width="' + $Width + '" height="600" frameborder="0" scrolling="no"></iframe>' +
        '</div>' +
        '<div class="visible-sm" id="tablet-calendar">' +
        '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=calendar%40eppingrovers.com&amp;color=%23711616&amp;src=en.australian%23holiday%40group.v.calendar.google.com&amp;color=%236B3304&amp;src=s1tdda3klfbiufb4jpn1lq71c22ebj5q%40import.calendar.google.com&amp;color=%2342104A&amp;ctz=Australia%2FSydney" style=" border-width:0 " width="' + $Width + '" height="575" frameborder="0" scrolling="no"></iframe>' +
        '</div>' +
        '<div class="visible-xs" id="mobile-calendar">' +
        '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;mode=AGENDA&amp;height=800&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=calendar%40eppingrovers.com&amp;color=%236B3304&amp;src=en.australian%23holiday%40group.v.calendar.google.com&amp;color=%230F4B38&amp;src=s1tdda3klfbiufb4jpn1lq71c22ebj5q%40import.calendar.google.com&amp;color=%2342104A&amp;ctz=Australia%2FSydney" style=" border-width:0 " width="' + $Width + '" height="800" frameborder="0" scrolling="no"></iframe>' +
        '</div></div>';
    $("#calendar").replaceWith($Calendar);
});

$(document).load(main());