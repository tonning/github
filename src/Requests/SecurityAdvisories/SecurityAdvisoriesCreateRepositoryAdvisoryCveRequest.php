<?php

namespace Tonning\Github\Requests\SecurityAdvisories;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * security-advisories/create-repository-advisory-cve-request
 *
 * If you want a CVE identification number for the security vulnerability in your project, and don't
 * already have one, you can request a CVE identification number from GitHub. For more information see
 * "[Requesting a CVE identification
 * number](https://docs.github.com/code-security/security-advisories/repository-security-advisories/publishing-a-repository-security-advisory#requesting-a-cve-identification-number-optional)."
 *
 * You
 * may request a CVE for public repositories, but cannot do so for private repositories.
 *
 * You must
 * authenticate using an access token with the `repo` scope or `repository_advisories:write` permission
 * to use this endpoint.
 *
 * In order to request a CVE for a repository security advisory, you must be a
 * security manager or administrator of that repository.
 */
class SecurityAdvisoriesCreateRepositoryAdvisoryCveRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/security-advisories/{$this->ghsaId}/cve";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ghsaId The GHSA (GitHub Security Advisory) identifier of the advisory.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ghsaId,
    ) {
    }
}
