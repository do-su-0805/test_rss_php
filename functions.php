<?php
function getRssFeedArray($url, $nKiji){
    $xml = simplexml_load_file($url);
    if($xml){
        $i = 0; 
        foreach($xml->channel->item as $item){
            $a[$i]['title'] = htmlspecialchars((string)$item->title, ENT_QUOTES, "UTF-8");
            $a[$i]['link']  = htmlspecialchars((string)$item->link, ENT_QUOTES, "UTF-8");
            $time = strtotime($item->pubDate);
            $a[$i]['time'] = $time;
            $a[$i]['description'] = htmlspecialchars((string)$item->description, ENT_QUOTES, "UTF-8");
            if( preg_match_all('/<img([\s\S]+?)>/is', $item->description, $matches) ){
                foreach( $matches[0] as $img ){
                    if( preg_match('/src=[\'"](.+?jpe?g)[\'"]/', $img, $m) ){
                        $item->thumbnail = $m[1];
                        $a[$i]['image'] = htmlspecialchars((string)$item->thumbnail, ENT_QUOTES, "UTF-8");
                    }
                }
            }
            $i++;
            if($i == $nKiji){
                break;
            }
        }
    }else{
    }
    return $a;
}
?>
