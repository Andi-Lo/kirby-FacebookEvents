<?php 
  // the page where you want to store the facebook event images (for caching)
  $news = page('home');

  $F = FacebookEvents($news);

  // this is the facebook page id where you want to fetch events from
  $events = $F->getFacebookEvents('1676014109285451');

  // if you would just like a single event
  // $fb_event = $F->getEvent($events);

  for($i = 0; $i < count($events); $i++):
    $event = $F->getEvent($events, $i); 
?>
  <div class="wrapper">
    <div>
      <h3><?php echo $event->name() ?></h3>
      <p><?php echo kirbytext($event->description()) ?></p>

      <?php if($event->cover() !== null): ?>
        <div class="news">
          <img src="<?php echo thumb($event->cover(), ['width' => 690, 'height' => 320, 'crop' => true], false) ?>"
            alt="<?php echo $event->cover()->name() ?>"
            width="690"
            height="320" />
          <div class="news-text">
            <span class="news-date">
              <span class="month"><?php echo $event->start_date_month()?></span>
              <span class="day"><?php echo $event->start_date_day()?></span>
            </span>
            <div>
              <span class="news-description"><a target="_blank" href="<?php echo $event->event_url() ?>"><?php echo $event->name() ?></a></span>
            </div>
          </div>
        </div>
      <?php endif ?>
    </div>

    <div>
      <p class="img-caption">
        <div class="event_dates">
          <strong>Date:</strong> <br>
          <?php echo $event->start_date_humanized() . ' '?> <br>
          <?php echo $event->start_date_time() .' Uhr' ?> <br>
          </div>

        <?php
          if(($event->place_city() != '' || $event->place_street() != '')) {
            echo '<div class="event_location">';
              echo '<strong>Location</strong><br>';
              echo $event->place_city() .'<br>';
              echo $event->place_street() .'<br>';
            echo '</div>';
          }
        ?>
      </p>
    </div>
  </div>
<?php endfor ?>
