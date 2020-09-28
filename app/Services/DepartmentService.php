<?php

namespace App\Services;

use App\Models\Department;

/**
 * Class UserService
 *
 * Service that hold all logic for departments
 *
 * @package App\Services
 */
class DepartmentService
{
    /**
     * This method return several departments
     * for paginator
     *
     * @param int $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getForPaginator($perPage = 4)
    {
        $columns = [
            'id',
            'name',
            'description',
            'logo'
        ];

        $departments = Department::query()
            ->orderByDesc('id')
            ->select($columns)
            ->with(['users:id,name'])
            ->paginate($perPage);

        return $departments;
    }
}
