<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-deployment-status
 *
 * Users with `push` access can create deployment statuses for a given deployment.
 *
 * GitHub Apps require
 * `read & write` access to "Deployments" and `read-only` access to "Repo contents" (for private
 * repos). OAuth apps require the `repo_deployment` scope.
 */
class ReposCreateDeploymentStatus extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/deployments/{$this->deploymentId}/statuses";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $deploymentId deployment_id parameter
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $deploymentId,
	) {
	}
}
