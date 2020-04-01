<?php $data['image'] = $data['image'] ? $data['image'] : "noavatar.jpg"; ?>
<div class="profile text-center">
    <h1>Профиль <span class="badge badge-secondary"><?= $data['login']; ?></span></h1>
    <table class="table table-hover">
        <tr>
            <div data-toggle="modal" data-target="#avatarModal">
                <img class="img-fluid rounded mx-auto d-block cursor-pointer" style="height:300px;"
                     src="<?= SITE_ROOT . "img/avatars/" . $data['image']; ?>"
                     alt="<?= $data['login']; ?>">
            </div>
        <tr>
            <th>Логин</th>
            <td><?= $data['login']; ?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?= $data['email']; ?></td>
        </tr>
        <tr>
            <th>Фамилия</th>
            <td><?= $data['surname']; ?></td>
        </tr>
        <tr>
            <th>Имя</th>
            <td><?= $data['name']; ?></td>
        </tr>
        <tr>
            <th>Телефон</th>
            <td><?= $data['phone']; ?></td>
        </tr>
        <tr>
            <th>Адрес</th>
            <td><?= $data['address']; ?></td>
        </tr>
    </table>
    <a href="<?= SITE_ROOT . "login/editUserData/" ?>" class=" btn btn-outline-primary text-primary">
        Редактировать данные профиля
    </a>
</div>


<!-- Modal -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img class="img-fluid rounded mx-auto d-block" style="height:600px;"
                     src="<?= SITE_ROOT . "/img/avatars/" . $data['image']; ?>"
                     alt="<?= $data['login']; ?>">
            </div>

        </div>
    </div>
</div>