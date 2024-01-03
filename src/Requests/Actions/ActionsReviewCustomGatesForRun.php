<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * actions/review-custom-gates-for-run
 *
 * Approve or reject custom deployment protection rules provided by a GitHub App for a workflow run.
 * For more information, see "[Using environments for
 * deployment](https://docs.github.com/actions/deployment/targeting-different-environments/using-environments-for-deployment)."
 *
 * **Note:**
 * GitHub Apps can only review their own custom deployment protection rules.
 * To approve or reject
 * pending deployments that are waiting for review from a specific person or team, see [`POST
 * /repos/{owner}/{repo}/actions/runs/{run_id}/pending_deployments`](/rest/actions/workflow-runs#review-pending-deployments-for-a-workflow-run).
 *
 * If
 * the repository is private, you must use an access token with the `repo` scope.
 * GitHub Apps must have
 * read and write permission for **Deployments** to use this endpoint.
 */
class ActionsReviewCustomGatesForRun extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/deployment_protection_rule";
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
