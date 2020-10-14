### Задание на проверку понимания принципов MVC, SoC, DRY и SOLID. 
Время выполнения не столь важно, как применение данных принципов.
*** 
### Цель задания
Запуск командой `./vendor/bin/codecept run` 3-х тестов должен завершиться без ошибок.

### Дано
Пользователь посылает запрос поиска доступных типов доставки.

Система должна перебрать варианты доставки для выбранного города, 
установить доступность и предоставить цены.

Доставка считается доступной, если её нет в таблице `deny` в базе.

Цены устанавливаются на типы доставки в отдельной таблице `type` в базе.

Формат запроса: `/delivery/check?search=nur-sultan`

Формат ответа в json:
```
[
  {city: "nur-sultan", type: "pickup", available: false, "price": 0.00},
  {city: "nur-sultan", type: "courier", available: true, "price": 9.99},
  {city: "nur-sultan", type: "post", available: true, "price": 15.99}
]
```
### Установка пакетов
~~~
composer install
~~~

### Создание таблиц
~~~
./yii migrate
~~~

### Запуск тестов
~~~
./vendor/bin/codecept run
~~~
