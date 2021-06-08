/* Isabel Ovalles
  PDA 3
  7 Relations
*/

use bw_db18;
CREATE TABLE region(
  RName VARCHAR(30) NOT NULL,
  ProfessorName VARCHAR(30),
  Research VARCHAR(90),
  Climate VARCHAR (30),
  PRIMARY KEY (Rname)
);

CREATE TABLE pokemon (
  DID       INT NOT NULL,
  Nickname  VARCHAR(30),
  DexNum    INT NOT NULL,
  Species   VARCHAR(30) NOT NULL,
  Shiny     VARCHAR(3) NOT NULL,
  Gender    VARCHAR(10) NOT NULL,
  RName     VARCHAR(30),
  PRIMARY KEY(DID),
  FOREIGN KEY (Rname) REFERENCES region(RName)
    ON DELETE CASCADE
);

CREATE TABLE ptype(
  DID      INT,
  TypeName VARCHAR(10) NOT NULL,
  PRIMARY KEY(DID, TypeName),
  FOREIGN KEY(DID) REFERENCES pokemon(DID)
    ON DELETE CASCADE
);

CREATE TABLE egg(
  EID INT NOT NULL,
  DOB DATE NOT NULL,
   PRIMARY KEY(EID)
);

CREATE TABLE childOf(
  DID INT,
  EID INT,
  PRIMARY KEY(DID, EID),
  FOREIGN KEY(DID) REFERENCES pokemon(DID)
    ON DELETE CASCADE
);

CREATE TABLE eggGroup(
  EGName VARCHAR(30) NOT NULL,
  Description VARCHAR(200),
  PRIMARY KEY (EGName)
);

CREATE TABLE belongsTo(
  DID INT,
  EGName VARCHAR(30),
  PRIMARY KEY(DID, EGName),
  FOREIGN KEY(EGName) REFERENCES eggGroup(EGName)
    ON DELETE CASCADE,
  FOREIGN KEY(DID) REFERENCES pokemon(DID)
    ON DELETE CASCADE
);

DESC pokemon;
DESC childOf;
DESC egg;
DESC eggGroup;
DESC ptype;
DESC region;
DESC belongsTo;

/*
	Creating 5 tuples in region table
*/

/* Kanto, Johto, Hoenn, Sinnoh, Unova, Kalos, Alola, and Galar */

INSERT INTO region
VALUES('Kanto', 'Oak', 'Pokemon and human relationships', 'Temperate'),
	  ('Johto', 'Elm', 'Pokemon breeding', 'Temperate'),
	  ('Hoenn', 'Birch', 'Pokemon habitats', 'Equatorial'),
      ('Sinnoh', 'Rowan', 'Pokemon Evolution and form changes', 'Mountain'),
      ('Unova', 'Juniper', 'Origin of Pokemon', 'Subtropical'),
	  ('Kalos', 'Sycamore', 'Mega Evolutions', 'Mountain'),
      ('Alola', 'Kukui', 'Pokemon moves', 'Tropical'),
      ('Galar', 'Magnolia', 'Dynamax', 'Temperate');

SELECT * 
FROM region;
