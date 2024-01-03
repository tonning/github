<?php

namespace Tonning\Github\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/get-authenticated
 *
 * Returns the GitHub App associated with the authentication credentials used. To see how many app
 * installations are associated with this GitHub App, see the `installations_count` in the response.
 * For more details about your app's installations, see the "[List installations for the authenticated
 * app](https://docs.github.com/rest/apps/apps#list-installations-for-the-authenticated-app)"
 * endpoint.
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 */
class AppsGetAuthenticated extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/app';
    }

    public function __construct()
    {
    }
}
