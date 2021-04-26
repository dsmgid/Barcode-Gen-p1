<?php
namespace dsmgfw\views;

use Setono\PhpTemplates\Engine\Engine;
/**
 * DSMG Default Template Engine.
 *
 * 
 * @category Template Engine
 * @author   Salvatore Cahyo <me@salvatorecahyo.my.id>
 * @license  https://opensource.org/licenses/MIT
 * @copyright Copyright (c) 2021, Salvatore Cahyo
 * @copyright Copyright (c) 2021, DS Media Group
 * @uses Setono\PhpTemplates
 */
class views
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
        $engine = new Engine();
        $engine->addPath(__DIR__ . '/../../app/');
        return $engine->render("@views/{$file}", $data);
    }
}
