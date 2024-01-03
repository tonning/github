<?php

namespace Tonning\Github\Requests\Copilot;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * copilot/add-copilot-for-business-seats-for-teams
 *
 * **Note**: This endpoint is in beta and is subject to change.
 *
 *  Purchases a GitHub Copilot Business
 * seat for all users within each specified team.
 *  The organization will be billed accordingly. For
 * more information about Copilot Business pricing, see "[Pricing for GitHub Copilot
 * Business](https://docs.github.com/billing/managing-billing-for-github-copilot/about-billing-for-github-copilot#pricing-for-github-copilot-business)".
 *
 *
 * Only organization owners can configure GitHub Copilot in their organization. You must
 *  authenticate
 * using an access token with the `manage_billing:copilot` scope to use this endpoint.
 *
 *  In order for
 * an admin to use this endpoint, the organization must have a Copilot Business subscription and a
 * configured suggestion matching policy.
 *  For more information about setting up a Copilot Business
 * subscription, see "[Setting up a Copilot Business subscription for your
 * organization](https://docs.github.com/billing/managing-billing-for-github-copilot/managing-your-github-copilot-subscription-for-your-organization-or-enterprise#setting-up-a-copilot-business-subscription-for-your-organization)".
 *
 * For more information about setting a suggestion matching policy, see "[Configuring suggestion
 * matching policies for GitHub Copilot in your
 * organization](https://docs.github.com/copilot/managing-copilot-business/managing-policies-for-copilot-business-in-your-organization#configuring-suggestion-matching-policies-for-github-copilot-in-your-organization)".
 */
class CopilotAddCopilotForBusinessSeatsForTeams extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/orgs/{$this->org}/copilot/billing/selected_teams";
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function __construct(
        protected string $org,
    ) {
    }
}
