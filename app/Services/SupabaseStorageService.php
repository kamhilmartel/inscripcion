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

        throw new Exception('SUPABASE_URL real en produccion: [' . $baseUrl . ']');

        $extension = $file->getClientOriginalExtension();
        $safeName = Str::uuid() . '.' . $extension;
        $path = $folder . '/' . $safeName;

        $uploadUrl = "{$baseUrl}/storage/v1/object/{$bucket}/{$path}";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $key,
            'apikey' => $key,
            'x-upsert' => 'true',
            'Content-Type' => $file->getMimeType(),
        ])->withBody(
            file_get_contents($file->getRealPath()),
            $file->getMimeType()
        )->post($uploadUrl);

        if (!$response->successful()) {
            throw new Exception('Error al subir archivo a Supabase: ' . $response->body());
        }

        $publicUrl = "{$baseUrl}/storage/v1/object/public/{$bucket}/{$path}";

        return [
            'path' => $path,
            'url' => $publicUrl,
        ];
    }
}