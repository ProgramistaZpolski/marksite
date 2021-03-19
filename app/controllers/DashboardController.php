<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\Forms\Forms;
use App\Core\App;

class DashboardController
{
	public function home()
	{
		$instance = new User($_POST["email"], $_POST["password"]);
		if ($instance->yes) {
			$seo = json_decode($instance->seo);
			return view('dashboard', [
				"email" => $_POST["email"],
				"password" => $_POST["password"],
				"code" => $instance->markdown,
				"darkmode" => $instance->darkmode == 0 ? false : true,
				"syntax" => $instance->code == 0 ? false : true,
				"css" => $instance->css,
				"js" => $instance->js,
				"lang" => $seo->lang,
				"title" => $seo->title,
				"desc" => $seo->description,
				"author" => $seo->author,
				"twitter" => $seo->twitter
			]);
		} else {
			\Ignite(403);
		}
	}

	public function update()
	{
		Forms::validate([
			"email" => ["required", "min:3", "max:128"],
			"password" => ["required", "min:1", "max:512"],
			"markdown" => ["required", "max:2000000"],
			"css" => ["required", "max:1000000"],
			"js" => ["required", "max:1000000"],
			"languages" => ["required", "max:12", "min:2"],
			"title" => ["required", "max:128", "min:1"],
			"desc" => ["required", "max:175"],
			"author" => ["required", "max:128"]
		], function () {
			\Ignite(400);
		});
		$instance = new User($_POST["email"], $_POST["password"]);
		if ($instance->yes) {
			$seo = json_decode($instance->seo);
			$newseo = json_encode([
				"lang" => $_POST["languages"] == "nochange" ? $seo->lang : clean($_POST["languages"]),
				"title" => clean($_POST["title"]),
				"description" => clean($_POST["desc"]),
				"author" => clean($_POST["author"]),
				"twitter" => isset($_POST["twitter"]) ? clean($_POST["twitter"]) : "marksite"
			]);
			$darkmode = isset($_POST["darkmode"]) ? 1 : 0;
			$highlight = isset($_POST["syntax"]) ? 1 : 0;

			$markdown = clean($_POST["markdown"]);
			$css = clean($_POST["css"]);
			$js = clean($_POST["js"]);
			$email = clean($_POST["email"]);

			$query = "UPDATE `users` SET `markdown` = '{$markdown}', `darkmode` = '{$darkmode}', `seo` = '{$newseo}', `css` = '{$css}', `js` = '{$js}', `code` = '{$highlight}' WHERE `users`.`email` = '{$email}'";
			App::get("database")->sqlNoFetch($query);
			return view('dashboard', [
				"email" => $_POST["email"],
				"password" => $_POST["password"],
				"code" => $instance->markdown,
				"darkmode" => $instance->darkmode == 0 ? false : true,
				"syntax" => $instance->code == 0 ? false : true,
				"css" => $instance->css,
				"js" => $instance->js,
				"lang" => $seo->lang,
				"title" => $seo->title,
				"desc" => $seo->description,
				"author" => $seo->author,
				"twitter" => $seo->twitter,
				"message" => "Saved changes."
			]);
		} else {
			\Ignite(403);
		}
	}

	public function register()
	{
		Forms::validate([
			"email" => ["required", "min:3", "max:128"],
			"password" => ["required", "min:7", "max:512"],
			"vanity" => ["required", "min:2", "max:64"]
		], function () {
			\Ignite(400);
		});
		$email = clean($_POST["email"]);
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$vanity = clean($_POST["vanity"]);
		App::get("database")->sqlNoFetch("INSERT INTO `users` (`id`, `email`, `password`, `sitename`, `markdown`, `darkmode`, `seo`, `css`, `js`, `code`) VALUES (NULL, '{$email}', '{$password}', '{$vanity}', '# Hello World!', '0', '{\"lang\": \"en\", \"title\": \"My Website\", \"author\": \"Your name\", \"twitter\": \"@twitter\", \"description\": \"My awesome website\"}', 'Your CSS here...', 'Your JS here...', '0')");

		return view("index", ["msg" => "You have created a new account. You can now log in. You website is avalible on " . App::get("config")["site"]["url"] . "s?v=$vanity"]);
	}
}
