<?php
function ConvPostType($id){
    switch($id){
        case 1:
            return "post";
            break;
        case 2:
            return "page";
            break;
        case 3:
            return "notfication";
            break;
        case 4:
            return "seminar";
            break;
        case 5:
            return "other";
            break;
        default:
            return false;
    }
}

function seoUrl($string) {
    //Lower case everything
//    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
//    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}