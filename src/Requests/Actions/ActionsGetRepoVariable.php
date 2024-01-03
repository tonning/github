<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-repo-variable
 *
 * Gets a specific variable in a repository.
 *
 * You must authenticate using an access token with the
 * `repo` scope to use this endpoint.
 * GitHub Apps must have the `actions_variables:read` repository
 * permission to use this endpoint.
 * Authenticated users must have collaborator access to a repository
 * to create, update, or read variables.
 */
class ActionsGetRepoVariable extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/variables/{$this->name}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $name The name of the variable.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $name,
    ) {
    }
}
