<?php

namespace App\Http\Clients;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class GoogleSheets
{
    public $client, $service, $documentId, $range;

    public function __construct()
    {
        $this->client = $this->getClient();
        $this->service = new Sheets($this->client);
        $this->documentId = '1UBFT8tyj-_K9IEMYBaqdL_Min8EuEjXE5PHd_m382pA';
        $this->range = 'Data!A2:E';
    }

    public function getClient(): Client
    {
        $client = new Client();
        $client->setApplicationName('War Costs');
        $client->setRedirectUri(route('home'));
        $client->setScopes(Sheets::SPREADSHEETS_READONLY);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');

        return $client;
    }

    public function readSheet(): ValueRange
    {
        return $this->service->spreadsheets_values->get($this->documentId, $this->range);
    }
}
