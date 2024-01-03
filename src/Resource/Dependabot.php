<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Dependabot\DependabotAddSelectedRepoToOrgSecret;
use Tonning\Github\Requests\Dependabot\DependabotCreateOrUpdateOrgSecret;
use Tonning\Github\Requests\Dependabot\DependabotCreateOrUpdateRepoSecret;
use Tonning\Github\Requests\Dependabot\DependabotDeleteOrgSecret;
use Tonning\Github\Requests\Dependabot\DependabotDeleteRepoSecret;
use Tonning\Github\Requests\Dependabot\DependabotGetAlert;
use Tonning\Github\Requests\Dependabot\DependabotGetOrgPublicKey;
use Tonning\Github\Requests\Dependabot\DependabotGetOrgSecret;
use Tonning\Github\Requests\Dependabot\DependabotGetRepoPublicKey;
use Tonning\Github\Requests\Dependabot\DependabotGetRepoSecret;
use Tonning\Github\Requests\Dependabot\DependabotListAlertsForEnterprise;
use Tonning\Github\Requests\Dependabot\DependabotListAlertsForOrg;
use Tonning\Github\Requests\Dependabot\DependabotListAlertsForRepo;
use Tonning\Github\Requests\Dependabot\DependabotListOrgSecrets;
use Tonning\Github\Requests\Dependabot\DependabotListRepoSecrets;
use Tonning\Github\Requests\Dependabot\DependabotListSelectedReposForOrgSecret;
use Tonning\Github\Requests\Dependabot\DependabotRemoveSelectedRepoFromOrgSecret;
use Tonning\Github\Requests\Dependabot\DependabotSetSelectedReposForOrgSecret;
use Tonning\Github\Requests\Dependabot\DependabotUpdateAlert;
use Tonning\Github\Resource;

