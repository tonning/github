<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/delete-card
 *
 * Deletes a project card
 */
class ProjectsDeleteCard extends Request
{
    protected Method $method = Method::DELETE;

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
