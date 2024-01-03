<?php

namespace Tonning\Github\Requests\Dependabot;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/list-alerts-for-repo
 *
 * You must use an access token with the `security_events` scope to use this endpoint with private
 * repositories.
 * You can also use tokens with the `public_repo` scope for public repositories
 * only.
 * GitHub Apps must have **Dependabot alerts** read permission to use this endpoint.
 */
class DependabotListAlertsForRepo extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/dependabot/alerts";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param null|string $state A comma-separated list of states. If specified, only alerts with these states will be returned.
	 *
	 * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
	 * @param null|string $severity A comma-separated list of severities. If specified, only alerts with these severities will be returned.
	 *
	 * Can be: `low`, `medium`, `high`, `critical`
	 * @param null|string $ecosystem A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
	 *
	 * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
	 * @param null|string $package A comma-separated list of package names. If specified, only alerts for these packages will be returned.
	 * @param null|string $manifest A comma-separated list of full manifest paths. If specified, only alerts for these manifests will be returned.
	 * @param null|string $scope The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
	 * @param null|string $sort The property by which to sort the results.
	 * `created` means when the alert was created.
	 * `updated` means when the alert's state last changed.
	 * @param null|string $direction The direction to sort the results by.
	 * @param null|int $page **Deprecated**. Page number of the results to fetch. Use cursor-based pagination with `before` or `after` instead.
	 * @param null|string $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
	 * @param null|int $first **Deprecated**. The number of results per page (max 100), starting from the first matching result.
	 * This parameter must not be used in combination with `last`.
	 * Instead, use `per_page` in combination with `after` to fetch the first page of results.
	 * @param null|int $last **Deprecated**. The number of results per page (max 100), starting from the last matching result.
	 * This parameter must not be used in combination with `first`.
	 * Instead, use `per_page` in combination with `before` to fetch the last page of results.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected ?string $state = null,
		protected ?string $severity = null,
		protected ?string $ecosystem = null,
		protected ?string $package = null,
		protected ?string $manifest = null,
		protected ?string $scope = null,
		protected ?string $sort = null,
		protected ?string $direction = null,
		protected ?int $page = null,
		protected ?string $before = null,
		protected ?int $first = null,
		protected ?int $last = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'state' => $this->state,
			'severity' => $this->severity,
			'ecosystem' => $this->ecosystem,
			'package' => $this->package,
			'manifest' => $this->manifest,
			'scope' => $this->scope,
			'sort' => $this->sort,
			'direction' => $this->direction,
			'page' => $this->page,
			'before' => $this->before,
			'first' => $this->first,
			'last' => $this->last,
		]);
	}
}
