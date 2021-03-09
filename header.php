<?php
/**
 * Created by IntelliJ IDEA.
 * User: yakjk
 * Date: 22.02.2021
 * Time: 13:08
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name')?></title>
    <!--<link rel="stylesheet" href="src/css/normalize.css">
    <link rel="stylesheet" href="src/css/style.css">-->

    <?php wp_head(); ?>
</head>
<body>

<div class="triangle-wrap triangle-wrap-left">
    <svg class="triangle rotate pink"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate yellow"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate light-blue"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate white"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate red"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate blue"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate pink"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate yellow"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate light-blue"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate white"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate red"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate blue"><use xlink:href="#triangle" /></svg>
</div>
<div class="triangle-wrap triangle-wrap-right">
    <svg class="triangle rotate pink"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate yellow"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate light-blue"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate light-green"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate red"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate blue"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate pink"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate yellow"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate light-blue"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate light-green"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate red"><use xlink:href="#triangle" /></svg>
    <svg class="triangle rotate blue"><use xlink:href="#triangle" /></svg>
</div>
<nav class="menu">
    <a href="<?php bloginfo('url');?>" class="logo"><?php bloginfo('name')?></a>

    <? wp_nav_menu(array(
        'theme_locathion' => 'top',
        'container' => null,
        'menu_class' => 'menu_ul'
    )); ?>

    <!--<ul>
        <li><a href="#news">Новости</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Педагогический состав</a></li>
        <li><a href="#">Помещения</a></li>
        <li><a href="#territory">Территория</a></li>
        <li><a href="#">Группы</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Обратная связь</a></li>
    </ul>-->
</nav>