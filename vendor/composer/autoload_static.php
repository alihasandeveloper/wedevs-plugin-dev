<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88363a83c289e662eef89d9463529527
{
    public static $files = array (
        '3d4bdccfee0aad5d5ac0575e811a4e0e' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alihasan\\WedevsAcademy\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alihasan\\WedevsAcademy\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88363a83c289e662eef89d9463529527::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88363a83c289e662eef89d9463529527::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit88363a83c289e662eef89d9463529527::$classMap;

        }, null, ClassLoader::class);
    }
}
