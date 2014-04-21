SELECT point_id, typept_id, typept_nom, point_description, point_date_crea, point_date_evenement, profil_id_donne, Donne.profil_nom AS profil_nom_donne FROM Points
NATURAL JOIN Types_Point
INNER JOIN Profils AS Donne ON Donne.profil_id = profil_id_donne
ORDER BY point_date_crea