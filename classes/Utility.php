<?php
session_start();
include("../dbconnect.php");
$sessionUser = 0;

class Utility
{
    function isImage()
    {
    }

    function isLink()
    {

    }

    function isYoutubeEmbedLink($link)
    {
        $videoLink = $link;
        $lengthOfLink = strlen($videoLink);
        if ($lengthOfLink == 41) {
            return true;
        } else {
            return false;
        }
    }

}

?>