<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2a7bf7535e216db8f5f37a12f886ccb0
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Puwnz\\WpAdminTemplate\\' => 22,
        ),
        'C' => 
        array (
            'Cocur\\Slugify\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Puwnz\\WpAdminTemplate\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Cocur\\Slugify\\' => 
        array (
            0 => __DIR__ . '/..' . '/cocur/slugify/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2a7bf7535e216db8f5f37a12f886ccb0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2a7bf7535e216db8f5f37a12f886ccb0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2a7bf7535e216db8f5f37a12f886ccb0::$classMap;

        }, null, ClassLoader::class);
    }
}
