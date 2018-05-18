# takeluft_chat

This is an online chat service, I created it as a small project.

To be able to use this, you'll have to create a database called takeluftdb2 that will have 2 tables: posts and users
The "posts" table will need 4 columns, it's gonna be the table containing the messages from the users:
- id, int(11), autoincrement, primary
- username, varchar(200)
- msg, varchar(200)
- date, timestamp, current_timestamp
The "user" table will contain the user's username and password
- id, int(11), autoincrement, primary
- username, varchar(50)
- password, varchar(250)
- created_at, datetime, current_timestamp

It has a sign up page that will register the user and store his chosen username and password in the database only if the username hasn't been taken, otherwise it will show an error message
The login page just gets the user data and check if it exists in the data base
