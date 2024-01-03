<?php

namespace Tonning\Github\Requests\Gists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * gists/update
 *
 * Allows you to update a gist's description and to update, delete, or rename gist files. Files from
 * the previous version of the gist that aren't explicitly changed during an edit are unchanged.
 * At
 * least one of `description` or `files` is required.
 */
class GistsUpdate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

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
