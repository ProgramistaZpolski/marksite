<?php use App\Core\App; ?>
<!DOCTYPE html>
<html lang="{{ $seo->lang }}" dir="ltr" data-sieciuchy="/sieciuchy.txt">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $seo->title }}</title>
	<link rel="canonical" href="{{ 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; }}">
	<meta name="description" content="{{ $seo->description }}">
	<meta property="og:url" content="{{ 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; }}">
	<meta property="og:type" content="website">
	<meta property="og:title" content="{{ $seo->title }}">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:creator" content="{{ $seo->twitter }}">
	<meta name="twitter:url" content="{{ 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; }}">
	<meta name="twitter:title" content="{{ $seo->title }}">
	<meta name="twitter:description" content="{{ $seo->description }}">
	<meta name="theme-color" content="#fafafa">
	<meta name="author" content="{{ $seo->author }}">
	<link rel="apple-touch-icon" href="/assets/favicon.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link rel="icon" type="image/png" href="/assets/favicon.png">
	<meta name="msapplication-config" content="<?= asset("browserconfig.xml") ?>">
	<meta name="application-name" content="{{ $seo->title }}">
	<meta name="msapplication-tooltip" content="{{ $seo->description }}">
	<meta name="msapplication-starturl" content="{{ 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; }}&pinned=true">
	<link rel="stylesheet" href="<?= asset("style.mcss") ?>">
	<meta name="robots" content="index, follow">
	<meta name="distribution" content="global">
	<meta name="generator" content="Marksite">
	{{ $css }}
</head>

<body itemscope itemtype="https://schema.org/WebSite" class="pzplui-strict-mode container flex-60{{ $class }}">
	<!--[if IE]>
		<h1 class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</h1>
	<![endif]-->

	<br>

	<main>
		{{ $site->markdown }}
	</main>
	{{ $js }}
</body>

</html>