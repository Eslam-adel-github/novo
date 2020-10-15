<?php

/*
Not needed as we can rely on roles
function user_types()
{
    return [
        'user',
        'vendor',
        'admin',
    ];
}
*/
function getParticipations(){
    return [
        "public",
        "doctor",
    ];
}

function getUsersType(){
    return [
        0=>"Admin",
        2=>"HCP"
    ];
}
function getInvitedTypes(){
    return [
        "Specialty"=>"Specialty",
        "Specific Doctors"=>"Specific Doctors"
    ];
}
function getInviteStatus(){
    return [
        "accepted"=>"Accepted",
        "rejected"=>"Rejected"
    ];
}
