<?php  
function getFeed($feed_url) {  
      
    $content = file_get_contents($feed_url);  
    $x = new SimpleXmlElement($content);

	$description = $x->channel->item->description;
	$imgpattern = '/src="(.*?)"/i';
	preg_match($imgpattern, $description, $matches);
 
	return $matches[1];
    
}   
?>