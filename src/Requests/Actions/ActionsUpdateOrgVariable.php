<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/update-org-variable
 *
 * Updates an organization variable that you can reference in a GitHub Actions workflow.
 *
 * You must
 * authenticate using an access token with the `admin:org` scope to use this endpoint.
 * If the
 * repository is private, you must use an access token with the `repo` scope.
 * GitHub Apps must have the
 * `organization_actions_variables:write` organization permission to use this endpoint.
 * Authenticated
 * users must have collaborator access to a repository to create, update, or read variables.
 */
class ActionsUpdateOrgVariable extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/variables/{$this->name}";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $name The name of the variable.
     */
    public function __construct(
        protected string $org,
        protected string $name,
    ) {
    }
}
