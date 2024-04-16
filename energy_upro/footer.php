</main>

<footer>
  <div class="bg"></div>
  <div class="container">
    <div class="row">
      <div class="bg-pink"></div>
      <div class="wrap-content">
        <div class="logo-line d-flex flex-wrap align-items-center">

          <?php if ($field = get_field('logo_f', 'option')): ?>
            <div class="logo-wrap p-0">
              <a href="<?= get_home_url() ?>">

                <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                  <img src="<?= $field['url'] ?>">
                <?php else: ?>
                  <?= wp_get_attachment_image($field['ID'], 'full') ?>
                <?php endif ?>

              </a>
            </div>
          <?php endif ?>

          <?php if ($field = get_field('text_f', 'option')): ?>
            <div class="text">
              <p><?= $field ?></p>
            </div>
          <?php endif ?>

          <?php if ($field = get_field('wavy_circle_f', 'option')): ?>
            <div class="icon-wrap">
              <i class="fas fa-badge"></i>
              <div class="wrap">
                <?= $field['text'] ?>

                <?php if ($field['link']): ?>
                  <p>
                    <a href="<?= $field['link']['url'] ?>"<?php if($field['link']['target']) echo ' target="_blank"' ?>><?= $field['link']['title'] ?> <i class="far fa-chevron-double-right"></i></a>
                  </p>
                <?php endif ?>

              </div>
            </div>
          <?php endif ?>

        </div>

        <div class="content p-0 d-flex flex-wrap">

          <?php if ($field = get_field('footer_column_1_f', 'option')): ?>
            <div class="item item-1">

              <?php if ($field['title']): ?>
                <h6><?= $field['title'] ?></h6>
              <?php endif ?>

              <?= $field['text'] ?>

              <?php if ($field['links']): ?>
                <ul class="contact-list">

                  <?php foreach ($field['links'] as $item): ?>

                    <?php if ($item['link']): ?>
                      <li>
                        <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>

                          <?php if ($item['icon']): ?>
                            <i class="<?= $item['icon'] ?>"></i>
                          <?php endif ?>

                          <?= $item['link']['title'] ?></a>
                        </li>
                      <?php endif ?>

                    <?php endforeach ?>

                  </ul>
                <?php endif ?>

              </div>
            <?php endif ?>

            <?php for ($i = 2; $i <= 4; $i++) { ?>

              <?php if ($field = get_field('footer_column_' . $i . '_f', 'option')): ?>
                <div class="item item-<?= $i ?> hide-list">

                  <?php if ($field['title']): ?>
                    <h6><?= $field['title'] ?><span></span></h6>
                  <?php endif ?>

                  <?php if ($field['links']): ?>
                    <ul class="list">

                      <?php foreach ($field['links'] as $item): ?>

                        <?php if ($item['link']): ?>
                          <li>
                            <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><i class="fas fa-long-arrow-right"></i><?= $item['link']['title'] ?></a>
                          </li>
                        <?php endif ?>

                      <?php endforeach ?>

                    </ul>
                  <?php endif ?>

                </div>
              <?php endif ?>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>

    <?php if(have_rows('footer_bottom_menu_links_f', 'option')): ?>

      <div class="bottom">
        <div class="container">
          <div class="row">
            <ul class="col-12 d-flex justify-content-center flex-wrap">

              <?php while(have_rows('footer_bottom_menu_links_f', 'option')): the_row() ?>

                <?php if ($field = get_sub_field('link')): ?>
                  <li>
                    <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
                  </li>
                <?php endif ?>

              <?php endwhile ?>

            </ul>
          </div>
        </div>
      </div>

    <?php endif ?>

  </footer>

  <?php if (get_field('off_on_1') == 'On'): ?>

    <?php 

    $fields = ['image', 'text', 'link'];

    foreach ($fields as $field) {
      $$field = get_field('custom_default_1') == 'Custom' ? get_field($field . '_1') : get_field($field . '_st', 'option');
    }
    
    ?>

    <?php if ($image || $text || $link): ?>
      <div class="fix-block">
        <a href="#" class="close-fix"><i class="fal fa-times-circle"></i></a>
        <div class="fix-content">

          <?php if ($image): ?>
            <figure>
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </figure>
          <?php endif ?>

          <div class="text">
            <?= $text ?>

            <?php if ($link): ?>
              <div class="btn-wrap">
                <a href="<?= $link['url'] ?>" class="btn-default"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
              </div>
            <?php endif ?>

          </div>
        </div>
      </div>
    <?php endif ?>
    
  <?php endif ?>

  <?php wp_footer(); ?>
</body>
</html>