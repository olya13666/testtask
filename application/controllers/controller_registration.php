<?php

class Controller_Registration extends Controller
{
	function __construct()
	{
		$this->model = new Model_Registration();
		$this->view = new View();
	}

	public function action_index()
	{
        $this->view->generate('registration_view', $data);
	}

    /**
     * Регистрируем пользвателя
     */
    public function action_addUser()
    {
        $data = $_POST;
        $reqiered_fields = array('fio', 'email', 'login', 'pass');
        $empty_fields = array();
        // проверка полей
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
        // прверка email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            die(json_encode(array(
                'status' => 'error',
                'message' => 'Неверно указан email',
                'fields' => array('email'),
            )));
        }
        // проверяем, нет ли уже пользователя с таким логином или email
        $set = $this->model->checkUser($data);
        if ($set) {
            die(json_encode(array(
                'status' => 'error',
                'message' => 'Пользователь с таким логином или email уже существет!',
                'fields' => array('email'),
            )));
        }

        $this->model->insert('users', array(
            'login' => $data['login'],
            'email' => $data['email'],
            'fio' => $data['fio'],
            'pass' => md5($data['pass']),
        ));

        die(json_encode(array(
            'status' => 'ok',
            'message' => 'Вы успешно зарегестрированы!',
        )));   
    }
}
