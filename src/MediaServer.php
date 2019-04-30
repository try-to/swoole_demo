<?php declare (strict_types = 1);

/*
 * @Author: try-to w@tryto.cn
 * @Date: 2019-04-30
 */
namespace TrytoMediaServer;

use function TrytoMediaServer\Helper\tryto_env;

class MediaServer extends BaseServer
{

    public $host;
    public $port;
    public $mode;
    public $sock_type;
    public $options;
    public $pid_file = null;

    public function init()
    {
        $this->host = tryto_env('server.host');
        $this->port = tryto_env('server.port');
        $this->mode = tryto_env('server.mode');
        $this->sock_type = tryto_env('server.sock_type');
        $this->options = tryto_env('server.options', []);
        $this->pid_file = tryto_env('server.pid_file');
    }

    /**
     * onConnect
     *
     * @param \swoole_server $server
     * @param integer $fd
     * @return void
     */
    public function onConnect(\swoole_server $server, int $fd)
    {

    }

    /**
     * onReceive
     *
     * @param \swoole_server $server
     * @param integer $fd
     * @param integer $reactor_id
     * @param string $data
     * @return void
     */
    public function onReceive(\swoole_server $server, int $fd, int $reactor_id, string $data)
    {

    }

    /**
     * onWorkerStart
     *
     * @param \swoole_server $server
     * @param integer $worker_id
     * @return void
     */
    public function onWorkerStart(\swoole_server $server, int $worker_id)
    {

    }

    /**
     * 关闭连接 销毁携程变量.
     *
     * @param $server
     * @param $fd
     */
    public function onClose(\swoole_server $server, int $fd)
    {
        parent::onClose($server, $fd);
    }
}