<?php

declare(strict_types=1);

namespace App\Http\Controllers\Quotes;

use App\DTO\Quotes\QuoteDTO;
use App\Http\Controllers\Controller;
use App\Models\Quotes\Quote;
use App\Services\Quotes\QuoteService;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Header;

class QuoteController extends Controller
{
    public function __construct(
        private readonly QuoteService $quoteService
    ) {
    }

    #[Header('Accept', 'application/json')]
    #[Authenticated]
    #[Group('Quotes')]
    /**
     * @return QuoteDTO
     */
    public function random(): QuoteDTO
    {
        return $this->quoteService->random();
    }

    #[Header('Accept', 'application/json')]
    #[Authenticated]
    #[Group('Quotes')]
    public function parse(): void
    {
        $this->quoteService->parse();
    }
}
