-- SQLでデータの更新を行う
UPDATE gs_an_table SET name='やまざき',email='test',age=30,naiyou='ああああ' WHERE id=10

-- 変更するデータを変数で指定
UPDATE gs_an_table SET name=:name,email=:email,age=:age,naiyou=:naiyou WHERE id=:id

SELECT * FROM gs_an_table WHERE lid=:lid  
