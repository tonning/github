<?php

namespace Tonning\Github\Requests\Packages;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/list-packages-for-organization
 *
 * Lists packages in an organization readable by the user.
 *
 * To use this endpoint, you must authenticate
 * using an access token with the `read:packages` scope. If the `package_type` belongs to a registry
 * that only supports repository-scoped permissions, your token must also include the `repo` scope. For
 * the list of GitHub Packages registries that only support repository-scoped permissions, see "[About
 * permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesListPackagesForOrganization extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/packages";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param null|string $visibility The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
	 *
	 * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
	 * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $org,
		protected string $packageType,
		protected ?string $visibility = null,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['package_type' => $this->packageType, 'visibility' => $this->visibility, 'page' => $this->page]);
	}
}
