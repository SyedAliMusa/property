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

    function agentProfileImage($image, $size = 'small'): string
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

if (! function_exists('userProfile')) {

    function userProfile(): string
    {

        if(\Illuminate\Support\Facades\Auth::user()) {
            $image = auth()->user()->profile;
            if (!empty($image) || $image != '')
                return '<img src="/public/backEnd/img/'.$image.'" class="img-circle elevation-2" alt="User Image">';
            else
                return '<img src="/public/backEnd/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
        } else {
            return '<img src="/public/backEnd/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
        }
    }

}


if (! function_exists('userProfileView')) {

    function userProfileView(): string
    {

        if(\Illuminate\Support\Facades\Auth::user()) {
            $image = auth()->user()->profile;
            if (!empty($image) || $image != '')
                return '<img src="/public/backEnd/img/'.$image.'" class="profile-user-img img-fluid img-circle" alt="User profile picture">';
            else
                return ' <img class="profile-user-img img-fluid img-circle"
                                     src="/public/backEnd/img/user4-128x128.jpg"
                                     alt="User profile picture">';
        } else {
            return ' <img class="profile-user-img img-fluid img-circle"
                                     src="/public/backEnd/user4-128x128.jpg"
                                     alt="User profile picture">';
        }
    }

}

if (! function_exists('isProfileHas')) {

    function isProfileHas($image): string
    {

        if (!empty($image) || $image != '')
            return true;
        else
            return false;
    }

}

if (! function_exists('isTrue')) {

    function isTrue($val): string
    {
        if ($val)
            return '<i class="fas fa-check" style="color: green;"></i>';
        else
            return '<i class="fas fa-times" style="color: red;"></i>';
    }

}

if (! function_exists('getModal')) {

    function getModal($check, $id, $modal, $changeFor = 'User'): string
    {

        if ($modal == 'Featured') {
            if ($check)
                return '<button type="button" data-type="Featured" data-changeFor="'.$changeFor.'" data-id="' . $id . '" class="btn btn-danger btn-changing-dan" data-toggle="modal">
                                                Remove Featured Status
                                            </button>';
            else
                return '<button type="button" data-type="Featured" data-changeFor="'.$changeFor.'" data-id="' . $id . '" class="btn btn-success btn-changing" data-toggle="modal">
                                                Set Featured
                                            </button>';
        } else if ($modal == 'Deactivate') {
            if ($check)
                return '<button type="button" data-type="Deactivate" data-changeFor="'.$changeFor.'" data-id="' . $id . '" class="btn btn-danger btn-changing-dan" data-toggle="modal">
                                                Deactivate
                                            </button>';
            else
                return '<button type="button" data-type="Deactivate" data-changeFor="'.$changeFor.'" data-id="' . $id . '" class="btn btn-success btn-changing" data-toggle="modal">
                                                Activate
                                            </button>';
        } else if ($modal == 'Sold') {
            if ($check)
                return '<button type="button" data-type="Deactivate" data-changeFor="'.$changeFor.'" data-id="' . $id . '" class="btn btn-success btn-changing" data-toggle="modal">
                                                Remove Sold Status
                                            </button>';
            else
                return '<button type="button" data-type="Deactivate" data-changeFor="'.$changeFor.'" data-id="' . $id . '" class="btn btn-danger btn-changing-dan" data-toggle="modal">
                                                Set Sold
                                            </button>';
        } else if ($modal == 'ContactUsActioned') {
            if (!$check)
                return '<button type="button" data-id="' . $id . '" class="btn btn-success btn-contactus-action" data-toggle="modal">
                                                    Take Action
                                                </button>';
            else
                return "Action already taken";
        } else if ($modal == 'ContactUsTicket') {
            if (!$check)
                return '<button type="button" data-id="' . $id . '" class="btn btn-success btn-contactus-ticket" data-toggle="modal">
                                                    Close Ticket
                                                </button>';
            else
                return "Ticket closed already";
        } else if ($modal == 'DeleteBlog') {
            if (!$check)
                return '<button type="button" data-id="' . $id . '" class="btn btn-success btn-blog-delete" data-toggle="modal">
                                                    Close Ticket
                                                </button>';
            else
                return "";
        } else {
            return false;
        }

    }



    if (! function_exists('BlogsImages')) {

        function BlogsImages($val): string
        {

            if ($val)
                return '<img src="/public/BlogsImages/'.$val.'" alt="Blog Image" />';
            else
                return '<img src="/public/BlogsImages/images/blog/blog-1.jpg" alt="Blog Image" />';
        }

    }
}


