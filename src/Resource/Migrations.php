<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Migrations\MigrationsCancelImport;
use Tonning\Github\Requests\Migrations\MigrationsDeleteArchiveForAuthenticatedUser;
use Tonning\Github\Requests\Migrations\MigrationsDeleteArchiveForOrg;
use Tonning\Github\Requests\Migrations\MigrationsDownloadArchiveForOrg;
use Tonning\Github\Requests\Migrations\MigrationsGetArchiveForAuthenticatedUser;
use Tonning\Github\Requests\Migrations\MigrationsGetCommitAuthors;
use Tonning\Github\Requests\Migrations\MigrationsGetImportStatus;
use Tonning\Github\Requests\Migrations\MigrationsGetLargeFiles;
use Tonning\Github\Requests\Migrations\MigrationsGetStatusForAuthenticatedUser;
use Tonning\Github\Requests\Migrations\MigrationsGetStatusForOrg;
use Tonning\Github\Requests\Migrations\MigrationsListForAuthenticatedUser;
use Tonning\Github\Requests\Migrations\MigrationsListForOrg;
use Tonning\Github\Requests\Migrations\MigrationsListReposForAuthenticatedUser;
use Tonning\Github\Requests\Migrations\MigrationsListReposForOrg;
use Tonning\Github\Requests\Migrations\MigrationsMapCommitAuthor;
use Tonning\Github\Requests\Migrations\MigrationsSetLfsPreference;
use Tonning\Github\Requests\Migrations\MigrationsStartForAuthenticatedUser;
use Tonning\Github\Requests\Migrations\MigrationsStartForOrg;
use Tonning\Github\Requests\Migrations\MigrationsStartImport;
use Tonning\Github\Requests\Migrations\MigrationsUnlockRepoForAuthenticatedUser;
use Tonning\Github\Requests\Migrations\MigrationsUnlockRepoForOrg;
use Tonning\Github\Requests\Migrations\MigrationsUpdateImport;
use Tonning\Github\Resource;

class Migrations extends Resource
{
	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $page Page number of the results to fetch.
	 * @param array $exclude Exclude attributes from the API response to improve performance
	 */
	public function migrationsListForOrg(string $org, ?int $page, ?array $exclude): Response
	{
		return $this->connector->send(new MigrationsListForOrg($org, $page, $exclude));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function migrationsStartForOrg(string $org): Response
	{
		return $this->connector->send(new MigrationsStartForOrg($org));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $migrationId The unique identifier of the migration.
	 * @param array $exclude Exclude attributes from the API response to improve performance
	 */
	public function migrationsGetStatusForOrg(string $org, int $migrationId, ?array $exclude): Response
	{
		return $this->connector->send(new MigrationsGetStatusForOrg($org, $migrationId, $exclude));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $migrationId The unique identifier of the migration.
	 */
	public function migrationsDownloadArchiveForOrg(string $org, int $migrationId): Response
	{
		return $this->connector->send(new MigrationsDownloadArchiveForOrg($org, $migrationId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $migrationId The unique identifier of the migration.
	 */
	public function migrationsDeleteArchiveForOrg(string $org, int $migrationId): Response
	{
		return $this->connector->send(new MigrationsDeleteArchiveForOrg($org, $migrationId));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $migrationId The unique identifier of the migration.
	 * @param string $repoName repo_name parameter
	 */
	public function migrationsUnlockRepoForOrg(string $org, int $migrationId, string $repoName): Response
	{
		return $this->connector->send(new MigrationsUnlockRepoForOrg($org, $migrationId, $repoName));
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $migrationId The unique identifier of the migration.
	 * @param int $page Page number of the results to fetch.
	 */
	public function migrationsListReposForOrg(string $org, int $migrationId, ?int $page): Response
	{
		return $this->connector->send(new MigrationsListReposForOrg($org, $migrationId, $page));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function migrationsGetImportStatus(string $owner, string $repo): Response
	{
		return $this->connector->send(new MigrationsGetImportStatus($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function migrationsStartImport(string $owner, string $repo): Response
	{
		return $this->connector->send(new MigrationsStartImport($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function migrationsCancelImport(string $owner, string $repo): Response
	{
		return $this->connector->send(new MigrationsCancelImport($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function migrationsUpdateImport(string $owner, string $repo): Response
	{
		return $this->connector->send(new MigrationsUpdateImport($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $since A user ID. Only return users with an ID greater than this ID.
	 */
	public function migrationsGetCommitAuthors(string $owner, string $repo, ?int $since): Response
	{
		return $this->connector->send(new MigrationsGetCommitAuthors($owner, $repo, $since));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $authorId
	 */
	public function migrationsMapCommitAuthor(string $owner, string $repo, int $authorId): Response
	{
		return $this->connector->send(new MigrationsMapCommitAuthor($owner, $repo, $authorId));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function migrationsGetLargeFiles(string $owner, string $repo): Response
	{
		return $this->connector->send(new MigrationsGetLargeFiles($owner, $repo));
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function migrationsSetLfsPreference(string $owner, string $repo): Response
	{
		return $this->connector->send(new MigrationsSetLfsPreference($owner, $repo));
	}


	/**
	 * @param int $page Page number of the results to fetch.
	 */
	public function migrationsListForAuthenticatedUser(?int $page): Response
	{
		return $this->connector->send(new MigrationsListForAuthenticatedUser($page));
	}


	public function migrationsStartForAuthenticatedUser(): Response
	{
		return $this->connector->send(new MigrationsStartForAuthenticatedUser());
	}


	/**
	 * @param int $migrationId The unique identifier of the migration.
	 * @param array $exclude
	 */
	public function migrationsGetStatusForAuthenticatedUser(int $migrationId, ?array $exclude): Response
	{
		return $this->connector->send(new MigrationsGetStatusForAuthenticatedUser($migrationId, $exclude));
	}


	/**
	 * @param int $migrationId The unique identifier of the migration.
	 */
	public function migrationsGetArchiveForAuthenticatedUser(int $migrationId): Response
	{
		return $this->connector->send(new MigrationsGetArchiveForAuthenticatedUser($migrationId));
	}


	/**
	 * @param int $migrationId The unique identifier of the migration.
	 */
	public function migrationsDeleteArchiveForAuthenticatedUser(int $migrationId): Response
	{
		return $this->connector->send(new MigrationsDeleteArchiveForAuthenticatedUser($migrationId));
	}


	/**
	 * @param int $migrationId The unique identifier of the migration.
	 * @param string $repoName repo_name parameter
	 */
	public function migrationsUnlockRepoForAuthenticatedUser(int $migrationId, string $repoName): Response
	{
		return $this->connector->send(new MigrationsUnlockRepoForAuthenticatedUser($migrationId, $repoName));
	}


	/**
	 * @param int $migrationId The unique identifier of the migration.
	 * @param int $page Page number of the results to fetch.
	 */
	public function migrationsListReposForAuthenticatedUser(int $migrationId, ?int $page): Response
	{
		return $this->connector->send(new MigrationsListReposForAuthenticatedUser($migrationId, $page));
	}
}
