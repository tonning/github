<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/delete-workflow-run
 *
 * Delete a specific workflow run. Anyone with write access to the repository can use this endpoint. If
 * the repository is
 * private you must use an access token with the `repo` scope. GitHub Apps must have
 * the `actions:write` permission to use
 * this endpoint.
 */
class ActionsDeleteWorkflowRun extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $runId,
	) {
	}
}
