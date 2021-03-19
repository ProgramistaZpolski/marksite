<?php /* Compiled from a Blade Template on 18-03-2021 23:02:36 */ ?>
<?php require_once('partials/head.php'); ?>

<?php if (isset($msg)) : ?>
	<p><?= $msg ?></p>
<?php endif; ?>

<br>
<h1 class="d4">Marksite</h1><br>
<p>
	Easily create a website without any useless junk using <b>Markdown</b>.
</p><br>
<section id="why">
	<h2>Why should you use Marksite?</h2>
	<ul>
		<li>It's fast</li>
		<li>It's free</li>
		<li>It's easy</li>
		<li>There is no vendor lock-in</li>
		<li>We take care of the SEO</li>
		<li>There are no watermarks or ads</li>
		<li>No Google Analytics.</li>
	</ul>
</section>
<br>
<form action="account" method="post" class="inputs">
	<label for="email">E-Mail</label>
	<input type="email" name="email" id="email" placeholder="ilike@trai.ns">

	<label for="password">Password</label>
	<input type="password" name="password" id="password" placeholder="**********">


	<label for="vanity">Vanity URL</label>
	<input type="text" name="vanity" id="vanity" placeholder="london">
	<button class="btn btn-normal" type="submit">Create an account</button><br><br>
</form><br>
<h3>Already have a account?</h3>
<form action="dashboard" method="post" class="inputs">
	<label for="email">E-Mail</label>
	<input type="email" name="email" id="email" placeholder="ilike@trai.ns">

	<label for="password">Password</label>
	<input type="password" name="password" id="password" placeholder="**********">
	<button class="btn btn-normal" type="submit">Login</button>
</form>

<?php require_once('partials/footer.php'); ?>