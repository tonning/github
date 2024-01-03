<?php

namespace Tonning\Github\Requests\Projects;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/list-for-org
 *
 * Lists the projects in an organization. Returns a `404 Not Found` status if projects are disabled in
 * the organization. If you do not have sufficient privileges to perform this action, a `401
 * Unauthorized` or `410 Gone` status is returned.
 */
class ProjectsListForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/projects";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  null|string  $state Indicates the state of the projects to return.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected ?string $state = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['state' => $this->state, 'page' => $this->page]);
    }
}
