<?php

namespace Tonning\Github\Requests\Gists;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * gists/update-comment
 */
class GistsUpdateComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/gists/{$this->gistId}/comments/{$this->commentId}";
    }

    /**
     * @param  string  $gistId The unique identifier of the gist.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function __construct(
        protected string $gistId,
        protected int $commentId,
    ) {
    }
}
