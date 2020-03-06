<?php

$suids = array(
    array(
        'uid' => 10
    ),
    array(
        'uid' => 11
    ),
    array(
        'uid' => 12
    ),
    array(
        'uid' => 13
    ),
    array(
        'uid' => 14
    ),
    array(
        'uid' => 15
    )
);

$cids = array(
    array(
        'cid' => 10
    ),
    array(
        'cid' => 11
    ),
    array(
        'cid' => 12
    ),
    array(
        'cid' => 13
    ),
    array(
        'cid' => 14
    ),
    array(
        'cid' => 15
    ),
    array(
        'cid' => 16
    ),
    array(
        'cid' => 17
    ),
    array(
        'cid' => 18
    ),
    array(
        'cid' => 19
    ),
    array(
        'cid' => 20
    ),
    array(
        'cid' => 21
    ),
    array(
        'cid' => 22
    ),
    array(
        'cid' => 23
    ),
    array(
        'cid' => 24
    ),
    array(
        'cid' => 25
    ),
    array(
        'cid' => 26
    ),
    array(
        'cid' => 27
    ),
    array(
        'cid' => 28
    ),
    array(
        'cid' => 29
    ),
    array(
        'cid' => 30
    ),
    array(
        'cid' => 31
    ),
    array(
        'cid' => 32
    ),
    array(
        'cid' => 33
    ),
    array(
        'cid' => 34
    ),
    array(
        'cid' => 35
    ),
    array(
        'cid' => 36
    )
);


// var_dump('<pre>', array_chunk($cids, floor(count($cids) / count($suids))));exit;

function getCidDatas($suids, $cids)
{
    $result = array();
    $index = 0;
    for ($i = 0; $i < count($cids); $i++) {
        $result[$index][] = array(
            'cid' => $cids[$i]['cid'],
            'uid' => $suids[$index]['uid']
        );
        if ($index < count($suids) - 1) {
            $index++;
        } else {
            $index = 0;
        }
    }
    return $result;
}

// var_dump('<pre>', getCidDatas($suids, $cids));


var_dump($_SERVER['REQUEST_METHOD']);exit;

























