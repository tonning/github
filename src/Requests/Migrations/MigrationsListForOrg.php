<?php

namespace Tonning\Github\Requests\Migrations;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * migrations/list-for-org
 *
 * Lists the most recent migrations, including both exports (which can be started through the REST API)
 * and imports (which cannot be started using the REST API).
 *
 * A list of `repositories` is only returned
 * for export migrations.
 */
class MigrationsListForOrg extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/migrations";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param null|int $page Page number of the results to fetch.
	 * @param null|array $exclude Exclude attributes from the API response to improve performance
	 */
	public function __construct(
		protected string $org,
		protected ?int $page = null,
		protected ?array $exclude = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'exclude' => $this->exclude]);
	}
}
