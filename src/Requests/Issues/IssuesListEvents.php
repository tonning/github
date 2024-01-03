<?php

namespace Tonning\Github\Requests\Issues;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/list-events
 *
 * Lists all events for an issue.
 */
class IssuesListEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/issues/{$this->issueNumber}/events";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $issueNumber The number that identifies the issue.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $issueNumber,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
