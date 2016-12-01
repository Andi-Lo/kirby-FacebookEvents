<?php

  class Credentials {
  	// your app secret and app id can be obtained by creating an app at facebook developers
  	// https://developers.facebook.com/
    // Now that you got your app_secret and id you can generate your access token.
    // Also your access_token might expire.
    // You might want to get a new one using your credentials with this link
    // https://graph.facebook.com/oauth/access_token?client_id=YOUR_APP_ID&client_secret=YOUR_APP_SECRET&grant_type=client_credentials
    // if you need an long living access token you should extend it via this link: https://developers.facebook.com/tools/debug/access_token
    private $access_token = '';

    public function __construct() {
      $token_path = realpath(__DIR__ . DS . '..') . DS . 'credentials' . DS . 'credentials.json';
      $json = json_decode(file_get_contents($token_path));
      $this->access_token = $json->access_token;
    }

    public function getAccess_token() {
      return $this->access_token;
    }
  }

?>