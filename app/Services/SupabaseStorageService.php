<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Exception;

class SupabaseStorageService
{
    public function upload(UploadedFile $file, string $folder = 'pagos'): array
    {
        $baseUrl = rtrim(env('SUPABASE_URL'), '/');
        $bucket = env('SUPABASE_BUCKET');
        $key = env('SUPABASE_SECRET_KEY');

        if (!$baseUrl || !$bucket || !$key) {
            throw new Exception('Faltan variables de entorno de Supabase.');
        }
    }
}