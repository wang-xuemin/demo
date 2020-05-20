<?php

/**
 * Class Client
 */
class Client
{
    // 主机地址
    private static $host = '172.17.0.4';
    // 端口
    private static $port = '5672';
    // login 用户
    private static $login = 'guest';
    // 密码
    private static $password = 'guest';
    // virtual hosts
    private static $v_host = '/';
    // connect object
    private static $connect;

    /**
     * 获取连接
     * @return void
     */
    public function connect()
    {
        try {
            // 创建连接
            if (empty(self::$connect)) {
                self::$connect = new AMQPConnection(array('host' => self::$host, 'port' => self::$port, 'login' => self::$login,
                    'password' => self::$password, 'vhost' => self::$v_host));
            }
            self::$connect->connect();
        } catch (Exception $exception) {
            var_dump($exception->getMessage());
            exit();
        }
    }

    /**
     * 获取消息
     * @param string $exchange_name
     * @param string $queue_name
     * @param string $routing_key
     * @return mixed
     */
    public static function get($exchange_name = 'exchange', $queue_name = 'queue', $routing_key = '')
    {
        $message = array();
        try {
            self::connect();
            // 创建channel
            $channel = new AMQPChannel(self::$connect);
            // 创建列队
            $q = new AMQPQueue($channel);
            // 设置列队名称，不存在则添加一个
            $q->setName($queue_name);
            // 持久化交换机和队列,当代理重启动后依然存在,并包括它们中的完整数据    // define(‘AMQP_DURABLE‘, 2);
            $q->setFlags(AMQP_DURABLE);
            // 声明一个新队列
            $q->declare();
            // 将给定的队列绑定到交换机上
            $q->bind($exchange_name, $routing_key);
            //消息获取 当在队列get方法中作为标志传递这个参数的时候,消息将在被服务器输出之前标志为acknowledged (已收到)
            $messages = $q->get(AMQP_AUTOACK);
            if ($messages){
                $message = json_decode($messages->getBody(), true);
            }
            self::disconnect();
        } catch (Exception $exception) {
            var_dump($exception->getMessage());
            exit();
        }
        return $message;
    }

    /**
     *
     * 断开连接
     * @return void
     */
    public function disconnect()
    {
        self::$connect->disconnect();
    }
}

var_dump(Client::get('exchange_sanguo_weiguo', 'queue_weiguo', 'weiguo'), '<br />');

var_dump(Client::get('exchange_sanguo_shuguo', 'queue_shuguo', 'shuguo'), '<br />');

var_dump(Client::get('exchange_sanguo_wuguo', 'queue_wuguo', 'wuguo'), '<br />');


