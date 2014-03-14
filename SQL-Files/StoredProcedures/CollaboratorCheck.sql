SELECT idUsers, user_name, Users_idUsers, collab_id
FROM Users JOIN Collaborators
ON Users.idUsers=Collaborators.Users_idUsers
WHERE
	(
		(
			SELECT Users.idUsers
			FROM Users
			WHERE Users.user_name='user01'-- $login_session
		)=Collaborators.collab_id
		AND
		(
			SELECT Users.idUsers
			FROM Users
			WHERE Users.user_name='user02'-- $profilepage
		)=Collaborators.Users_idUsers
	)
	OR
	(
(
			SELECT Users.idUsers
			FROM Users
			WHERE Users.user_name='user02'-- $profilepage
		)=Collaborators.collab_id
		AND
		(
			SELECT Users.idUsers
			FROM Users
			WHERE Users.user_name='user01'-- $login_session
		)=Collaborators.Users_idUsers
	);