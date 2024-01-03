<?php

namespace Tonning\Github\Requests\Reactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * reactions/create-for-commit-comment
 *
 * Create a reaction to a [commit
 * comment](https://docs.github.com/rest/commits/comments#get-a-commit-comment). A response with an
 * HTTP `200` status means that you already added the reaction type to this commit comment.
 */
class ReactionsCreateForCommitComment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/comments/{$this->commentId}/reactions";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  int  $commentId The unique identifier of the comment.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected int $commentId,
    ) {
    }
}
