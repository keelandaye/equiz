<?php 
    function checkSpell($w, $nw) {
   	 	$lev = levenshtein($w, $nw);
    	$mlen = (strlen($w) + strlen($nw)) / 2;
    	$mlen = ceil($mlen);
    	$levc = $mlen * 0.4;
    	$levc = floor($levc);
    	if ($lev <= $levc) {
    		return true;
    	} else {
    		return false;
    	}
    }
?>