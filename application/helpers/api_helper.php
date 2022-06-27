<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');


if (! function_exists('api_blog')) {

    function api_blog($method = 'POST', $url = null, $data = null)
    {
		$headers = [
			'Content-Type: application/json',
			'x-api-key: 123456',
		];

		$ch=curl_init('localhost/blog/api/' . $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
			$headers
		);

		$result = curl_exec($ch);
        curl_close($ch);

		return $result;
    }
}