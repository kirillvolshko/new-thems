<?php
/**
 * Header file for the Prometheus WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Prometheus
 * @since Prometheus 1.0
 */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Document</title>
    <?php wp_head();?>
    <script src="./assets/js/custom-tabs.js" defer></script>
</head>
<body>
  <?php wp_body_open(); ?>
     <header class="px-10 py-4 shadow-[0_0_10px_rgba(0,0,0,0.3)]">
    <div class="flex flex-wrap items-center justify-between">
      <div class="flex items-center justify-between w-full">
        <div class="flex items-center">
          <a class="mr-14" href="#">Prometheus</a>

          <ul class="flex gap-8 mr-20 space-x-1 text-gray-300">
            <li class="relative group">
              <a class="cursor-pointer" role="button">
                Курси
              </a>

              <ul class="absolute left-0 hidden p-2 mt-2 space-y-2 bg-white rounded-md shadow-lg group-hover:block">
                <li><a href="#">Курс 1</a></li>

                <li><a href="#">Курс 2</a></li>

                <li>
                  <hr class="border-t border-gray-200">
                </li>

                <li><a href="#">Каталог</a></li>
              </ul>
            </li>

            <li>
              <a href="#">Про нас</a>
            </li>

            <li>
              <a href="#">Про Prometheus+</a>
            </li>
          </ul>

          <form class="ml-4">
            <input class="p-2 border rounded-full text-primary w-80 placeholder:text-gray-300" type="search"
              placeholder="Пошук" aria-label="Search">
          </form>
        </div>

        <ul class="flex items-center text-gray-300 gap-9">
          <li>
            <a href="#">B2B</a>
          </li>

          <li class="flex justify-end space-x-2">
            <a class="btn" href="#">Увійти</a>

            <a class="btnPrimary" href="#">Приєднатися</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

<?php 