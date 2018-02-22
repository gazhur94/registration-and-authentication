<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d2c61eb68e284a3251badf19ad705e5
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'authorization\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'authorization\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'authorization\\components\\generator' => __DIR__ . '/../..' . '/components/generator.php',
        'authorization\\config\\db' => __DIR__ . '/../..' . '/config/db.php',
        'authorization\\controllers\\LogInController' => __DIR__ . '/../..' . '/controllers/LogInController.php',
        'authorization\\controllers\\MainpageController' => __DIR__ . '/../..' . '/controllers/MainpageController.php',
        'authorization\\controllers\\SignUpController' => __DIR__ . '/../..' . '/controllers/SignUpController.php',
        'authorization\\controllers\\SuccessController' => __DIR__ . '/../..' . '/controllers/SuccessController.php',
        'authorization\\models\\Current_sessions' => __DIR__ . '/../..' . '/models/Current_sessions.php',
        'authorization\\models\\Users' => __DIR__ . '/../..' . '/models/Users.php',
        'authorization\\view\\helpers' => __DIR__ . '/../..' . '/view/helpers.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d2c61eb68e284a3251badf19ad705e5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d2c61eb68e284a3251badf19ad705e5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d2c61eb68e284a3251badf19ad705e5::$classMap;

        }, null, ClassLoader::class);
    }
}
