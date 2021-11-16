CREATE TABLE IF NOT EXISTS `user`
(
    `user_id`   INT(20)         NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
    `firstname` VARCHAR(20)     NOT NULL,
    `lastname`  VARCHAR(20)     NOT NULL,
    `username`  VARCHAR(16)     NOT NULL    UNIQUE,
    `password`  VARCHAR(255)    NOT NULL,
    `email`     VARCHAR(64)     NOT NULL
);

CREATE TABLE IF NOT EXISTS `post`
(
    `post_id`   INT(20)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`   INT(20)     NOT NULL,
    `comment`   MEDIUMTEXT  NOT NULL,
    `timestamp` TIMESTAMP   NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
);

CREATE TABLE IF NOT EXISTS `players`
(
    `player_id`         INT(20)         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `player_name`       VARCHAR(100)    NOT NULL,
    `player_picture`    VARCHAR(2048)   NOT NULL,
    `player_age`        INT(3)          NOT NULL,
    `player_country`    VARCHAR(50)     NOT NULL,
    `player_summary`    MEDIUMTEXT      NOT NULL
);


INSERT INTO `players` (`player_name`, `player_picture`, `player_age`, `player_country`, `player_summary`)
VALUES ('Novak Djokovic', 'https://www.atptour.com/-/media/tennis/players/head-shot/2019/djokovic_head_ao19.png', 34,
        'Serbia',
        'Owns FedEx ATP Rankings records for most weeks at No. 1 (346) and most years ended at No. 1 (7). One of 3 men to capture record 20 Grand Slam titles (also Federer, Nadal), hold titles at all 4 Grand Slam events at same time (also Budge, Laver) and win all 4 Grand Slam events more than once (also Emerson, Laver). Captured 5 Nitto ATP Finals titles overall and is only player to win 4 in a row (2008, 2012-15). Only player to win all 9 ATP Masters 1000 events, doing so multiple times for a record total of 37 titles. Boasts winning records against Federer (27-23) and Nadal (30-28), as well as win streaks of 43 matches overall (2010-11), record 31 matches at ATP Masters 1000s (2011) and Open Era-record 30 matches at Grand Slams (2015-16).');

INSERT INTO `players` (`player_name`, `player_picture`, `player_age`, `player_country`, `player_summary`)
VALUES ('Rafael Nadal', 'https://www.atptour.com/-/media/tennis/players/head-shot/2020/nadal_head_ao20.png', 35,
        'Spain',
        'Won an ATP Tour title in record 18 straight seasons (2004-21) and ranked in Top 10 for record 828 consecutive weeks (2005-21), including 209 total weeks as No. 1 following 160 straight weeks as No. 2. Greatest of all time on clay with 62 of his 88 titles, 464-43 record overall (.915), 130-3 record in best-of-5-set matches (.977), 81-match win streak (2005-07), 50-set win streak (2017-18) and 0 losing streaks. Tied with Djokovic and Federer for most Grand Slam titles (20) and tied with Djokovic for most ATP Masters 1000 titles (36), including record 13 Roland Garros, 11 Monte Carlo and 10 Rome titles. Earned record 22 wins vs. World No. 1 and 398 wins at ATP Masters 1000 events, posting 1,000th career win at 2020 Paris over countryman F. Lopez. Joined Agassi as 2nd man to complete career Grand Slam and win Olympic gold medal in singles (2008 Beijing), then added gold medal in doubles w/M. Lopez (2016 Rio).');

INSERT INTO `players` (`player_name`, `player_picture`, `player_age`, `player_country`, `player_summary`)
VALUES ('Roger Federer', 'https://www.atptour.com/-/media/tennis/players/head-shot/2020/federer_head_ao20.png', 40,
        'Switzerland',
        'Holds records as oldest World No. 1 (36 in 2018) and for most consecutive weeks at No. 1 (237) in FedEx ATP Rankings history (since 1973). Owns 103 titles and 1,251 wins – 2nd in Open Era to Connors’ 109 and 1,274. Never retired in career (1,526 singles and 223 doubles matches). Tied with Djokovic and Nadal for most Grand Slam titles (20) and owns Grand Slam records with 369 wins, 31 finals (10 straight from 2005-07), 46 SFs (23 straight from 2004-10) and 58 QFs (36 straight from 2004-13). Boasts tournament records for most championships at Basel (10), Halle (10), Wimbledon (8), ATP Masters 1000 Cincinnati (7) and Nitto ATP Finals (6). Enjoyed 41-match win streak (2006-07), reached 17 straight finals (2005-06), posted 24-final win streak (2003-05), won 24 straight matches vs. Top 10 (2003-05) and earned 65 straight wins on grass (2003-08).');

INSERT INTO `players` (`player_name`, `player_picture`, `player_age`, `player_country`, `player_summary`)
VALUES ('Dusan Lajovic', 'https://www.atptour.com/-/media/tennis/players/head-shot/2020/lajovic_head_ao20.png', 33,
        'Serbia',
        'Achieved career-high No. 23 after defeating No. 5 Thiem en route to 1st ATP Tour singles final at 2019 ATP Masters 1000 Monte Carlo. Entered Monte Carlo as World No. 48 and became lowest-ranked Monte Carlo finalist since No. 53 Arazi in 2001. Won 1st ATP Tour singles title at 2019 Umag, doubles title at 2015 Istanbul w/Albot and team title at 2020 ATP Cup for Team Serbia. Advanced to Grand Slam 4R for 1st time at 2014 Roland Garros, losing to 13-time champion Nadal. Qualified 10 times at ATP Masters 1000 events, including series debut at 2014 Indian Wells.');