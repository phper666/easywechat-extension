<?php
declare(strict_types=1);
namespace Phper666\EasywechatExtension;

/**
 * Class Factory
 * @package Phper666\EasywechatExtension
 */
class Factory extends \EasyWeChat\Factory
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return \EasyWeChat\Kernel\ServiceContainer
     */
    public static function customMake($name, array $config)
    {
        $namespace = \EasyWeChat\Kernel\Support\Str::studly($name);
        $application = "\\Phper666\\EasywechatExtension\\{$namespace}\\Application";

        return new $application($config);
    }
}
