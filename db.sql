CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_password` int(11) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 0,
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_role`) VALUES (1, 'hestia', 123456, 1)


CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) CHARACTER SET utf8 NOT NULL,
   `user_id` int(11) NOT NULL,
     PRIMARY KEY (`module_id`),
    CONSTRAINT FK_USER FOREIGN KEY (`user_id`) REFERENCES user(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
