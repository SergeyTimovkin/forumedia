<div class="register">
    <h1>Регистрация</h1>
    <form id="registerForm" enctype="multipart/form-data">
        <div class="form-row mb-3">
            <div class="col-md-6">
                <label for="login">Логин*</label>
                <input type="text" class="form-control" name="login" id="login"
                       placeholder="логин">
                <small class="text-muted">
                    Минимум 5 символов
                </small>
            </div>
            <div class="col-md-6">
                <label for="email">E-mail*</label>
                <input type="text" class="form-control" name="email" id="email"
                       placeholder="email" value="">
            </div>
            <div class="col-md-6">
                <label for="password">Пароль*</label>
                <input type="password" class="form-control" name="password" id="password"
                       placeholder="Пароль" value="">
                <small class="text-muted">
                    Минимум 6 символов
                </small>
            </div>

            <div class="col-md-6">
                <label for="passRepeat">Повторите пароль*</label>
                <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat"
                       placeholder="Повторите пароль" value="">
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-md-4">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Имя"
                       value="">
                <small class="text-muted">
                    Необязательное
                </small>
            </div>
            <div class="col-md-4">
                <label for="surname">Фамилия</label>
                <input type="text" class="form-control" id="surname" name="surname"
                       placeholder="Фамилия" value="">
                <small class="text-muted">
                    Необязательное
                </small>
            </div>
            <div class="col-md-4">
                <label for="phone">Телефон*</label>
                <input type="text" name="phone" id="phone" class="form-control input-medium bfh-phone"
                       data-format="+7 (ddd) ddd-dddd">
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-md-12">
                <label for="city">Адрес</label>
                <input type="text" class="form-control" id="address" name="address"
                       placeholder="Город, улица, номер дома, почтовый индекс"
                       value="">
                <small class="text-muted">
                    Город, улица, номер дома, почтовый индекс
                </small>
            </div>
        </div>

        <div class="custom-file mb-2">
            <input name="avatar" type="file" accept="image/png,image/gif,image/jpeg" class="custom-file-input"
                   id="avatar">
            <label class="custom-file-label" for="avatar">Аватар</label>
            <small class="w-100 text-info">
                Поля, помеченные *, обязательные для заполнения
            </small>
        </div>
        <div class="form-row justify-content-center">
            <button id="button-Register" class="btn btn-primary mr-2">Зарегистрироваться</button>
        </div>
    </form>
</div>

<!--Валидация регистрации-->
<script src="../../../js/validation-register.js"></script>

<!--Скрипт маски телефона-->
<script src="../../../js/bootstrap-formhelpers-phone.js"></script>

<!--Добавление и удаление текста на кастомный инпут файла-->
<script>
    $("input[type='file']").change(function (e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : "Аватар";
        $('.custom-file-label').html(fileName);
    });
</script>
