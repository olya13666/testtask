<?php

class Model_Registration extends Model
{
	/**
     * Проверяем, есть ли такой пользователь
     */
	public function checkUser($data)
	{
        $this->db_connect();
        $sql = "SELECT 1 FROM users WHERE login = '" . $data['login'] . "' OR email = '" . $data['email'] . "'";
        $set = $this->sql_get($sql);
        return $set;
	}

    
}
