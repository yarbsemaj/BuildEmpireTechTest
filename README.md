BuildEmpire Tech Test
======
##### Product Quoting system
###### Build using a lightweight framework special created for this project.

# Key Points
1. Fully MVC implementation
2. All inputs validated using a custom validation system
3. All routes secured using middleware
4. RESTful
5. Users secured using bcrypt
6. All field and totals calculated on the database, no heavy lifting done by the PHP server.
7. PDO used to avoid injection
8. All strings sanitised before printout
9. CSRF detection and prevention

# Framework features
1. MVC
2. Models support a simple query builder, relationships, and custom attributes
3. Facards
4. Method spoofing

# Testing
Due to time constraints, CSRF protection and integrating GUZLE with the session cookie I did not have time to a full sweet of unit tests. However, extensive non unit testing was carried out before submission.

# To Run

`docker-compose up`
The web server runs on `localhost:8000`

phpMyAdmin is on port `8080`, username `png`, password `png` from there the sql dump can be imported.
