<?php

namespace Tonning\Github\Requests\Gists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/get
 */
class GistsGet extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/gists/{$this->gistId}";
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function __construct(
        protected string $gistId,
    ) {
    }
}
