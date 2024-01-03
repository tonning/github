<?php

namespace Tonning\Github\Requests\Gists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * gists/list-comments
 */
class GistsListComments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/gists/{$this->gistId}/comments";
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $gistId,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
