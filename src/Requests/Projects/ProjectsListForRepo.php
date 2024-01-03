<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-for-repo
 *
 * Lists the projects in a repository. Returns a `404 Not Found` status if projects are disabled in the
 * repository. If you do not have sufficient privileges to perform this action, a `401 Unauthorized` or
 * `410 Gone` status is returned.
 */
class ProjectsListForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/projects";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|string  $state Indicates the state of the projects to return.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $state = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['state' => $this->state, 'page' => $this->page]);
    }
}
