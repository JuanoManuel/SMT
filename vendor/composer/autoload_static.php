<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit211bdce28410c929d2844bf2f77e5417
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mikehaertl\\wkhtmlto\\' => 20,
            'mikehaertl\\tmp\\' => 15,
            'mikehaertl\\shellcommand\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mikehaertl\\wkhtmlto\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/phpwkhtmltopdf/src',
        ),
        'mikehaertl\\tmp\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/php-tmpfile/src',
        ),
        'mikehaertl\\shellcommand\\' => 
        array (
            0 => __DIR__ . '/..' . '/mikehaertl/php-shellcommand/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit211bdce28410c929d2844bf2f77e5417::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit211bdce28410c929d2844bf2f77e5417::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
