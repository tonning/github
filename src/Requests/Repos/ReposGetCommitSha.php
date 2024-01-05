<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Tonning\Github\Github;

/**
 * repos/get-commit
 *
 * Returns the contents of a single commit reference. You must have `read` access for the repository to
 * use this endpoint.
 *
 * **Note:** If there are more than 300 files in the commit diff, the response will
 * include pagination link headers for the remaining files, up to a limit of 3000 files. Each page
 * contains the static commit information, and the only changes are to the file listing.
 *
 * You can pass
 * the appropriate [media
 * type](https://docs.github.com/rest/overview/media-types/#commits-commit-comparison-and-pull-requests)
 * to  fetch `diff` and `patch` formats. Diffs with binary data will have no `patch` property.
 *
 * To
 * return only the SHA-1 hash of the commit reference, you can provide the `sha` custom [media
 * type](https://docs.github.com/rest/overview/media-types/#commits-commit-comparison-and-pull-requests)
 * in the `Accept` header. You can use this endpoint to check if a remote reference's SHA-1 hash is the
 * same as your local reference's SHA-1 hash by providing the local SHA-1 reference as the
 * ETag.
 *
 * **Signature verification object**
 *
 * The response will include a `verification` object that
 * describes the result of verifying the commit's signature. The following fields are included in the
 * `verification` object:
 *
 * | Name | Type | Description |
 * | ---- | ---- | ----------- |
 * | `verified` |
 * `boolean` | Indicates whether GitHub considers the signature in this commit to be verified. |
 * |
 * `reason` | `string` | The reason for verified value. Possible values and their meanings are
 * enumerated in table below. |
 * | `signature` | `string` | The signature that was extracted from the
 * commit. |
 * | `payload` | `string` | The value that was signed. |
 *
 * These are the possible values for
 * `reason` in the `verification` object:
 *
 * | Value | Description |
 * | ----- | ----------- |
 * |
 * `expired_key` | The key that made the signature is expired. |
 * | `not_signing_key` | The "signing"
 * flag is not among the usage flags in the GPG key that made the signature. |
 * | `gpgverify_error` |
 * There was an error communicating with the signature verification service. |
 * |
 * `gpgverify_unavailable` | The signature verification service is currently unavailable. |
 * |
 * `unsigned` | The object does not include a signature. |
 * | `unknown_signature_type` | A non-PGP
 * signature was found in the commit. |
 * | `no_user` | No user was associated with the `committer` email
 * address in the commit. |
 * | `unverified_email` | The `committer` email address in the commit was
 * associated with a user, but the email address is not verified on their account. |
 * | `bad_email` |
 * The `committer` email address in the commit is not included in the identities of the PGP key that
 * made the signature. |
 * | `unknown_key` | The key that made the signature has not been registered with
 * any user's account. |
 * | `malformed_signature` | There was an error parsing the signature. |
 * |
 * `invalid` | The signature could not be cryptographically verified using the key whose key-id was
 * found in the signature. |
 * | `valid` | None of the above errors applied, so the signature is
 * considered to be verified. |
 */
class ReposGetCommitSha extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/commits/{$this->ref}";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $ref The commit reference. Can be a commit SHA, branch name (`heads/BRANCH_NAME`), or tag name (`tags/TAG_NAME`). For more information, see "[Git References](https://git-scm.com/book/en/v2/Git-Internals-Git-References)" in the Git documentation.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected string $ref,
        protected ?int $page = null,
    ) {
    }

    public function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/vnd.github.VERSION.sha',
            'Content-Type' => 'application/json',
            'X-GitHub-Api-Version' => Github::API_VERSION,
        ];
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
