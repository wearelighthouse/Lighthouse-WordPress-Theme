<?php
  /* Template Name: Beacon Results */

  function average_array($a) {
    $a = array_filter($a);
    $average = array_sum($a)/count($a);
    return (number_format($average, 2) * 20);
  }

  //print_r($wp_query->query_vars);

  $entry_id = get_query_var( 'entry', 12007);
  // echo $entry_id;
  // Get the form
  $entry = GFAPI::get_entry( $entry_id );
  // print_r($entry);

  $purpose = $people = $process = array();

  $maturity_description = array(
    'Faint',
    'Flickering',
    'Emerging',
    'Bright',
    'Luminous'
  );

  foreach ($entry as $k => $v) {

    switch ($k) {
      case 2:
      case 3:
      case 4:
      case 5:
      case 6:
      case 7:
      case 8:
      case 9:
        $purpose[] = $v;
      break;

      case 10:
      case 11:
      case 12:
      case 13:
      case 14:
      case 15:
        $people[] = $v;
      break;

      case 16:
      case 16:
      case 18:
      case 19:
      case 20:
      case 21:
      case 22:
        $process[] = $v;
      break;

    }

  }

  $purpose_average = average_array($purpose);
  $people_average = average_array($people);
  $process_average = average_array($process);
  $total_score = ( ($purpose_average + $people_average + $process_average) / 3 );

  if ($total_score < 20) {
    $maturity_level = 1;
  } elseif ($total_score < 40) {
    $maturity_level = 2;
  } elseif ($total_score < 60) {
    $maturity_level = 3;
  } elseif ($total_score < 80) {
    $maturity_level = 4;
  } else {
    $maturity_level = 5;
  }

  $content = array();

  // Flickering
  $content[0] = array(
    'intro' => "This typically means your teams decision making is based on assumptions from stakeholders with no input or research from users. Features are implemented as and when requested regardless of value to customer.",
     'purpose' => "Usually at this level, decisions are made from the top down with no team or user involvement. There's often no roadmap created or shared which results in a disconnect for the team who don't understand what they're working towards.",
     'people' => "Often we see teams that are siloed and unsure of their responsibilities. This can be the case both within and across teams. Lack of resources and duplication can be common as team members take on unnecessary work.",
     'process' => "Generally we find at this level that no methods of user research are utilised or understood, resulting in no research data to aid in decision making. 'Design' is often thought to be high-fidelity designs only.",
     'actions' => array(
       "Raise and build awareness for UCD within the business by identifying allies to support avocacy.",
       "Source the skills needed. This could be by upskilling your existing team with training, hiring specialists or enlisting outside help to get the process started",
       "Make sure stakeholders understand the importance of user-centric practises and how it will benefit the business."
     )
  );

  // Faint
  $content[1] = array(
    'intro' => "This typically means that your team have given some consideration to users. However, data can often be misinterpreted or used only to solve specific problems rather than inform wider strategy and direction.",
     'purpose' => "At this level, user research is usually not primary data and can be used biasedly. It is used to solve immediate issues on a small scale. A roadmap often exists but is not formal and is short sighted in its objectives.",
     'people' => "We find that teams at this level understand some roles more than others, which can result in a mismatch of velocity in different areas of the team. Access to training can be limited and team members aren't always confident sharing honest opinons.",
     'process' => "Desk research, secondary data or feedback from ticketing systems are commonly the only source of user data. Sometimes there may be a dedicated designer within the team but they'll often have limited to no research skills. Designs are typically created directly from user feedback at face value without iteration.",
     'actions' => array(
       "Begin to introduce more UCD activities, to help build an understanding of users.",
       "Create a more user-centric culture, by starting to involve non-designers in the discovery and design process. Encourage senior leadership and engineers to speak to users, or listen into user research.",
       "Create case studies of successful UX projects, to build awareness but also people who can champion UX internally."
     )
  );

  // Emerging
  $content[2] = array(
     'intro' => "This typically means your team have a basic understanding of and use user-centric practises. Roadmaps are often arbitrary and aren't understood or remembered by the team.",
     'purpose' => "Commonly teams at this level consider user insights but they are not central when forming strategy. Product visions & roadmaps have been defined but usually have little impact due to lack of review and iteration.",
     'people' => "For emerging teams, individuals usually understand what is expected of them, but need to be encouraged to collaborate. Generally, estimates and team velocity is loosely tracked but often does not match expectations for team members or the roadmap.",
     'process' => "It is common for some basic, ad-hoc forms of research to be used, but are often only conducted by a select few in the team. Results are typically not widely shared and necessary tools can be viewed as not valuable. Physical design assets are usually seen as more valuable than user insights.",
     'actions' => array(
       "Focus on continuing to build and maintain a healthy design culture at all levels of the organisation. Encourage guilds or working groups for people interested in UX.",
       "Use design and insights from research, to more heavily influence the organisational roadmap where possible. Use case studies and projects to tell compelling stories of how design can make a tangible difference to the bottom-line.",
       "Be specifc with the benefits of design; use analytics and the language of the business, to ensure design and UX is taken seriously alongside other disciplines."
     )
  );

  // Bright
  $content[3] = array(
     'intro' => "This typically means your team is data-driven and using user research to drive a product strategy that links directly into business goals. Product vision is clear and acts as a guide post for decision making",
     'purpose' => "User insights are typically seen as key to decision making and forming strategy for Bright teams. KPIs and metrics are often included to track launches and reviewed regularly. These teams usually feel confident defining work based on product vision.",
     'people' => "Team responsibilities are often well established and expectations are being met. They generally work collaboratively within individual product teams but routinely have limited amounts of natural cross-collaboration at the organisational level. Team velocity and expectations are usually tracked and well matched.",
     'process' => "Typically, a number of research methods are used by experienced individuals. Results are documented and made available to anyone wishing the access them. A selection of tools are usually available as well as utilization of sketching and early feedback before proceeding to high-fidelity designs.",
     'actions' => array(
       "Build on the existing team and processes, by encouraging a collaborative culture without silos. Encourage designers, researchers and product people to regularly share success and failure stories. ",
       "Ensure that design practices continue to improve at scale, by focussing on how you can utilise design ops and designers in management roles.",
       "Be proactive with a UX strategy, and ensure it aligns to the wider organisal objectives. Push to ensure product, design and engineering are treated as equals."
     )
  );

  // Luminous
  $content[4] = array(
     'intro' => "This typically means that your team are effectively including user-centred practises at all stages of product development. The team is empowered, efficient and fully understand the goals they're working toward to achieve success.",
     'purpose' => "We often find teams at this level are making product decisions that are fundamentally user-centric and such practises are seen as important to the business. Roadmaps normally exists at a team level and organisation level to connect into a wider strategy.",
     'people' => "A trusting and open feedback culture is usually fostered by the team, as well as collaboration across the organisation. They commonly have good access to resources and training, with clear structure and expectations.",
     'process' => "A variety of research methods are often used and conducted by specialists throughout product development. Typically, results are shared beyond the team. Brainstorming, sketching and ideation are encouraged and a design system is in place to ensure consistency of outputs.",
     'actions' => array(
       "Be proud of your culture and processes, and use it to foster development and recruitment. Encourage designers to share case studies externally and be actively involved in the product and design community.",
       "Don't get complacent; continue to encourage growth in the team, by pushing development into less obvious specialisms and areas of design and research.",
       "Focus on establishing and maintaining user-centred outcome metrics at the highest levels of your organisation."
     )
  );

  //print_r($content);
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin s-content">

        <div class="o-container-content o-container-content--v-margin c-content-grid">
          <?php the_content(); ?>

          <h2>Your team is currently at stage <?php echo $maturity_level; ?>, <em><?php echo $maturity_description[$maturity_level-1]; ?></em></h2>

          <p><?php echo $content[$maturity_level-1]['intro']; ?></p>

          <h3>Purpose<br />
          <?php echo $purpose_average . '%'; ?></h3>
          <p><?php echo $content[$maturity_level-1]['purpose']; ?></p>

          <h3>People<br />
          <?php echo $people_average . '%'; ?></h3>
          <p><?php echo $content[$maturity_level-1]['people']; ?></p>

          <h3>Process<br />
          <?php echo $process_average . '%'; ?></h3>
          <p><?php echo $content[$maturity_level-1]['process']; ?></p>

          <h2>What can I do to progress to stage <?php echo ($maturity_level+1);?>, <?php echo $maturity_description[$maturity_level]; ?> </h2>
        </div>
        <div class="o-container-content o-container-services o-container-services--3-column">
          <div class="s-content s-content--marginless">
            <p><?php echo $content[$maturity_level-1]['actions'][0]; ?></p>
          </div>
          <div class="s-content s-content--marginless">
            <p><?php echo $content[$maturity_level-1]['actions'][1]; ?></p>
          </div>
          <div class="s-content s-content--marginless">
            <p><?php echo $content[$maturity_level-1]['actions'][2]; ?></p>
          </div>
        </div>
      </div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
