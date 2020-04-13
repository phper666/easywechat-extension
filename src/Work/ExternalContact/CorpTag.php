<?php
declare(strict_types=1);
namespace Phper666\EasywechatExtension\Work\ExternalContact;

use EasyWeChat\Kernel\BaseClient;

class CorpTag extends BaseClient
{
    /**
     * 获取企业标签列表
     *
     * @see https://open.work.weixin.qq.com/api/doc/90000/90135/92117
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCorpTagList()
    {
        return $this->httpGet('cgi-bin/externalcontact/get_corp_tag_list');
    }

    /**
     * 添加企业标签
     *
     * @see https://open.work.weixin.qq.com/api/doc/90000/90135/92117
     *
     * @param array $data
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addCorpTag(array $data)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/add_corp_tag', $data);
    }

    /**
     * 编辑企业标签
     *
     * @see https://open.work.weixin.qq.com/api/doc/90000/90135/92117
     *
     * @param        $tagId
     * @param array  $data
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function editCorpTag($tagId, array $data)
    {
        return $this->httpPostJson('cgi-bin/externalcontact/edit_corp_tag', array_merge(['id' => $tagId], $data));
    }

    /**
     * 删除企业标签
     *
     * @see https://open.work.weixin.qq.com/api/doc/90000/90135/92117
     *
     * @param array $tagIds
     * @param array $groupIds
     *
     * @return \Psr\Http\Message\ResponseInterface|\EasyWeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delCorpTag(array $tagIds, array $groupIds)
    {
        $params = [];
        if (!empty($tagIds)) $params['tag_id'] = $tagIds;
        if (!empty($groupIds)) $params['group_id'] = $groupIds;

        return $this->httpGet('cgi-bin/externalcontact/del_corp_tag', $params);
    }

    /**
     * 编辑客户企业标签
     *
     * @see https://open.work.weixin.qq.com/api/doc/90000/90135/92117
     *
     * @param        $tagId
     * @param array  $data
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function markTag($userid, $externalUserid, array $addTag, array $removeTag)
    {
        $params = [
            'userid' => $userid,
            'external_userid' => $externalUserid
        ];
        if (!empty($addTag)) $params['add_tag'] = $addTag;
        if (!empty($removeTag)) $params['remove_tag'] = $removeTag;

        return $this->httpPostJson('cgi-bin/externalcontact/mark_tag', $params);
    }
}
