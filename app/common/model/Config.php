<?php
declare (strict_types=1);

namespace app\common\model;

use think\Model;
use tpadmin\model\Config as TpadminConfig;

/**
 * @mixin \think\Model
 */
class Config extends TpadminConfig
{
  public static function siteSetting(): array
  {
    $config = self::where('name', self::NAME_SITE_SETTING)->find();
    if (empty($config)) {
      return [];
    }

    return $config->settings;
  }
}
