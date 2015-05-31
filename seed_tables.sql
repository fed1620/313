USE project;

-- --------------------------------RESTAURANTS--------------------------------------

-- McDonald's
INSERT INTO restaurants
( name
, address
, hour_open
, hour_closed
, cuisine_type)
VALUES
( 'McDonald\'s'
, '175 Valley River Dr'
, '00:00:00'
, '24:00:00'
, 'Fast Food');

-- Original Thai
INSERT INTO restaurants
( name
, address
, hour_open
, hour_closed
, cuisine_type)
VALUES
( 'Original Thai'
, '10 E Main Str'
, '11:00:00'
, '21:00:00'
, 'Thai');

-- Pizza Pie Cafe
INSERT INTO restaurants
( name
, address
, hour_open
, hour_closed
, cuisine_type)
VALUES
( 'Pizza Pie Cafe'
, '240 N 2nd E'
, '11:00:00'
, '23:00:00'
, 'Pizza');

-- Costa Vida
INSERT INTO restaurants
( name
, address
, hour_open
, hour_closed
, cuisine_type)
VALUES
( 'Costa Vida'
, '485 N 2nd E #108'
, '11:00:00'
, '22:00:00'
, 'Tex-Mex');

-- Mill Hollow
INSERT INTO restaurants
( name
, address
, hour_open
, hour_closed
, cuisine_type)
VALUES
( 'Mill Hollow'
, '54 S 1st E'
, '10:30:00'
, '22:00:00'
, 'Sandwiches/Frozen Yogurt');

-- Mandarin
INSERT INTO restaurants
( name
, address
, hour_open
, hour_closed
, cuisine_type)
VALUES
( 'Mandarin'
, '222 E 7th N'
, '11:00:00'
, '21:00:00'
, 'Chinese');

-- --------------------------------RATINGS--------------------------------------

-- MCDONALD'S
INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(1, 3);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(1, 4);

-- ORIGINAL THAI
INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(2, 5);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(2, 4);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(2, 5);

-- PIZZA PIE CAFE
INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(3, 4);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(3, 3);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(3, 4);

-- COSTA VIDA
INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(4, 4);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(4, 5);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(4, 5);

-- MILL HOLLOW
INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(5, 4);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(5, 5);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(5, 5);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(5, 5);

-- MANDARIN
INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(6, 2);

INSERT INTO ratings
(restaurant_id, rating_value)
VALUES
(6, 5);

-- --------------------------------REVIEWS--------------------------------------

-- MCDONALD'S
INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 1
, 'George'
, 'After playing in the ball pit, I contracted three different diseases. Won\'t be coming back for a while.'
, '2015-05-01');

INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 1
, 'Sarah'
, 'I gained twelve pounds overnight!'
, '2015-05-09');

-- ORIGINAL THAI
INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 2
, 'Lindsay'
, 'Yum! I loved it!' 
, '2015-04-012');

INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 2
, 'Steve'
, 'I had to donate plasma five times just to be able to afford eating here. For that reason, I gave this place 4/5.' 
, '2015-04-20');

-- PIZZA PIE CAFE
INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 3
, 'Rob'
, 'Made it to twenty-three slices before puking. Was this my proudest moment? You bet it was.' 
, '2015-03-08');

-- COSTA VIDA
INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 4
, 'Jenny'
, 'Their horchata made me realize that my whole life has been a lie!' 
, '2015-04-17');

INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 4
, 'Owen'
, 'Meh.' 
, '2015-05-06');

-- MILL HOLLOW
INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 5
, 'Fed'
, 'Their banana peach smoothie has taught me the meaning of life :\')' 
, '2015-05-02');

-- MANDARIN
INSERT INTO reviews 
( restaurant_id
, author
, content
, date_written)
VALUES
( 6
, 'Tia'
, 'Nothing was very fresh and our waitress was kinda rude to us, which I didn\'t like'
, '2015-04-27');