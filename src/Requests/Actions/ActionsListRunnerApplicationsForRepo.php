<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-runner-applications-for-repo
 *
 * Lists binaries for the runner application that you can download and run.
 *
 * You must authenticate
 * using an access token with the `repo` scope to use this endpoint.
 * GitHub Apps must have the
 * `administration` permission for repositories and the `organization_self_hosted_runners` permission
 * for organizations.
 * Authenticated users must have admin access to repositories or organizations, or
 * the `manage_runners:enterprise` scope for enterprises, to use these endpoints.
 */
class ActionsListRunnerApplicationsForRepo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/runners/downloads";
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
