<?php
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
//include_once "google-api-php-client/examples/templates/base.php";
session_start();

require_once realpath(dirname(__FILE__) . '/google-api-php-client/autoload.php');

/************************************************
  ATTENTION: Fill in these values! Make sure
  the redirect URI is to this page, e.g:
  http://localhost:8080/user-example.php
 ************************************************/
$client_id = '1014775670027-gh16lqdk35kbsi33qtbm5hdoq1atcie9.apps.googleusercontent.com';
$client_secret = 'Y5hjoknG2qIdofIRSwLuBA3Q';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$redirect_uri = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$root_uri = $protocol . $_SERVER['HTTP_HOST'].'/sinmin-web/';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setScopes('email');

error_reporting(0);


/************************************************
  If we're logging out we just need to clear our
  local access token in this case
 ************************************************/
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['email']);
  unset($_SESSION['logout']);
  unset($_SESSION['auth_type']);
  header("Location: ".$root_uri."login.php");
  exit();
}

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

  echo $redirect;
  exit();
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
  header('Location: '.$authUrl);
  exit;
}

/************************************************
  If we're signed in we can go ahead and retrieve
  the ID token, which is part of the bundle of
  data that is exchange in the authenticate step
  - we only need to do a network call if we have
  to retrieve the Google certificate to verify it,
  and that can be cached.
 ************************************************/
if ($client->getAccessToken()) {
  $_SESSION['access_token'] = $client->getAccessToken();
  if($client->isAccessTokenExpired()){
    header('Location: '.$redirect_uri.'?logout');
    exit;
  }
  $token_data = $client->verifyIdToken()->getAttributes();
}

//echo pageHeader("User Query - Retrieving An Id Token");
if (
    $client_id == '1014775670027-gh16lqdk35kbsi33qtbm5hdoq1atcie9.apps.googleusercontent.com'
    || $client_secret == 'Y5hjoknG2qIdofIRSwLuBA3Q'
    || $redirect_uri == $root_uri.'auth/google_auth.php') {
  //echo missingClientSecretsWarning();
}

if (isset($token_data)) {
  //var_dump($token_data["payload"]["email"]);
    $email=$token_data["payload"]["email"];
    $_SESSION['email'] = $email;
    $_SESSION['logout'] = $root_uri."auth/google_auth.php?logout";
    $_SESSION['auth_type']='google';
    header('Location: '.$root_uri);
    exit;
}
?>