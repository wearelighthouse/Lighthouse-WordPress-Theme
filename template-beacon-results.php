<?php
  /* Template Name: Beacon Results */

  // 'Pass Field Data via Query String' in Form->Settings->Confirmations must be set to:
  // &entry={entry_id}
  $entry_id = get_query_var('entry', 0);
  $entry = GFAPI::get_entry($entry_id);
  $purpose = $people = $process = [];

  foreach ($entry as $k => $v) {
    switch ($k) {
      case 3:
      case 4:
      case 5:
      case 6:
      case 7:
      case 8:
      case 9:
      case 10:
        $purpose[] = $v;
      break;

      case 11:
      case 12:
      case 13:
      case 14:
      case 15:
      case 16:
        $people[] = $v;
      break;

      case 17:
      case 18:
      case 19:
      case 20:
      case 21:
      case 22:
      case 23:
        $process[] = $v;
      break;
    }
  }

  function value_array_to_percent($a) {
    $a = array_filter($a);

    if (count($a) === 0) {
      return 0;
    }

    $average = array_sum($a) / count($a);
    return $average * 25 - 25;
  }

  $scores = [
    'Purpose' => value_array_to_percent($purpose),
    'People' => value_array_to_percent($people),
    'Process' => value_array_to_percent($process),
  ];

  $totalScore = ($scores['Purpose'] + $scores['People'] + $scores['Process']) / 3;

  if ($totalScore < 20) {
    $maturity_level = 1;
  } elseif ($totalScore < 40) {
    $maturity_level = 2;
  } elseif ($totalScore < 60) {
    $maturity_level = 3;
  } elseif ($totalScore < 80) {
    $maturity_level = 4;
  } else {
    $maturity_level = 5;
  }

  include(locate_template('beacon-content.php'));

  $resultContent = array_values($content)[$maturity_level - 1];
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero_beacon_results.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin c-content-grid">
        <?php foreach (['Purpose', 'People', 'Process'] as $sectionName): ?>
          <h3>
            <?= $sectionName ?>
            <br />
            <span class="u-color-yellow-dark" style="font-size: 48px; line-height: 1.2"><?= round($scores[$sectionName]) . '%'; ?></span>
          </h3>
          <p><?= $resultContent['sections'][$sectionName]; ?></p>
        <?php endforeach; ?>
      </div>

      <div class="o-container-content o-container-content--v-margin c-latest-post u-fd-column" style="padding: 0">
        <hr/>
      </div>

      <div class="o-container-content o-container-content--v-margin u-flex u-ai-center">
        <div class="u-display-none--upto-medium" style="padding-inline: 3rem">
          <div class="c-beacon-card" style="max-width: 120px" data-level="<?= $maturity_level + 1 ?>">
            <div><span></span></div>
            <div><span></span></div>
            <div><span></span></div>
            <div><span></span></div>
            <div><span></span></div>
          </div>
        </div>

        <h2 class="type-h1 u-bold">
        <?php if ($maturity_level < 5): ?>
          What can I do to progress to stage <?= $maturity_level + 1 ?>, <span class="u-color-yellow-dark"><?= array_keys($content)[$maturity_level] ?>?</span>
          <?php else: ?>
            What can you do to progress from this stage?
          <?php endif; ?>
        </h2>
      </div>

      <div class="o-container-content o-container-content--v-margin o-container-services o-container-services--3-column">
        <?php foreach ($resultContent['actions'] as $action): ?>
          <div class="s-wysiwyg">
            <div style="width: 75px; height: 75px; margin-bottom: 1rem"><?= $action['icon'] ?></div>
            <h3 class="type-title"><?= $action['title'] ?></h3>
            <p><?= $action['text'] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
