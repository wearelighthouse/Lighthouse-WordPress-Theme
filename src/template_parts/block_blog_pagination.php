<section class="o-container-content pagination blog-grid">

  <nav class="o-blog-nav compact blog-grid__right">
  <?php
    $args = array(
      'prev_text' => __('←'),
      'next_text' => __('→'),
    );
    echo paginate_links( $args );
  ?>
  </nav>

</section>
