<tr class="user">
    <td><?= $user->getId() ?></td>
    <td><?= $user->getUsername() ?></td>
    <td><?= $user->getRole() ?></td>
    <td><?= $user->getToken() ?></td>
    <td><?= $user->getExpiredDate() ?></td>
    <td>
        <a href="/utilisateurs?id=<?= $user->getId() ?>">Voir</a>
        <a href="/utilisateurs/modifier?id=<?= $user->getId() ?>">Modifier</a>
        <a href="/utilisateurs/supprimer?id=<?= $user->getId() ?>">Supprimer</a>
    </td>
    <td>
        <a href="/utilisateurs/generer-token?id=<?= $user->getId() ?>">Générer un token</a>
    </td>
</tr>