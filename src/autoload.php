<?php
/**
 * Автоподгрузка классов
 */

$classmap = [
    'Bot' => __DIR__ . '/lib/',
];

spl_autoload_register(function($classname) use ($classmap) {
    $parts = explode('\\', $classname);

    $namespace = array_shift($parts);
    $classfile = array_pop($parts) . '.php';

    if (!array_key_exists($namespace, $classmap)) {
        return;
    }

    $path = implode(DIRECTORY_SEPARATOR, $parts);
    $file = $classmap[$namespace] . $path . DIRECTORY_SEPARATOR . $classfile;

    if (!file_exists($file) && !class_exists($classname)) {
        return;
    }

    require_once $file;
});