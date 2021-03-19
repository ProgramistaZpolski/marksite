<?php

namespace App\Models;

use App\Core\App;

class Site
{
	public String $markdown;
	protected $result;
	public function __construct(String $vanity)
	{
		$vanity = clean($vanity);
		$Parsedown = new \Parsedown();
		$this->result = App::get("database")->sql("SELECT * FROM `users` WHERE `sitename` = '{$vanity}'");
		$this->markdown = $this->result[0]->markdown;
		$this->dark = $this->result[0]->darkmode;
		$this->seo = json_decode($this->result[0]->seo);
		$this->css = $this->result[0]->css;
		$this->js = $this->result[0]->js;
		$this->code = $this->result[0]->code;
		$this->markdown = $Parsedown->text($this->markdown);
	}
}
