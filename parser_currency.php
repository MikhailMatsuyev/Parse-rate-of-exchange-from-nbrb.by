<?php 

$rate = function()
{
	$xml = simplexml_load_file('http://www.nbrb.by/Services/XmlExRates.aspx?');
	
	if (!is_object($xml)) {
		return false;
	}
	
	foreach($xml->Currency as $a ){
			$arr=$a->attributes();
			
		switch((int)$arr["Id"]){
			case 145 :
				$rateData = "USD: {$a->Rate};<br/>";
			break;
			
			case 292 :
				$rateData .= "EUR: {$a->Rate};<br/>";
			break;
			
			case 298 :
				$rateData .= "RUB: {$a->Rate};<br/>";
			break;	
			
		}
    }
	
	return $rateData; 
};

print $rate();