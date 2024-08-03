<?php
// APIアクセスURL 英語のjokeをランダムに出すAPI
// $url = 'https://umayadia-apisample.azurewebsites.net/api/persons';
$url = 'https://official-joke-api.appspot.com/jokes/random';

$ch = curl_init(); // はじめ

//オプション
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//URLの情報を取得する
$res =  curl_exec($ch);
curl_close($ch); //終了

var_dump($res);

$joke = json_decode($res);
// echo $joke["setup"];
// echo $joke['punchline'];
?>
<style>
    table, th, td{
        border:1px solid #333;
    }
</style>
<body>
    <table>
        <tr>
            <th>type</th>
            <th>setup</th>
            <th>punchline</th>
            <th>id</th>
        </tr>
        <tr>
        <?php foreach($joke as $key => $value){?>
            <td><?php echo $value; ?></td>
        <?php }?>
        </tr>
    </table>
</body>