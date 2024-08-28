<?php

echo '<h1>';
echo $_REQUEST['username'] == 'admin' && $_REQUEST['password'] == '123' ? 'Welcome to your account' : 'The username or password are wrong';
echo '<h1/>';
?>