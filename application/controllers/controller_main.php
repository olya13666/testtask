<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	public function action_index()
	{
        $data = array();
        $isAuth = $this->isAuth();
        if ($isAuth) {
            header('Location: /profile');
        }
		$this->view->generate('main_view', $data);
	}

    /**
     * Логинимся
     */
    public function action_tryLogin()
    {
        $data = $_POST;
        $reqiered_fields = array('login', 'pass');
        $empty_fields = array();
        foreach($reqiered_fields as $field)
        {
            if (empty($data[$field])) {
                $empty_fields[] = $field;
            }
        }        
        if ($empty_fields) {
            die(json_encode(array(
                'status' => 'error',
                'message' => 'Заполнены не все поля',
                'fields' => $empty_fields,
            )));
        }

        $set = $this->model->tryLogin($data);
        if (!$set) {
            die(json_encode(array(
                'status' => 'error',
                'message' => 'Неправильная пара логин-пароль',
            )));
        }

        setcookie("isAuth", $data['login'], time()+3600, '/');
        die(json_encode(array(
            'status' => 'ok',
        )));
    }
    
    /**
     * Разлогиниваемся
     */
    public function action_logout()
    {
        setcookie("isAuth", '', time()+3600, '/');
        header('Location: /');
    }

    /**
     * Проверяем, что пользователь авторизован
     */
    public function isAuth()
    {
        return isset($_COOKIE['isAuth']);
    }
}