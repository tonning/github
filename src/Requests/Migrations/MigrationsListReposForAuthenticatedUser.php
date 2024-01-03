<?php

namespace Tonning\Github\Requests\Migrations;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/list-repos-for-authenticated-user
 *
 * Lists all the repositories for this user migration.
 */
class MigrationsListReposForAuthenticatedUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user/migrations/{$this->migrationId}/repositories";
	}


	/**
	 * @param int $migrationId The unique identifier of the migration.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected int $migrationId,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
