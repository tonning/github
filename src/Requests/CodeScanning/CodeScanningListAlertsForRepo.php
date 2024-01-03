<?php

namespace Tonning\Github\Requests\CodeScanning;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * code-scanning/list-alerts-for-repo
 *
 * Lists code scanning alerts.
 *
 * To use this endpoint, you must use an access token with the
 * `security_events` scope or, for alerts from public repositories only, an access token with the
 * `public_repo` scope.
 *
 * The response includes a `most_recent_instance` object.
 * This provides details
 * of the most recent instance of this alert
 * for the default branch (or for the specified Git reference
 * if you used `ref` in the request).
 */
class CodeScanningListAlertsForRepo extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/code-scanning/alerts";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param null|string $toolName The name of a code scanning tool. Only results by this tool will be listed. You can specify the tool by using either `tool_name` or `tool_guid`, but not both.
	 * @param null|string $toolGuid The GUID of a code scanning tool. Only results by this tool will be listed. Note that some code scanning tools may not include a GUID in their analysis data. You can specify the tool by using either `tool_guid` or `tool_name`, but not both.
	 * @param null|int $page Page number of the results to fetch.
	 * @param null|string $ref The Git reference for the results you want to list. The `ref` for a branch can be formatted either as `refs/heads/<branch name>` or simply `<branch name>`. To reference a pull request use `refs/pull/<number>/merge`.
	 * @param null|string $direction The direction to sort the results by.
	 * @param null|string $sort The property by which to sort the results.
	 * @param null|string $state If specified, only code scanning alerts with this state will be returned.
	 * @param null|string $severity If specified, only code scanning alerts with this severity will be returned.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected ?string $toolName = null,
		protected ?string $toolGuid = null,
		protected ?int $page = null,
		protected ?string $ref = null,
		protected ?string $direction = null,
		protected ?string $sort = null,
		protected ?string $state = null,
		protected ?string $severity = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'tool_name' => $this->toolName,
			'tool_guid' => $this->toolGuid,
			'page' => $this->page,
			'ref' => $this->ref,
			'direction' => $this->direction,
			'sort' => $this->sort,
			'state' => $this->state,
			'severity' => $this->severity,
		]);
	}
}
