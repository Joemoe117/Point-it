<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*	Affiche une liste de personne aen séparant les différents noms avec des
*	, ou et selon la position
*	@param 		arrayUsers		tableau contenant l'ensemble des personnes
*	@return  	une chaine contenant la liste des personnes
*/
if ( ! function_exists('getDisplayUsers')){
	function getDisplayUsers($arrayUsers){

		$string = "";
		$nbValue = count($arrayUsers);
		$i = 0;
		foreach ($arrayUsers as $key => $value) {
			if ( $i == 0) {
				$string += $value;
			} else if (){
				$string += ", ".$value;
			} else {
				$string += "et ".$value;
			}
			$i++;
		}

		return $string;
	}
}