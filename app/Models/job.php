<?php

namespace App\Models;

use Illuminate\Support\Arr;

class job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Senior Laravel Developer',
                'salary' => '$100,000 - $120,000',
            ],
            [
                'id' => 2,
                'title' => 'Junior Laravel Developer',
                'salary' => '$60,000 - $80,000',
            ],
            [
                'id' => 3,
                'title' => 'Full Stack Developer',
                'salary' => '$90,000 - $110,000',
            ],
        ];
    }
    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (! $job) {
            abort(404);
        }
        return $job;
    }
}
