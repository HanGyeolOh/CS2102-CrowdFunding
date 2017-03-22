CREATE TABLE users (
name VARCHAR(32) NOT NULL,
email VARCHAR(256) PRIMARY KEY,
dob DATE NOT NULL,
address VARCHAR(256) NOT NULL,
password VARCHAR(32) NOT NULL,
image_url VARCHAR(256) NOT NULL
);

CREATE TABLE projects (
title VARCHAR(256) NOT NULL,
description VARCHAR(256) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
project_id CHAR(14) PRIMARY KEY,
target_amount INT NOT NULL,
current_amount INT NOT NULL,
category VARCHAR(32) NOT NULL,
logo_url VARCHAR(256) NOT NULL
);

CREATE TABLE contain(
project_id CHAR(14),
picture_url VARCHAR(256) PRIMARY KEY,
FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE
);

CREATE TABLE investments (
transaction_id VARCHAR(256) PRIMARY KEY,
transaction_date DATE NOT NULL,
investment_amount INT NOT NULL,
investor_email VARCHAR(256) ,
project_id CHAR(14) ,
FOREIGN KEY (investor_email) REFERENCES users(email) ON UPDATE CASCADE,
FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE
);

CREATE TABLE ownership (
publisher_email VARCHAR(256) ,
project_id CHAR(14) ,
FOREIGN KEY (publisher_email) REFERENCES users(email) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE,
PRIMARY KEY (publisher_email,project_id)
);

CREATE OR REPLACE FUNCTION alter_investment()
RETURNS TRIGGER AS $$
BEGIN
UPDATE investments
SET investor_email = 'd_user@gmail.com'
WHERE investor_email = OLD.email; 

DELETE FROM projects
WHERE project_id = ANY(SELECT project_id FROM ownership WHERE publisher_email = OLD.email);

RETURN OLD;
END; $$
LANGUAGE PLPGSQL;

CREATE TRIGGER alter_investment
BEFORE DELETE 
ON users
FOR EACH ROW
EXECUTE PROCEDURE alter_investment();