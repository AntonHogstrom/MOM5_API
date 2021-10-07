# Moment 5 API

## CRUD
- [x] Create
- [x] Read
- [x] Update
- [x] Delete

Functions are made in class-file with PHP with a Database connection though Config-file.
Database connection varies depending on if localhost or not.
Headers to approve of access-control

## Switch statement for METHOD

### Create
Gets data with file_get_contents.
Prepared statement and check if any value is empty.
Finally sends response to database


### Read
If code parameter is set, runs function to get specific course, otherwise function for all courses.

### Update
Takes Code parameter for specific course
Gets data with file_get_contents.
Prepared statement and check if any value is empty.
Finally sends response to database

### Delete
Takes Code parameter for specific course
Sends request to database


_ Anton Högström _
