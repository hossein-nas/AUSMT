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