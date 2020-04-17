<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '根据管理员 id 生成测试 token--仅限于测试使用,线上环境禁止使用!';

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
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->ask('输入用户 id');
        $isFlash = $this->ask('是否生成 1 分钟过期 token? yes/no');

        $user = Admin::find($userId);

        if (!$user) {
            return $this->error('用户不存在');
        }

        // 如果是一次性过期,则有效期为 1分钟,否则为 1 年
        $ttl = $isFlash == 'yes' ? 1 :365*24*60;
        echo "TTL为: $ttl 分钟" . PHP_EOL;
        $this->info(auth('admin')->setTTL($ttl)->login($user));
    }
}
