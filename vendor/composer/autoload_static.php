<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit70a300e5cd46c1990bd1f3dcda8e2f25
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'S' => 
        array (
            'Sirius\\Validation\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Valitron',
            1 => __DIR__ . '/../..' . '/tests/Valitron',
        ),
        'Sirius\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/siriusphp/validation/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit70a300e5cd46c1990bd1f3dcda8e2f25::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit70a300e5cd46c1990bd1f3dcda8e2f25::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
