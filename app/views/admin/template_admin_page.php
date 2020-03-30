<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Work</title>
    <link rel="stylesheet" href="../../library/css/bootstrap.css">
    <script src="../../library/js/jquery-3.4.1.min.js"></script>
    <script src="../../library/js/bootstrap.min.js"></script>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Админ-панель</h5>
    <?php if ($_SESSION['admin']) {
        ?>

        <a class="btn btn-outline-secondary" href="admin/logout">Logout</a>
    <?php } ?>
</div>
<?php
include 'app/views/' . $content_view;
?>
</body>
</html>
