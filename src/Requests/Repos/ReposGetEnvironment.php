<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-environment
 *
 * **Note:** To get information about name patterns that branches must match in order to deploy to this
 * environment, see "[Get a deployment branch
 * policy](/rest/deployments/branch-policies#get-a-deployment-branch-policy)."
 *
 * Anyone with read access
 * to the repository can use this endpoint. If the
 * repository is private, you must use an access token
 * with the `repo` scope. GitHub
 * Apps must have the `actions:read` permission to use this endpoint.
 */
class ReposGetEnvironment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $environmentName,
    ) {
    }
}
