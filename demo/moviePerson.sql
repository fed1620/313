-- Create a new user
CREATE USER 'moviePerson'@'localhost' IDENTIFIED BY 'its a trap';

-- Grant privileges
GRANT SELECT ON movies.* TO 'moviePerson'@'localhost';
FLUSH PRIVILEGES;