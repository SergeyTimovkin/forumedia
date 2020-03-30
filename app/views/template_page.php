<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= SITE_ROOT . 'favicon.ico'; ?>" type="">
    <title>Test Work</title>
    <link rel="stylesheet" href="../../library/css/bootstrap.css">
    <link rel="stylesheet" href="<?= SITE_ROOT . 'css/main.css'; ?>">
    <script src="../../library/js/jquery-3.4.1.min.js"></script>
    <script src="../../library/js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="">Test work</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link"
                   href="<?= SITE_ROOT . "home"; ?>">Домашняя</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <?php if ($_SESSION['username']) { ?>
                <li class="nav-item m-1">
                    <div class="btn-group">
                        <a href="<?= SITE_ROOT . "login/profilePage"; ?>" class="btn
                        btn-secondary"><?= $_SESSION['username'] ?></a>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                               href="<?= SITE_ROOT . "login/profilePage"; ?>">Профиль</a>
                            <a class="dropdown-item"
                               href="<?= SITE_ROOT . "login/logout"; ?>">Выйти</a>
                        </div>
                    </div>
                </li>
            <?php } else { ?>

                <li class="nav-item m-1">
                    <a class="btn btn-secondary"
                       href="<?= SITE_ROOT . 'registration'; ?>">Регистрация</a>
                </li>

                <li class="nav-item m-1">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#loginModal">
                        Войти
                    </button>
                </li>
            <?php } ?>
            <li class="nav-item m-1">
                <a class="btn btn-secondary"
                   href="<?= SITE_ROOT . "admin"; ?>">Админка</a>
            </li>
        </ul>
    </div>
    </div>
</nav>


<!-- Модальное окно входа -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="LoginLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="LoginLabel">Форма входа</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="loginModal">
                    <!--TODO НАСТРОИТЬ ВАЛИДАЦИЮ ПОЛЕЙ-->
                    <form id="enterForm" method="post" action="<?= SITE_ROOT . "login/loginUser" ?>">
                        <div class=" form-row mb-3">
                            <label for="enter-login">Логин</label>
                            <input type="text" class="form-control" name="enter-login" id="enter-login"
                                   placeholder="Имя пользователя">
                        </div>
                        <div class="form-row mb-3">
                            <label for="enter-password">Пароль</label>
                            <input type="password" class="form-control" name="enter-password" id="enter-password"
                                   placeholder="Пароль">
                        </div>
                        <div class="form-row justify-content-center">
                            <button class="btn btn-primary" id="button-login">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary"
                   href="<?= SITE_ROOT . 'registration'; ?>">Регистрация</a>
            </div>
        </div>
        <script src="../../js/validation-login.js">
        </script>
    </div>
</div>

<!-- END Модальное окно входа -->
<div class="container">
    <?php
    include 'app/views/' . $content_view;
    ?>
</div>
</body>
</html>