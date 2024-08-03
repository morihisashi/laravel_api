<?php
// APIアクセスURL 英語のjokeをランダムに出すAPI
// $url = 'https://umayadia-apisample.azurewebsites.net/api/persons';
$url = 'https://official-joke-api.appspot.com/jokes/random';

// ストリームコンテキストのオプションを作成
$options = array(
    // HTTPコンテキストオプションをセット
    'http' => array(
        'method'=> 'GET',
        'header'=> 'Content-type: application/json; charset=UTF-8' //JSON形式で表示
    )
);

// ストリームコンテキストの作成
// $context = stream_context_create($options);

$raw_data = file_get_contents($url, false, NULL);
echo $raw_data;
// debug
//var_dump($raw_data);

// json の内容を連想配列として $data に格納する
$data = json_decode($raw_data,true);
var_dump($data);
?>
<table>
    <tr>
        <th>name</th>
        <th>note</th>
    </tr>
        <tr>
            <td><?php echo $data['setup']; ?></td>
            <td><?php echo $data['punchline']; ?></td>
        </tr>
</table>
?>