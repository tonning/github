<?php

namespace Tonning\Github\Requests\Apps;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * apps/list-installations
 *
 * You must use a
 * [JWT](https://docs.github.com/apps/building-github-apps/authenticating-with-github-apps/#authenticating-as-a-github-app)
 * to access this endpoint.
 *
 * The permissions the installation has are included under the `permissions`
 * key.
 */
class AppsListInstallations extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/app/installations';
    }

    /**
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     */
    public function __construct(
        protected ?int $page = null,
        protected ?string $since = null,
        protected ?string $outdated = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'since' => $this->since, 'outdated' => $this->outdated]);
    }
}
