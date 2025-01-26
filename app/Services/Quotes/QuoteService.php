<?php

declare(strict_types=1);

namespace App\Services\Quotes;

use App\DTO\Quotes\QuoteDTO;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Quotes\Quote;

class QuoteService
{
    /**
     * Выбирает случайную цитату
     * @return QuoteDTO
     */
    public function random(): QuoteDTO
    {
        return QuoteDTO::from(Quote::inRandomOrder('id')->first());
    }

    /**
     * Парсинг цитат из JSON файла с удаленного сервера
     * @throws \Exception
     * @return void
     */
    public function parse(): void
    {
        $res = (new Client())->get(config('parse-url.motivational_quotes'));
        $responseBody = $res->getBody()->getContents();
        $encoding = mb_detect_encoding($responseBody, 'UTF-8, ISO-8859-1', true);
        if ($encoding !== 'UTF-8') {
            $responseBody = mb_convert_encoding($responseBody, 'UTF-8', $encoding);
        }
        $responseBody = preg_replace('/\xEF\xBB\xBF/', '', $responseBody);
        $quotes = json_decode($responseBody, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(__('message.quote_error_parse'));
        } else {
            $quotes = array_map(function ($quote) {
                return [
                    'author' => $quote['quoteAuthor'] === ''
                        ? 'Unkown'
                        : $quote['quoteAuthor'],
                    'text' => $quote['quoteText'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }, $quotes);

            Quote::upsert($quotes, ['text']);
        }
    }
}
