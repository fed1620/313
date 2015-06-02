USE project;

-- Drop foreign keys first
ALTER TABLE reviews DROP FOREIGN KEY fk_reviews_1;
ALTER TABLE ratings DROP FOREIGN KEY fk_ratings_1;

-- Create the restaurants table
SELECT 'RESTAURANTS' AS "Drop Table";
DROP TABLE IF EXISTS restaurants;
CREATE TABLE restaurants 
( id           INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, name         VARCHAR(128) NOT NULL
, address      VARCHAR(128) NOT NULL
, phone        VARCHAR(16)  NOT NULL
, cuisine_type VARCHAR(64)  NOT NULL
, mon_open     TIME NOT NULL
, mon_close    TIME NOT NULL
, tue_open     TIME NOT NULL
, tue_close    TIME NOT NULL
, wed_open     TIME NOT NULL
, wed_close    TIME NOT NULL
, thu_open     TIME NOT NULL
, thu_close    TIME NOT NULL
, fri_open     TIME NOT NULL
, fri_close    TIME NOT NULL
, sat_open     TIME NOT NULL
, sat_close    TIME NOT NULL
, sun_open     TIME NOT NULL
, sun_close    TIME NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create the reviews table
SELECT 'REVIEWS' AS "Drop Table";
DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews
( id            INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, restaurant_id INT UNSIGNED NOT NULL
, author        VARCHAR(64)  NOT NULL
, content       TEXT         NOT NULL
, date_written  DATE         NOT NULL
, KEY fk_reviews_1 (restaurant_id)
, CONSTRAINT fk_reviews_1 FOREIGN KEY(restaurant_id) REFERENCES restaurants(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create the ratings table
SELECT 'RATINGS' AS "Drop Table";
DROP TABLE IF EXISTS ratings;
CREATE TABLE ratings
( id            INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, restaurant_id INT UNSIGNED NOT NULL
, rating_value  INT UNSIGNED NOT NULL
, KEY fk_ratings_1 (restaurant_id)
, CONSTRAINT fk_ratings_1 FOREIGN KEY(restaurant_id) REFERENCES restaurants(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;