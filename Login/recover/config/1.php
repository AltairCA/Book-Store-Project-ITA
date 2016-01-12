<?php
$smtp = Mail::factory('smtp', array(
							'host' => 'ssl://smtp.gmail.com',
							'port' => '465',
							'auth' => true,
							'username' => 'projectita1234@gmail.com',
							'password' => '753159852456',
							'timeout'  => '3600'
					));

?>