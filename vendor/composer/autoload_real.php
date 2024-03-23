<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7dc13b8af5d2ef4b490ed0fa43f381ec
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit7dc13b8af5d2ef4b490ed0fa43f381ec', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7dc13b8af5d2ef4b490ed0fa43f381ec', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7dc13b8af5d2ef4b490ed0fa43f381ec::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
