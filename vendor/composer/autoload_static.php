<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit394b2aaf9c0e931304e046e040aa216c
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WilliamCosta\\DotEnv\\' => 20,
            'WilliamCosta\\DatabaseManager\\' => 29,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WilliamCosta\\DotEnv\\' => 
        array (
            0 => __DIR__ . '/..' . '/william-costa/dot-env/src',
        ),
        'WilliamCosta\\DatabaseManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/william-costa/database-manager/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Bulletproof\\Image' => __DIR__ . '/..' . '/samayo/bulletproof/src/bulletproof.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit394b2aaf9c0e931304e046e040aa216c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit394b2aaf9c0e931304e046e040aa216c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit394b2aaf9c0e931304e046e040aa216c::$classMap;

        }, null, ClassLoader::class);
    }
}
