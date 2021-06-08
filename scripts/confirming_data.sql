/* Isabel Ovalles
  PDA 4
 Inserting data
*/
 
use bw_db18;

SELECT count(*)
FROM belongsTo; 

SELECT *
FROM eggGroup;

SELECT *
FROM egg;

SELECT *
FROM ptype;

SELECT *
FROM belongsTo;

SELECT count(*)
FROM childOf; 

SELECT *
FROM belongsTo
LIMIT 3;

ALTER TABLE eggGroup
MODIFY COlUMN EGName VARCHAR(100);

INSERT INTO eggGroup
VALUES ('Monster', 'Pokémon in this group are saurian/kaiju-like in appearance and nature.');