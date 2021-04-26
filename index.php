<?php

require __DIR__ . '/vendor/autoload.php';
\dsmgfw\core::init();
use Pecee\SimpleRouter\SimpleRouter;
require 'app/routes.php';
require 'app/helpers.php';
SimpleRouter::setDefaultNamespace('\dsmgapp\controllers');
SimpleRouter::start();