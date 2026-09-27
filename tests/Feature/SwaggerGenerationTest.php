<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SwaggerGenerationTest extends TestCase
{
    public function test_swagger_documentation_generates_with_api_metadata_and_paths(): void
    {
        $this->assertSame(0, Artisan::call('l5-swagger:generate'));

        $documentationPath = storage_path('api-docs/api-docs.json');
        $this->assertFileExists($documentationPath);

        $documentation = json_decode(file_get_contents($documentationPath), true, flags: JSON_THROW_ON_ERROR);

        $this->assertSame('API E-commerce', $documentation['info']['title']);
        $this->assertArrayHasKey('/api/register', $documentation['paths']);
        $this->assertArrayHasKey('/api/login', $documentation['paths']);
        $this->assertArrayHasKey('/api/test', $documentation['paths']);
    }
}
