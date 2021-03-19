<?php

namespace App\Controllers;

use App\Core\Helpers\Arr;
use App\Core\Forms\Forms;
use App\Models\User;
use App\Models\Site;

class PagesController
{
	public function home()
	{
		new User("piotrbadelek@protonmail.com", "@dev@");
		return view('index');
	}

	public function page()
	{
		Forms::validate([
			"v" => ["required", "min:3", "max:64"]
		], function () {
			\Ignite(404);
		});
		$site = new Site($_GET["v"]);
		$classes = "";
		$css = "";
		$js = "";
		if ($site->dark == "1") {
			$classes = " dark-mode";
		}

		if ($site->css != "Your CSS here...") {
			$css .= "<style>{$site->css}</style>";
		}

		if ($site->js != "Your JS here...") {
			$js .= "<script>\"use strict\";{$site->js}</script>";
		}

		if ($site->code == "1") {
			$js .= "<script src=\"" . asset("highlight.mjs") . "\"></script><script>hljs.highlightAll();</script>";
			$css .= "<link rel=\"stylesheet\" href=\"" . asset("highlight.mcss") . "\">";
		}

		return view('page', [
			"site" => $site,
			"class" => $classes,
			"css" => $css,
			"js" => $js,
			"seo" => $site->seo
		]);
	}
}
