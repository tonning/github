<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/get-workflow-run-usage
 *
 * Gets the number of billable minutes and total run time for a specific workflow run. Billable minutes
 * only apply to workflows in private repositories that use GitHub-hosted runners. Usage is listed for
 * each GitHub-hosted runner operating system in milliseconds. Any job re-runs are also included in the
 * usage. The usage does not include the multiplier for macOS and Windows runners and is not rounded up
 * to the nearest whole minute. For more information, see "[Managing billing for GitHub
 * Actions](https://docs.github.com/github/setting-up-and-managing-billing-and-payments-on-github/managing-billing-for-github-actions)".
 *
 * Anyone
 * with read access to the repository can use this endpoint. If the repository is private you must use
 * an access token with the `repo` scope. GitHub Apps must have the `actions:read` permission to use
 * this endpoint.
 */
class ActionsGetWorkflowRunUsage extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/timing";
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
