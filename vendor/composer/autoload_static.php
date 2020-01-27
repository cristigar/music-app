<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61ea2fee3715e045f3e2c3db4506a2e9
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Tests\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tests',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit61ea2fee3715e045f3e2c3db4506a2e9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61ea2fee3715e045f3e2c3db4506a2e9::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit61ea2fee3715e045f3e2c3db4506a2e9::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}