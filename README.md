# 💻 Monolith to Microservices

Vue 3 and Laravel: Breaking a Monolith to Microservices: Microservices Architecture, Vue 3, Nuxt.js, Laravel, Docker, RabbitMQ, Event Driven Microservices, Internal APIs, Redis.

## Monolith

Command to run `backend` application

```bash
cd Monolith/backend/

docker-compose up -d

docker exec -it admin_api bash

php artisan migrate --seed
```

- To access API use address `http://127.0.0.1:8000/api`
- Endpoints in a `JSON` file to insomnia inside the backend folder: Insomnia_2020-12-31.json

## Microservice

```bash
foo
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## 🚀 References

-   [PHP](https://www.php.net/)
-   [Laravel](https://laravel.com/)
-   [Mysql](https://mysql.com/)
-   [Docker](https://docker.com/)
-   [Course Udemy](https://www.udemy.com/course/vue-laravel-microservices/)

## License
[MIT](https://choosealicense.com/licenses/mit/)
