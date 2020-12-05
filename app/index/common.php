<?php

/**
 * 路由页面 css class 名
 * @return string
 */
function route_class(): string
{
  $request = request();
  // 获取请求控制器名称并转化成小写格式
  $ctr_name = $request->controller(true);
  // 获取请求操作方法名称并转化成小写格式
  $act_name   = $request->action(true);
  $class_name = $ctr_name . '-' . $act_name;

  return implode('-', [$ctr_name, $act_name, 'page']);
}

/**
 * 资源文件包含最后修改时间戳路径
 * @param string $file_path 资源文件路径
 * @return string
 */
function asset_path(string $file_path): string
{
  try {
    // 项目根目录
    $root_path = app()->getRootPath();
    // 资源文件全路径
    $full_path = $root_path . 'public/' . $file_path;
    $info      = new SplFileInfo($full_path);
    $file_time = $info->getCTime();
  } catch (\Exception $e) {
    $file_time = time();
  }

  return $file_path . '?c=' . $file_time;
}
