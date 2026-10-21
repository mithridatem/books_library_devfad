<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <?php include 'component/navbar.php'; ?>
    <main class="container-fluid">
        <h1>Se connecter </h1>
        <form action="" method="post">
            <input type="email" name="email" placeholder="saisir votre email">
            <input type="password" name="password" placeholder="saisir votre mot de passe">
            <input type="submit" value="Connexion" name="submit">
        </form>
        <p><?= htmlspecialchars($data["msg"] ?? "", ENT_QUOTES, 'UTF-8') ?></p>
    </main>
</body>

</html>
