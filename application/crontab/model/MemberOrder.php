<?php

namespace app\crontab\model;

use think\Db;
use think\Model;

class MemberOrder extends Model
{
    //
    /**
     * 更新模块超时的问题
     *
     * @return $msg output string
     */
    public static function autoupdate()
    {
        $msg = "";
        $msg .= self::update_line();
        $msg .= self::update_hotel();
        $msg .= self::update_customize();
        return $msg;
    }


    /**
     * 更新线路
     *
     * @return $msg 
     */
    private static function update_line()
    {
        $re = Db::name('member_order')
            ->where("(UNIX_TIMESTAMP()+24*60*60) > UNIX_TIMESTAMP(usedate)")
            ->where('status', '=', 7)
            ->where('typeid', '=', 1)
            ->where('id', '<', 300)
            ->update(array('status' => 5));
        $msg =  "$re 条操时线路数据被更新！";
        $msg .= "<br>";
        return $msg;
    }
        /**
     * 更新线路
     *
     * @return $msg 
     */
    private static function update_customize()
    {
        $re = Db::name('member_order')
            ->where("(UNIX_TIMESTAMP()+24*60*60) > UNIX_TIMESTAMP(usedate)")
            ->where('status', '=', 7)
            ->where('typeid', '=', 14)
            ->where('id', '<', 300)
            ->update(array('status' => 5));
        $msg =  "$re 条操时定制团数据被更新！";
        $msg .= "<br>";
        return $msg;
    }
        /**
     * 更新酒店
     *
     * @return $msg 
     */
    private static function update_hotel()
    {
        $re = Db::name('member_order')
            ->where("(UNIX_TIMESTAMP()+24*60*60) > UNIX_TIMESTAMP(departdate)")
            ->where('status', '=', 7)
            ->where('typeid', '=', 2)
            ->where('id', '<', 300)
            ->update(array('status' => 5));
        $msg =  "$re 条操时酒店数据被更新！";
        $msg .= "<br>";
        return $msg;
    }
}
