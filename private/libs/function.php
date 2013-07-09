<?php

//=====fonction trace pour remplacer print_var
define('STYLE_SPAN', "font-family:Courier New;font-size:11px;font-weight:normal;");
function trace()
{
  $sOutput = '';
  $aPre = array();
  foreach (func_get_args() as $i => $mArgs)
  {
      $sVars = HtmlTrace($mArgs);

      preg_match('/^(<pre[^>]*>)(.+)(<\/pre>)$/is', $sVars, $aPre);
      $sOutput .= $sOutput ? "<hr style=\"color: grey;background: transparent;border:0;border-bottom: 1px dashed grey;height:1px;margin:0;padding:0;padding-top:10px;\"/>" . $aPre[2] : $aPre[2];
  }

  // send to output
  echo $aPre[1] . $sOutput . $aPre[3];
}
//==========

//=====sous fonction utile pour la fonction Trace
function htmlTrace($mVars)
{
  $sVars = _GetPrintR($mVars);

  if (gettype($mVars) == "object"  || gettype($mVars) == "array")
  {
    // color
    $sVars = preg_replace('/\[(\w+)\:(public|private|protected)\]/', '[<span style="' . STYLE_SPAN . 'color:darkred;">$1</span>:<span style="' . STYLE_SPAN . 'color:darkblue;">$2</span>]', $sVars);
    $sVars = preg_replace('/\[([^\]]+)\] =>/', '[<span style="' . STYLE_SPAN . 'color: purple;">$1</span>] =>', $sVars);

    $sSearch = is_object($mVars) ? get_class($mVars) . " Object\n" : "Array\n";
    $sReplace = is_object($mVars) ? "<span style=\"" . STYLE_SPAN . "color:#079700;\">" . get_class($mVars) . "</span>\n" : "<span style=\"" . STYLE_SPAN . "color:#079700;\">Array</span>\n";
    $sVars = str_replace($sSearch, $sReplace, $sVars);
  }

  $sOutput  = "<pre style=\"" . STYLE_SPAN . "text-align: left;background-color:#FFFFE1;padding:10px;border:solid 1px #999999;margin:6px;color:#000;overflow:auto;\">\n";
  $sOutput .= $sVars;
  $sOutput .= "</pre>\n";

  return $sOutput;
}
//==========

//=====sous fonction utile pour la fonction Trace
function _GetPrintR($mVars)
{
  if (gettype($mVars) == "NULL")
    return "null";

  if (gettype($mVars) == "boolean")
    return $mVars ? "true" : "false";

  $sVars = print_r($mVars, true);

  $sVars = htmlspecialchars($sVars, ENT_NOQUOTES);
  $sVars = str_replace("=&gt;", "=>", $sVars);

  return str_replace("    ", "  ", str_replace("\t", "  ", str_replace("\n\n", "\n", str_replace("  ", " ", $sVars))));
}
//==========

//=====gére la réception des variables de type get, post et request
function getVar($type, $name){
	print_r($type);
	switch(strtoupper($type)) {
		case "GET" :
			if(!isset($_GET[$name]))
				return "";
			$value = escape($_GET[$name]);
			return $value;
			break;
		case "POST" :
			if(!isset($_POST[$name]))
				return "";
			$value = escape($_POST[$name]);
			return $value;
			break;
		case "REQUEST" :
			if(!isset($_REQUEST[$name]))
				return "";
			$value = escape($_REQUEST[$name]);
			return $value;
			break;
		default :
			return "";
	}
}
//==========

/**
 *
 * Modifie une date, si type unix (yyyy-mm-ss) => retourne un type FR (dd/mm/yyyy) et vice versa
 * supprime l'heure si présente
 * @param string $date
 * @return string date
 */
function formatDate($date) {

	if ($date) {
		if (strpos($date, ' ')){
			$part = explode(' ', $date);
			$date = $part[0];
		}
		if (strpos($date, '-')) {
			$tmp = explode('-', $date);
			$dateAfter = $tmp[2].'/'.$tmp[1].'/'.$tmp[0];
		} else {
			$tmp = explode('/', $date);
			$dateAfter = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
		}

		return $dateAfter;

	}

	return null;

}

/**
 *
 * Modifie une date, retourne la partie heure
 * @param string $date
 * @return string date
 */
function returnHeure($date) {

	if ($date) {
		if (strpos($date, ' ')){
			$part = explode(' ', $date);
			$date = $part[1];
			return $date;
		}
	}

	return null;

}

/**
 *
 * Modifie un nombre en ajoutant des 0 devant pour qu'il contienne 6 chiffres
 * @param int $nb
 * @return int nb
 */
function jenesuispasunzero($nb) {
	//Avec quand même un nom de fonction qui démonte
	if ($nb) {
		while(strlen($nb)<6){
			$nb = '0'.$nb;
		}
		return $nb;
	}

	return null;

}

/**
 *
 * Génére un numéro de billet de 13 chiffres
 * @return int nb
 */
function num_billet_generate() {
	$nb = mt_rand(0, 9999999);
	$nb .= mt_rand(0, 999999);
	
	while(strlen($nb)<13){
		$nb = '0'.$nb;
	}
		return $nb;
}

?>