## 目的

LaravelでAPI連携をしていく。

## API連携

- gBiz連携：https://info.gbiz.go.jp/api/index.html

## gBiz連携のやりたいこと

- 法人名で検索できるようにする
- 検索した結果をDBに保存する
- 検索結果の履歴一覧を見れるようにする
- docker環境の構築

## DBの構成

- DB名：laravel
- テーブル名：gbiz_search
- 保存する内容
    - id：自動インクリメント(int)
    - companyname：法人名(nvarchar(100))
    - res：検索が成功したかどうか(boolen)
    - result：検索結果(JSON)
    - datecrt：検索日時(DATETIME)

- SQL
***
CREATE TABLE gbiz_search (
    id INT AUTO_INCREMENT PRIMARY KEY,
    companyname VARCHAR(100) CHARACTER SET utf8mb4,
    res BOOLEAN,
    result JSON,
    datecrt DATETIME
);
***