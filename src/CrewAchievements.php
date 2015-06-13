<?php
require_once('Classes/NumericConfigLoader.php');
require_once('Classes/Layout.php');
$NewAchievements = new NumericConfigLoader('CrewAchievementsList');

$content = $NewAchievements->_list() .
        '<li>2011 - Best Dressed Crew at “Holy CRAP”</li>
        <li>2011 - Ran “Halloween Casino Night”</li>
        <li>2011 - Ran Sydney North Region Summer Moot “Western Moot” at Camp Kanangra, Nords Warf</li>
        <li>2010 - Quality Rovering Award</li>
        <li>2010 - Best dressed Crew, CRAP On Fire</li>
        <li>2010 - Winner of the Sydney North Region Summer Moot “Seuss Moot” at Camp Ku-ring-gai.</li>
        <li>2009 - Ran “Nintendo CRAP”</li>
        <li>2008 - Best dressed male and female, Mexico CRAP</li>
        <li>2008 - Won “Best Activity” ROSCAR for “That 70s Moot”</li>
        <li>2008 - Ran “That 70s Moot” at Kangaroo Valley</li>
        <li>2006 - Best dressed Crew at the Branch Rover Ball “Rock & Ball”, at Cataract Scout Park</li>
        <li>2006 - Region & overall runner-up of the Sydney North Region Summer Moot “Dude Where’s My Moot?”, at Kariong Scout Camp.</li>
        <li>2005 - SNR ROSCAR for “Best Region Event” (Mullet Moot).</li>
        <li>2005 - SNR ROSCAR for “Outstanding Crew”.</li>
        <li>2005 - Ran the Sydney North Region Summer Moot “Mullet Moot”, at Wollondilly River Station (Goodman\'s Ford).</li>
        <li>2005, 20 March - First Crew to join the “International Rovering Web Community”</li>
        <li>2004 - Quality Rovering Award.</li>
        <li>2004 - Runner up for the SNR Outstanding Crew award (ROSCAR).</li>
        <li>2004 - SNR ROSCAR for “Outstanding Rover” (John Williams).</li>
        <li>2004 - SNR ROSCAR for “Outstanding Service Activity” (Epping\'s Charity Trivia Night).</li>
        <li>2004 - Region winner of the Sydney North Region Summer Moot “The Moot Must Be Crazy”, at Polish Camp (Upper Colo).</li>
        <li>2004, 10 August - First Australian Rover Crew to affiliate with the Rover Scout Association (RSA).</li>
        <li>1963 - Best decorated table at the State Rover-Ranger Ball.</li>
        <li>1963 - Trophy for the Camp Fire Item at the Area Rover Moot.</li>
    </ul>';

$index = new Layout('Crew Achievements', $content, 'AboutUs', 'Achievements');
echo $index->Layout();
