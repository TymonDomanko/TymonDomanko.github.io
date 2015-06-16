<?php
require_once('Classes/Layout.php');

$content = '    <p>
        1st Epping Rovers is a <a href="FAQ.php#traditional-rover-crew"> traditional</a>
        <a href="FAQ.php#what-is-a-rover"> rover</a> <a href="FAQ.php#what-is-a-rover-crew"> crew</a> and is the
        oldest continuously running crew in the world, as our <a href="CrewHistory.php">history</a> shows.
        We meet every Tuesday night and on some weekends, living out the
        <a href="FAQ.php#service">rover motto of service.</a>
    </p>

    <p>
        The crew <a href="CrewAchievements.php">achieved</a> much over its long history, with numerous
        <a href="FAQ.php#award-scheme">awardees</a> of the <a href="BadenPowellAward.php">Baden-Powell Award</a>,
        the highest award in Rovering, and the <a href="StanBalesAward.php">Stan Bales Service Award</a>, for exceptional
        service to Rovering.
    </p>

    <p>
        Past Crew Leaders can be found <a href="CrewLeaders.php">here.</a>
    </p>';

$AboutUs = new Layout('About Us', $content, 'AboutUs', 'AboutUs');
echo $AboutUs->Layout();