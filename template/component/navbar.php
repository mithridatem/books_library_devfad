<nav class="container-fluid">
	<ul>
		<li><strong>Books Library</strong></li>
	</ul>
	<ul>
		<li><a href="/">Accueil</a></li>
		<li><a href="/categories">Liste des catégories</a></li>
		<!-- Route déconnectée -->
		<?php if (!isset($_SESSION["user"]["id"])) : ?>
			<li><a href="/register">Inscription</a></li>
			<li><a href="/login">Connexion</a></li>
		<!-- Route connectée-->
		<?php else : ?>
			<li><a href="/category/new">Ajouter une catégorie</a></li>
			<?= htmlspecialchars($_SESSION["user"]["firstname"] . " connecté ",  ENT_QUOTES, 'UTF-8') ?>
			<li><a href="/logout">Déconnexion</a></li>
		<?php endif ?>
	</ul>
</nav>