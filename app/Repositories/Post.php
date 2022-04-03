<?php

namespace App\Repositories;

use App\Http\Clients\GoogleSheets;
use Illuminate\Support\Carbon;
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
            'type'    => data_get($record, 2),
            'source'  => data_get($record, 3),
            'number'  => (int)data_get($record, 4)
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
            $$type = (object)[
                'total' => $query->sum('number'),
                'today' => $query->where('date', now()->format('d.m.Y'))->sum('number')
            ];
        }

        return compact($types);
    }
}
