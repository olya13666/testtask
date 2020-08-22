<?php

class Model_Main extends Model
{
	/**
     * Проверяем, есть ли такой пользователь
     */
	public function tryLogin($data)
	{
        $this->db_connect();
        $sql = 'SELECT * FROM users WHERE login = "' . $data['login'] . '" and pass = "' . md5($data['pass']) . '"';
        // var_dump($sql);
        $set = $this->sql_get($sql);
        return $set;
	}
}
