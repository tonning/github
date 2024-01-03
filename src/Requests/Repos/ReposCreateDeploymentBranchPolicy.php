<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-deployment-branch-policy
 *
 * Creates a deployment branch or tag policy for an environment.
 *
 * You must authenticate using an access
 * token with the `repo` scope to use this endpoint. GitHub Apps must have the `administration:write`
 * permission for the repository to use this endpoint.
 */
class ReposCreateDeploymentBranchPolicy extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/environments/{$this->environmentName}/deployment-branch-policies";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $environmentName The name of the environment. The name must be URL encoded. For example, any slashes in the name must be replaced with `%2F`.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $environmentName,
	) {
	}
}
