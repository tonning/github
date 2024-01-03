<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Packages\PackagesDeletePackageForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesDeletePackageForOrg;
use Tonning\Github\Requests\Packages\PackagesDeletePackageForUser;
use Tonning\Github\Requests\Packages\PackagesDeletePackageVersionForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesDeletePackageVersionForOrg;
use Tonning\Github\Requests\Packages\PackagesDeletePackageVersionForUser;
use Tonning\Github\Requests\Packages\PackagesGetAllPackageVersionsForPackageOwnedByAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesGetAllPackageVersionsForPackageOwnedByOrg;
use Tonning\Github\Requests\Packages\PackagesGetAllPackageVersionsForPackageOwnedByUser;
use Tonning\Github\Requests\Packages\PackagesGetPackageForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesGetPackageForOrganization;
use Tonning\Github\Requests\Packages\PackagesGetPackageForUser;
use Tonning\Github\Requests\Packages\PackagesGetPackageVersionForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesGetPackageVersionForOrganization;
use Tonning\Github\Requests\Packages\PackagesGetPackageVersionForUser;
use Tonning\Github\Requests\Packages\PackagesListDockerMigrationConflictingPackagesForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesListDockerMigrationConflictingPackagesForOrganization;
use Tonning\Github\Requests\Packages\PackagesListDockerMigrationConflictingPackagesForUser;
use Tonning\Github\Requests\Packages\PackagesListPackagesForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesListPackagesForOrganization;
use Tonning\Github\Requests\Packages\PackagesListPackagesForUser;
use Tonning\Github\Requests\Packages\PackagesRestorePackageForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesRestorePackageForOrg;
use Tonning\Github\Requests\Packages\PackagesRestorePackageForUser;
use Tonning\Github\Requests\Packages\PackagesRestorePackageVersionForAuthenticatedUser;
use Tonning\Github\Requests\Packages\PackagesRestorePackageVersionForOrg;
use Tonning\Github\Requests\Packages\PackagesRestorePackageVersionForUser;
use Tonning\Github\Resource;

