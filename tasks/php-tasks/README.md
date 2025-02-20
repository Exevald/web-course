# Домашняя работа "Синтаксис языка PHP"

В данной работе вам предстоит написать несколько программ на языке PHP.

В папке с заданиями также расположены шаблоны для создания программ с комментариями для возможных доработок

## Критерии оценки:

- Уровень **Base:**

  - Для успешной сдачи домашней работы необходимо сделать любое из 3-х базовых заданий (Рекомендую начать с **Задания 1**)

  - Для получения 🔥 нужно сделать ещё одно базовое задание (Любое из оставшихся)

- Уровень **Advanced:**

  - Для успешной сдачи домашней работы необходимо сделать любые два из 3-х базовых заданий

  - Для получения 🔥 нужно сделать дополнительное задание

- Уровень **Pro:**

  - Для успешной сдачи домашней работы необходимо сделать все базовые и дополнительные задания

  - Для получения 🔥 нужно сделать дополнительное задание, используя базу данных как хранилище

## Установка и запуск

**PHP** - это интерпретируемый язык, программы написанные на нем сразу выполняются без компиляции.

**PATH** - переменная в операционной системе, в которой хранятся пути до папок, из которых можно запускать программы из
консоли. Например, вам нужно запустить PHP, но в текущей папке его нет.
Вы добавляете путь до PHP в PATH и можете запускать его из любой папки.

Чтобы установить PHP к себе на компьютер, можно воспользоваться следующими инструкциями:

