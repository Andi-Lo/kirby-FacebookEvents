<?php

  include __DIR__ . DS . 'lib' . DS . 'Event.php';
  
  kirby()->routes([
    [
      'pattern' => '(:any)/FacebookEvents.php',
      'action'  => function($uri) {
        snippet(getTemplate());
      },
      'method' => 'POST'
  	]
	]);

  function FacebookEvents($page) {
    return new Event($page);
  }

  function getTemplate() {
	  if(c::get('facebookEventsTemplate')) {
			return c::get("facebookEventsTemplate");
		} else {
			throw new Exception(
				'No FacebookEvents Snippet for content presentation set.
				Use c::set("facebookEventsTemplate", "snippet/location/"); in your config.php file'
			);
		}
  }
