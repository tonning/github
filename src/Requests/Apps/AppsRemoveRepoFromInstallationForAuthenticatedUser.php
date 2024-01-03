<?php

namespace Tonning\Github\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/remove-repo-from-installation-for-authenticated-user
 *
 * Remove a single repository from an installation. The authenticated user must have admin access to
 * the repository. The installation must have the `repository_selection` of `selected`.
 *
 * You must use a
 * personal access token (which you can create via the [command
 * line](https://docs.github.com/github/authenticating-to-github/creating-a-personal-access-token) or
 * [Basic
 * Authentication](https://docs.github.com/rest/overview/other-authentication-methods#basic-authentication))
 * to access this endpoint.
 */
class AppsRemoveRepoFromInstallationForAuthenticatedUser extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/user/installations/{$this->installationId}/repositories/{$this->repositoryId}";
    }

    /**
     * @param  int  $installationId The unique identifier of the installation.
     * @param  int  $repositoryId The unique identifier of the repository.
     */
    public function __construct(
        protected int $installationId,
        protected int $repositoryId,
    ) {
    }
}
