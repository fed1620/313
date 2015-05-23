-- --Join Movies and Actors
use movies;

-- Create the Movies table
CREATE TABLE movies
( id    INT PRIMARY KEY AUTO_INCREMENT
, title VARCHAR(100) NOT NULL
, year  INT);

-- Create the Actors table
CREATE TABLE actors
( id   INT PRIMARY KEY AUTO_INCREMENT
, name VARCHAR(100) NOT NULL);

-- Cross-reference table
CREATE TABLE movieActor
( movieId INT NOT NULL
, actorId INT NOT NULL
, FOREIGN KEY (movieId) REFERENCES movies(id)
, FOREIGN KEY (actorId) REFERENCES actors(id));

-- Iron Man
INSERT INTO movies
(title, year)
VALUES
('Iron Man 3', '2013');

-- Insert two star wars movies
INSERT INTO movies
( title, year)
VALUES
('Star Wars: A New Hope', 1977),
('Star Wars: The Empires Strikes Back', 1980);

-- Which movies have "Star" in the title??
SELECT * FROM movies WHERE title LIKE '%Star%';

-- Insert several actors
INSERT INTO actors
(name)
VALUES
('Robert Downey Jr.'),
('James Earl Jones'),
('Mark Hamill');

-- Insert into the cross-reference table
INSERT INTO movieActor
(movieId, actorId)
VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(3, 1);

-- Join the tables
SELECT * FROM actors a
JOIN movieActor ma ON a.id = ma.actorId
JOIN movies m ON ma.movieId = m.id;

-- Just give us the names and titles
SELECT a.name, m.title FROM actors a
JOIN movieActor ma ON a.id = ma.actorId
JOIN movies m ON ma.movieId = m.id;

-- What's Mark Hamill in...?
SELECT m.title FROM actors a
JOIN movieActor ma ON a.id = ma.actorId
JOIN movies m ON ma.movieId = m.id
WHERE a.name = 'Mark Hamill';

-- Who stars in a movie that has the word "Hope" in it?
SELECT a.name FROM actors a
JOIN movieActor ma ON a.id = ma.actorId
JOIN movies m ON ma.movieId = m.id
WHERE m.title LIKE '%Hope%';