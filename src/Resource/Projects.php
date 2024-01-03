<?php

namespace Tonning\Github\Resource;

use Saloon\Contracts\Response;
use Tonning\Github\Requests\Projects\ProjectsAddCollaborator;
use Tonning\Github\Requests\Projects\ProjectsCreateCard;
use Tonning\Github\Requests\Projects\ProjectsCreateColumn;
use Tonning\Github\Requests\Projects\ProjectsCreateForAuthenticatedUser;
use Tonning\Github\Requests\Projects\ProjectsCreateForOrg;
use Tonning\Github\Requests\Projects\ProjectsCreateForRepo;
use Tonning\Github\Requests\Projects\ProjectsDelete;
use Tonning\Github\Requests\Projects\ProjectsDeleteCard;
use Tonning\Github\Requests\Projects\ProjectsDeleteColumn;
use Tonning\Github\Requests\Projects\ProjectsGet;
use Tonning\Github\Requests\Projects\ProjectsGetCard;
use Tonning\Github\Requests\Projects\ProjectsGetColumn;
use Tonning\Github\Requests\Projects\ProjectsGetPermissionForUser;
use Tonning\Github\Requests\Projects\ProjectsListCards;
use Tonning\Github\Requests\Projects\ProjectsListCollaborators;
use Tonning\Github\Requests\Projects\ProjectsListColumns;
use Tonning\Github\Requests\Projects\ProjectsListForOrg;
use Tonning\Github\Requests\Projects\ProjectsListForRepo;
use Tonning\Github\Requests\Projects\ProjectsListForUser;
use Tonning\Github\Requests\Projects\ProjectsMoveCard;
use Tonning\Github\Requests\Projects\ProjectsMoveColumn;
use Tonning\Github\Requests\Projects\ProjectsRemoveCollaborator;
use Tonning\Github\Requests\Projects\ProjectsUpdate;
use Tonning\Github\Requests\Projects\ProjectsUpdateCard;
use Tonning\Github\Requests\Projects\ProjectsUpdateColumn;
use Tonning\Github\Resource;

class Projects extends Resource
{
    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     * @param  string  $state Indicates the state of the projects to return.
     * @param  int  $page Page number of the results to fetch.
     */
    public function projectsListForOrg(string $org, ?string $state, ?int $page): Response
    {
        return $this->connector->send(new ProjectsListForOrg($org, $state, $page));
    }

    /**
     * @param  string  $org The organization name. The name is not case-sensitive.
     */
    public function projectsCreateForOrg(string $org): Response
    {
        return $this->connector->send(new ProjectsCreateForOrg($org));
    }

    /**
     * @param  int  $cardId The unique identifier of the card.
     */
    public function projectsGetCard(int $cardId): Response
    {
        return $this->connector->send(new ProjectsGetCard($cardId));
    }

    /**
     * @param  int  $cardId The unique identifier of the card.
     */
    public function projectsDeleteCard(int $cardId): Response
    {
        return $this->connector->send(new ProjectsDeleteCard($cardId));
    }

    /**
     * @param  int  $cardId The unique identifier of the card.
     */
    public function projectsUpdateCard(int $cardId): Response
    {
        return $this->connector->send(new ProjectsUpdateCard($cardId));
    }

    /**
     * @param  int  $cardId The unique identifier of the card.
     */
    public function projectsMoveCard(int $cardId): Response
    {
        return $this->connector->send(new ProjectsMoveCard($cardId));
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     */
    public function projectsGetColumn(int $columnId): Response
    {
        return $this->connector->send(new ProjectsGetColumn($columnId));
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     */
    public function projectsDeleteColumn(int $columnId): Response
    {
        return $this->connector->send(new ProjectsDeleteColumn($columnId));
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     */
    public function projectsUpdateColumn(int $columnId): Response
    {
        return $this->connector->send(new ProjectsUpdateColumn($columnId));
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     * @param  string  $archivedState Filters the project cards that are returned by the card's state.
     * @param  int  $page Page number of the results to fetch.
     */
    public function projectsListCards(int $columnId, ?string $archivedState, ?int $page): Response
    {
        return $this->connector->send(new ProjectsListCards($columnId, $archivedState, $page));
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     */
    public function projectsCreateCard(int $columnId): Response
    {
        return $this->connector->send(new ProjectsCreateCard($columnId));
    }

    /**
     * @param  int  $columnId The unique identifier of the column.
     */
    public function projectsMoveColumn(int $columnId): Response
    {
        return $this->connector->send(new ProjectsMoveColumn($columnId));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     */
    public function projectsGet(int $projectId): Response
    {
        return $this->connector->send(new ProjectsGet($projectId));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     */
    public function projectsDelete(int $projectId): Response
    {
        return $this->connector->send(new ProjectsDelete($projectId));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     */
    public function projectsUpdate(int $projectId): Response
    {
        return $this->connector->send(new ProjectsUpdate($projectId));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     * @param  string  $affiliation Filters the collaborators by their affiliation. `outside` means outside collaborators of a project that are not a member of the project's organization. `direct` means collaborators with permissions to a project, regardless of organization membership status. `all` means all collaborators the authenticated user can see.
     * @param  int  $page Page number of the results to fetch.
     */
    public function projectsListCollaborators(int $projectId, ?string $affiliation, ?int $page): Response
    {
        return $this->connector->send(new ProjectsListCollaborators($projectId, $affiliation, $page));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function projectsAddCollaborator(int $projectId, string $username): Response
    {
        return $this->connector->send(new ProjectsAddCollaborator($projectId, $username));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function projectsRemoveCollaborator(int $projectId, string $username): Response
    {
        return $this->connector->send(new ProjectsRemoveCollaborator($projectId, $username));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     * @param  string  $username The handle for the GitHub user account.
     */
    public function projectsGetPermissionForUser(int $projectId, string $username): Response
    {
        return $this->connector->send(new ProjectsGetPermissionForUser($projectId, $username));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     * @param  int  $page Page number of the results to fetch.
     */
    public function projectsListColumns(int $projectId, ?int $page): Response
    {
        return $this->connector->send(new ProjectsListColumns($projectId, $page));
    }

    /**
     * @param  int  $projectId The unique identifier of the project.
     */
    public function projectsCreateColumn(int $projectId): Response
    {
        return $this->connector->send(new ProjectsCreateColumn($projectId));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  string  $state Indicates the state of the projects to return.
     * @param  int  $page Page number of the results to fetch.
     */
    public function projectsListForRepo(string $owner, string $repo, ?string $state, ?int $page): Response
    {
        return $this->connector->send(new ProjectsListForRepo($owner, $repo, $state, $page));
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     */
    public function projectsCreateForRepo(string $owner, string $repo): Response
    {
        return $this->connector->send(new ProjectsCreateForRepo($owner, $repo));
    }

    public function projectsCreateForAuthenticatedUser(): Response
    {
        return $this->connector->send(new ProjectsCreateForAuthenticatedUser());
    }

    /**
     * @param  string  $username The handle for the GitHub user account.
     * @param  string  $state Indicates the state of the projects to return.
     * @param  int  $page Page number of the results to fetch.
     */
    public function projectsListForUser(string $username, ?string $state, ?int $page): Response
    {
        return $this->connector->send(new ProjectsListForUser($username, $state, $page));
    }
}
