<?php

if (! function_exists('random_password')) {
	/**
	 * Generates random password of given length
	 * @param  integer $length
	 * @return       
	 */
    function random_password( $length = 8 ) 
    {
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   		 $password = substr( str_shuffle( $chars ), 0, $length );
    	return $password;
	}
}
