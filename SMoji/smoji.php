<?php

function replaceEmojisWithImages($text, $emojiSize)
{
    $emojiPattern = '/:(\w+):/'; // 絵文字名の正規表現パターン
    $emojiPath = "assets/"; // 絵文字ファイルのパス

    // 絵文字名を正規表現で検索し、対応するpngファイル名に置き換える
    $text = preg_replace_callback($emojiPattern, function($matches) use ($emojiPath, $emojiSize) {
        $emojiName = $matches[1]; // 絵文字名を取得
        $emojiFile = $emojiPath . $emojiName . ".png"; // 絵文字ファイルのパスを生成
        if (file_exists($emojiFile)) { // 絵文字ファイルが存在する場合
            return '<img src="' . $emojiFile . '" alt=":' . $emojiName . ':" style="height:' . $emojiSize . ';width:auto;display:inline-block;vertical-align:middle;">';
            // 絵文字画像のHTMLコードに置き換え（高さを指定し、幅は自動調整）
        } else {
            return ':' . $emojiName . ':'; // 絵文字ファイルが存在しない場合は変更しない
        }
    }, $text);

    return $text;
}

function emoji($text,$mojisize){
    return "<div style='height: " . $mojisize . "px; font-size: " . $mojisize . "px;'>" . replaceEmojisWithImages($text,'100%') . "</div>";
}
function emoji_ps($text,$mojisize,$ps){
    return "<div style='height: " . $mojisize . "px; font-size: " . $mojisize . "px;'>" . replaceEmojisWithImages($text,$ps) . "</div>";
}
?>