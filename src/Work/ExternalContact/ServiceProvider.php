<?php
declare(strict_types=1);
namespace Phper666\EasywechatExtension\Work\ExternalContact;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['external_contact'] = function ($app) {
            return new \EasyWeChat\Work\ExternalContact\Client($app);
        };

        $app['contact_way'] = function ($app) {
            return new \EasyWeChat\Work\ExternalContact\ContactWayClient($app);
        };

        $app['external_contact_statistics'] = function ($app) {
            return new \EasyWeChat\Work\ExternalContact\StatisticsClient($app);
        };

        $app['external_contact_message'] = function ($app) {
            return new \EasyWeChat\Work\ExternalContact\MessageClient($app);
        };

        // 扩展corp_tag
        $app['corp_tag'] = function ($app) {
            return new \Phper666\EasywechatExtension\Work\ExternalContact\CorpTag($app);
        };
    }
}
