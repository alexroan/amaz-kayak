<?php use Roots\Sage\Titles; ?>

<?php if (!is_page_template('template-home.php')): ?>
  <div class="page-header">
    <h1><?= Titles\title(); ?></h1>
  </div>
<?php endif; ?>
