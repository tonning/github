<?php

namespace Tonning\Github\Requests\Copilot;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * copilot/cancel-copilot-seat-assignment-for-teams
 *
 * **Note**: This endpoint is in beta and is subject to change.
 *
 * Cancels the Copilot Business seat
 * assignment for all members of each team specified.
 * This will cause the members of the specified
 * team(s) to lose access to GitHub Copilot at the end of the current billing cycle, and the
 * organization will not be billed further for those users.
 *
 * For more information about Copilot
 * Business pricing, see "[Pricing for GitHub Copilot
 * Business](https://docs.github.com/billing/managing-billing-for-github-copilot/about-billing-for-github-copilot#pricing-for-github-copilot-business)".
 *
 * For
 * more information about disabling access to Copilot Business, see "[Revoking access to GitHub Copilot
 * for specific users in your
 * organization](https://docs.github.com/copilot/managing-copilot-business/managing-access-for-copilot-business-in-your-organization#revoking-access-to-github-copilot-for-specific-users-in-your-organization)".
 *
 * Only
 * organization owners can configure GitHub Copilot in their organization. You must
 * authenticate using
 * an access token with the `manage_billing:copilot` scope to use this endpoint.
 */
class CopilotCancelCopilotSeatAssignmentForTeams extends Request
{
    protected Method $method = Method::DELETE;

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
