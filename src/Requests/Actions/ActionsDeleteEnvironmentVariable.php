<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-environment-variable
 *
 * Deletes an environment variable using the variable name.
 *
 * You must authenticate using an access
 * token with the `repo` scope to use this endpoint.
 * GitHub Apps must have the `environment:write`
 * repository permission to use this endpoint.
 * Authenticated users must have collaborator access to a
 * repository to create, update, or read variables.
 */
class ActionsDeleteEnvironmentVariable extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/repositories/{$this->repositoryId}/environments/{$this->environmentName}/variables/{$this->name}";
    }

    /**
     * @param  int  $repositoryId The unique identifier of the repository.
     * @param  string  $name The name of the variable.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function __construct(
        protected int $repositoryId,
        protected string $name,
        protected string $environmentName,
    ) {
    }
}
