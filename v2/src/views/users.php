<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Esp Actu</title>
    <link rel="stylesheet" href="global.css">
</head>
<body>
    <main>
        <?php
            require_once __DIR__ . '/components/header.php';
        ?>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Rôle</th>
                        <th>token</th>
                        <th>Date d'expiration</th>
                        <th>Actions</th>
                        <th>Générer un token</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($users as $user) {
                            include __DIR__ . '/components/user.php';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>