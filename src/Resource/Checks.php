<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Checks\ChecksCreate;
use Tonning\Github\Requests\Checks\ChecksCreateSuite;
use Tonning\Github\Requests\Checks\ChecksGet;
use Tonning\Github\Requests\Checks\ChecksGetSuite;
use Tonning\Github\Requests\Checks\ChecksListAnnotations;
use Tonning\Github\Requests\Checks\ChecksListForRef;
use Tonning\Github\Requests\Checks\ChecksListForSuite;
use Tonning\Github\Requests\Checks\ChecksListSuitesForRef;
use Tonning\Github\Requests\Checks\ChecksRerequestRun;
use Tonning\Github\Requests\Checks\ChecksRerequestSuite;
use Tonning\Github\Requests\Checks\ChecksSetSuitesPreferences;
use Tonning\Github\Requests\Checks\ChecksUpdate;
use Tonning\Github\Resource;

class Checks extends Resource
{
    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function checksCreate(string $owner, string $repo): Response
    {
        return $this->connector->send(new ChecksCreate($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkRunId The unique identifier of the check run.
     */
    public function checksGet(string $owner, string $repo, int $checkRunId): Response
    {
        return $this->connector->send(new ChecksGet($owner, $repo, $checkRunId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkRunId The unique identifier of the check run.
     */
    public function checksUpdate(string $owner, string $repo, int $checkRunId): Response
    {
        return $this->connector->send(new ChecksUpdate($owner, $repo, $checkRunId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkRunId The unique identifier of the check run.
     * @param  int  $page Page number of the results to fetch.
     */
    public function checksListAnnotations(string $owner, string $repo, int $checkRunId, ?int $page): Response
    {
        return $this->connector->send(new ChecksListAnnotations($owner, $repo, $checkRunId, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkRunId The unique identifier of the check run.
     */
    public function checksRerequestRun(string $owner, string $repo, int $checkRunId): Response
    {
        return $this->connector->send(new ChecksRerequestRun($owner, $repo, $checkRunId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function checksCreateSuite(string $owner, string $repo): Response
    {
        return $this->connector->send(new ChecksCreateSuite($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function checksSetSuitesPreferences(string $owner, string $repo): Response
    {
        return $this->connector->send(new ChecksSetSuitesPreferences($owner, $repo));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkSuiteId The unique identifier of the check suite.
     */
    public function checksGetSuite(string $owner, string $repo, int $checkSuiteId): Response
    {
        return $this->connector->send(new ChecksGetSuite($owner, $repo, $checkSuiteId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkSuiteId The unique identifier of the check suite.
     * @param  string  $checkName Returns check runs with the specified `name`.
     * @param  string  $status Returns check runs with the specified `status`.
     * @param  string  $filter Filters check runs by their `completed_at` timestamp. `latest` returns the most recent check runs.
     * @param  int  $page Page number of the results to fetch.
     */
    public function checksListForSuite(
        string $owner,
        string $repo,
        int $checkSuiteId,
        ?string $checkName,
        ?string $status,
        ?string $filter,
        ?int $page,
    ): Response {
        return $this->connector->send(new ChecksListForSuite($owner, $repo, $checkSuiteId, $checkName, $status, $filter, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $checkSuiteId The unique identifier of the check suite.
     */
    public function checksRerequestSuite(string $owner, string $repo, int $checkSuiteId): Response
    {
        return $this->connector->send(new ChecksRerequestSuite($owner, $repo, $checkSuiteId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  string  $checkName Returns check runs with the specified `name`.
     * @param  string  $status Returns check runs with the specified `status`.
     * @param  string  $filter Filters check runs by their `completed_at` timestamp. `latest` returns the most recent check runs.
     * @param  int  $page Page number of the results to fetch.
     */
    public function checksListForRef(
        string $owner,
        string $repo,
        string $ref,
        ?string $checkName,
        ?string $status,
        ?string $filter,
        ?int $page,
        ?int $appId,
    ): Response {
        return $this->connector->send(new ChecksListForRef($owner, $repo, $ref, $checkName, $status, $filter, $page, $appId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  int  $appId Filters check suites by GitHub App `id`.
     * @param  string  $checkName Returns check runs with the specified `name`.
     * @param  int  $page Page number of the results to fetch.
     */
    public function checksListSuitesForRef(
        string $owner,
        string $repo,
        string $ref,
        ?int $appId,
        ?string $checkName,
        ?int $page,
    ): Response {
        return $this->connector->send(new ChecksListSuitesForRef($owner, $repo, $ref, $appId, $checkName, $page));
    }
}
