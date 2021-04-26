<?php
namespace dsmgfw\views;
use eftec\bladeone\BladeOne;
/**
 * DSMG Blade Views Renderer.
 *
 * 
 * @category Template Engine
 * @author   Salvatore Cahyo <me@salvatorecahyo.my.id>
 * @license  https://opensource.org/licenses/MIT
 * @copyright Copyright (c) 2021, Salvatore Cahyo
 * @copyright Copyright (c) 2021, DS Media Group
 * @uses eftec\bladeone\BladeOne
 */
class blade
{
    /**
     * Render function
     * 
     * @var string $file
     * @var array|null $data
     * 
     */
    public static function render(string $file, array $data = [])
    {
        $views = __DIR__ . '/../../app/views';
        $cache = __DIR__ . '/../../storage/bootstrap';
        if ($_ENV['env'] == "dev") {
            $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
        } else {
            $blade = new BladeOne($views, $cache);
        }
        return $blade->run($file, $data);

    }
}
