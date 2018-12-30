<?php

require_once 'application/models/Customer.php';
$customer = new Customer();
$customer->name('customer_hello_galina');
$customer->GMT(1);
$customer->master(2);
$customer->regDate('0000-00-00');
$customer->create();

require_once 'application/models/User.php';
$user = new User();
$user->username('username');
$user->password('pass');
$user->nickname('nickname');
$user->customer($customer);
$user->email('email');
$user->subscribed(1);
$user->isSuperUser(2);
$user->isAdmin(3);
$user->readonly(4);
$user->location(5);
$user->locationExp('0000-00-00');
$user->help('help');
$user->create();

$u = User::getInstances('id = ' . $user->id());
//var_dump($u);
echo '<br>' . $u->customer()->name();

$customer->name('__CONSILERI__', TRUE);
echo '<br>' . $user->customer()->name();
return;