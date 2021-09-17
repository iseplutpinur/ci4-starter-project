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

    public function getStringGroups(int $userId)
    {
        $cache_name = user()->id . '_group_user_name';
        if (!$found = cache($cache_name)) {
            $found = $this->builder()
                ->select('name')
                ->join('auth_groups', 'users.group_id = auth_groups.id', 'left')
                ->where('users.id', $userId)
                ->get()
                ->getRowObject();
            if ($found != null) {
                $found = $found->name;
                cache()->save($cache_name, $found, 300);
            } else {
                cache()->delete($cache_name);
                $found = '';
            }
        }
        return $found;
    }
}
