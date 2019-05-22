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
    const GITHUB_URL_INFO = 'https://api.github.com/repos/hongyukeji/wmt-update'; // 获取信息
    const GITHUB_URL_LATEST = 'https://api.github.com/repos/hongyukeji/wmt-update/releases/latest';   // 获取最新版本
    const GITHUB_URL_RELEASES = 'https://api.github.com/repos/hongyukeji/wmt-update/releases';    // 获取版本列表

    public function checkUpdate()
    {
        //
    }

    /*
     * 发送请求
     */
    public function sendRequest($type)
    {
        $client = new \GuzzleHttp\Client();

        switch ($type) {
            case 'latest':
                $response = $client->request('GET', self::GITHUB_URL_LATEST);
                break;
            case 'releases':
                $response = $client->request('GET', self::GITHUB_URL_INFO);
                break;
            default :
                $response = $client->request('GET', self::GITHUB_URL_RELEASES);
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