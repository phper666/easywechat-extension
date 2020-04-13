<?php
declare(strict_types=1);
namespace Phper666\EasywechatExtension\Work;
use EasyWeChat\Work\Application as WorkApplication;

/**
 * Application.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 *
 * @property \EasyWeChat\Work\OA\Client                        $oa
 * @property \EasyWeChat\Work\Auth\AccessToken                 $access_token
 * @property \EasyWeChat\Work\Agent\Client                     $agent
 * @property \EasyWeChat\Work\Department\Client                $department
 * @property \EasyWeChat\Work\Media\Client                     $media
 * @property \EasyWeChat\Work\Menu\Client                      $menu
 * @property \EasyWeChat\Work\Message\Client                   $message
 * @property \EasyWeChat\Work\Message\Messenger                $messenger
 * @property \EasyWeChat\Work\User\Client                      $user
 * @property \EasyWeChat\Work\User\TagClient                   $tag
 * @property \EasyWeChat\Work\Server\Guard                     $server
 * @property \EasyWeChat\Work\Jssdk\Client                     $jssdk
 * @property \Overtrue\Socialite\Providers\WeWorkProvider      $oauth
 * @property \EasyWeChat\Work\Invoice\Client                   $invoice
 * @property \EasyWeChat\Work\Chat\Client                      $chat
 * @property \EasyWeChat\Work\ExternalContact\Client           $external_contact
 * @property \EasyWeChat\Work\ExternalContact\ContactWayClient $contact_way
 * @property \EasyWeChat\Work\ExternalContact\StatisticsClient $external_contact_statistics
 * @property \EasyWeChat\Work\ExternalContact\MessageClient    $external_contact_message
 * @property \EasyWeChat\Work\GroupRobot\Client                $group_robot
 * @property \EasyWeChat\Work\GroupRobot\Messenger             $group_robot_messenger
 * @property \EasyWeChat\Work\Calendar\Client                  $calendar
 * @property \EasyWeChat\Work\Schedule\Client                  $schedule
 * @property \Phper666\EasywechatExtension\Work\ExternalContact\CorpTag    $corp_tag
 *
 * @method mixed getCallbackIp()
 */
class Application extends WorkApplication
{
    /**
     * 重新载入需要的驱动
     * @var array
     */
    protected $providers = [
        \EasyWeChat\Work\OA\ServiceProvider::class,
        \EasyWeChat\Work\Auth\ServiceProvider::class,
        \EasyWeChat\Work\Base\ServiceProvider::class,
        \EasyWeChat\Work\Menu\ServiceProvider::class,
        \EasyWeChat\Work\OAuth\ServiceProvider::class,
        \EasyWeChat\Work\User\ServiceProvider::class,
        \EasyWeChat\Work\Agent\ServiceProvider::class,
        \EasyWeChat\Work\Media\ServiceProvider::class,
        \EasyWeChat\Work\Message\ServiceProvider::class,
        \EasyWeChat\Work\Department\ServiceProvider::class,
        \EasyWeChat\Work\Server\ServiceProvider::class,
        \EasyWeChat\Work\Jssdk\ServiceProvider::class,
        \EasyWeChat\Work\Invoice\ServiceProvider::class,
        \EasyWeChat\Work\Chat\ServiceProvider::class,
        \EasyWeChat\Work\GroupRobot\ServiceProvider::class,
        \EasyWeChat\Work\Calendar\ServiceProvider::class,
        \EasyWeChat\Work\Schedule\ServiceProvider::class,

        \Phper666\EasywechatExtension\Work\ExternalContact\ServiceProvider::class, // 重写后的驱动
    ];
}
