<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9150e3cb9ea8bb1c14a63754f27e7059
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Eddieodira\\Messager\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Eddieodira\\Messager\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9150e3cb9ea8bb1c14a63754f27e7059::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9150e3cb9ea8bb1c14a63754f27e7059::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9150e3cb9ea8bb1c14a63754f27e7059::$classMap;

        }, null, ClassLoader::class);
    }
}
