<?php

namespace App\Models;

use App\Core\App;

class User
{
	public String $username;
	public String $sitename;
	public String $markdown;
	public Int $darkmode;
	public Int $code;
	public String $seo;
	public String $css;
	public String $js;
	public function __construct(String $username, String $password)
	{
		$this->username = clean($username);
		$this->result = App::get("database")->sql("SELECT * FROM `users` WHERE `email` = '{$this->username}'");
		if (isset($this->result[0])) {
			if (password_verify($password, $this->result[0]->password)) {
				$this->yes = true;
				$this->username = $username;
				$this->sitename = $this->result[0]->sitename;
				$this->markdown = $this->result[0]->markdown;
				$this->darkmode = $this->result[0]->darkmode;
				$this->code = $this->result[0]->code;
				$this->seo = $this->result[0]->seo;
				$this->css = $this->result[0]->css;
				$this->js = $this->result[0]->js;
			} else {
				$this->yes = false;
			}
		} else {
			$this->yes = false;
		}
	}
}
