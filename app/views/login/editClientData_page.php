<?php $data['image'] = $data['image'] ? $data['image'] : "noavatar.jpg"; ?>
<div class="profile text-center">
    <h1>Редактирование данных профиля</h1>
    <form id="editClientData">
        <table class="table table-hover">
            <tr>
                <div class="custom-file mb-2">
                    <input name="avatar" type="file" accept="image/png,image/gif,image/jpeg" class="custom-file-input"
                           id="avatar">
                    <label class="custom-file-label" for="avatar">Аватар</label>
                </div>
            </tr>
            <tr>
                <th>Логин</th>
                <td><input name="login" id="login" class="form-control" type="text" value="<?= $data['login']; ?>"></td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td><input name="email" id="email" class="form-control" type="text" value="<?= $data['email']; ?>"></td>
            </tr>
            <tr>
                <th>Фамилия</th>
                <td><input name="surname" id="surname" class="form-control" type="text" value="<?= $data['surname']; ?>"
                    ></td>
            </tr>
            <tr>
                <th>Имя</th>
                <td><input name="name" id="name" class="form-control" type="text" value="<?= $data['name']; ?>"
                    ></td>
            </tr>
            <tr>
                <th>Телефон</th>
                <td><input name="phone" id="phone" class="form-control" type="text" value="<?= $data['phone']; ?>"
                    ></td>
            </tr>
            <tr>
                <th>Адрес</th>
                <td><input name="address" id="address" class="form-control" type="text" value="<?= $data['address']; ?>"
                    ></td>
            </tr>
            <tr class="table-secondary">
                <th>Новый пароль</th>
                <td><input name="password" id="password" class="form-control" type="text" placeholder="Новый пароль">
                </td>
            </tr>
            <tr class="table-secondary">
                <th>Повторите пароль</th>
                <td><input name="passwordRepeat" id="address" class="form-control" type="text" value=""
                           placeholder="Повторите пароль"></td>
            </tr>
        </table>
        <button type="sumbit" class="btn btn-success">Сохранить</button>
    </form>


</div>
<script src="../../../js/validation-editClientData.js"></script>


