<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf86c180514b3ef45c73d0c24bb51573b
{
    public static $files = array (
        'ad80f63a1bfd9faf8652eedc80fb2797' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sobre\\Phpstore\\' => 15,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sobre\\Phpstore\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf86c180514b3ef45c73d0c24bb51573b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf86c180514b3ef45c73d0c24bb51573b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf86c180514b3ef45c73d0c24bb51573b::$classMap;

        }, null, ClassLoader::class);
    }
}
