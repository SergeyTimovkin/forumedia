$("form#loginForm").submit(function (e) {
        e.preventDefault();
        $(".invalid-feedback").remove();
        $(".is-valid, .is-invalid").removeClass("is-valid is-invalid");

        var data = new FormData(this);


        for (let [key, value] of data) {
            if (!value) {
                $("#" + key).addClass("is-invalid").after("<div class='invalid-feedback'>Не заполнено</div>");
            }
        }

        if ($('.is-invalid').length == 0) {
            $.ajax({
                    url: document.location.origin + '/login/loginUser',
                    type: 'POST',
                    dataType: "text",
                    data: data,
                    success: function (incorrectUser) {
                        if (incorrectUser) {
                            $("#pass").after("<div class='invalid-feedback d-block'>Пара логин-пароль не совпадают</div>");
                        } else {
                            window.location.replace(document.location.origin + '/login/profilePage');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                }
            );
        }
    }
);