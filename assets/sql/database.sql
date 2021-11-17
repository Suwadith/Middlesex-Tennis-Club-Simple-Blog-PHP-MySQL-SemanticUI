CREATE TABLE IF NOT EXISTS `user`
(
    `user_id`   INT(20)         NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
    `firstname` VARCHAR(20)     NOT NULL,
    `lastname`  VARCHAR(20)     NOT NULL,
    `dob`       TIMESTAMP       NOT NULL,
    `address`   VARCHAR(80)     NOT NULL,
    `username`  VARCHAR(16)     NOT NULL    UNIQUE,
    `password`  VARCHAR(255)    NOT NULL,
    `email`     VARCHAR(64)     NOT NULL    UNIQUE
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

CREATE TABLE IF NOT EXISTS `post`
(
    `post_id`   INT(20)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id`   INT(20)     NOT NULL,
    `player_id` INT(20)     NOT NULL,
    `username`  VARCHAR(16)     NOT NULL,
    `comment`   MEDIUMTEXT  NOT NULL,
    `timestamp` TIMESTAMP   NOT NULL,
    FOREIGN KEY (`user_id`)     REFERENCES `user`(`user_id`),
    FOREIGN KEY (`player_id`)   REFERENCES `players`(`player_id`)
);



INSERT INTO `players` (`player_id`, `player_name`, `player_picture`, `player_age`, `player_country`, `player_summary`)
VALUES (1, 'Novak Djokovic', 'https://www.atptour.com/-/media/tennis/players/head-shot/2019/djokovic_head_ao19.png', 34,
        'Serbia',
        'Owns FedEx ATP Rankings records for most weeks at No. 1 (346) and most years ended at No. 1 (7).\r\nOne of 3 men to capture record 20 Grand Slam titles (also Federer, Nadal), hold titles at all 4 Grand Slam events at same time (also Budge, Laver) and win all 4 Grand Slam events more than once (also Emerson, Laver).\r\nCaptured 5 Nitto ATP Finals titles overall and is only player to win 4 in a row (2008, 2012-15).\r\nOnly player to win all 9 ATP Masters 1000 events, doing so multiple times for a record total of 37 titles.\r\nBoasts winning records against Federer (27-23) and Nadal (30-28), as well as win streaks of 43 matches overall (2010-11), record 31 matches at ATP Masters 1000s (2011) and Open Era-record 30 matches at Grand Slams (2015-16).'),
       (2, 'Rafael Nadal', 'https://www.atptour.com/-/media/tennis/players/head-shot/2020/nadal_head_ao20.png', 35,
        'Spain',
        'Won an ATP Tour title in record 18 straight seasons (2004-21) and ranked in Top 10 for record 828 consecutive weeks (2005-21), including 209 total weeks as No. 1 following 160 straight weeks as No. 2.\r\nGreatest of all time on clay with 62 of his 88 titles, 464-43 record overall (.915), 130-3 record in best-of-5-set matches (.977), 81-match win streak (2005-07), 50-set win streak (2017-18) and 0 losing streaks.\r\nTied with Djokovic and Federer for most Grand Slam titles (20) and tied with Djokovic for most ATP Masters 1000 titles (36), including record 13 Roland Garros, 11 Monte Carlo and 10 Rome titles.\r\nEarned record 22 wins vs. World No. 1 and 398 wins at ATP Masters 1000 events, posting 1,000th career win at 2020 Paris over countryman F. Lopez.\r\nJoined Agassi as 2nd man to complete career Grand Slam and win Olympic gold medal in singles (2008 Beijing), then added gold medal in doubles w/M. Lopez (2016 Rio).'),
       (3, 'Roger Federer', 'https://www.atptour.com/-/media/tennis/players/head-shot/2020/federer_head_ao20.png', 40,
        'Switzerland',
        'Holds records as oldest World No. 1 (36 in 2018) and for most consecutive weeks at No. 1 (237) in FedEx ATP Rankings history (since 1973).\r\nOwns 103 titles and 1,251 wins – 2nd in Open Era to Connors’ 109 and 1,274. Never retired in career (1,526 singles and 223 doubles matches).\r\nTied with Djokovic and Nadal for most Grand Slam titles (20) and owns Grand Slam records with 369 wins, 31 finals (10 straight from 2005-07), 46 SFs (23 straight from 2004-10) and 58 QFs (36 straight from 2004-13).\r\nBoasts tournament records for most championships at Basel (10), Halle (10), Wimbledon (8), ATP Masters 1000 Cincinnati (7) and Nitto ATP Finals (6).\r\nEnjoyed 41-match win streak (2006-07), reached 17 straight finals (2005-06), posted 24-final win streak (2003-05), won 24 straight matches vs. Top 10 (2003-05) and earned 65 straight wins on grass (2003-08).'),
       (4, 'Dusan Lajovic', 'https://www.atptour.com/-/media/tennis/players/head-shot/2020/lajovic_head_ao20.png', 33,
        'Serbia',
        'Achieved career-high No. 23 after defeating No. 5 Thiem en route to 1st ATP Tour singles final at 2019 ATP Masters 1000 Monte Carlo.\r\nEntered Monte Carlo as World No. 48 and became lowest-ranked Monte Carlo finalist since No. 53 Arazi in 2001.\r\nWon 1st ATP Tour singles title at 2019 Umag, doubles title at 2015 Istanbul w/Albot and team title at 2020 ATP Cup for Team Serbia.\r\nAdvanced to Grand Slam 4R for 1st time at 2014 Roland Garros, losing to 13-time champion Nadal.\r\nQualified 10 times at ATP Masters 1000 events, including series debut at 2014 Indian Wells.');


