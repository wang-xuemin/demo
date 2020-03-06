<?php
$redis = new Redis();
$redis->connect('106.12.38.82', 6379);
$redis->auth('wangxm!90');
$redis->set("test", "Hello World");
var_dump($redis->get("test"));














