create table versono_user
(
    email           varchar(50),
    first_name       varchar(50),
    last_name        varchar(50),
    address			varchar(50),
    city			varchar(50),
    state			varchar(50),
    zip_code		varchar(15),
    user_password   char(64),
    stripe_customer_id		varchar(50),
    primary key(email)
);
CREATE TABLE `boughtsongs` (
 `email` varchar(50) NOT NULL,
 `id` int(11) NOT NULL
);
CREATE TABLE `song` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(50) NOT NULL,
 `artist` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `album` varchar(50) NOT NULL,
 `price` decimal(3,2) NOT NULL,
 `numsold` int(11) NOT NULL,
 PRIMARY KEY (`id`)
);