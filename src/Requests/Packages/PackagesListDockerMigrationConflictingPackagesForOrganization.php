<?php

namespace Tonning\Github\Requests\Packages;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/list-docker-migration-conflicting-packages-for-organization
 *
 * Lists all packages that are in a specific organization, are readable by the requesting user, and
 * that encountered a conflict during a Docker migration.
 * To use this endpoint, you must authenticate
 * using an access token with the `read:packages` scope.
 */
class PackagesListDockerMigrationConflictingPackagesForOrganization extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/docker/conflicts";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
