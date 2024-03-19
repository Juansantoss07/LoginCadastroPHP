<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb74c4e4bb1221145b64779c218a44f77
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Aura\\Autoload\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Aura\\Autoload\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/autoload/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb74c4e4bb1221145b64779c218a44f77::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb74c4e4bb1221145b64779c218a44f77::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb74c4e4bb1221145b64779c218a44f77::$classMap;

        }, null, ClassLoader::class);
    }
}
