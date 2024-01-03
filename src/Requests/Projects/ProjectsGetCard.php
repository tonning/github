<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/get-card
 *
 * Gets information about a project card.
 */
class ProjectsGetCard extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/projects/columns/cards/{$this->cardId}";
    }

    /**
     * @param  int  $cardId The unique identifier of the card.
     */
    public function __construct(
        protected int $cardId,
    ) {
    }
}
