<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * projects/move-card
 */
class ProjectsMoveCard extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/projects/columns/cards/{$this->cardId}/moves";
    }

    /**
     * @param  int  $cardId The unique identifier of the card.
     */
    public function __construct(
        protected int $cardId,
    ) {
    }
}
