
<style>
    .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
    }
</style>
<form class="form-signin" method="post" action="admin/login">
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Введите данные администратора</h1>
    </div>

    <div class="form-label-group mb-2">
        <input type="text" name="admin_login" id="admin_login" class="form-control" placeholder="Введите логин админа" required autofocus>
    </div>

    <div class="form-label-group">
        <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="Пароль" required>
    </div>

    <div class="checkbox mb-3">
    </div>
    <button class="btn btn-lg btn-secondary btn-block" type="submit">Войти</button>
</form>