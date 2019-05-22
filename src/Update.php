<?php
/**
 * +----------------------------------------------------------------------
 * | wmt-update [ File Description ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2015~2019 http://www.wmt.ltd All rights reserved.
 * +----------------------------------------------------------------------
 * | 版权所有：贵州鸿宇叁柒柒科技有限公司
 * +----------------------------------------------------------------------
 * | Author: shadow <admin@hongyuvip.com>  QQ: 1527200768
 * +----------------------------------------------------------------------
 * | Version: v1.0.0  Date:2019-05-22 Time:07:46
 * +----------------------------------------------------------------------
 */

namespace Hongyukeji\WmtUpdate;


use Exception;

class Update
{
    const GITHUB_LABEL_LATEST = 'latest';   // 最新版本标识
    const GITHUB_LABEL_RELEASES = 'releases';    // 版本列表标识
    const GITHUB_LABEL_INFO = 'info'; // 项目信息标识

    const GITHUB_URL_LATEST = 'https://api.github.com/repos/hongyukeji/wmt-update/releases/latest';   // 获取最新版本
    const GITHUB_URL_RELEASES = 'https://api.github.com/repos/hongyukeji/wmt-update/releases';    // 获取版本列表
    const GITHUB_URL_INFO = 'https://api.github.com/repos/hongyukeji/wmt-update'; // 获取项目信息

    /**
     * 检查更新
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkUpdate()
    {
        return $this->sendRequest('releases');
    }

    /**
     * 发送请求
     *
     * @param null $type
     * @param null $github_url
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest($type = null, $github_url = null)
    {
        $client = new \GuzzleHttp\Client();
        if ($github_url && !$type) {
            $response = $client->request('GET', $github_url);
        } else {
            switch ($type) {
                case self::GITHUB_LABEL_LATEST:
                    $response = $client->request('GET', self::GITHUB_URL_LATEST);
                    break;
                case self::GITHUB_LABEL_RELEASES:
                    $response = $client->request('GET', self::GITHUB_URL_RELEASES);
                    break;
                default :
                    $response = $client->request('GET', self::GITHUB_URL_INFO);
            }
        }

        if ($response->getStatusCode() !== 200) {
            throw new Exception('请求更新失败');
        }

        try {
            return json_decode((string)$response->getBody(), true);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}