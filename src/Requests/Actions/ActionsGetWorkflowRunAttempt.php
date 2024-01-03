<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-workflow-run-attempt
 *
 * Gets a specific workflow run attempt. Anyone with read access to the repository
 * can use this
 * endpoint. If the repository is private you must use an access token
 * with the `repo` scope. GitHub
 * Apps must have the `actions:read` permission to
 * use this endpoint.
 */
class ActionsGetWorkflowRunAttempt extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/attempts/{$this->attemptNumber}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param int $attemptNumber The attempt number of the workflow run.
	 * @param null|bool $excludePullRequests If `true` pull requests are omitted from the response (empty array).
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $runId,
		protected int $attemptNumber,
		protected ?bool $excludePullRequests = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['exclude_pull_requests' => $this->excludePullRequests]);
	}
}
