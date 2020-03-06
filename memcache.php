<?php
$mem = new Memcached();
$mem->addServer('106.12.38.82', 11211);
$mem->add('key', 'This is a test!', 10);
$val = $mem->get('key');
echo $val;






