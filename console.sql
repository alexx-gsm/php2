CREATE SCHEMA IF NOT EXISTS php2;

USE php2;

CREATE TABLE IF NOT EXISTS authors (
  id SERIAL,
  name VARCHAR(255) NOT NULL DEFAULT 'unknown',
  email VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS news (
  id SERIAL,
  title VARCHAR(100) NOT NULL DEFAULT 'no title',
  lead TEXT NOT NULL,
  text TEXT NOT NULL,
  author_id BIGINT(20) UNSIGNED,
  CONSTRAINT news_author_id_fk
			FOREIGN KEY (author_id) REFERENCES authors (id)
);