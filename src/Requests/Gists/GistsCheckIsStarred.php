<?php

namespace Tonning\Github\Requests\Gists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/check-is-starred
 */
class GistsCheckIsStarred extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/gists/{$this->gistId}/star";
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function __construct(
        protected string $gistId,
    ) {
    }
}
