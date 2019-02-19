<?php

use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(security={{"project_token": {}}})
 * @OA\Info(title = "PROJECT API", description = "Сервисы для PROJECT", version = "3.0.0")
 * @OA\Server(url = "https://api.project.company.ru", description = "Сервер PROJECT API")
 *
 * @OA\Parameter(
 *     parameter="server_version",
 *     name="X-Server-Version",
 *     description="Версия сервера",
 *     @OA\Schema(
 *         type="string"
 *     ),
 *     in="header",
 *     required=true,
 *     example="3.0.0"
 * )
 * @OA\Parameter(
 *     parameter="project_version",
 *     name="X-Project-Version",
 *     description="Версия конфигурации проекта",
 *     @OA\Schema(
 *         type="string"
 *     ),
 *     in="header",
 *     required=true,
 *     example="v1d1"
 * )
 *
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     securityScheme="project_token",
 *     name="X-Project-Token",
 *     description="Токен состоит из 3 частей: токен проекта, токен клиента, токен пользователя"
 * )
 *
 * @OA\Response(
 *     description="Ошибка авторизации",
 *     response="UnauthorizedError",
 *     @OA\JsonContent(
 *         ref="#/components/schemas/ProjectResponse",
 *         example={"code": 401, "message": "Ошибка авторизации", "data": {}}
 *     )
 * )
 *
 * @OA\Response(
 *     description="Некорректный запрос",
 *     response="InvalidError",
 *     @OA\JsonContent(
 *         ref="#/components/schemas/ProjectResponse",
 *         example={"code": 400, "message": "Некорректный запрос", "data": {}}
 *     )
 * )
 *
 * @OA\Response(
 *     description="Внутренняя ошибка",
 *     response="InternalError",
 *     @OA\JsonContent(
 *         ref="#/components/schemas/ProjectResponse",
 *         example={"code": 500, "message": "Ошибка при выполнении запроса", "data": {}}
 *     )
 * )
 *
 * @OA\Schema(
 *     description="Стандартная структура json-ответа",
 *     schema="ProjectResponse",
 *     type="object",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         description="Данные ответа",
 *         @OA\Items(type="object"),
 *         example={{"id": 1, "name": "Vacya"}}
 *     ),
 *     @OA\Property(
 *         property="code",
 *         type="integer",
 *         description="Код ответа",
 *         example=200
 *     ),
 *     @OA\Property(
 *         property="message",
 *         type="string",
 *         description="Сообщение",
 *         example=""
 *     )
 * )
 */