class Packages extends Resource
{
	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function packagesListDockerMigrationConflictingPackagesForOrganization(string $org): Response
	{
		return $this->connector->send(new PackagesListDockerMigrationConflictingPackagesForOrganization($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $visibility The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
	 *
	 * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
	 * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
	 * @param int $page Page number of the results to fetch.
	 */
	public function packagesListPackagesForOrganization(
		string $org,
		string $packageType,
		?string $visibility,
		?int $page,
	): Response
	{
		return $this->connector->send(new PackagesListPackagesForOrganization($org, $packageType, $visibility, $page));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function packagesGetPackageForOrganization(string $packageType, string $packageName, string $org): Response
	{
		return $this->connector->send(new PackagesGetPackageForOrganization($packageType, $packageName, $org));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function packagesDeletePackageForOrg(string $packageType, string $packageName, string $org): Response
	{
		return $this->connector->send(new PackagesDeletePackageForOrg($packageType, $packageName, $org));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $token package token
	 */
	public function packagesRestorePackageForOrg(
		string $packageType,
		string $packageName,
		string $org,
		?string $token,
	): Response
	{
		return $this->connector->send(new PackagesRestorePackageForOrg($packageType, $packageName, $org, $token));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 * @param string $state The state of the package, either active or deleted.
	 */
	public function packagesGetAllPackageVersionsForPackageOwnedByOrg(
		string $packageType,
		string $packageName,
		string $org,
		?int $page,
		?string $state,
	): Response
	{
		return $this->connector->send(new PackagesGetAllPackageVersionsForPackageOwnedByOrg($packageType, $packageName, $org, $page, $state));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesGetPackageVersionForOrganization(
		string $packageType,
		string $packageName,
		string $org,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesGetPackageVersionForOrganization($packageType, $packageName, $org, $packageVersionId));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesDeletePackageVersionForOrg(
		string $packageType,
		string $packageName,
		string $org,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesDeletePackageVersionForOrg($packageType, $packageName, $org, $packageVersionId));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesRestorePackageVersionForOrg(
		string $packageType,
		string $packageName,
		string $org,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesRestorePackageVersionForOrg($packageType, $packageName, $org, $packageVersionId));
	}


	public function packagesListDockerMigrationConflictingPackagesForAuthenticatedUser(): Response
	{
		return $this->connector->send(new PackagesListDockerMigrationConflictingPackagesForAuthenticatedUser());
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $visibility The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
	 *
	 * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
	 * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
	 * @param int $page Page number of the results to fetch.
	 */
	public function packagesListPackagesForAuthenticatedUser(
		string $packageType,
		?string $visibility,
		?int $page,
	): Response
	{
		return $this->connector->send(new PackagesListPackagesForAuthenticatedUser($packageType, $visibility, $page));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 */
	public function packagesGetPackageForAuthenticatedUser(string $packageType, string $packageName): Response
	{
		return $this->connector->send(new PackagesGetPackageForAuthenticatedUser($packageType, $packageName));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 */
	public function packagesDeletePackageForAuthenticatedUser(string $packageType, string $packageName): Response
	{
		return $this->connector->send(new PackagesDeletePackageForAuthenticatedUser($packageType, $packageName));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $token package token
	 */
	public function packagesRestorePackageForAuthenticatedUser(
		string $packageType,
		string $packageName,
		?string $token,
	): Response
	{
		return $this->connector->send(new PackagesRestorePackageForAuthenticatedUser($packageType, $packageName, $token));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param int $page Page number of the results to fetch.
	 * @param string $state The state of the package, either active or deleted.
	 */
	public function packagesGetAllPackageVersionsForPackageOwnedByAuthenticatedUser(
		string $packageType,
		string $packageName,
		?int $page,
		?string $state,
	): Response
	{
		return $this->connector->send(new PackagesGetAllPackageVersionsForPackageOwnedByAuthenticatedUser($packageType, $packageName, $page, $state));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesGetPackageVersionForAuthenticatedUser(
		string $packageType,
		string $packageName,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesGetPackageVersionForAuthenticatedUser($packageType, $packageName, $packageVersionId));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesDeletePackageVersionForAuthenticatedUser(
		string $packageType,
		string $packageName,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesDeletePackageVersionForAuthenticatedUser($packageType, $packageName, $packageVersionId));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesRestorePackageVersionForAuthenticatedUser(
		string $packageType,
		string $packageName,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesRestorePackageVersionForAuthenticatedUser($packageType, $packageName, $packageVersionId));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 */
	public function packagesListDockerMigrationConflictingPackagesForUser(string $username): Response
	{
		return $this->connector->send(new PackagesListDockerMigrationConflictingPackagesForUser($username));
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $visibility The selected visibility of the packages.  This parameter is optional and only filters an existing result set.
	 *
	 * The `internal` visibility is only supported for GitHub Packages registries that allow for granular permissions. For other ecosystems `internal` is synonymous with `private`.
	 * For the list of GitHub Packages registries that support granular permissions, see "[About permissions for GitHub Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
	 * @param int $page Page number of the results to fetch.
	 */
	public function packagesListPackagesForUser(
		string $username,
		string $packageType,
		?string $visibility,
		?int $page,
	): Response
	{
		return $this->connector->send(new PackagesListPackagesForUser($username, $packageType, $visibility, $page));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function packagesGetPackageForUser(string $packageType, string $packageName, string $username): Response
	{
		return $this->connector->send(new PackagesGetPackageForUser($packageType, $packageName, $username));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function packagesDeletePackageForUser(string $packageType, string $packageName, string $username): Response
	{
		return $this->connector->send(new PackagesDeletePackageForUser($packageType, $packageName, $username));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $username The handle for the GitHub user account.
	 * @param string $token package token
	 */
	public function packagesRestorePackageForUser(
		string $packageType,
		string $packageName,
		string $username,
		?string $token,
	): Response
	{
		return $this->connector->send(new PackagesRestorePackageForUser($packageType, $packageName, $username, $token));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function packagesGetAllPackageVersionsForPackageOwnedByUser(
		string $packageType,
		string $packageName,
		string $username,
	): Response
	{
		return $this->connector->send(new PackagesGetAllPackageVersionsForPackageOwnedByUser($packageType, $packageName, $username));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param int $packageVersionId Unique identifier of the package version.
	 * @param string $username The handle for the GitHub user account.
	 */
	public function packagesGetPackageVersionForUser(
		string $packageType,
		string $packageName,
		int $packageVersionId,
		string $username,
	): Response
	{
		return $this->connector->send(new PackagesGetPackageVersionForUser($packageType, $packageName, $packageVersionId, $username));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $username The handle for the GitHub user account.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesDeletePackageVersionForUser(
		string $packageType,
		string $packageName,
		string $username,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesDeletePackageVersionForUser($packageType, $packageName, $username, $packageVersionId));
	}


	/**
	 * @param string $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
	 * @param string $packageName The name of the package.
	 * @param string $username The handle for the GitHub user account.
	 * @param int $packageVersionId Unique identifier of the package version.
	 */
	public function packagesRestorePackageVersionForUser(
		string $packageType,
		string $packageName,
		string $username,
		int $packageVersionId,
	): Response
	{
		return $this->connector->send(new PackagesRestorePackageVersionForUser($packageType, $packageName, $username, $packageVersionId));
	}
}
