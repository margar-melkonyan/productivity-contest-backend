<?php

declare(strict_types=1);

namespace App\DTO\Quotes;

use App\Models\Quotes\Quote;
use Spatie\LaravelData\Data;

class QuoteDTO extends Data
{
    /**
     * @param string|null $author
     * @param string|null $text
     */
    public function __construct(
        public readonly ?string $author,
        public readonly ?string $text,
    ) {
    }

    public function fromModel(Quote $quote): QuoteDTO
    {
        return new self(
            $quote->author,
            $quote->text,
        );
    }
}
