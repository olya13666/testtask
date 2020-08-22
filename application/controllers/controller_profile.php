<?php

class Controller_Profile extends Controller
{
	function __construct()
	{
		$this->model = new Model_Profile();
		$this->view = new View();
	}

	public function action_index()
	{
        $data = $this->model->getUserData($_COOKIE['isAuth']);
        $isAuth = $this->isAuth();
        if (!$isAuth) {
            header('Location: /');
        }
		$this->view->generate('profile_view', $data);
	}

    /**
     * Редактируем профиль
     */
    public function action_edit()
    {
        if(!$this->isAuth()) {            
            die(json_encode(array(
                'status' => 'errorAuth',
            )));
        }
        $data = $_POST;
        // прверка полей
        if (empty($data['fio'])) {
            die(json_encode(array(
                'status' => 'error',
                'message' => 'Поле ФИО не может быть пустым!',
                'fields' => $empty_fields,
            )));
        }

        if (empty($data['pass'])) {
            $this->model->update('users', array(
                'fio' => $data['fio'],
            ), array(
                'login' => $_COOKIE['isAuth'],
            ));
        } else {
            $this->model->update('users', array(
                'fio' => $data['fio'],
                'pass' => md5($data['pass']),
            ), array(
                'login' => $_COOKIE['isAuth'],
            ));
        }

        die(json_encode(array(
            'status' => 'ok',
        )));
    }

    /**
     * Проверяем, что пользователь авторизован
     */
    public function isAuth()
    {
        return isset($_COOKIE['isAuth']);
    }
}