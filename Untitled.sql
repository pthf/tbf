SELECT * FROM beerfans.user;

SELECT * FROM user u
	INNER JOIN countries c
	ON c.id = u.country_id
	INNER JOIN states s
	ON s.id = u.state_id
	WHERE u.userStatus <> 0
	AND u.userName LIKE 'pe%'
	OR s.name_s LIKE 'pe%'
	OR c.sortname LIKE 'pe%'
	OR name_c LIKE 'pe%';