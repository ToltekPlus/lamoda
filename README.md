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

- 
```
docker-compose exec -it php bash
```

- 
```
cd php
```

- 
```
cd services
```

- 
```
vendor/bin/phinx migrate
```

- Запускаем в браузере
```
http://localhost:8000
``` 