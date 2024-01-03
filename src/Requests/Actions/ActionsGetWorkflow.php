<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-workflow
 *
 * Gets a specific workflow. You can replace `workflow_id` with the workflow file name. For example,
 * you could use `main.yaml`. Anyone with read access to the repository can use this endpoint. If the
 * repository is private you must use an access token with the `repo` scope. GitHub Apps must have the
 * `actions:read` permission to use this endpoint.
 */
class ActionsGetWorkflow extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/workflows/{$this->workflowId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param mixed $workflowId The ID of the workflow. You can also pass the workflow file name as a string.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected mixed $workflowId,
	) {
	}
}
