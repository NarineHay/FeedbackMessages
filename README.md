созданы таблицы users и messges
заранее сделано связь (Relationship)
создано seeder для рандомный создания пользователей

Метод создания письма ---> http://localhost:8000/api/message/create

Метод создания письма ---> и верстка сделано na http://localhost:8000


Опциональные поля (можно запросить, передав параметр fields): имя, e-mail.
(в этом случае может быть несколько писем)
Метод получения конкретного письма ---> http://localhost:8000/api/message/show_message

(a с id только одно письмо)
Метод получения конкретного письма с id ---> http://localhost:8000/api/message/2


Метод получения списка писем
Cортировки: по дате создания (нужно отправлять fild order asc или desc 
    {
        "order": "asc"
    }
)

Метод получения списка писем ---> http://localhost:8000/api/message/list?page=2



Метод выгрузки из бд в формате Excel 
из фронта ---> http://localhost:8000/users/exportexcel
из api    ---> http://localhost:8000/api/users/exportexcel  (возвращает путь файла)


подкрепляю faile json из постмана (Postman)
Feedback.postman_collection.json

