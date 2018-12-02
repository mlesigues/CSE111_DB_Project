--* Sample of the way the tables are created
CREATE TABLE Movies (
    movieID  INTEGER        PRIMARY KEY,
    title    VARCHAR (100)  NOT NULL,
    year     date           NOT NULL,
    studioID INTEGER        NOT NULL,
    description text        NOT NULL,
    foreign key (studioID) references Studios (studioID) 
);

CREATE TABLE ClassifyAs (
    movieID     INTEGER     NOT NULL,
    genreID     INTEGER     NOT NULL,
    foreign key (movieID) references Movies (movieID) ON DELETE CASCADE,
    foreign key (genreID) references Genres (genreID) ON DELETE CASCADE
);

--* Sample queries 
INSERT INTO MOVIES VALUES (100001,'Insidious: The Last Key',2018-01-05,500001,'Anastasia and Christian get married, 
                           but Jack Hyde continues to threaten their relationship.');
SELECT * FROM MOVIES;
SELECT * FROM MOVIES ORDER BY DATE;