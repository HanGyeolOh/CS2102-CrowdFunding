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
project_id SERIAL PRIMARY KEY,
target_amount INT NOT NULL,
current_amount INT NOT NULL,
category VARCHAR(32) NOT NULL,
logo_url VARCHAR(256) NOT NULL
);

CREATE TABLE contain(
project_id INT,
picture_url VARCHAR(256) PRIMARY KEY,
FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE
);

CREATE TABLE investments (
transaction_id SERIAL PRIMARY KEY,
transaction_date DATE NOT NULL,
investment_amount INT NOT NULL,
investor_email VARCHAR(256) ,
project_id INT ,
FOREIGN KEY (investor_email) REFERENCES users(email) ON UPDATE CASCADE,
FOREIGN KEY (project_id) REFERENCES projects(project_id) ON DELETE CASCADE
);

CREATE TABLE ownership (
publisher_email VARCHAR(256) ,
project_id INT ,
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

CREATE OR REPLACE FUNCTION alter_current_amount()
RETURNS TRIGGER AS $$
BEGIN
UPDATE projects
SET current_amount = current_amount + NEW.investment_amount
WHERE project_id = NEW.project_id; 

RETURN NEW;
END; $$
LANGUAGE PLPGSQL;

CREATE TRIGGER alter_current_amount
BEFORE INSERT 
ON investments
FOR EACH ROW
EXECUTE PROCEDURE alter_current_amount();

CREATE VIEW thumbnail_info AS
SELECT p.title, p.description, p.project_id, p.logo_url, u.name, p.start_date, p.end_date, p.target_amount, p.current_amount, o.publisher_email
FROM projects p, ownership o, users u
WHERE p.project_id = o.project_id AND u.email = o.publisher_email;

