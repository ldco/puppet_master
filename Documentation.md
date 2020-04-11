![Puppet Master](./logo.png)

#

#

#

# Puppet Master Coding Standard

## File name

### php

ClassName.class.cntrl.php, ClassName.class.model.php, ClassName.class.help.php, functionName.fun.help.php, templateName.tpl.php, settings.ini.php, viewName.view.html.php

### js

ClassName.class.js, functionName.fun.js

### sass

choose @mixin over @extend

## Coding on "sys", "core"

### php/js

someFunction, someVariable, PM_SOME_CONSTANT, someMethod, someProperty

### php

SomeClass > using namespaces

### js

SomeClass > using custom namespaces system

### css/html

SASS as precompiler (SCSS)

### js

framework/libraries allowed:  
lodash  
RE:DOM  
babel as precompiler

## Coding on "usr"

### php/js

APP_SOME_CONSTANT

### css/html

.tagname_someclass . tagname_someclass_item --sometweak

## Coding general

### php/js

"" not ''

### php/js

interpolation over concatenation  
oop over the rest  
constants over variables where possible  
true/false NOT 1/0

### js

trying use the newest features and syntax (babel)  
no "getElement(s)" > only querySelect(All)  
only let, not var  
eslint: jshint esversion: 6  
strict mode:

### php

using latest release - 1,
never only unique to latest release features
strict mode: declare(strict_types=1); (PHP interfaces SHOULD NOT have this declaration)
no templating engines - php IS templating engine
if possible write php in html NOT echoing html in php
if still using html in php - use Html class (helper)

## DB (RU)

По соображениям скорости рекомендуется хранить один экземпляр класса на движок в глобальной переменной.
Иначе будет по соединению на каждый PHP что довольно затратно по времени.

Зависимости:
Для инициализации необходимо вызвать config.ini.php перед созданием экземпляра класса.

Старт:
При создании используются параметры по-умолчанию из config.ini.php
При необходимости можно указать свои в порядке:
host, user,password,database,charset

Использование:

1. Метод query
   Обязательным является только первый параметр - строка запроса.
   Метод поддерживает работу с prepared statements в виде перечисления переменных по порядку квантификаторов или через ассоциативный массив.
   Пример:
   \$DB->query("SELECT ? FROM `table` WHERE `filterfield` = ?", 'field', 1)
   или
   $need_ids = [ 1,2,3,4,5,6,7,8 ];
$DB->query("SELECT `id`,`fieldname` FROM `table` WHERE `id` IN ( ? , ? , ? , ? , ? , ? , ? , ? )", \$need_ids);

2) Метод queryRaw
   Принимает единственный параметр - строку запроса.

3) Метод fetchAll
   После выполнения запроса возвращает результат в виде массива
   [0 => ['field' => 'field_value'].. , 1 => ['field' => 'field_value']]

4) Метод fetchArray
   После выполнения запроса возвращает следующую строку результата запроса в виде массива ['field' => 'field_value']

5) Метод numRows
   После выполнения запроса возвращает количество найденных записей

6) Метод affectedRows
   После выполнения запроса на обновление или добавление записей возвращает количество изменённых записей

7) Метод getConnection
   Возвращает указатель на структуру соединения. Необходимо для самостоятельного экранирования входных данных.
