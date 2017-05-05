<?php
/**
 * @var $autoLoader \Composer\Autoload\ClassLoader
 */
$autoLoader = require __DIR__ . '/../vendor/autoload.php';
$autoLoader->addPsr4('Teraone\\SlimCli\\tests\\', __DIR__.'/tests');