- **Для Windows:**

  Скачайте интерпретатор PHP на свой компьютер с официального сайта
  [Ссылка](https://windows.php.net/downloads/releases/php-8.4.3-nts-Win32-vs17-x64.zip)

- **Для Linux (Надеюсь, что у вас Ubuntu):**

  Установите нужные пакеты и расширения для PHP
  [Ссылка](https://www.geeksforgeeks.org/how-to-install-php-on-ubuntu/#what-is-php)

- **Для MacOS:**

  Установите пакетный менеджер brew и установите пакеты PHP
  [Ссылка](https://www.php.net/manual/en/install.macosx.packages.php)

Для проверки установки PHP выполните команду, которая выводит в консоль информацию о вашей версии php:
`php -v`

В вашей папке создайте файл `world.php`, запишите в него следующий код:

```php
<?php                   //команда, означающая использование языка php
echo 'Hello World!'; 	//команда вывода строки
```

У PHP реализован веб сервер.
Вы можете запустить его, он будет обрабатывать все запросы через файлы, которые лежат в текущей папке.

Для запуска веб-сервера и указания адреса, по которому будет работать веб сервер, запустите команду:
`php -S localhost:8080`

`8080` - это порт, который будет слушать браузер, чтобы обрабатывать наши запросы.

Для запуска программы `world.php` откройте в браузере:
http://localhost:8080/world.php

При этом сервер перехватит обращение к `localhost:8080`, запустит программу `world.php` и передаст ее вывод в браузер, браузер отобразит его.

## Синтаксис

Базовый синтаксис языка вы можете изучить, используя этот лонгрид:

[Синтаксис языка PHP](https://konstantin.ispring.ru/app/preview/3f7aa5aa-d548-11ef-8569-3665ad4aa8a7)

Также рекомендуется посмотреть пару статей с примерами использования PHP на сайте:

[Руководство по PHP](https://metanit.com/php/tutorial/)

## Задание 1:

Разработайте программу **RemoveExtraSymbols** на языке PHP. В запросе GET передается параметр text.
Программа выводит в браузер этот же текст, оставив только один символ `*` в начале, в конце или между символами. 

**Пример:**

При вводе `text=***aabb***cc*****` вывод должен быть `*aabb*cc*`

## Задание 2:

Разработайте программу для проверки надежности пароля **PasswordStrength.** В GET параметре password передается пароль
для анализа. Пароль может состоять только из английских символов в верхнем и нижнем регистрах, а также из цифр.
Надежность пароля вычисляется по следующему принципу, (len это длинна пароля)
Изначально считаем надежность равной 0.

- К надежности прибавляется (4\*n), где n - количество всех символов пароля
- К надежности прибавляется +(n\*4), где n - количество цифр в пароле
- К надежности прибавляется +((len-n)\*2) в случае, если пароль содержит n символов в верхнем регистре, если символов в
  верхнем регистре нет, то ничего не прибавляется
- К надежности прибавляется +((len-n)\*2) в случае, если пароль содержит n символов в нижнем регистре, если символов в
  нижнем регистре нет, то ничего не прибавляется
- Если пароль состоит только из букв вычитаем число равное количеству символов.
- Если пароль состоит только из цифр вычитаем число равное количеству символов.
- За каждый повторяющийся символ в пароле вычитается количество повторяющихся символов

**Пример:**\
abcd1a, вычитаем -2 по скольку символ a встречается дважды. Программа должна выводить на экран надежность пароля в виде
числа.
В случае, если в каком-то из правил n=0, то расчёт для этого правила не производится.

## Задание 3:

Разработайте PHP приложение **SurveySaver,** которое сохраняет анкеты пользователей в файловой системе. Данные
передаются в строке запроса. Обрабатываемые параметры запроса: **first_name**, **last_name**, **email**, **age**. Другие
параметры не
обрабатываются. Все файлы необходимо сохранять в директорию data. Название файла: **"email".txt** Некоторые параметры
могут
отсутствовать, в этом случае значение параметра будет пустым, например “Last Name: “. **Параметр email обязательный.** В
случае если такой файл <email>.txt уже существует, данные с переданными параметрами в этом файле обновляются, не
переданные не обновляются. Порядок и количество параметров не важно.

**Например:**

**1. Первый запуск программы.**\
`email=ivan.ivanov@gmail.com&first_name=Ivan&last_name=Ivanov&age=20`

В итоге создался файл ivan.ivanov@gmail.com.txt со след содержимым:\
First Name: Ivan\
Last Name: Ivanov\
Email: ivan.ivanov@gmail.com\
Age: 20

**2. Второй запуск программы**\
`email=ivan.ivanov@gmail.com&age=21`

Содержимое файла изменилось на:\
First Name: Ivan\
Last Name: Ivanov\
Email: ivan.ivanov@gmail.com\
Age: 21

## Задание "Отправка данных из формы" (Дополнительное)

Создайте html-страницу с формой, где можно заполнить информацию по однокласснику. Форма должна содержать следующие поля: **имя, фамилия, возраст, почта**.

**Параметр email обязательный.** В случае если такой файл <email>.txt уже существует, данные с переданными параметрами в этом файле обновляются, не
переданные не обновляются. Порядок параметров не важен

Как создать в html форму вы можете посмотреть тут:
[Ссылка с примером кода](https://www.w3schools.com/tags/tryit.asp?filename=tryhtml_button_type)

Чтобы реализовать отправку данных на сервер,
воспользуйтесь атрибутом `submit` у тега `button`

Необходимо создать файл `form.php`, который будет обрабатывать данные формы, полученные через **GET-запрос**.

Данные должны записываться в файл **"email".txt** в папку **data**.

### Использование MySQL вместе с PHP (Продвинутый уровень)

Требуется реализовать этот же функционал, но уже используя базу данных вместо файловой системы.

Для введение в базы данных можете воспользоваться этой статьёй:
[Ссылка](https://konstantin.ispring.ru/app/preview/0037e3c7-d75f-11ef-8388-caba2c25aba1)

Ознакомиться с синтаксисом MySQL можно тут: [Ссылка](https://konstantin.ispring.ru/app/preview/4b638fd2-d75f-11ef-8388-caba2c25aba1)

#### Установка MySQL

Чтобы установить MySQL к себе на компьютер, можно воспользоваться следующими инструкциями:

- **Для Windows:**

  Скачайте к себе на компьютер установщик MySQL и следуйте дальнейшим инструкциям [Ссылка](https://dev.mysql.com/downloads/installer/)

- **Для Linux (Надеюсь, что у вас Ubuntu):**

  Установите нужные пакеты для MySQL [Ссылка](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04)

- **Для MacOS:**

  Установите пакетный менеджер brew и установите пакеты MySQL [Ссылка](https://htmlacademy.ru/blog/php/php-on-macos?amp=1#mysql)

Подключаться к БД и взаимодействовать с нею можно через **MySQL Workbench -** [Ссылка для скачивания](https://www.mysql.com/products/workbench/)

#### Что конкретно требуется сделать:

1. Создать базу данных `classmates`

2. Заведите в базе данных таблицу `person` с полями, указанными выше. Поле **email** всё ещё остаётся обязательным

3. При прохождении пользователем формы записывать данные о человеке в таблицу с помощью запроса **INSERT INTO**

Для взаимодействия PHP и MySQL можно использовать библиотеку **mysqli**. Полный синтаксис библиотеки можете посмотреть тут: [Документация](https://www.php.net/manual/ru/book.mysqli.php)

#### Пример кода взаимодействия PHP и MySQL

```php
const HOST = 'localhost';
const USERNAME = 'classmates_user';
const PASSWORD = '12345Q';
const DATABASE = 'classmates';

// Подключение к базе данных
function createDBConnection(): mysqli {
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  echo "Connected successfully<br>";
  return $conn;
}

// Закрытие подключения к базе данных
function closeDBConnection(mysqli $conn): void {
  $conn->close();
}

// Функция работы с базой данных. У вас название будет другим
function useDBForSomething(mysqli $conn): void {
  // Работа с базой данных
}

$conn = createDBConnection();
useDBForSomething($conn);
closeDBConnection($conn);
```
