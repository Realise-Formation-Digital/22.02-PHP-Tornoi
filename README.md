# Simple API in PHP

## Installation

Launch docker-compose up -d

- Access to your API through http://localhost:8800
- Access to PHPMySQL through http://localhost:9009

Upload data_db/users.sql into your database to test the API

## Routes

1. GET => /api/users/list

Get the complete list of users

(limit and page can be passed in query parameters)

2. GET => /api/users/get

Get a single user

(id must be passed in query parameters)

3. POST => /api/users/add

Add a new user

(nom, telephone, email and profil must be added to your body)

4. PUT => /api/users/update

Update an exiting user

(id must be passed in query parameters)

(nom, telephone, email and profil can be added to your body)

5. DELETE => /api/users/remove

Remove an existing user

(id must be passed in query parameters)
