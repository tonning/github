<?php

namespace Tonning\Github\Requests\Gists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * gists/create-comment
 */
class GistsCreateComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/gists/{$this->gistId}/comments";
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     */
    public function __construct(
        protected string $gistId,
    ) {
    }
}
