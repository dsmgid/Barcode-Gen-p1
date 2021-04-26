<?php
namespace dsmgfw\Middlewares;
use DebugBar\StandardDebugBar;
/**
 * DSMG Framework Debugger Interface
 *
 * 
 * @category Debug
 * @author   Salvatore Cahyo <me@salvatorecahyo.my.id>
 * @license  https://opensource.org/licenses/MIT
 * @copyright Copyright (c) 2021, Salvatore Cahyo
 * @copyright Copyright (c) 2021, DS Media Group
 * @uses DebugBar\StandardDebugBar
 */
class Debug {

    public static function debugger()
    {
        $debugbar = new StandardDebugBar();
        // $debugbar->addCollector(new \DebugBar\DataCollector\PDO\PDOCollector(\dsmgfw\db::pdo()));
        // $debugbar->getJavascriptRenderer();        
        return $debugbar->getJavascriptRenderer(); 
        
    }
}