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
    primary key(email)
);