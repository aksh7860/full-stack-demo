Drop table users;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
   PRIMARY KEY(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;