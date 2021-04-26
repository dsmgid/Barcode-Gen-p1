<?php
namespace dsmgfw;

/**
 * DSMG Framework Core.
 *
 *
 * @author   Salvatore Cahyo <me@salvatorecahyo.my.id>
 * @license  https://opensource.org/licenses/MIT
 * @copyright Copyright (c) 2021, Salvatore Cahyo
 * @copyright Copyright (c) 2021, DS Media Group
 * @uses Dotenv\Dotenv
 * @uses \Whoops\Run
 */
use dsmgfw\cache;
use Phpfastcache\Config\ConfigurationOption;
use Illuminate\Database\Capsule\Manager as Capsule;
class core
{
    /**
     * Initialize application
     *
     *
     */
    public static function init()
    {
        session_name('dsmg-session');
        session_start();
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__, '/../.env');
        $dotenv->load();
        $capsule = new Capsule;
        $capsule->bootEloquent();
        if ($_ENV['env'] == "dev") {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
            error_reporting(E_ALL & ~E_NOTICE);
        } else {
            error_reporting(0);
        }
        $dir = __DIR__ . '/../storage';
        if (!is_dir($dir)) {
            mkdir($dir, 755, true);
        }
        if (file_exists(__DIR__ . "/../../.maintenance")) {
            die('Under Maintenance');
        }
    }
}
