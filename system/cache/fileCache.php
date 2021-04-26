<?php
namespace dsmgfw\cache;
use Doctrine\Common\Cache;
use Doctrine\Common\Cache\PhpFileCache;
class fileCache extends PhpFileCache{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../storage/cache");
    }
}