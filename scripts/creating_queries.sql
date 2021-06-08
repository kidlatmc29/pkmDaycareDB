use bw_db18;

/*
1.	Find the Pokémon from the Lental region. 
*/
SELECT * 
FROM pokemon
WHERE pokemon.RName = "Lental"
LIMIT 20;


/*
2.	For each Fairy AND Dark Type pokemon, find there DID and species. 
*/
SELECT P.DID, P.Species
FROM pokemon as P,  ptype as T
WHERE T.DID = P.DID AND T.TypeName = "Fairy"
		AND T.DID IN (SELECT P2.DID
					  FROM pokemon as P2, ptype as T2
					  WHERE T2.DID = P2.DID AND T2.TypeName = "Dark");
/*
- The only (3) pokemon that are BOTH fairy and dark type are: 
	- 859 Impidimp
    - 860 Morgrem
    - 861 Grimmsnarl
*/

/*
3.	For each region, find the total number of shinies from it. 
*/

SELECT R.RName as Region, count(*) as Total_Shinies
FROM region as R, pokemon as P
WHERE R.RName = P.RName AND P.shiny = "Yes"
GROUP BY R.RName;


/*data manip part */

SELECT MAX(DID)
FROM pokemon;

INSERT INTO pokemon 
VALUE (1746, "Puff", 869, "Alcremie", "Yes", "Female", "Galar");

SELECT *
FROM pokemon
WHERE DID = 1746;


UPDATE pokemon
SET Nickname = "Chomper" 
WHERE DID = 833;

SELECT DID, Nickname, Species
FROM pokemon
WHERE DID = 833;

SELECT *
FROM pokemon
WHERE RName = "Lental"; 

UPDATE pokemon 
SET RName = "Galar"
WHERE Species = "Sobble" AND RName = "Lental"; 

SELECT *
FROM egg
GROUP BY DOB;

SELECT *
FROM egg
WHERE DOB = "2020-05-03";

DELETE FROM egg
WHERE EID = 29 AND DOB = "2020-05-03";