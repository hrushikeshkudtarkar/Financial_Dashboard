CREATE TABLE finance_data (
id SERIAL PRIMARY KEY,
department VARCHAR(100),
manager VARCHAR(100),
region VARCHAR(100),
month VARCHAR(20),
revenue NUMERIC(12,2),
expenses NUMERIC(12,2),
budget NUMERIC(12,2),
employees INT,
projects_completed INT
);

INSERT INTO finance_data
(department, manager, region, month, revenue, expenses, budget, employees, projects_completed)

VALUES

('Sales','John Smith','Europe','January',50000,30000,35000,20,15),
('Marketing','Emma Watson','Europe','January',30000,20000,22000,10,8),
('HR','David Lee','Asia','January',15000,10000,12000,5,4),
('Operations','Michael Scott','North America','January',45000,28000,30000,25,20),

('Sales','John Smith','Europe','February',55000,32000,35000,20,18),
('Marketing','Emma Watson','Europe','February',28000,21000,22000,10,9),
('HR','David Lee','Asia','February',17000,11000,12000,5,5),
('Operations','Michael Scott','North America','February',47000,30000,30000,25,22),

('Sales','John Smith','Europe','March',60000,35000,36000,22,20),
('Marketing','Emma Watson','Europe','March',32000,22000,23000,12,10),
('HR','David Lee','Asia','March',18000,12000,12000,5,6),
('Operations','Michael Scott','North America','March',50000,31000,32000,28,25);
DROP TABLE finance_data;
	
