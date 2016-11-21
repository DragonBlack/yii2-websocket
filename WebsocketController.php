<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 21.11.16
 * Time: 9:23
 */

namespace dragonblack\yii2websocket;


use dragonblack\phpwebsocket\Server;
use yii\console\Controller;

class WebsocketController extends Controller {

    public $component = 'websocket';

    /**
     * Start websocket server
     *
     * @param $server
     */
    public function actionStart($server){
        $wsServer = new Server(\Yii::$app->get($this->component)->servers[$server]);
        call_user_func([$wsServer, 'start']);
    }

    /**
     * Stop websocket server
     *
     * @param $server
     */
    public function actionStop($server){
        $wsServer = new Server(\Yii::$app->get($this->component)->servers[$server]);
        call_user_func([$wsServer, 'stop']);
    }

    /**
     * Restart websocket server
     *
     * @param $server
     */
    public function actionRestart($server){
        $wsServer = new Server(\Yii::$app->get($this->component)->servers[$server]);
        call_user_func([$wsServer, 'stop']);
        call_user_func([$wsServer, 'start']);
    }
}