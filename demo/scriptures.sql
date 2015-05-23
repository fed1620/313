use scriptures;

-- Create the scriptures table
CREATE TABLE scriptures
( id      INT PRIMARY KEY AUTO_INCREMENT
, book    VARCHAR(40) NOT NULL
, chapter INT NOT NULL
, verse   INT NOT NULL);

-- Create the notes table
CREATE TABLE notes
( id          INT PRIMARY KEY AUTO_INCREMENT
, scriptureID INT
, content VARCHAR(4000)
, FOREIGN KEY (scriptureID) REFERENCES scriptures(id));


-- Insert some scriptures
INSERT INTO scriptures
(book, chapter, verse)
VALUES
('3 Nephi', 1, 1),
('2 Nephi', 9, 34),
('1 Nephi', 2, 15);

-- Insert notes about the scriptures
INSERT INTO notes
( scriptureID, content)
VALUES
(1, 'I like this one'),
(3, 'Tents'),
(3, 'Living in tents');

-- Which notes were taken for scriptures from 1 Nephi?
SELECT * FROM scriptures s
JOIN notes n ON s.id = n.scriptureID
WHERE s.book = '1 Nephi';