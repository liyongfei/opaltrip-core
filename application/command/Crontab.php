<?php

namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\crontab\model\MemberOrder;

class Crontab extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('autoupdate')
        ->setDescription('Auto update orders status to complate.');
        // 设置参数
        
    }

    protected function execute(Input $input, Output $output)
    {
        // 指令输出
        $str = MemberOrder::autoupdate();
    	$output->writeln($str);
    }
}
