<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acl_model extends CI_Model {

	// --------------------------------------------------------------------

	/**
	 * Get current user by session info
	 * @param   int $userId
	 * @return  array
	 */
	public function getUserRoleId($userId = 0)
	{
	    $query = $this->db->select("u.{$this->acl->getAclConfig('acl_users_fields')['role_id']} as role_id")
			->from($this->acl->getAclConfig('acl_table_users').' u')
			->where("u.{$this->acl->getAclConfig('acl_users_fields')['id']}", $userId)
			->get();

		// User was found
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();

			return $row['role_id'];
		}

		// No role
		return 0;
	}

	// --------------------------------------------------------------------

	/**
	 * Get permissions from database for  particular role
	 *
	 * @param   int $roleId
	 * @return  array
	 */
	public function getRolePermissions($roleId = 0)
	{
	    $query = $this->db->select([
    	        "p.{$this->acl->getAclConfig('acl_permissions_fields')['action']} as action",
    	        "r.{$this->acl->getAclConfig('acl_resources_fields')['controller']} as controller"
            ])
			->from($this->acl->getAclConfig('acl_table_permissions').' p')
			->join($this->acl->getAclConfig('acl_table_resources').' r', "p.{$this->acl->getAclConfig('acl_permissions_fields')['resource_id']} = r.{$this->acl->getAclConfig('acl_resources_fields')['id']}")
			->join($this->acl->getAclConfig('acl_table_role_permissions').' rp', "rp.{$this->acl->getAclConfig('acl_role_permissions_fields')['permission_id']} = p.{$this->acl->getAclConfig('acl_permissions_fields')['id']}")
			->where("rp.{$this->acl->getAclConfig('acl_role_permissions_fields')['role_id']}", $roleId)
			->get();

		$permissions = array();

		// Add to the list of permissions
		foreach ($query->result_array() as $row)
		{
			$permissions[] = strtolower($row['controller'] . '/' . $row['action']);
		}

		return $permissions;
	}


	public function insertAllUserPermissions($id, $role, $company_id, $vendorId)
	{
		$permisions = $this->getAllPermissionsByRole($role);
    $permissionArr = array();
    foreach ($permisions as $key => $value) {
      $permissionArr[] = array(
        'role_id' => $role,
        'user_id' => $id,
        'permission_id' => $value->id,
        'permission' => $value->permission,
        'company_id' => $company_id,
        'created_by' => $vendorId
      );
    }

    if (count($permissionArr) > 0) {
      return $this->db->insert_batch('tbl_permissions_role', $permissionArr);
    }else {
    	return FALSE;
    }
	}



	public function getAccessPermissions($userId, $permission)
	{
		$this->db->select('*');
		$this->db->from('tbl_permissions_role');
		$this->db->where('user_id', $userId);
		$this->db->where('permission', $permission);
		$query = $this->db->get();
		$result = $query->result();
		if ($query->num_rows() > 0) {
			return $result[0];
		}else {
			return NULL;
		}
	}



   public function getAllPermissionsByRole($roleId='')
   {
     $this->db->select('*');
     $this->db->from('tbl_permissions');
     $this->db->where('role_id', $roleId);
     $query = $this->db->get();
     $result = $query->result();
     return $result;
   }

   public function getUserPermissions($userId='')
   {
     $this->db->select('*');
     $this->db->from('tbl_permissions_role');
     $this->db->where('user_id', $userId);
     $query = $this->db->get();
     $result = $query->result();
     return $result;
   }

   public function updatePermissions($userId, $id, $tempArr)
   {
     $this->db->where('user_id', $userId);
     $this->db->where('id', $id);
     return $this->db->update('tbl_permissions_role', $tempArr);
   }

	 public function hasAccess($userId, $permission, $action)
	 {
	 		$this->db->select('*');
	 		$this->db->from('tbl_permissions_role');
	 		$this->db->where('user_id', $userId);
	 		$this->db->where('permission', $permission);
	 		$this->db->where($action, 1);
	 		$query = $this->db->get();
	 		$result = $query->result();
	 		if ($query->num_rows() > 0) {
	 			return TRUE;
	 		}else {
	 			return FALSE;
	 		}
	 	}

	 public function isActiveUser($userId)
	 {
	 		$this->db->select('*');
	 		$this->db->from('tbl_users');
	 		$this->db->where('status', 1);
	 		$this->db->where('userId', $userId);
	 		$query = $this->db->get();
	 		$result = $query->result();
	 		if ($query->num_rows() > 0) {
	 			return TRUE;
	 		}else {
	 			return FALSE;
	 		}
	 	}

}
