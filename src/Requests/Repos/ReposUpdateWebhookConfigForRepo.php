<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/update-webhook-config-for-repo
 *
 * Updates the webhook configuration for a repository. To update more information about the webhook,
 * including the `active` state and `events`, use "[Update a repository
 * webhook](/rest/webhooks/repos#update-a-repository-webhook)."
 *
 * Access tokens must have the
 * `write:repo_hook` or `repo` scope, and GitHub Apps must have the `repository_hooks:write`
 * permission.
 */
class ReposUpdateWebhookConfigForRepo extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/hooks/{$this->hookId}/config";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $hookId,
    ) {
    }
}
