$("form#editClientData").submit(function (e) {

    //почистим и остановим отправку
    e.preventDefault();
    $(".invalid-feedback").remove();
    $(".is-valid, .is-invalid").removeClass("is-valid is-invalid");


    var data = new FormData($('#editClientData')[0]);


    for (let [key, value] of data) {
        switch (key) {

            case 'login':
                var regex_login = /^[\w\d]{5,}$/;
                if (!value) {
                    $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
                } else if (!regex_login.test(value)) {
                    $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Логин не соответвтвует формату</div>");
                }
                break;


            case 'email':
                var regex_email = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]{2,}$/;
                if (!value) {
                    $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
                } else if (!regex_email.test(value)) {
                    $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>E-mail не соответвтвует формату</div>");
                }
                break;


            case 'password':
                var regex_password = /^[\w\sа-яА-Я]{6,}$/;
                if (value!="") {
                    if (!regex_password.test(value)) {
                        $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Минимум 6. Без спецсимволов.</div>");
                        $("#passwordRepeat").addClass("is-invalid");
                    } else if (value != $("#passwordRepeat").val()) {
                        $("#" + key).addClass("is-invalid");
                        $("#passwordRepeat").addClass("is-invalid");
                        $("#passwordRepeat").addClass("is-invalid").after("<div class='invalid-feedback'>Пароли не совпадают</div>");
                    } else {
                        $("#password, #passwordRepeat").addClass("is-valid");
                    }
                }
                break;


            case 'phone':
                if (value == '+7 ') {
                    $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
                } else if (value.length != 17) {
                    $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено соответствует формату</div>");
                } else
                    $("#" + key).addClass("is-valid");
                break;


            case 'avatar' :
                if (value.name) {
                    var reg_avatar = /^[\wа-яА-Я\s_]+.(jpg|jpeg|png|JPG|JPEG|PNG)$/;
                    if (!reg_avatar.test(value.name)) $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Разрешены только jpg, jpeg, png форматы</div>");
                    else $("#" + key).addClass("is-valid");
                }
                break;


            case 'name':
                if (value) {
                    var regex_name = /^([А-Яа-яa-zA-ZёЁ-]{1,23})$/;
                    if (!regex_name.test(value)) $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Имя не соответствует формату</div>");
                    else $("#name").addClass("is-valid");
                }
                break;


            case 'surname':
                if (value) {
                    var regex_name = /^([А-Яа-яa-zA-ZёЁ-]{1,23})$/;
                    if (!regex_name.test(value)) $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Фамилия не соответствует формату</div>");
                    else $("#" + key).addClass("is-valid");
                }
                break;


            case 'address':
                break;

        }
    }


    if ($('.is-invalid').length == 0) {
        $.ajax({
            url: document.location.origin + '/login/editClientData',
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