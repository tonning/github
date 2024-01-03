<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-selected-repos-for-org-variable
 *
 * Lists all repositories that can access an organization variable
 * that is available to selected
 * repositories.
 *
 * You must authenticate using an access token with the `admin:org` scope to use this
 * endpoint.
 * If the repository is private, you must use an access token with the `repo` scope.
 * GitHub
 * Apps must have the `organization_actions_variables:read` organization permission to use this
 * endpoint.
 * Authenticated users must have collaborator access to a repository to create, update, or
 * read variables.
 */
class ActionsListSelectedReposForOrgVariable extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/variables/{$this->name}/repositories";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $name The name of the variable.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $org,
        protected string $name,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
