<?php
get_header();
?>
<div id="content">
  <section class="pageHeader" id="contactHeader">
    <div class="headerWrap">
      <h1 class="dashed"><?php the_title(); ?></h1>
    </div>
  </section>
  <section id="contactContent" class="pageBody">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
    <?php the_content(); ?>
  </section>
</div>
<?php
get_footer(); ?>
