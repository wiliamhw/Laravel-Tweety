<?php

function current_user() {
    return auth()->user();
}

function getRaws($target) {
    $raws = explode('/', $target);
    $new_raws = [];

    for ($i = 0; $i < count($raws); $i++) {
        if ($i < 3) continue;
        array_push($new_raws, $raws[$i]);
    }

    $new_raws = implode('/', $new_raws);
    return $new_raws;
}

function getPaginate() {
    return 10;
}
