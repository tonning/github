<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesCreateFork;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesCreatePrivateVulnerabilityReport;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesCreateRepositoryAdvisory;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesCreateRepositoryAdvisoryCveRequest;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesGetGlobalAdvisory;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesGetRepositoryAdvisory;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesListGlobalAdvisories;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesListOrgRepositoryAdvisories;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesListRepositoryAdvisories;
use Tonning\Github\Requests\SecurityAdvisories\SecurityAdvisoriesUpdateRepositoryAdvisory;
use Tonning\Github\Resource;

class SecurityAdvisories extends Resource
{
    /**
     * @param  string  $ghsaId If specified, only advisories with this GHSA (GitHub Security Advisory) identifier will be returned.
     * @param  string  $type If specified, only advisories of this type will be returned. By default, a request with no other parameters defined will only return reviewed advisories that are not malware.
     * @param  string  $cveId If specified, only advisories with this CVE (Common Vulnerabilities and Exposures) identifier will be returned.
     * @param  string  $ecosystem If specified, only advisories for these ecosystems will be returned.
     * @param  string  $severity If specified, only advisories with these severities will be returned.
     * @param  mixed  $cwes If specified, only advisories with these Common Weakness Enumerations (CWEs) will be returned.
     *
     * Example: `cwes=79,284,22` or `cwes[]=79&cwes[]=284&cwes[]=22`
     * @param  bool  $isWithdrawn Whether to only return advisories that have been withdrawn.
     * @param  mixed  $affects If specified, only return advisories that affect any of `package` or `package@version`. A maximum of 1000 packages can be specified.
     * If the query parameter causes the URL to exceed the maximum URL length supported by your client, you must specify fewer packages.
     *
     * Example: `affects=package1,package2@1.0.0,package3@^2.0.0` or `affects[]=package1&affects[]=package2@1.0.0`
     * @param  string  $published If specified, only return advisories that were published on a date or date range.
     *
     * For more information on the syntax of the date range, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  string  $updated If specified, only return advisories that were updated on a date or date range.
     *
     * For more information on the syntax of the date range, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  string  $modified If specified, only show advisories that were updated or published on a date or date range.
     *
     * For more information on the syntax of the date range, see "[Understanding the search syntax](https://docs.github.com/search-github/getting-started-with-searching-on-github/understanding-the-search-syntax#query-for-dates)."
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  string  $direction The direction to sort the results by.
     * @param  string  $sort The property to sort the results by.
     */
    public function securityAdvisoriesListGlobalAdvisories(
        ?string $ghsaId,
        ?string $type,
        ?string $cveId,
        ?string $ecosystem,
        ?string $severity,
        mixed $cwes,
        ?bool $isWithdrawn,
        mixed $affects,
        ?string $published,
        ?string $updated,
        ?string $modified,
        ?string $before,
        ?string $direction,
        ?string $sort,
    ): Response {
        return $this->connector->send(new SecurityAdvisoriesListGlobalAdvisories($ghsaId, $type, $cveId, $ecosystem, $severity, $cwes, $isWithdrawn, $affects, $published, $updated, $modified, $before, $direction, $sort));
    }

    /**
     * @param  string  $ghsaId The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function securityAdvisoriesGetGlobalAdvisory(string $ghsaId): Response
    {
        return $this->connector->send(new SecurityAdvisoriesGetGlobalAdvisory($ghsaId));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $direction The direction to sort the results by.
     * @param  string  $sort The property to sort the results by.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  string  $state Filter by the state of the repository advisories. Only advisories of this state will be returned.
     */
    public function securityAdvisoriesListOrgRepositoryAdvisories(
        string $org,
        ?string $direction,
        ?string $sort,
        ?string $before,
        ?string $state,
    ): Response {
        return $this->connector->send(new SecurityAdvisoriesListOrgRepositoryAdvisories($org, $direction, $sort, $before, $state));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $direction The direction to sort the results by.
     * @param  string  $sort The property to sort the results by.
     * @param  string  $before A cursor, as given in the [Link header](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api#using-link-headers). If specified, the query only searches for results before this cursor.
     * @param  string  $state Filter by state of the repository advisories. Only advisories of this state will be returned.
     */
    public function securityAdvisoriesListRepositoryAdvisories(
        string $owner,
        string $repo,
        ?string $direction,
        ?string $sort,
        ?string $before,
        ?string $state,
    ): Response {
        return $this->connector->send(new SecurityAdvisoriesListRepositoryAdvisories($owner, $repo, $direction, $sort, $before, $state));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function securityAdvisoriesCreateRepositoryAdvisory(string $owner, string $repo): Response
    {
        return $this->connector->send(new SecurityAdvisoriesCreateRepositoryAdvisory($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function securityAdvisoriesCreatePrivateVulnerabilityReport(string $owner, string $repo): Response
    {
        return $this->connector->send(new SecurityAdvisoriesCreatePrivateVulnerabilityReport($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ghsaId The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function securityAdvisoriesGetRepositoryAdvisory(string $owner, string $repo, string $ghsaId): Response
    {
        return $this->connector->send(new SecurityAdvisoriesGetRepositoryAdvisory($owner, $repo, $ghsaId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ghsaId The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function securityAdvisoriesUpdateRepositoryAdvisory(string $owner, string $repo, string $ghsaId): Response
    {
        return $this->connector->send(new SecurityAdvisoriesUpdateRepositoryAdvisory($owner, $repo, $ghsaId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ghsaId The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function securityAdvisoriesCreateRepositoryAdvisoryCveRequest(
        string $owner,
        string $repo,
        string $ghsaId,
    ): Response {
        return $this->connector->send(new SecurityAdvisoriesCreateRepositoryAdvisoryCveRequest($owner, $repo, $ghsaId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ghsaId The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function securityAdvisoriesCreateFork(string $owner, string $repo, string $ghsaId): Response
    {
        return $this->connector->send(new SecurityAdvisoriesCreateFork($owner, $repo, $ghsaId));
    }
}
