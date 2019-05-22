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
 * | Version: v1.0.0  Date:2019-05-22 Time:07:18
 * +----------------------------------------------------------------------
 */

namespace Hongyukeji\WmtUpdate\Commands;

use Illuminate\Console\Command;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wmt:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            "--provider" => 'Hongyukeji\WmtUpdate\UpdateServiceProvider',
            "--force"    => true,
        ]);
    }
}