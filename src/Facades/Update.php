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
 * | Version: v1.0.0  Date:2019-05-22 Time:07:43
 * +----------------------------------------------------------------------
 */

namespace Hongyukeji\WmtUpdate\Facades;

use Illuminate\Support\Facades\Facade;

class Update extends Facade
{
    /**
     * @see \Hongyukeji\WmtUpdate\Update
     */
    protected static function getFacadeAccessor() : string
    {
        return 'update';
    }
}