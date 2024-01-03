<?php

namespace Tonning\Github\Requests\Actions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/list-runner-applications-for-org
 *
 * Lists binaries for the runner application that you can download and run.
 *
 * You must authenticate
 * using an access token with the `admin:org` scope to use this endpoint.
 * If the repository is private,
 * you must use an access token with the `repo` scope.
 * GitHub Apps must have the `administration`
 * permission for repositories and the `organization_self_hosted_runners` permission for
 * organizations.
 * Authenticated users must have admin access to repositories or organizations, or the
 * `manage_runners:enterprise` scope for enterprises, to use these endpoints.
 */
class ActionsListRunnerApplicationsForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/actions/runners/downloads";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
