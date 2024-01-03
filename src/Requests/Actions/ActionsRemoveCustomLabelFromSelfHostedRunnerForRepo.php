<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/remove-custom-label-from-self-hosted-runner-for-repo
 *
 * Remove a custom label from a self-hosted runner configured
 * in a repository. Returns the remaining
 * labels from the runner.
 *
 * This endpoint returns a `404 Not Found` status if the custom label is
 * not
 * present on the runner.
 *
 * You must authenticate using an access token with the `repo` scope to use
 * this endpoint.
 * GitHub Apps must have the `administration` permission for repositories and the
 * `organization_self_hosted_runners` permission for organizations.
 * Authenticated users must have admin
 * access to repositories or organizations, or the `manage_runners:enterprise` scope for enterprises,
 * to use these endpoints.
 */
class ActionsRemoveCustomLabelFromSelfHostedRunnerForRepo extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/runners/{$this->runnerId}/labels/{$this->name}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 * @param string $name The name of a self-hosted runner's custom label.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $runnerId,
		protected string $name,
	) {
	}
}
