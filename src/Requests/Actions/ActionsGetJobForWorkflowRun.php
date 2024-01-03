<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-job-for-workflow-run
 *
 * Gets a specific job in a workflow run. Anyone with read access to the repository can use this
 * endpoint. If the repository is private you must use an access token with the `repo` scope. GitHub
 * Apps must have the `actions:read` permission to use this endpoint.
 */
class ActionsGetJobForWorkflowRun extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/jobs/{$this->jobId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $jobId The unique identifier of the job.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $jobId,
	) {
	}
}
