<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a7e72154a6d9ee5f1bf636d3d54d314
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Telelog\\Inc\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Telelog\\Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a7e72154a6d9ee5f1bf636d3d54d314::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a7e72154a6d9ee5f1bf636d3d54d314::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0a7e72154a6d9ee5f1bf636d3d54d314::$classMap;

        }, null, ClassLoader::class);
    }
}
