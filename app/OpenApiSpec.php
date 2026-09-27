<?php

namespace App;

use OpenApi\Attributes as OA;

#[OA\Info(
	title: 'API E-commerce',
	version: '1.0.0',
	description: 'API REST para gestión de productos, órdenes y pagos'
)]
#[OA\Server(url: 'http://127.0.0.1:8000', description: 'Servidor Local')]
#[OA\Get(
	path: '/api/test',
	summary: 'Comprobar estado de la API',
	tags: ['General'],
	responses: [
		new OA\Response(
			response: 200,
			description: 'API funcionando correctamente',
			content: new OA\JsonContent(
				properties: [
					new OA\Property(
						property: 'message',
						type: 'string',
						example: 'API funcionando correctamente'
					),
				]
			)
		),
	]
)]
class OpenApiSpec
{
}