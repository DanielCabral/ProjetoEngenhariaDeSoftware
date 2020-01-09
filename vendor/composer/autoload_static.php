<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b0ac1a2850b9e720cf42ff4ab84a478
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Developer\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Developer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/developer',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b0ac1a2850b9e720cf42ff4ab84a478::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b0ac1a2850b9e720cf42ff4ab84a478::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
