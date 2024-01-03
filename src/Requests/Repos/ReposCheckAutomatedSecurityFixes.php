<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/check-automated-security-fixes
 *
 * Shows whether automated security fixes are enabled, disabled or paused for a repository. The
 * authenticated user must have admin read access to the repository. For more information, see
 * "[Configuring automated security
 * fixes](https://docs.github.com/articles/configuring-automated-security-fixes)".
 */
class ReposCheckAutomatedSecurityFixes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/automated-security-fixes";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
    ) {
    }
}
