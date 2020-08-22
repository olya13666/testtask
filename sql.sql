CREATE TABLE users (
	`id` int(11) PRIMARY KEY AUTO_INCREMENT,
	`email` varchar(55),
	`login` varchar(55)
);

CREATE TABLE orders (
	`id` int(11) PRIMARY KEY AUTO_INCREMENT,
	`user_id` int(11),
	`price` int(11)
);


/*1.составить запрос, который выведет список email'лов встречающихся более чем у одного пользователя*/
SELECT email
FROM users
GROUP BY email
HAVING count(*) > 1

/*2. Вывести список логинов пользователей, которые не сделали ни одного заказа*/
SELECT u.login
FROM users u
LEFT JOIN orders o ON o.user_id = u.id
GROUP BY u.id
HAVING COUNT(o.id) = 0

/*3.вывести список логинов пользователей которые сделали более двух заказов*/
SELECT u.login
FROM users u
LEFT JOIN orders o ON o.user_id = u.id
GROUP BY u.id
HAVING COUNT(o.id) > 2