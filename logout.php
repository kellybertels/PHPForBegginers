<?php
require 'includes/init.php';
// Initialize the session.
// If you are using session_name("something"), don't forget it now!


Auth::logout();

Url::redirect ('/PhPForBegginers');
