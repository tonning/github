<?php

namespace Tonning\Github\Requests\Packages;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/get-package-version-for-user
 *
 * Gets a specific package version for a public package owned by a specified user.
 *
 * At this time, to
 * use this endpoint, you must authenticate using an access token with the `read:packages` scope. If
 * the `package_type` belongs to a GitHub Packages registry that only supports repository-scoped
 * permissions, your token must also include the `repo` scope. For the list of GitHub Packages
 * registries that only support repository-scoped permissions, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesGetPackageVersionForUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->username}/packages/{$this->packageType}/{$this->packageName}/versions/{$this->packageVersionId}";
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param int $packageVersionId Unique identifier of the package version.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function __construct(
		protected string $packageType,
		protected string $packageName,
		protected int $packageVersionId,
		protected string $username,
	) {
	}
}
