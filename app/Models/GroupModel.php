<?php

namespace App\Models;

use Myth\Auth\Authorization\GroupModel as BaseModel;

/**
 * Class Group.
 */
class GroupModel extends BaseModel
{
    const ORDERABLE = [
        1 => 'name',
        2 => 'description',
    ];

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
            ->select('id, name, description');

        return empty($search)
            ? $builder
            : $builder->groupStart()
            ->like('name', $search)
            ->orLike('description', $search)
            ->groupEnd();
    }

    /**
     * Returns an array of all groups that a user is a member of.
     *
     * @param $userId
     *
     * @return object
     */
    public function getGroupsForUser(int $userId)
    {
        $group = $this->builder()
            ->join('auth_groups_users', 'auth_groups_users.group_id = auth_groups.id', 'left')
            ->where('user_id', $userId)
            ->get()
            ->getResultObject();

        $found = [];
        foreach ($group as $row) {
            $found[$row->id] = strtolower($row->name);
        }
        return $found;
    }

    public function getGroupsForUserStringOne(int $userId)
    {
        $cache_name = user()->id . '_group_user_name';
        if (!$found = cache($cache_name)) {
            $found = $this->builder()
                ->select('name')
                ->join('auth_groups_users', 'auth_groups_users.group_id = auth_groups.id', 'left')
                ->where('user_id', $userId)
                ->limit(1)
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
