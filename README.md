Projet_BlocNote


To use the NotePad:

*********
*Step 1:*
*********

In class/database.php

-> Change the value of $_host || $_username || $_password to be the one you're using.
For me as a WAMP user: 
host = localhost
port = 3308
dbname (your database's name) = blocnotedb
username = root
password = ""

Once this step done, we need to create the database


*********
*Step 2:*
*********
My database name is "blocnotedb", to be sure the Notepad works, please take the name i'm using so as not changing the SQL request

Database name: "blocnotedb"
Table 1: "member"
Table 2: "note"

_In table 1 "member":

We need: 

id int(11) AUTO INCREMENT
lastName (text)
firstName (text)
email (text)
password (text)

_In Table 2 "note": 

We need:

id int(11) AUTO INCREMENT
note_author as a foreign key of the id in table "member"
title (text)
description (text)
content (text)
save_date DATETIME ON UPDATE CURRENT_TIMESTAMP

Now you are ready to use it :)