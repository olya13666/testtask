<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Личный кабинет</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css" >
        <link rel="stylesheet" href="/css/style.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>

    </head>
    <body class="bg-light">
        <header>
            <nav class="navbar navbar-light bg-light justify-content-between">
                <a class="btn btn-outline-success my-2 my-sm-0" href="/main/logout" role="button">Выйти</a>
            </nav>
        </header>

        <main role="main" class="container">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                    </div>
                    <div class="col-sm">
                        <h1>Личный кабинет</h1>
                        <form method="post" action="">
                            <table cellspacing="0" cellpadding="5" class='table js-table'>
                                <tbody>
                                    <tr>
                                        <td>Логин<td>
                                        <td><?=$data['login']?><td>
                                    </tr>
                                    <tr>
                                        <td>Email<td>
                                        <td><?=$data['email']?><td>
                                    </tr>
                                    <tr>
                                        <td>ФИО<td>
                                        <td><input type="text" class="form-control" name="fio" value="<?=$data['fio']?>"><td>
                                    </tr>
                                    <tr>
                                        <td>Пароль<td>
                                        <td><input type="password" class="form-control" name="pass" td>
                                    </tr>
                                </tbody>
                            </table>
                                <button type="submit" class="btn btn-primary js-edit-profile" name="send">Сохранить</button>
                        </form>
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>