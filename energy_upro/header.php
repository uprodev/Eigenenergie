<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header<?php if(get_field('is_color_logo')) echo ' class="color-logo"' ?>>
    <div class="top-line">
      <div class="container">
        <div class="row d-flex align-items-center">

          <?php if (get_field('logo_white_h', 'option') || get_field('logo_colored_h', 'option')): ?>
          <div class="logo-wrap p-0 col-sm-3 col-6">
            <a href="<?= get_home_url() ?>">

              <?php if (($field = get_field('logo_white_h', 'option')) && pathinfo($field['url'])['extension'] == 'svg'): ?>
              <img src="<?= $field['url'] ?>">
            <?php else: ?>
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            <?php endif ?>

            <?php if (($field = get_field('logo_colored_h', 'option')) && pathinfo($field['url'])['extension'] == 'svg'): ?>
            <img src="<?= $field['url'] ?>" class="color">
          <?php else: ?>
            <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'color')) ?>
          <?php endif ?>

        </a>
      </div>
    <?php endif ?>

    <div class="right col-6 col-sm-9 p-0 d-flex justify-content-end align-items-center">
      <nav class="top-menu-wrap header_menu">

        <?php wp_nav_menu( array(
          'theme_location'  => 'header',
          'container'       => '',
          'items_wrap'      => '<ul class="top-menu d-flex justify-content-end">%3$s</ul>'
        )); ?>

      </nav>
      
      <?php custom_language_switcher() ?>

      <?php if ($field = get_field('link_h', 'option')): ?>
        <div class="btn-wrap">
          <a href="<?= $field['url'] ?>" class="btn-head"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
        </div>
      <?php endif ?>

      <div class="open-menu d-flex justify-content-end d-xl-none">
        <a href="#">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
</header>

<div class="menu-responsive" id="menu-responsive" style="display: none">
  <div class="top">
    <div class="close-menu">
      <a href="#"><i class="fal fa-times"></i></a>
    </div>
  </div>
  <div class="wrap">

    <?php if ($field = get_field('logo_colored_h', 'option')): ?>
      <div class="logo-wrap">
        <a href="<?= get_home_url() ?>">

          <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
            <img src="<?= $field['url'] ?>">
          <?php else: ?>
            <?= wp_get_attachment_image($field['ID'], 'full') ?>
          <?php endif ?>

        </a>
      </div>
    <?php endif ?>

    <nav class="mob-menu-wrap header_menu">

      <?php wp_nav_menu( array(
        'theme_location'  => 'header',
        'container'       => '',
        'items_wrap'      => '<ul class="mob-menu p-0">%3$s</ul>'
      )); ?>

      <?php if ($field = get_field('link_h', 'option')): ?>
        <div class="btn-wrap">
          <a href="<?= $field['url'] ?>" class="btn-head"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
        </div>
      <?php endif ?>

    </nav>
  </div>
</div>

<main>