<?php

/**
 * 
 * 随机红包
 * @param float $money 发放金额
 * @param number $num 红包个数
 * @return number[]
 */
function getRandomMoney($money = 6000.23, $num = 10)
{
    $result = array();
    $index = 0;
    // 水平分割
    for ($i = 0; $i < $money * 100; $i++) {
        isset($result[$index]) ? $result[$index]++ : $result[$index] = 1;
        if ($index < $num - 1) {
            $index++;
        } else {
            $index = 0;
        }
    }
    // 随机分配金额
    for ($i = 0; $i < $num * 10; $i++) {
        $r1 = rand(0, $num - 1);
        $r2 = rand(0, $num - 1);
        $per = rand(15, 65) / 100;
        // 随机金额
        $mon =  $result[$r1] - floor($result[$r1] * $per);
        if ($result[$r1] - $mon > 0) {
            // 减去随机金额
            $result[$r1] = $result[$r1] - $mon;
            // 添加随机金额
            $result[$r2] = $result[$r2] + $mon;
        }
    }
    return $result;
}
// file_put_contents('./randm.txt', time() . PHP_EOL, FILE_APPEND);
// var_dump('<pre>', getRandomMoney(199998888.99, 1000));
// file_put_contents('./randm.txt', time() . PHP_EOL, FILE_APPEND);
// exit;


/**
 *
 * 随机红包
 * @param float $money 发放金额
 * @param number $num 红包个数
 * @return number[]
 */
function getRandomMoneys($money = 6000.23, $num = 10)
{
    if ($money * 100 < $num) {
        exit('单个红包金额不足1分!');
    }
    $result = array();
    $rem = ($money * 100) % $num;
    $mean = ($money * 100 - $rem) / $num;
    // 水平分割
    for ($i = 0; $i < $num; $i++) {
        $result[$i] = $mean;
    }
    $result[0] = $result[0] + $rem;
    // 随机分配金额
    for ($i = 0; $i < $num; $i++) {
        $r1 = rand(0, $num - 1);
        $r2 = rand(0, $num - 1);
        $per = rand(1, 99) / 100;
        // 随机金额
        $mon =  $result[$r1] - floor($result[$r1] * $per);
        if ($result[$r1] - $mon > 0) {
            // 减去随机金额
            $result[$r1] = $result[$r1] - $mon;
            // 添加随机金额
            $result[$r2] = $result[$r2] + $mon;
        }
    }
    return $result;
}

var_dump('<pre>', getRandomMoneys(10, 200));

var_dump(getRandomMoneys());exit();

var_dump('<pre>', getRandomMoney(10, 30));exit();


/**
 *
 * @param float $money
 * @param int $num
 * @return array
 */
function getRandomMoneyss($money = 6000.23, $num = 10)
{
    if ($money * 100 < $num) {
        exit('单个红包金额不足1分!');
    }
    $result = array();
    $rem = ($money * 100) % $num;
    $mean = ($money * 100 - $rem) / $num;
    // 水平分割
    for ($i = 0; $i < $num; $i++) {
        $result[$i] = $mean;
    }
    $result[0] = $result[0] + $rem;
    // 随机分配金额
    for ($i = 0; $i < $num; $i++) {
        $r1 = rand(0, $num - 1);
        $r2 = rand(0, $num - 1);
        $per = rand(1, 99) / 100;
        // 随机金额
        $mon =  $result[$r1] - floor($result[$r1] * $per);
        if ($result[$r1] - $mon > 0) {
            // 减去随机金额
            $result[$r1] = $result[$r1] - $mon;
            // 添加随机金额
            $result[$r2] = $result[$r2] + $mon;
        }
    }
    return $result;
}










