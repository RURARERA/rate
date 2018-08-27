<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/27/18
 * Time: 3:24 PM
 */

namespace app\modules\v1\models;

use \app\models\Device as BaseDevice;

class Device extends BaseDevice
{
    public static function getDeviceByMacAddress($mac_address)
    {
        return Device::findOne(['mac_address'=>$mac_address]);
    }
}