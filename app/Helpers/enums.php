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
        1=>"Admin",
        2=>"HCP"
    ];
}
