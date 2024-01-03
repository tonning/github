<?php

namespace Tonning\Github\Requests\SecurityAdvisories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * security-advisories/get-repository-advisory
 *
 * Get a repository security advisory using its GitHub Security Advisory (GHSA) identifier.
 * You can
 * access any published security advisory on a public repository.
 * You must authenticate using an access
 * token with the `repo` scope or `repository_advisories:read` permission
 * in order to get a published
 * security advisory in a private repository, or any unpublished security advisory that you have access
 * to.
 *
 * You can access an unpublished security advisory from a repository if you are a security manager
 * or administrator of that repository, or if you are a
 * collaborator on the security advisory.
 */
class SecurityAdvisoriesGetRepositoryAdvisory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/security-advisories/{$this->ghsaId}";
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
