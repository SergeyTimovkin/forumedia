$("form#enterForm").submit(function (e) {

        e.preventDefault();
        $("#enterForm .invalid-feedback").remove();
        $("#enterForm .is-valid, #enterForm .is-invalid").removeClass("is-valid is-invalid")

        var enter_login = $("#enter-login").val();
        var enter_password = $("#enter-password").val();

        if (!enter_login) {
            $("#enter-login").addClass("is-invalid").after("<div class='invalid-feedback d-block'>Не заполнено</div>");
        }
        if (!enter_password) {
            $("#enter-password").addClass("is-invalid").after("<div class='invalid-feedback d-block'>Не заполнено</div>");
        }


        if ($('#enterForm .is-invalid').length == 0) {
            $.ajax({
                    url: document.location.origin + '/login/loginUser',
                    type: 'POST',
                    dataType: "JSON",
                    data: {
                        enter_login: enter_login,
                        enter_password: enter_password
                    },
                    success: function (result) {
                        window.location.replace(document.location.origin + '/login/profilePage');
                    },
                    error: function () {
                        $("#enter-password").after("<div class='invalid-feedback d-block'>Пара логин-пароль не совпадают</div>");
                    }
                }
            );
        }
    }
);