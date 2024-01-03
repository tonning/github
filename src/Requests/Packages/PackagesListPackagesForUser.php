<?php

namespace Tonning\Github\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/list-packages-for-user
 *
 * Lists all packages in a user's namespace for which the requesting user has access.
 *
 * To use this
 * endpoint, you must authenticate using an access token with the `read:packages` scope. If the
 * `package_type` belongs to a GitHub Packages registry that only supports repository-scoped
 * permissions, your token must also include the `repo` scope. For the list of GitHub Packages
 * registries that only support repository-scoped permissions, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesListPackagesForUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/packages";
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  string  $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  null|string  $visibility The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
     *
     * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
     * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $username,
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
