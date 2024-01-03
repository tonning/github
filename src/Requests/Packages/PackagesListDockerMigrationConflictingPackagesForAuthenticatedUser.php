<?php

namespace Tonning\Github\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/list-docker-migration-conflicting-packages-for-authenticated-user
 *
 * Lists all packages that are owned by the authenticated user within the user's namespace, and that
 * encountered a conflict during a Docker migration.
 * To use this endpoint, you must authenticate using
 * an access token with the `read:packages` scope.
 */
class PackagesListDockerMigrationConflictingPackagesForAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/user/docker/conflicts';
    }

    public function __construct()
    {
    }
}
