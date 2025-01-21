# Соглашение по коду на MySQL

Стандартные операторы SQL (INSERT INTO, SELECT, UPDATE, DELETE) - пишутся в UPPERCASE
Пользовательские именования таблиц и колонок в **lower_camel_case**

Так же SQL везде (что в отдельных SQL файлах, что в PHP файлах) должен быть отформатирован в несколько строк

**Пример:**

```mysql
# Чтение данных из базы
SELECT title,
       subtitle,
       publish_date
FROM post
WHERE title = 'My favourite title';

# Вставка данных в базу
INSERT INTO post (title,
                  subtitle,
                  publish_date)
VALUES ('Post about traveling',
        'My best post',
        '9/25/2015');

# Удаление данных из базы 
DELETE
FROM post
WHERE title = 'Angry article about PHP';

```