<?php

  require_once 'Credentials.php';

  class FacebookApi {

    private $credentials = '';
    private $access_token = '';

    public function __construct() {
      $this->credentials = new Credentials();
      $this->access_token = $this->credentials->getAccess_token();
    }

    public function requestEvents($facebookPageId) {
      $this->fb_page_id = $facebookPageId;

      $access_token = $this->access_token;

      // specify the "since" and "until" dates to get the events
      $year_range = 1;
      $since_date = date('Y-m-d', strtotime("now"));
      $until_date = date('Y-06-01', strtotime('+' . $year_range . ' years'));

      // unix timestamp years for the fb api
      $since_unix_timestamp = strtotime($since_date);
      $until_unix_timestamp = strtotime($until_date);

      $fields = "id,name,description,place,timezone,start_time,end_time,cover";

      $json_link = "https://graph.facebook.com/v2.8/{$this->fb_page_id}/events/attending/?fields={$fields}&access_token={$access_token}";

      $json = file_get_contents($json_link);

      $events = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
      $events = $events['data'];

      return $events;
    }

  }