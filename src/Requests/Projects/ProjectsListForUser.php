<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-for-user
 *
 * Lists projects for a user.
 */
class ProjectsListForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/projects";
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  null|string  $state Indicates the state of the projects to return.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $username,
        protected ?string $state = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['state' => $this->state, 'page' => $this->page]);
    }
}
