<?php
return array(
 
    'driver' => 'smtp',
 
    'host' => 'smtp.gmail.com',
 
    'port' => 587,
 
    'from' => array('address' => 'sgcf.dev@gmail.com', 'name' => 'SGCF'),
 
    'encryption' => 'tls',
 
    'username' => 'sgcf.dev@gmail.com',
 
    'password' => '267432AbC',
 
    'sendmail' => '/usr/sbin/sendmail -bs',
 
    'pretend' => false,
 
);