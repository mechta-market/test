### Задание на проверку понимания принципов MVC, SoC, DRY и SOLID. 
Время выполнения не столь важно, как применение данных принципов.

***

## 1. Задние backend-разработчика

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

## 2. Задние frontend-разработчика

### Цель задания 
Сделать фронтенд на Vue.js для бекенд части задания.

### Дано

API endpoint: `https://qvjgl.mocklab.io/delivery/check`, 
который принимает GET параметр `search` содержащий наименование города (nur-sultan, almaty, aktau).

В результате возвращается ответ в JSON с данными
о доступных типах доставки и их стоимости.

Пример ответа:
```
[
  {city: "nur-sultan", type: "pickup", available: false, "price": 0.00},
  {city: "nur-sultan", type: "courier", available: true, "price": 9.99},
  {city: "nur-sultan", type: "post", available: true, "price": 15.99}
]
```

Верстку сделать по данному макету https://www.figma.com/file/XELsh1cS4fMPDqbPM49GUH/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%BE%D0%B5-%D0%B7%D0%B0%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5?node-id=0%3A1

