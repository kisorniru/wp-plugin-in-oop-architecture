<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit75ff4aabd5adc1ee94212489852823c0
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
            'Carbon_Fields_Plugin\\' => 21,
            'Carbon_Fields\\' => 14,
        ),
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Carbon_Fields_Plugin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/wp-content/plugins/carbon-fields-plugin/core',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit75ff4aabd5adc1ee94212489852823c0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit75ff4aabd5adc1ee94212489852823c0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
