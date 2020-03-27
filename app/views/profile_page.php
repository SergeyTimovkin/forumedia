<?php
$profileData = $data; ?>
<div class="profile text-center">
    <h1>Профиль</h1>
    <table class="table table-hover">
        <tr>
            <div data-toggle="modal" data-target="#avatarModal">
                <img class="img-fluid rounded mx-auto d-block cursor-pointer" style="height:300px;"
                     src="<?= SITE_ROOT . "img/avatars/" . $profileData['avatar']; ?>"
                     alt="<?= $profileData['username']; ?>">
            </div>
        <tr>
            <th>Логин</th>
            <td><?= $profileData['login']; ?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?= $profileData['email']; ?></td>
        </tr>
        <tr>
            <th>Фамилия</th>
            <td><?= $profileData['surname']; ?></td>
        </tr>
        <tr>
            <th>Имя</th>
            <td><?= $profileData['name']; ?></td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td><?= $profileData['phone']; ?></td>
        </tr>
        <tr>
            <th>Адрес</th>
            <td><?= $profileData['city']; ?></td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td><?= $profileData['birth_date']; ?></td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td><?= $profileData['birth_date']; ?></td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td><?= $profileData['birth_date']; ?></td>
        </tr>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img class="img-fluid rounded mx-auto d-block" style="height:600px;"
                     src="<?= SITE_ROOT . "/img/avatars/" . $profileData['avatar']; ?>" alt="<?= $profileData['username']; ?>">
            </div>

        </div>
    </div>
</div>