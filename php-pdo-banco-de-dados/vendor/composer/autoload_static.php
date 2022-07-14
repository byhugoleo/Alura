<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fc9c8e57c8dc5195ca149723d3e4504
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Pdo\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Pdo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fc9c8e57c8dc5195ca149723d3e4504::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fc9c8e57c8dc5195ca149723d3e4504::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0fc9c8e57c8dc5195ca149723d3e4504::$classMap;

        }, null, ClassLoader::class);
    }
}
