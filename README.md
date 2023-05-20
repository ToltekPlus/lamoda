# Редизайн Lamoda для групп web-разработки :rocket:

## Требования

> PHP 7.4+
>
> node 16+
>
> MySQL 8.0+

## Установка

- Клонируем проект

```
git clone https://github.com/ToltekPlus/lamoda.git .
```

- Разворачиваем Docker
```
docker-compose up -d
```

- Зайти внутрь контейнера
```
docker-compose exec -it php bash
```

- Войти в папку services
```
cd services
```

- Запустить все миграции (ваша база данных должна быть пустая)
```
vendor/bin/phinx migrate
```

- Запускаем в браузере
```
http://localhost:8000
``` 
