<nav class="c-pagination">
<?php
  $args = array(
    'prev_text' => __('←'),
    'next_text' => __('→'),
  );
  echo paginate_links( $args );
?>
</nav>
