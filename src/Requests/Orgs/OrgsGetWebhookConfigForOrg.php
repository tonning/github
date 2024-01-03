<?php

namespace Tonning\Github\Requests\Orgs;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * orgs/get-webhook-config-for-org
 *
 * Returns the webhook configuration for an organization. To get more information about the webhook,
 * including the `active` state and `events`, use "[Get an organization webhook
 * ](/rest/orgs/webhooks#get-an-organization-webhook)."
 *
 * Access tokens must have the `admin:org_hook`
 * scope, and GitHub Apps must have the `organization_hooks:read` permission.
 */
class OrgsGetWebhookConfigForOrg extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/hooks/{$this->hookId}/config";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  int  $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
     */
    public function __construct(
        protected string $org,
        protected int $hookId,
    ) {
    }
}
