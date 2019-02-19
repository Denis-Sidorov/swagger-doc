# Документация PROJECT API

Спецификация (Open Api) генерируется с помощью swagger-php на базе аннотаций.

Для публикации используется swagger ui.

## Обновление документации

1. Генерация спецификации
1. Сборка UI-образа
1. Запуск UI-образа

## Генерация спецификации

    docker-compose build php
    docker-compose up generator
    
Результат записывается в `generator/openapi.json`

Аннотации берутся из:
 
    /var/www/app/vendor/project
    /var/www/app/base-spec

Запускается скрипт `generator/entrypoint.sh`

## Подготовка UI-образа

Сборку UI-образа необходимо выполнять после генерации спецификации

    docker-compose build swagger
    
    docker login registry.docker.company.org:5001
    docker push registry.docker.company.org:5001/project/repo/api-doc-ui
    
## Запуск UI-контейнера

    git clone git@git.company.org:project/repo/api-doc-ui
    cd doc-api-ui
    
    docker login registry.docker.company.org:5001
    docker-compose pull
    
    docker-compose up -d swagger
    