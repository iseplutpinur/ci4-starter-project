<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as BaseModel;

class UserModel extends BaseModel
{
    const ORDERABLE = ['username', 'full_name', 'email', 'created_at'];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder = $this->builder()
            ->select('id, username, full_name, email, active, created_at');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
            ->like('username', $search)
            ->orLike('full_name', $search)
            ->orLike('email', $search)
            ->groupEnd();

        return $condition->where('deleted_at', null);
    }
}
