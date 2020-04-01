<?php $data['image'] = $data['image'] ? $data['image'] : "noavatar.jpg"; ?>
<div class="profile text-center">
    <h1>Профиль <span class="badge badge-secondary"><?= $data['login']; ?></span></h1>
    <form >
        <table class="table table-hover">
            <tr>
                <div data-toggle="modal" data-target="#avatarModal">
                    <img class="img-fluid rounded mx-auto d-block cursor-pointer" style="height:300px;"
                         src="<?= SITE_ROOT . "img/avatars/" . $data['image']; ?>"
                         alt="<?= $data['login']; ?>">
                </div>
            <tr>
                <th>Логин</th>
                <td><input name="login" id="login" class="form-control" type="text" value="<?= $data['login']; ?>"
                           placeholder="<?= $data['login']; ?>"></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><input name="email" id="email" class="form-control" type="text" value="<?= $data['email']; ?>"
                           placeholder="<?= $data['email']; ?>"></td>
            </tr>
            <tr>
                <th>Фамилия</th>
                <td><input name="surname" id="surname" class="form-control" type="text" value="<?= $data['surname']; ?>"
                           placeholder="<?= $data['surname']; ?>"></td>
            </tr>
            <tr>
                <th>Имя</th>
                <td><input name="name" id="name" class="form-control" type="text" value="<?= $data['name']; ?>"
                           placeholder="<?= $data['name']; ?>"></td>
            </tr>
            <tr>
                <th>Телефон</th>
                <td><input name="phone" id="phone" class="form-control" type="text" value="<?= $data['phone']; ?>"
                           placeholder="<?= $data['phone']; ?>"></td>
            </tr>
            <tr>
                <th>Адрес</th>
                <td><input name="address" id="address" class="form-control" type="text" value="<?= $data['address']; ?>"
                           placeholder="<?= $data['address']; ?>"></td>
            </tr>
            <tr class="table-secondary">
                <th>Новый пароль</th>
                <td><input name="password" id="password" class="form-control" type="text" value="Новый пароль"
                           placeholder=""></td>
            </tr>
            <tr class="table-secondary">
                <th>Повторите пароль</th>
                <td><input name="passwordRepeat" id="address" class="form-control" type="text" value=""
                           placeholder="Повторите пароль"></td>
            </tr>
        </table>
    </form>

    <button type="button" class="btn btn-success">Сохранить</button>
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

