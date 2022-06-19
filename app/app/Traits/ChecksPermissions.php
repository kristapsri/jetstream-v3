<?php

namespace App\Traits;

use App\Models\Contracts\AuthorizesTeam;
use App\Models\User;

trait ChecksPermissions
{
    /**
     * Checks from request parameters if current user has needed permissions
     *
     * @param string $permission
     * @return bool
     */
    public function userHasPermission(string $permission): bool
    {
        /** @var User $user */
        $user = auth()->user();
        if ($user === null || $user->currentTeam === null) {
            return false;
        }

        $team = $user->currentTeam;
        return $user->hasTeamPermission($team, $permission);
    }

    public function authorizeAction(AuthorizesTeam $instance, string $permission): bool
    {
        if (!$this->userHasPermission($permission)) {
            return false;
        }

        /** @var User $user */
        $user = auth()->user();
        return $this->isUserExceptional() || $instance->isOwnedByTeam($user->current_team_id);
    }
}
