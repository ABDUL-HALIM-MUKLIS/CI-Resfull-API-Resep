<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ab6af130c2a1d1010404220450e369f
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ab6af130c2a1d1010404220450e369f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ab6af130c2a1d1010404220450e369f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5ab6af130c2a1d1010404220450e369f::$classMap;

        }, null, ClassLoader::class);
    }
}
