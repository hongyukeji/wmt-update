<?php
/**
 * +----------------------------------------------------------------------
 * | wmt [ File Description ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2015~2019 http://www.wmt.ltd All rights reserved.
 * +----------------------------------------------------------------------
 * | 版权所有：贵州鸿宇叁柒柒科技有限公司
 * +----------------------------------------------------------------------
 * | Author: shadow <admin@hongyuvip.com>  QQ: 1527200768
 * +----------------------------------------------------------------------
 * | Version: v1.0.0  Date:2019-05-22 Time:06:32
 * +----------------------------------------------------------------------
 */

namespace Hongyukeji\WmtUpdate;

use Hongyukeji\WmtUpdate\Commands\UpdateCommand;
use Illuminate\Support\ServiceProvider;

class UpdateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /*
         * 发布更新文件
         */
        $this->publishes([
            realpath(__DIR__ . '/../update') => base_path(),
        ]);

        /*
         * 注册 Artisan 命令
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                UpdateCommand::class,
            ]);
        }

        $this->app->bind(Update::class, function () {
            return Update::new();
        });

        $this->app->alias(Update::class, 'update');
    }

    public function register()
    {
        //
    }
}