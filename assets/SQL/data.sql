CREATE OR REPLACE view v_employees_current AS
SELECT employees.emp_no , employees.birth_date , 
employees.first_name , employees.last_name ,
employees.gender , employees.hire_date , dept_emp.dept_no FROM employees  JOIN dept_emp 
ON dept_emp.emp_no = employees.emp_no 
WHERE dept_emp.to_date = '9999-01-01'

CREATE OR REPLACE view v_manager_current AS
SELECT employees.emp_no , employees.birth_date , 
employees.first_name , employees.last_name , dept_manager.dept_no ,
employees.gender , employees.hire_date FROM employees  JOIN dept_manager
ON dept_manager.emp_no = employees.emp_no
WHERE dept_manager.to_date = '9999-01-01'

CREATE OR REPLACE view v_info_departments AS
SELECT departments.dept_name ,  count(v_employees_current.emp_no) as nb_employees , manager.last_name , manager.first_name FROM departments JOIN v_employees_current ON departments.dept_no = v_employees_current.dept_no JOIN v_manager_current as manager ON manager
.dept_no = departments.dept_no GROUP BY departments.dept_name;
