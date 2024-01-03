<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/update-deployment-branch-policy
 *
 * Updates a deployment branch or tag policy for an environment.
 *
 * You must authenticate using an access
 * token with the `repo` scope to use this endpoint. GitHub Apps must have the `administration:write`
 * permission for the repository to use this endpoint.
 */
class ReposUpdateDeploymentBranchPolicy extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment-branch-policies/{$this->branchPolicyId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 * @param int $branchPolicyId The unique identifier of the branch policy.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $environmentName,
		protected int $branchPolicyId,
	) {
	}
}
