<?php


/*---------------------------------------
FacebookEvents Plugin Configuration
---------------------------------------*/

c::set('routes', array(
  array(
      'pattern' => '(:all)/FacebookEvents.php',
      'action'  => function($uri) {
        $news = page('home'); // a kirby page object related to the fb events
        $fbe = FacebookEvents($news);
        $events = $fbe->getFacebookEvents('1676014109285451'); // your facebook page ID
        $fb_event = $fbe->getEvent($events, 0); // the first event
        snippet('sections/contentnews', array('event' => $fb_event, 'news' => $news)); // call your snippet for rendering
      },
      'method' => 'POST'
  )
));
