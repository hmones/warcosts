<?php

namespace App\Repositories;

use App\Http\Clients\GoogleSheets;
use Illuminate\Support\Collection;

class Post
{
    protected $data;

    function __construct()
    {
        if(!cache()->has('data')) {
            $data = resolve(GoogleSheets::class)->readSheet()->getValues();
            cache()->add('data', $data, now()->addHours(1));
        }

        if (empty(cache('data'))) {
            abort(404);
        }

        $this->data = $this->format(cache('data'));
    }

    protected function format(array $data): Collection
    {
        return collect($data ?? [])->map(fn($record) => [
            'date'    => data_get($record, 0),
            'country' => data_get($record, 1),
            'type'    => data_get($record, 4),
            'source'  => data_get($record, 5),
            'number'  => data_get($record, 6)
        ]);
    }

    public function getPosts(): Collection
    {
        return $this->data;
    }

    public function sortByType(Collection $posts): array
    {
        $types = ['migrated', 'injured', 'killed'];

        foreach ($types as $type) {
            $query = $posts->where('type', $type);
            $ukraine = $query->where('country', 'ua')->first();
            $russia = $query->where('country', 'ru')->first();

            $$type = (object)[
                'ukraine' => (object) [
                    'total' => data_get($ukraine, 'number', 0),
                    'date'  => data_get($ukraine, 'date', now()->format('d.m.Y'))
                ],
                'russia'  => (object) [
                    'total' => data_get($russia, 'number', 0),
                    'date'  => data_get($russia, 'date', now()->format('d.m.Y'))
                ]
            ];
        }

        return compact($types);
    }
}
