/* 
users table stores all the users. Users can be investors or entrepreneurs.
Attributes:
name - name of the user registered in the database
email - email of the user registered in the database, used as primary key.
dob - date of birth of the user registered in the database
address - address of the user registered in the database
password - password of the user registered in the database
status - account status of the user, 'DEACTIVATED' accounts are
		 not allowed to place investments or begin a project.
*/

CREATE TABLE users (
name VARCHAR(32) NOT NULL,
email VARCHAR(256) PRIMARY KEY,
dob DATE NOT NULL,
address VARCHAR(256) NOT NULL,
password VARCHAR(32) NOT NULL,
status VARCHAR(12) CONSTRAINT status CHECK(status = 'ACTIVE' OR status = 'DEACTIVATED') 
);

/* 
projects table stores all the projects. Projects must be registered by a user.
Attributes:
title - title of the project registered in the database
description - description of the project registered in the database
start_date - start date of the project registered in the database
end_date - end date of the project registered in the database
project_id - project_id of the project registered in the database, used as primary key.
target_amount - amount of money requested by project publisher to fund the project
current_amount - current amount of money collected for the project, updated for every transaction involving this project
category - category in which project is identified. user will choose from a drop down list when registering project
status - status of project. 
*/

CREATE TABLE projects (
title VARCHAR(256) NOT NULL,
description VARCHAR(256) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
project_id CHAR(14) PRIMARY KEY,
target_amount INT NOT NULL,
current_amount INT NOT NULL,
category VARCHAR(32) NOT NULL,
status VARCHAR(16) CONSTRAINT status CHECK(status = 'ACTIVE' OR status = 'DELETED')
);

/* 
investments table stores all the investments. Investments must be registered by a user for an existing project.
Attributes:
transaction_id - id of the investment registered in the database, used as primary key.
transaction_date - date the investment was registered in the database
investment_amount - invested amount in the project
investor_email - email of the user registered in the database, must be existing user.
project_id - project_id of the project invested in, must be existing project.
*/

CREATE TABLE investments (
transaction_id VARCHAR(256) PRIMARY KEY,
transaction_date DATE NOT NULL,
investment_amount INT NOT NULL,
investor_email VARCHAR(256) ,
project_id CHAR(14) ,
FOREIGN KEY (investor_email) REFERENCES users(email) ON UPDATE CASCADE,
FOREIGN KEY (project_id) REFERENCES projects(project_id)
);

/* 
ownership table stores the details relating the publisher to his/her project. 
Attributes:
publisher_email - email of the user registered in the database, must be existing user.
project_id - project_id of the project invested in, must be existing project. 
			 ie, project created first before entry into ownership.
**both attributes are used as the primary key.

*/

CREATE TABLE ownership (
publisher_email VARCHAR(256) ,
project_id CHAR(14) ,
FOREIGN KEY (publisher_email) REFERENCES users(email) ON UPDATE CASCADE,
FOREIGN KEY (project_id) REFERENCES projects(project_id),
PRIMARY KEY (publisher_email,project_id)
);