<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/get-views
 *
 * Get the total number of views and breakdown per day or week for the last 14 days. Timestamps are
 * aligned to UTC midnight of the beginning of the day or week. Week begins on Monday.
 */
class ReposGetViews extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/traffic/views";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|string  $per The time frame to display results for.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $per = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['per' => $this->per]);
    }
}
