-- 데이터베이스 생성
CREATE DATABASE notice_board;
USE notice_board;

-- 테이블 생성
CREATE TABLE board (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(8) NOT NULL,
    tel VARCHAR(30) NOT NULL,
    born VARCHAR(30),
    date DATETIME,
    PRIMARY KEY(id)
);