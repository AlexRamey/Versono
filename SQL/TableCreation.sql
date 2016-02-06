create table versono_user
(
    email           varchar(50),
    firstName       varchar(50),
    lastName        varchar(50),
    address			varchar(50),
    city			varchar(50),
    state			varchar(50),
    zip_code		varchar(15),
    user_password   binary(32),
    primary key(email)
);