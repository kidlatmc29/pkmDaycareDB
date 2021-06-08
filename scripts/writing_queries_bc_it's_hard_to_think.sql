SELECT P.Species as Pokemon, T.TypeName as Pokemon_Type
FROM pokemon as P, ptype as T
WHERE P.DID = T.DID; 

/*Total Number of Pokemon in the Daycare*/
SELECT COUNT(distinct DID)  as Total_Pokemon
FROM pokemon;

/*Total Number of Species (no repeats) in the Daycare */
SELECT COUNT(distinct Species)  as Total_Species
FROM pokemon;

/*Find the most common type for a pokemon what it's count it */

SELECT TypeName, COUNT (TypeName) as Most_Common_Type
FROM pType
GROUP BY TypeName
ORDER BY TypeName
