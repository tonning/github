<?php

namespace Tonning\Github\Requests\Packages;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/delete-package-version-for-authenticated-user
 *
 * Deletes a specific package version for a package owned by the authenticated user.  If the package is
 * public and the package version has more than 5,000 downloads, you cannot delete the package version.
 * In this scenario, contact GitHub support for further assistance.
 *
 * To use this endpoint, you must
 * have admin permissions in the organization and authenticate using an access token with the
 * `read:packages` and `delete:packages` scopes.
 * If the `package_type` belongs to a GitHub Packages
 * registry that only supports repository-scoped permissions, your token must also include the `repo`
 * scope. For the list of GitHub Packages registries that only support repository-scoped permissions,
 * see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesDeletePackageVersionForAuthenticatedUser extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/user/packages/{$this->packageType}/{$this->packageName}/versions/{$this->packageVersionId}";
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function __construct(
		protected string $packageType,
		protected string $packageName,
		protected int $packageVersionId,
	) {
	}
}