class Dependabot extends Resource
{
    /**
     * @param  string  $enterprise The slug version of the enterprise name. You can also substitute this value with the enterprise id.
     * @param  string  $state A comma-separated list of states. If specified, only alerts with these states will be returned.
     *
     * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
     * @param  string  $severity A comma-separated list of severities. If specified, only alerts with these severities will be returned.
     *
     * Can be: `low`, `medium`, `high`, `critical`
     * @param  string  $ecosystem A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
     *
     * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
     * @param  string  $package A comma-separated list of package names. If specified, only alerts for these packages will be returned.
     * @param  string  $scope The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
     * @param  string  $sort The property by which to sort the results.
     * `created` means when the alert was created.
     * `updated` means when the alert's state last changed.
     * @param  string  $direction The direction to sort the results by.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  int  $first **Deprecated**. The number of results per page (max 100), starting from the first matching result.
     * This parameter must not be used in combination with `last`.
     * Instead, use `per_page` in combination with `after` to fetch the first page of results.
     * @param  int  $last **Deprecated**. The number of results per page (max 100), starting from the last matching result.
     * This parameter must not be used in combination with `first`.
     * Instead, use `per_page` in combination with `before` to fetch the last page of results.
     */
    public function dependabotListAlertsForEnterprise(
        string $enterprise,
        ?string $state,
        ?string $severity,
        ?string $ecosystem,
        ?string $package,
        ?string $scope,
        ?string $sort,
        ?string $direction,
        ?string $before,
        ?int $first,
        ?int $last,
    ): Response {
        return $this->connector->send(new DependabotListAlertsForEnterprise($enterprise, $state, $severity, $ecosystem, $package, $scope, $sort, $direction, $before, $first, $last));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $state A comma-separated list of states. If specified, only alerts with these states will be returned.
     *
     * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
     * @param  string  $severity A comma-separated list of severities. If specified, only alerts with these severities will be returned.
     *
     * Can be: `low`, `medium`, `high`, `critical`
     * @param  string  $ecosystem A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
     *
     * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
     * @param  string  $package A comma-separated list of package names. If specified, only alerts for these packages will be returned.
     * @param  string  $scope The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
     * @param  string  $sort The property by which to sort the results.
     * `created` means when the alert was created.
     * `updated` means when the alert's state last changed.
     * @param  string  $direction The direction to sort the results by.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  int  $first **Deprecated**. The number of results per page (max 100), starting from the first matching result.
     * This parameter must not be used in combination with `last`.
     * Instead, use `per_page` in combination with `after` to fetch the first page of results.
     * @param  int  $last **Deprecated**. The number of results per page (max 100), starting from the last matching result.
     * This parameter must not be used in combination with `first`.
     * Instead, use `per_page` in combination with `before` to fetch the last page of results.
     */
    public function dependabotListAlertsForOrg(
        string $org,
        ?string $state,
        ?string $severity,
        ?string $ecosystem,
        ?string $package,
        ?string $scope,
        ?string $sort,
        ?string $direction,
        ?string $before,
        ?int $first,
        ?int $last,
    ): Response {
        return $this->connector->send(new DependabotListAlertsForOrg($org, $state, $severity, $ecosystem, $package, $scope, $sort, $direction, $before, $first, $last));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function dependabotListOrgSecrets(string $org, ?int $page): Response
    {
        return $this->connector->send(new DependabotListOrgSecrets($org, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function dependabotGetOrgPublicKey(string $org): Response
    {
        return $this->connector->send(new DependabotGetOrgPublicKey($org));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotGetOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotGetOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotCreateOrUpdateOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotCreateOrUpdateOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotDeleteOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotDeleteOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     * @param  int  $page Page number of the results to fetch.
     */
    public function dependabotListSelectedReposForOrgSecret(string $org, string $secretName, ?int $page): Response
    {
        return $this->connector->send(new DependabotListSelectedReposForOrgSecret($org, $secretName, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotSetSelectedReposForOrgSecret(string $org, string $secretName): Response
    {
        return $this->connector->send(new DependabotSetSelectedReposForOrgSecret($org, $secretName));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotAddSelectedRepoToOrgSecret(string $org, string $secretName, int $repositoryId): Response
    {
        return $this->connector->send(new DependabotAddSelectedRepoToOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotRemoveSelectedRepoFromOrgSecret(
        string $org,
        string $secretName,
        int $repositoryId,
    ): Response {
        return $this->connector->send(new DependabotRemoveSelectedRepoFromOrgSecret($org, $secretName, $repositoryId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $state A comma-separated list of states. If specified, only alerts with these states will be returned.
     *
     * Can be: `auto_dismissed`, `dismissed`, `fixed`, `open`
     * @param  string  $severity A comma-separated list of severities. If specified, only alerts with these severities will be returned.
     *
     * Can be: `low`, `medium`, `high`, `critical`
     * @param  string  $ecosystem A comma-separated list of ecosystems. If specified, only alerts for these ecosystems will be returned.
     *
     * Can be: `composer`, `go`, `maven`, `npm`, `nuget`, `pip`, `pub`, `rubygems`, `rust`
     * @param  string  $package A comma-separated list of package names. If specified, only alerts for these packages will be returned.
     * @param  string  $manifest A comma-separated list of full manifest paths. If specified, only alerts for these manifests will be returned.
     * @param  string  $scope The scope of the vulnerable dependency. If specified, only alerts with this scope will be returned.
     * @param  string  $sort The property by which to sort the results.
     * `created` means when the alert was created.
     * `updated` means when the alert's state last changed.
     * @param  string  $direction The direction to sort the results by.
     * @param  int  $page **Deprecated**. Page number of the results to fetch. Use cursor-based pagination with `before` or `after` instead.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  int  $first **Deprecated**. The number of results per page (max 100), starting from the first matching result.
     * This parameter must not be used in combination with `last`.
     * Instead, use `per_page` in combination with `after` to fetch the first page of results.
     * @param  int  $last **Deprecated**. The number of results per page (max 100), starting from the last matching result.
     * This parameter must not be used in combination with `first`.
     * Instead, use `per_page` in combination with `before` to fetch the last page of results.
     */
    public function dependabotListAlertsForRepo(
        string $owner,
        string $repo,
        ?string $state,
        ?string $severity,
        ?string $ecosystem,
        ?string $package,
        ?string $manifest,
        ?string $scope,
        ?string $sort,
        ?string $direction,
        ?int $page,
        ?string $before,
        ?int $first,
        ?int $last,
    ): Response {
        return $this->connector->send(new DependabotListAlertsForRepo($owner, $repo, $state, $severity, $ecosystem, $package, $manifest, $scope, $sort, $direction, $page, $before, $first, $last));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies a Dependabot alert in its repository.
     * You can find this at the end of the URL for a Dependabot alert within GitHub,
     * or in `number` fields in the response from the
     * `GET /repos/{owner}/{repo}/dependabot/alerts` operation.
     */
    public function dependabotGetAlert(string $owner, string $repo, int $alertNumber): Response
    {
        return $this->connector->send(new DependabotGetAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $alertNumber The number that identifies a Dependabot alert in its repository.
     * You can find this at the end of the URL for a Dependabot alert within GitHub,
     * or in `number` fields in the response from the
     * `GET /repos/{owner}/{repo}/dependabot/alerts` operation.
     */
    public function dependabotUpdateAlert(string $owner, string $repo, int $alertNumber): Response
    {
        return $this->connector->send(new DependabotUpdateAlert($owner, $repo, $alertNumber));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $page Page number of the results to fetch.
     */
    public function dependabotListRepoSecrets(string $owner, string $repo, ?int $page): Response
    {
        return $this->connector->send(new DependabotListRepoSecrets($owner, $repo, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function dependabotGetRepoPublicKey(string $owner, string $repo): Response
    {
        return $this->connector->send(new DependabotGetRepoPublicKey($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotGetRepoSecret(string $owner, string $repo, string $secretName): Response
    {
        return $this->connector->send(new DependabotGetRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotCreateOrUpdateRepoSecret(string $owner, string $repo, string $secretName): Response
    {
        return $this->connector->send(new DependabotCreateOrUpdateRepoSecret($owner, $repo, $secretName));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $secretName The name of the secret.
     */
    public function dependabotDeleteRepoSecret(string $owner, string $repo, string $secretName): Response
    {
        return $this->connector->send(new DependabotDeleteRepoSecret($owner, $repo, $secretName));
    }
}
