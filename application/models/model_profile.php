<?php

class Model_Profile extends Model
{
	/**
     * Получаем данные пользователя
     */
	public function getUserData($login)
	{
        $this->db_connect();
        $sql = 'SELECT * FROM users WHERE login = "' . $login . '"';
        $data = $this->sql_get_row($sql);
        return $data;
	}
}
