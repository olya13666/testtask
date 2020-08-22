<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Авторизация</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css" >
        <link rel="stylesheet" href="/css/style.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>

    </head>
    <body class="bg-light">
        <header>
            <nav class="navbar navbar-light bg-light justify-content-between">
                <a class="btn btn-outline-success my-2 my-sm-0" href="/registration" role="button">Регистрация</a>
            </nav>
        </header>

        <main role="main" class="container">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                    </div>
                    <div class="col-sm">
                        <h1>Авторизация</h1>
                        <div class="col col-lg-10">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label>Логин</label>
                                    <input type="text" class="form-control" placeholder="Логин" name="login">
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <input type="pass" class="form-control" placeholder="Пароль" name="pass">
                                </div>
                                <button type="submit" class="btn btn-primary js-try-login" name="send">Войти</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>