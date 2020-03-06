<?php

include './phpqrcode/phpqrcode.php';

QRcode::png('http://gogs.mydemos.cn', FALSE, QR_ECLEVEL_L, 10, 2);