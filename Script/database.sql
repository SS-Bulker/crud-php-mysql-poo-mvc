create database if not exists crud_php_mysql_poo_mvc;

use crud_php_mysql_poo_mvc;

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `users`
ADD PRIMARY KEY (`id_users`);

ALTER TABLE `users`
MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;