<?php

namespace Tonning\Github\Requests\Migrations;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/list-repos-for-org
 *
 * List all the repositories for this organization migration.
 */
class MigrationsListReposForOrg extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/migrations/{$this->migrationId}/repositories";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $migrationId The unique identifier of the migration.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected int $migrationId,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
