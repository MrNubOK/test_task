<?php

namespace App\Services;

use App\User;

/**
 * Class UserService
 *
 * Service that hold all logic for user
 *
 * @package App\Services
 */
class UserService
{
    /**
     * This method return several users
     * for paginator
     *
     * @param int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getForPaginator($perPage = 10)
    {
        $columns = [
            'id',
            'name',
            'email',
        ];

        $users = User::query()
            ->orderByDesc('id')
            ->select($columns)
            ->with(['departments:id,name'])
            ->paginate($perPage);

        return $users;
    }

    /**
     * Update user data
     *
     * @param User  $user
     * @param array $data
     *
     * @return bool
     */
    public function update(User $user, array $data)
    {
        $this->isChangedPassword($data);
        return $user->update($data);
    }

    /**
     * This method check is changed password
     * Any effort to change password to send
     * an email notification
     *
     * It's just an example, i'm just trying
     * to entertain yourself))
     *
     * @param $data
     */
    private function isChangedPassword(&$data)
    {
        if (empty($data['password'])) {
            unset($data['password']);
        }
        else {
            //sent a message to email(in other method)
        }
    }
}
