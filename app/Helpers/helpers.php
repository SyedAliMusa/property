<?php

if (! function_exists('fileExist262')) {

    function fileExist262($path, $image = 'abcccc.png'): string
    {
        $image  = ($image) ? $image : 'abc.png';
        $imagePath = "/propertyImages/$path/$image";
        $defaultImage = "/frontEnd/images/featured/featured-1.jpg";
        return file_exists(public_path($imagePath)) ? $imagePath : $defaultImage;
    }

}

if (! function_exists('fileExist85')) {

    function fileExist85($path, $image = 'abcccc.png'): string
    {
        $image  = ($image) ? $image : 'abc.png';
        $imagePath = "/propertyImages/$path/$image";
        $defaultImage = "/frontEnd/images/aa-listing/feacture1.jpg";
        return file_exists(public_path($imagePath)) ? $imagePath : $defaultImage;
    }

}

if (! function_exists('fileExist847')) {

    function fileExist847($path, $image = 'abcccc.png'): string
    {
        $image  = ($image) ? $image : 'abc.png';
        $imagePath = "/propertyImages/$path/$image";
        $defaultImage = "/frontEnd/images/details/detail-slide-1.jpg";
        return file_exists(public_path($imagePath)) ? $imagePath : $defaultImage;
    }

}

if (! function_exists('propertyType')) {

    function propertyType($type): string
    {
        return ($type == "Rent") ? "R" : "S";
    }

}

if (! function_exists('propertyPrice')) {

    function propertyPrice($type, $price): string
    {
        return ($type == "Rent") ? $price."/pm" : $price;
    }

}

if (! function_exists('propertyBlock')) {

    function propertyBlock($type): string
    {
        return ($type == "Rent") ? "rent-block" : "sale-block";
    }

}

if (! function_exists('agentProfileImage')) {

    function agentProfileImage($image = 'abcccccc.png', $size = 'small'): string
    {
        $image  = ($image) ? $image : 'abc.png';
        $imagePath = "/Profile/$image";
        $defaultImage = "/frontEnd/images/single-property/agent.jpg";
        if ($size != 'small'){
            $defaultImage = "/frontEnd/images/profile/profile1.jpg";
        }
        return file_exists(public_path($imagePath)) ? $imagePath : $defaultImage;
    }

}


