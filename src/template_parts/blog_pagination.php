<nav class="c-pagination">
<?php
  echo paginate_links([
    'prev_text' => __('←'),
    'next_text' => __('→'),
  ]);
?>
</nav>
