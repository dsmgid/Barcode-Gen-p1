<?php
namespace dsmgfw\views;

use twig\Environment;
use twig\Loader\FilesystemLoader;
/**
 * DSMG Twig Views Renderer.
 *
 * 
 * @category Template Engine
 * @author   Salvatore Cahyo <me@salvatorecahyo.my.id>
 * @license  https://opensource.org/licenses/MIT
 * @copyright Copyright (c) 2021, Salvatore Cahyo
 * @copyright Copyright (c) 2021, DS Media Group
 * @uses twig\twig
 */
class twig
{
    /**
     * Render function
     * 
     * @var string $file
     * @var array|null $data
     * 
     */
    public static function render(string $file, array $data = null)
    {

        $loader = new FilesystemLoader(__DIR__ . '/../../app/views');
        $twig = new Environment($loader, [
            'cache' => __DIR__ . '/../../cache',
        ]);
        return $twig->render($file, $data);
    }
}
