<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/create-or-update-environment
 *
 * Create or update an environment with protection rules, such as required reviewers. For more
 * information about environment protection rules, see
 * "[Environments](/actions/reference/environments#environment-protection-rules)."
 *
 * **Note:** To create
 * or update name patterns that branches must match in order to deploy to this environment, see
 * "[Deployment branch policies](/rest/deployments/branch-policies)."
 *
 * **Note:** To create or update
 * secrets for an environment, see "[GitHub Actions secrets](/rest/actions/secrets)."
 *
 * You must
 * authenticate using an access token with the `repo` scope to use this endpoint. GitHub Apps must have
 * the `administration:write` permission for the repository to use this endpoint.
 */
class ReposCreateOrUpdateEnvironment extends Request
{
    protected Method $method = Method::PUT;

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
