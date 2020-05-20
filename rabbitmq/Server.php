<?php

/**
 * Class Server
 */
class Server
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
     * 推送消息
     * @param string $exchange_name 交换机名称
     * @param array $message 消息
     * @param string $routing_key routing_key
     * @return bool
     */
    public static function publish($exchange_name = 'exchange', $message = array(), $routing_key = '')
    {
        $result = false;
        try {
            self::connect();
            // 创建channel
            $channel = new AMQPChannel(self::$connect);
            // 创建交换机
            $ex = new AMQPExchange($channel);
            // 创建或选择交换机，不存在则添加一个
            $ex->setName($exchange_name);
            // 交换机类型
            // direct类型交换机 （直连交换机） // define(‘AMQP_EX_TYPE_DIRECT‘, ‘direct‘);
            // fanout类型交换机 （扇型交换机）// define(‘AMQP_EX_TYPE_FANOUT‘, ‘fanout‘);
            // topic类型交换机  （主题交换机）// define(‘AMQP_EX_TYPE_TOPIC‘, ‘topic‘);
            // header类型交换机 （头交换机）// define(‘AMQP_EX_TYPE_HEADERS‘, ‘headers‘);
            $ex->setType(AMQP_EX_TYPE_DIRECT);
            // 持久化交换机和队列,当代理重启动后依然存在,并包括它们中的完整数据    // define(‘AMQP_DURABLE‘, 2);
            $ex->setFlags(AMQP_DURABLE);
            $ex->declareExchange();
            // 推送消息
            $result = $ex->publish(json_encode($message), $routing_key);
            self::disconnect();
        } catch (Exception $exception) {
            var_dump($exception->getMessage());
            exit();
        }
        return $result;
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

var_dump(Server::publish('exchange_sanguo_weiguo', array('司马懿', 'zhangfei', '男', 30), 'weiguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_weiguo', array('司马昭', 'zhangfei', '男', 31), 'weiguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_weiguo', array('曹操', 'zhangfei', '男', 32), 'weiguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_weiguo', array('夏侯惇', 'zhangfei', '男', 33), 'weiguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_weiguo', array('许褚', 'zhangfei', '男', 34), 'weiguo'), '<br />');

var_dump(Server::publish('exchange_sanguo_shuguo', array('张飞', 'zhangfei', '男', 20), 'shuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_shuguo', array('关羽', 'zhangfei', '男', 21), 'shuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_shuguo', array('黄忠', 'zhangfei', '男', 22), 'shuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_shuguo', array('赵云', 'zhangfei', '男', 23), 'shuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_shuguo', array('马超', 'zhangfei', '男', 24), 'shuguo'), '<br />');

var_dump(Server::publish('exchange_sanguo_wuguo', array('周瑜', 'zhangfei', '男', 25), 'wuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_wuguo', array('孙权', 'zhangfei', '男', 26), 'wuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_wuguo', array('孙策', 'zhangfei', '男', 27), 'wuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_wuguo', array('陆逊', 'zhangfei', '男', 28), 'wuguo'), '<br />');
var_dump(Server::publish('exchange_sanguo_wuguo', array('黄盖', 'zhangfei', '男', 29), 'wuguo'), '<br />');


