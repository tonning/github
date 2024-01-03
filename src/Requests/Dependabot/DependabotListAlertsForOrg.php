<?php

namespace Tonning\Github\Requests\Dependabot;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * dependabot/list-alerts-for-org
 *
 * Lists Dependabot alerts for an organization.
 *
 * To use this endpoint, you must be an owner or security
 * manager for the organization, and you must use an access token with the `repo` scope or
 * `security_events` scope.
 *
 * For public repositories, you may instead use the `public_repo`
 * scope.
 *
 * GitHub Apps must have **Dependabot alerts** read permission to use this endpoint.
 */
class DependabotListAlertsForOrg extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/dependabot/alerts";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
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
	 * @param null|string $scope The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
	 * @param null|string $sort The property by which to sort the results.
	 * `created` means when the alert was created.
	 * `updated` means when the alert's state last changed.
	 * @param null|string $direction The direction to sort the results by.
	 * @param null|string $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
	 * @param null|int $first **Deprecated**. The number of results per page (max 100), starting from the first matching result.
	 * This parameter must not be used in combination with `last`.
	 * Instead, use `per_page` in combination with `after` to fetch the first page of results.
	 * @param null|int $last **Deprecated**. The number of results per page (max 100), starting from the last matching result.
	 * This parameter must not be used in combination with `first`.
	 * Instead, use `per_page` in combination with `before` to fetch the last page of results.
	 */
	public function __construct(
		protected string $org,
		protected ?string $state = null,
		protected ?string $severity = null,
		protected ?string $ecosystem = null,
		protected ?string $package = null,
		protected ?string $scope = null,
		protected ?string $sort = null,
		protected ?string $direction = null,
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
			'scope' => $this->scope,
			'sort' => $this->sort,
			'direction' => $this->direction,
			'before' => $this->before,
			'first' => $this->first,
			'last' => $this->last,
		]);
	}
}
