<?php

return [
	'database' => [
		'name' => 'marksite',
		'username' => 'root',
		'password' => '',
		'connection' => 'mysql:host=127.0.0.1',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		],
	],
	"site" => [
		"name" => "Marksite",
		"description" => "Markdown website creator",
		"url" => "http://kasztan.art:7000/",
		"author" => [
			"name" => "Piotr Badełek",
			"twitter" => "@ProgramistaZ"
		],
		"language" => "en"
	],
	"production" => false
];
