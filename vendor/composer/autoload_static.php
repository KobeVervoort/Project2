<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda707f3410dca2cb117524bb99a6fe8b
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bazaar\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bazaar\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Bazaar',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitda707f3410dca2cb117524bb99a6fe8b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitda707f3410dca2cb117524bb99a6fe8b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
