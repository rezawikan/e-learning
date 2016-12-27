<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit07712fa4c5fd37c0b0478505cc103125
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Elearn\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Elearn\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit07712fa4c5fd37c0b0478505cc103125::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit07712fa4c5fd37c0b0478505cc103125::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}