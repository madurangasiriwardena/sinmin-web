<?php

$uname = $_POST['uname'];
$pwd = $_POST['password'];

$ldaphost = 'ldap://sinhala-corpus.projects.uom.lk/';
$ldapport = 389;

$ldapconn = ldap_connect($ldaphost, $ldapport)
or die("Could not connect to $ldaphost");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

if ($ldapconn) 
{
    $username = "cn=".$uname.",ou=users,dc=sinmin,dc=org";
    $upasswd = $pwd;

    $ldapbind = ldap_bind($ldapconn, $username, $upasswd);

    $protocol = 'http://';

    if ($ldapbind){
    	session_start();
    	$root_uri = $protocol . $_SERVER['HTTP_HOST'].'/sinmin-web/';
    	$_SESSION['username'] = $uname;
	    $_SESSION['logout'] = $root_uri."auth/ldap_logout.php";
	    $_SESSION['auth_type']='ldap';
	    $_SESSION['access_token'] = $uname;
        header('Location: '.$root_uri.'index.php');
    }else{

        $root_uri = $protocol . $_SERVER['HTTP_HOST'].'/sinmin-web/login.php';
        header('Location: '.$root_uri);
    }

}
?>