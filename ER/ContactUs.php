<?php
require_once('Classes/Layout.php');

    function ButtonCreator($Position, $ShortPositions, $Email, $Line){
        return '<!-- Creates Button with drop down Form for emailing ' . $Position . ' -->
        <div id="' . $ShortPositions . ' position">
            <a href="mailto:' . $Email . '?subject=Website Contact" target="_blank">
                <div class="button">
                <p>' . $Line . '</p>
                </div>
            </a>
        </div>';
    }

    function ContactUsForm() {
        $ReturnString = Null;
        $PositionsFile = fopen('ResourcesFolder/Misc/CrewPositions.txt', 'r');
        if ($PositionsFile) {
            while (($Line = fgets($PositionsFile)) !== false){
                $Position = explode(' - ', $Line);
                $Position = $Position[0];
                $ShortPositions = str_replace(' ', '', $Position);
                $Email = $ShortPositions . '@EppingRovers.com';
                $ReturnString .= ButtonCreator($Position, $ShortPositions, $Email, $Line);
            }
            fclose($PositionsFile);
        } else {
            $ReturnString = 'There was an error opening the file.';
        }
        return $ReturnString;
    }

    $content = '    <p> There are a number of People you can contact if you want to know more about the Crew.<br> These people include:</p>
    <div id="positions"> ' . ContactUsForm("Crew Leader"). '</div>
        <div id="location">
        <div class="hidden-xs hidden-sm">
            <br><p>Epping Rover\'s Den is in Epping Scout Group\'s Essex St Hall which can be found here:</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d6633.152672833021!2d151.08345531723023!3d-33.77161219775746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sEpping+Scout+Hall!5e0!3m2!1sen!2sau!4v1426635036560" width="600" height="450" frameborder="0" style="border:0"></iframe>
        </div>
        <div class="visible-xs visible-sm">
            <br><p>Epping Rover\'s Den is in Epping Scout Group\'s Essex St Hall which can be found <a href="https://goo.gl/maps/TeROf" target="_blank">here.</a></p>
        </div>
    </div>';

$ContactUs = new Layout('Contact Us', $content, 'ContactUs', Null, 'ContactUs');
echo $ContactUs->Layout();

/*. */