<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdc3dada95a31407097bf6a77e685d0e4
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wingu\\OctopusCore\\Reflection\\' => 29,
        ),
        'P' => 
        array (
            'PHP2WSDL\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wingu\\OctopusCore\\Reflection\\' => 
        array (
            0 => __DIR__ . '/..' . '/wingu/reflection/src',
        ),
        'PHP2WSDL\\' => 
        array (
            0 => __DIR__ . '/..' . '/php2wsdl/php2wsdl/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdc3dada95a31407097bf6a77e685d0e4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdc3dada95a31407097bf6a77e685d0e4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdc3dada95a31407097bf6a77e685d0e4::$classMap;

        }, null, ClassLoader::class);
    }
}