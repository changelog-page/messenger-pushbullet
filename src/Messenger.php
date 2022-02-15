<?php

declare(strict_types=1);

namespace Changelog\Messenger\Pushbullet;

use Changelog\Messenger\Messenger as Contract;
use Illuminate\Support\Facades\Http;

final class Messenger implements Contract
{
    public function message(string $from, string $to, string $text, ?array $options = []): void
    {
        Http::withHeaders([
            'Access-Token' => $from,
        ])->post('https://api.pushbullet.com/v2/pushes', [
            'type'  => 'note',
            'title' => $to,
            'body'  => $text,
            ...$options,
        ]);
    }
}
