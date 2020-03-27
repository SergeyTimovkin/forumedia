$("form#registerForm").submit(function (e) {

    //почистим и остановим отправку
    e.preventDefault();
    $(".invalid-feedback").remove();
    $(".is-valid, .is-invalid").removeClass("is-valid is-invalid");

    //соберём значения всех полей
    var login = $("#login").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var passRepeat = $("#passwordRepeat").val();
    var name = $("#name").val();
    var surname = $("#surname").val();
    var phone = $("#phone").val();
    var city = $("#city").val();
    var street = $("#street").val();
    var numberHouse = $("#numberHouse").val();
    var indexpost = $("#indexpost").val();
    var avatar = $("#avatar");
    console.log(avatar);

//=================================================LOGIN================================================================
    //проверим логин на пустоту
    var regex_login = /^[\w\d]{5,}$/;
    if (!login) {
        $("#login").addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
    }
    //проверим логин на соответствие формату
    else if (!regex_login.test(login)) {
        $("#login").addClass("is-invalid").after("<div class='invalid-feedback'>Логин не соответвтвует формату</div>");
    }
    //проверим на занятость логина
    else {
        console.log(login);

        $.ajax({
                url: document.location.origin + '/registration/existsLogin',
                type: 'POST',
                data: {login: login},
                success: function (existsUsername) {
                    if (existsUsername) {
                        $("#login").addClass("is-invalid").after("<div class='invalid-feedback'>Логин занят</div>");
                    } else
                        $("#login").addClass("is-valid");
                }

            }
        );
    }

//=================================================EMAIL================================================================
    //проверим email на пустоту
    var regex_email = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]{2,}$/;
    if (!email) {
        $("#email").addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
    }
    //проверим на соответствие регулярке
    else if (!regex_email.test(email)) {
        $("#email").addClass("is-invalid").after("<div class='invalid-feedback'>E-mail не соответвтвует формату</div>");
    }
    //проверим занят ли email
    else {
        $.ajax({
                url: document.location.origin + '/registration/existsEmail',
                type: 'POST',
                data: {email: email},
                success: function (existsEmail) {
                    if (existsEmail) {
                        $("#email").addClass("is-invalid").after("<div class='invalid-feedback'>E-mail занят</div>");
                    } else
                        $("#email").addClass("is-valid");
                }
            }
        );
    }


//==================================PASS================================================================================
    //проверим пароль на пустоту
    var regex_password = /^[\w\sа-яА-Я]{6,}$/;
    if (!password) {
        $("#password").addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
        $("#passwordRepeat").addClass("is-invalid");
    }
    // проверим на соответствие формату
    else if (!regex_password.test(password)) {
        $("#password").addClass("is-invalid").after("<div class='invalid-feedback'>Минимум 6. Без спецсимволов.</div>");
        $("#passwordRepeat").addClass("is-invalid");
    }
    //на равенство введённых полей
    else if (password != passRepeat) {
        $("#password").addClass("is-invalid");
        $("#passwordRepeat").addClass("is-invalid");
        $("#passwordRepeat").addClass("is-invalid").after("<div class='invalid-feedback'>Пароли не совпадают</div>");
    }
    else {
        $("#password, #passwordRepeat").addClass("is-valid");
    }


//==================================ИМЯ_И_ФАМИЛИИЯ======================================================================
    //проверим имя фамилию
    var regex_name = /^([А-Яа-яa-zA-ZёЁ-]{1,23})$/;
    if (name)
        if (!regex_name.test(name)) $("#name").addClass("is-invalid").after("<div class='invalid-feedback'>Имя не соответствует формату</div>");
        else $("#name").addClass("is-valid");
    if (surname)
        if (!regex_name.test(surname)) $("#surname").addClass("is-invalid").after("<div class='invalid-feedback'>Фамилия не соответствует формату</div>");
        else $("#surname").addClass("is-valid");


//==================================ТЕЛЕФОН=============================================================================
    if (phone == '+7 ') {
        $("#phone").addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
    } else $("#phone").addClass("is-valid");


//==================================МЕСТО_ПРОЖИВАНИЯ====================================================================
    var regex_city = /^([А-Яа-яa-zA-ZёЁ-]{1,40})$/;
    if (city && !regex_city.test(city)) {
        $("#city").addClass("is-invalid").after("<div class='invalid-feedback'>Название города не соответствует формату</div>");
        var regex_street = /^([А-Яа-яa-zA-ZёЁ-]{1,40})$/;
        if (street && !regex_street.test(street)) {
            $("#street").addClass("is-invalid").after("<div class='invalid-feedback'>Улица не соответствует формату</div>");
            var regex_numberHouse = /^([0-9]{1,5})$/;
            if (numberHouse && !regex_numberHouse.test(numberHouse)) {
                $("#numberHouse").addClass("is-invalid").after("<div class='invalid-feedback'>Номер дома не соответствует формату</div>");
            }
        }
    }
    var regex_indexpost = /^([0-9]{6})$/;
    if (indexpost && !regex_indexpost.test(city)) {
        $("#indexpost").addClass("is-invalid").after("<div class='invalid-feedback'>Почтовый индекс не соответствует формату</div>");
    }

//==================================АВАТАР==============================================================================
    var reg_avatar = /^[\wа-яА-Я\s]+.(jpg|jpeg|png)$/;
    if (reg_avatar && !reg_avatar.test(avatar.name)) {
        $("#avatar").addClass("is-invalid").after("<div class='invalid-feedback'>Разрешены только jpg, jpeg, png форматы</div>");
    } else $("#avatar").addClass("is-valid");

//==================================ЕСЛИ_ИНВАЛИДНЫХ_ПОЛЕЙ_НЕТ,_ТО_ОТПРАВЛЯЕМ_ДАННЫЕ РЕГИСТРАЦИИ=========================
    if ($('.is-invalid').length == 0) {
        $.ajax({
            url: document.location.origin + '/registration/registerUser',
            type: 'POST',
            dataType: "JSON",
            data: data,
            success: function () {
                window.location.href = document.location.origin + '/login/profilePage';
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }
})
;