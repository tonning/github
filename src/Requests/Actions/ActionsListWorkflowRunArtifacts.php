<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-workflow-run-artifacts
 *
 * Lists artifacts for a workflow run. Anyone with read access to the repository can use this endpoint.
 * If the repository is private you must use an access token with the `repo` scope. GitHub Apps must
 * have the `actions:read` permission to use this endpoint.
 */
class ActionsListWorkflowRunArtifacts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/actions/runs/{$this->runId}/artifacts";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $runId The unique identifier of the workflow run.
	 * @param null|int $page Page number of the results to fetch.
	 * @param null|string $name The name field of an artifact. When specified, only artifacts with this name will be returned.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $runId,
		protected ?int $page = null,
		protected ?string $name = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'name' => $this->name]);
	}
}
