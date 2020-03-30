<table class="table table-hover w-100">
    <thead>
    <tr>
        <th>Номер</th>
        <th>Login</th>
        <th>Имя Фамилия</th>
        <th>Email</th>
        <th>Дата регистрации</th>
        <th>Активность</th>
        <th>Состоит в клубе</th>
        <th>Изменить профиль</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $client) {
        ?>
        <tr>
            <td><?= $client['phone'] ?></td>
            <td><?= $client['login'] ?></td>
            <td><?= $client['name'] . ", " . $client['surname'] ?></td>
            <td><?= $client['email'] ?></td>
            <td><?= $client['date_create'] ?></td>
            <td><?= $client['active'] ?></td>
            <td><?= $client['club_type'] ?></td>
            <td><a href="admin/changeClient/?id=<?= $client['id'] ?>" class="btn btn-outline-dark">Изменить</a></td>
        </tr>
    <?php } ?>

    </tbody>
</table>


