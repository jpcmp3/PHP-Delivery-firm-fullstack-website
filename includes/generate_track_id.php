<?php

function generate_track_id(){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $track_id = '';
    $length = 10;

    for ($i=0; $i < $length; $i++) { 
        $track_id .= $characters[rand(0,strlen($characters) - 1)];
    }
    return $track_id;
    
}

