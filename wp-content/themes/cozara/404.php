<?php get_header(); ?>
<div id="content">
  <section id="workHeader" class="pageHeader">
    <div class="headerWrap" style="text-align: center;">
      <h2 style="font-size: 40vh;">404</h2>
      <p style="display:block;margin:2rem auto 8rem;max-width:560px;">
        Nothing found for the requested page. Please go back to the
        <a style="color:#5db9bd;text-decoration:none;font-weight:600;" href="<?php echo site_url(); ?>">homepage</a>
        or use the navigation above to find what you're looking for.
      </p>
    </div>
  </section>
  <!--Decorative lines-->
  <?php $lineClass = 'backdrop'; include get_template_directory().'/includes/lines.php'; ?>
  <!--End decorative lines-->
</div>
<?php get_footer(); ?>
