<?php
/**
 * 后台美化HongStyle
 *
 * @package HongStyle
 * @author ihesro
 * @version 1.0.0
 * @link https://index.php/cross.html
 */
class HongStyle_Plugin implements Typecho_Plugin_Interface
{
  /**启用插件回调 */
  public static function activate()
  {
    $F = DIRECTORY_SEPARATOR;
    $G = realpath(__DIR__ . "${F}..${F}..${F}..${F}") . "${F}";
    $R = __DIR__ . "${F}static${F}";
    //挂载footer.php
    rename("${G}admin${F}footer.php", "${G}admin${F}footer.php.old");
    copy("${R}admin${F}footer.php", "${G}admin${F}footer.php");
    //挂载header.php
    rename("${G}admin${F}header.php", "${G}admin${F}header.php.old");
    copy("${R}admin${F}header.php", "${G}admin${F}header.php");
    //挂载user文件夹
    if (!is_dir("${G}user${F}")) mkdir(iconv("UTF-8", "GBK", "${G}user${F}"), 0755, true);
    copy("${R}user${F}logo.png", "${G}user${F}logo.png");
    copy("${R}user${F}user-style.css", "${G}user${F}user-style.css");
    copy("${R}user${F}user.css", "${G}user${F}user.css");
    copy("${R}user${F}user.js", "${G}user${F}user.js");
    //挂载member.php
    copy("${R}member.php", "${G}member.php");
  }
  /**禁用插件回调 */
  public static function deactivate()
  {
    $F = DIRECTORY_SEPARATOR;
    $G = realpath(__DIR__ . "${F}..${F}..${F}..${F}") . "${F}";
    $R = __DIR__ . "${F}static${F}";
    //还原footer.php
    unlink("${G}admin${F}footer.php");
    rename("${G}admin${F}footer.php.old", "${G}admin${F}footer.php");
    //还原header.php
    unlink("${G}admin${F}header.php");
    rename("${G}admin${F}header.php.old", "${G}admin${F}header.php");
    //卸载user文件夹
    unlink("${G}user${F}logo.png");
    unlink("${G}user${F}user-style.css");
    unlink("${G}user${F}user.css");
    unlink("${G}user${F}user.js");
    rmdir("${G}user${F}");
    //卸载member.php
    unlink("${G}member.php");
  }

  /**面板 */
  public static function config(Typecho_Widget_Helper_Form $form)
  {
  }

  /**华丽面板 */
  public static function personalConfig(Typecho_Widget_Helper_Form $form)
  {
  }
}
