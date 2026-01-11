CREATE TABLE IF NOT EXISTS users (
  user_id        INTEGER   PRIMARY KEY,
  auth_level     INTEGER   NOT NULL,
  username       TEXT      NOT NULL,
  displayname    TEXT      NOT NULL,
  is_only_patron INTEGER   NOT NULL,
  password       TEXT
);


CREATE TABLE IF NOT EXISTS books (
  book_id     INTEGER    PRIMARY KEY,
  title       TEXT       NOT NULL,
  author      INTEGER    NOT NULL,
  location    INTEGER    NOT NULL,
  disposed    INTEGER    NOT NULL DEFAULT 0,
  classmark   TEXT       NOT NULL,
  notes       TEXT,
  checkedto   INTEGER,
  duedate     TEXT
);


CREATE TABLE IF NOT EXISTS authors (
  author_id INTEGER     PRIMARY KEY,
  name      TEXT        NOT NULL
);


CREATE TABLE IF NOT EXISTS locations(
  location_id   INTEGER   PRIMARY KEY,
  name          TEXT      NOT NULL,
  description   TEXT
);
