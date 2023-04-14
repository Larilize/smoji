<?php

function replaceEmojisWithImages($text, $emojiSize)
{
    $emojiPattern = '/:(\w+):/'; 
    $emojiPath = "assets/"; 
    $text = preg_replace_callback($emojiPattern, function($matches) use ($emojiPath, $emojiSize) {
        $emojiName = $matches[1]; 
        $emojiFile = $emojiPath . $emojiName . ".png"; 
        if (file_exists($emojiFile)) { 
            return '<img src="' . $emojiFile . '" alt=":' . $emojiName . ':" style="height:' . $emojiSize . ';width:auto;display:inline-block;vertical-align:middle;">';
        } else {
            return ':' . $emojiName . ':'; 
        }
    }, $text);
    return $text;
}

function emoji($text,$mojisize){
    return "<div style='height: " . $mojisize . "px; font-size: " . $mojisize . "px;'>" .replaceEmojisWithImages($text,'100%') . "</div>";
}
?>
