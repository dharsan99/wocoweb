<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//$route['default_controller'] = "login";


$route['default_controller']  = "Welcome";
$route['404_override']        = 'error_404';


/*********** WEBSITE ROUTES START *******************/
$route['contactus']           = "Welcome/contactus";
$route['privacy-policy']      = "Welcome/privacyPolicy";
$route['test']                = "Welcome/test";
$route['app']                 = "Welcome/app";
$route['dashboard']           = "Welcome/dashboard";
$route['test/chartjs']        = "Chartjs/chartjs";
$route['verify-email'] = "Login/verifyEmail";

/************ WEBSITE ROUTES END *******************/

/*********** SUPER ADMIN ROUTES START *******************/
$route['accessDenied']                = "Login/accessDenied";
$route['pageNotFound']                = "Login/pageNotFound";
$route['master']                      = "Login/masterLogin";
$route['master/company']              = "master/company/index";
$route['master/company/(:num)']       = "master/company/index/$1";
$route['master/company/add']          = "master/company/addNew";
$route['master/company/addCompany']   = "master/company/addNewCompany";
$route['master/company/edit/(:num)']  = "master/company/edit/$1";
$route['master/company/editCompany/(:num)']  = "master/company/editCompany/$1";
$route['master/company/delete/(:num)']= "master/company/deleteCompany/$1";
$route['master/company/block/(:num)'] = "master/company/blockCompany/$1";
$route['master/company/active/(:num)']= "master/company/activeCompany/$1";
$route['master/admin/delete/(:num)']  = "master/admin/deleteAdmin/$1";
$route['master/admin/block/(:num)']   = "master/admin/blockAdmin/$1";
$route['master/admin/unblock/(:num)'] = "master/admin/unblockAdmin/$1";
$route['master/admin']                = "master/admin/index";
$route['master/admin/getListData']    = "master/admin/getListData";
$route['master/admin/add']            = "master/admin/addNew";
$route['master/admin/edit/(:num)']    = "master/admin/editAdmin/$1";
$route['master/admin/company-search'] = "master/admin/companySearch";

$route['master/permission']           = "master/permission/index";
$route['master/permission/add']       = "master/permission/addNew";
$route['master/permission/getListData']             = "master/permission/getListData";
$route['master/permission/editPermission/(:num)']   = "master/permission/editPermission/$1";
$route['master/permission/delete/(:num)']           = "master/permission/deletePermission/$1";

/************* SUPER ADMIN ROUTES END *******************/

/*********** ADMIN ROUTES START *******************/
$route['admin']                         = "Login/adminLogin";
$route['admin/switch-mode/(:num)']      = "Login/adminSwitchMode/$1";

$route['admin/subadmin']                = "admin/subadmin";
$route['admin/subadmin/getListData']    = "admin/subadmin/getSubAdminList";
$route['admin/subadmin/delete/(:num)']  = "admin/subadmin/deleteAdmin/$1";
$route['admin/subadmin/block/(:num)']   = "admin/subadmin/blockAdmin/$1";
$route['admin/subadmin/unblock/(:num)'] = "admin/subadmin/unblockAdmin/$1";
$route['admin/subadmin/add']            = "admin/subadmin/addNew";
$route['admin/subadmin/edit/(:num)']    = "admin/subadmin/editAdmin/$1";


$route['admin/department']                = "admin/department";
$route['admin/department/getListData']    = "admin/department/getDepartmentList";
$route['admin/department/delete/(:num)']  = "admin/department/deleteDepartment/$1";
$route['admin/department/block/(:num)']   = "admin/department/blockDepartment/$1";
$route['admin/department/unblock/(:num)'] = "admin/department/unblockDepartment/$1";
$route['admin/department/add']            = "admin/department/addNew";
$route['admin/department/edit/(:num)']    = "admin/department/editDepartment/$1";



$route['admin/designation']                = "admin/designation";
$route['admin/designation/getListData']    = "admin/designation/getDesignationList";
$route['admin/designation/delete/(:num)']  = "admin/designation/deleteDesignation/$1";
$route['admin/designation/block/(:num)']   = "admin/designation/blockDesignation/$1";
$route['admin/designation/unblock/(:num)'] = "admin/designation/unblockDesignation/$1";
$route['admin/designation/add']            = "admin/designation/addNew";
$route['admin/designation/edit/(:num)']    = "admin/designation/editDesignation/$1";



$route['admin/emptype']                = "admin/emptype";
$route['admin/emptype/getListData']    = "admin/emptype/getEmptypeList";
$route['admin/emptype/delete/(:num)']  = "admin/emptype/deleteEmptype/$1";
$route['admin/emptype/block/(:num)']   = "admin/emptype/blockEmptype/$1";
$route['admin/emptype/unblock/(:num)'] = "admin/emptype/unblockEmptype/$1";
$route['admin/emptype/add']            = "admin/emptype/addNew";
$route['admin/emptype/edit/(:num)']    = "admin/emptype/editEmptype/$1";

$route['admin/empstatus']                = "admin/empstatus";
$route['admin/empstatus/getListData']    = "admin/empstatus/getEmpstatusList";
$route['admin/empstatus/delete/(:num)']  = "admin/empstatus/deleteEmpstatus/$1";
$route['admin/empstatus/block/(:num)']   = "admin/empstatus/blockEmpstatus/$1";
$route['admin/empstatus/unblock/(:num)'] = "admin/empstatus/unblockEmpstatus/$1";
$route['admin/empstatus/add']            = "admin/empstatus/addNew";
$route['admin/empstatus/edit/(:num)']    = "admin/empstatus/editEmpstatus/$1";


$route['admin/empgrade']                = "admin/empgrade";
$route['admin/empgrade/getListData']    = "admin/empgrade/getEmpgradeList";
$route['admin/empgrade/delete/(:num)']  = "admin/empgrade/deleteEmpgrade/$1";
$route['admin/empgrade/block/(:num)']   = "admin/empgrade/blockEmpgrade/$1";
$route['admin/empgrade/unblock/(:num)'] = "admin/empgrade/unblockEmpgrade/$1";
$route['admin/empgrade/add']            = "admin/empgrade/addNew";
$route['admin/empgrade/edit/(:num)']    = "admin/empgrade/editEmpgrade/$1";


$route['admin/leavetype']                = "admin/leavetype";
$route['admin/leavetype/getListData']    = "admin/leavetype/getLeavetypeList";
$route['admin/leavetype/delete/(:num)']  = "admin/leavetype/deleteLeavetype/$1";
$route['admin/leavetype/block/(:num)']   = "admin/leavetype/blockLeavetype/$1";
$route['admin/leavetype/unblock/(:num)'] = "admin/leavetype/unblockLeavetype/$1";
$route['admin/leavetype/add']            = "admin/leavetype/addNew";
$route['admin/leavetype/edit/(:num)']    = "admin/leavetype/editLeavetype/$1";


$route['admin/office']                = "admin/office";
$route['admin/office/getListData']    = "admin/office/getofficeList";
$route['admin/office/delete/(:num)']  = "admin/office/deleteoffice/$1";
$route['admin/office/block/(:num)']   = "admin/office/blockoffice/$1";
$route['admin/office/unblock/(:num)'] = "admin/office/unblockoffice/$1";
$route['admin/office/add']            = "admin/office/addNew";
$route['admin/office/edit/(:num)']    = "admin/office/edit/$1";

$route['admin/feedback']                = "admin/feedback";
$route['admin/feedback/getListData']    = "admin/feedback/getFeedbackList";
$route['admin/feedback/delete/(:num)']  = "admin/feedback/deleteFeedback/$1";
$route['admin/feedback/block/(:num)']   = "admin/feedback/blockFeedback/$1";
$route['admin/feedback/unblock/(:num)'] = "admin/feedback/unblockFeedback/$1";
$route['admin/feedback/add']            = "admin/feedback/addNew";
$route['admin/feedback/edit/(:num)']    = "admin/feedback/edit/$1";

$route['admin/shift']                = "admin/shift";
$route['admin/shift/getListData']    = "admin/shift/getshiftList";
$route['admin/shift/delete/(:num)']  = "admin/shift/deleteshift/$1";
$route['admin/shift/block/(:num)']   = "admin/shift/blockshift/$1";
$route['admin/shift/unblock/(:num)'] = "admin/shift/unblockshift/$1";
$route['admin/shift/add']            = "admin/shift/addNew";
$route['admin/shift/edit/(:num)']    = "admin/shift/edit/$1";


$route['admin/location']                = "admin/location";
$route['admin/location/getListData']    = "admin/location/getLocationList";
$route['admin/location/delete/(:num)']  = "admin/location/deleteLocation/$1";
$route['admin/location/block/(:num)']   = "admin/location/blockLocation/$1";
$route['admin/location/unblock/(:num)'] = "admin/location/unblockLocation/$1";
$route['admin/location/add']            = "admin/location/addNew";
$route['admin/location/edit/(:num)']    = "admin/location/edit/$1";



/************* ADMIN ROUTES END *******************/


/*********** HR ROUTES START *******************/
$route['hr']                               = "Login/hrLogin";
$route['hr/employee']                      = "hr/employee/userListing";
$route['hr/employee/(:num)']               = "hr/employee/userListing/$1";
$route['hr/employee/getCardData/(:num)']   = "hr/employee/getEmployeeCard/$1";
$route['hr/employee/profile/(:num)']       = "hr/employee/profile/$1";
$route['hr/employee/getListData']          = "hr/employee/getEmployeeList";
$route['hr/employee/delete/(:num)']        = "hr/employee/deleteEmployee/$1";
$route['hr/employee/block/(:num)']         = "hr/employee/blockEmployee/$1";
$route['hr/employee/unblock/(:num)']       = "hr/employee/unblockEmployee/$1";
$route['hr/employee/add']                  = "hr/employee/addNew";
$route['hr/employee/grid']                 = "hr/employee/listView";
$route['hr/employee/addNew']               = "hr/employee/addNewEmployee";
$route['hr/employee/edit/(:num)']          = "hr/employee/edit/$1";
$route['hr/employee/edit-hierarchy/(:num)']= "hr/employee/editHierarchy/$1";
$route['hr/employee/requests/(:num)']      = "hr/employee/getRequest/$1";
$route['hr/employee/attendance/(:num)']    = "hr/employee/getAttendanceData/$1";
$route['hr/employee/attendance-approve/(:num)']     = "hr/employee/approveAttendance/$1";
$route['hr/employee/attendance-reject/(:num)']      = "hr/employee/rejectAttendance/$1";
$route['hr/employee/p-manager-search/(:num)']       = "hr/employee/searchPrimaryManger/$1";
$route['hr/employee/s-manager-search/(:num)/(:num)']= "hr/employee/searchSecondryManger/$1/$2";


$route['hr/employee/p-manager-search']       = "hr/employee/searchPrimaryManger";
$route['hr/employee/s-manager-search/(:num)']= "hr/employee/searchSecondryManger/$1";


$route['hr/hr']                      = "hr/hr";
$route['hr/hr/getListData']          = "hr/hr/getHrList";
$route['hr/hr/delete/(:num)']        = "hr/hr/deleteHr/$1";
$route['hr/hr/block/(:num)']         = "hr/hr/blockHr/$1";
$route['hr/hr/unblock/(:num)']       = "hr/hr/unblockHr/$1";
$route['hr/hr/create']               = "hr/hr/createNew";
$route['hr/hr/add']                  = "hr/hr/addNew";
$route['hr/hr/edit/(:num)']          = "hr/hr/edit/$1";
$route['hr/hr/employee-search']      = "hr/hr/employeeSearch";

$route['hr/manager']                      = "hr/manager";
$route['hr/manager/getListData']          = "hr/manager/getManagerList";
$route['hr/manager/delete/(:num)']        = "hr/manager/deleteManager/$1";
$route['hr/manager/block/(:num)']         = "hr/manager/blockManager/$1";
$route['hr/manager/unblock/(:num)']       = "hr/manager/unblockManager/$1";
$route['hr/manager/add']                  = "hr/manager/addNew";
$route['hr/manager/create']               = "hr/manager/createNew";
$route['hr/manager/edit/(:num)']          = "hr/manager/edit/$1";
$route['hr/manager/employee-search']      = "hr/manager/employeeSearch";


$route['hr/hierarchy/(:num)']             = "hr/hierarchy";
$route['hr/hierarchy/tree/(:num)/(:num)'] = "hr/hierarchy/getManagerTree/$1/$2";
$route['hr/hierarchy/manager-search']     = "hr/hierarchy/searchManager";



$route['hr/team']                = "hr/team";
$route['hr/team/getListData']    = "hr/team/getTeamList";
$route['hr/team/delete/(:num)']  = "hr/team/deleteTeam/$1";
$route['hr/team/block/(:num)']   = "hr/team/blockTeam/$1";
$route['hr/team/unblock/(:num)'] = "hr/team/unblockTeam/$1";
$route['hr/team/add']            = "hr/team/addNew";
$route['hr/team/edit/(:num)']    = "hr/team/editTeam/$1";
$route['hr/team/getusers/(:num)']    = "hr/team/getuserbydeaprtmentid/$1";
$route['hr/team/manager-search']     = "hr/team/searchManager";



$route['hr/leaves']                = "hr/leaves";
$route['hr/leaves/getListData']    = "hr/leaves/getLeavesList";
$route['hr/leaves/delete/(:num)']  = "hr/leaves/deleteLeaves/$1";
$route['hr/leaves/block/(:num)']   = "hr/leaves/blockLeaves/$1";
$route['hr/leaves/unblock/(:num)'] = "hr/leaves/unblockLeaves/$1";
$route['hr/leaves/add']            = "hr/leaves/addNew";
$route['hr/leaves/edit/(:num)']    = "hr/leaves/editLeaves/$1";


$route['hr/notification']                = "hr/notification";
$route['hr/notification/getListData']    = "hr/notification/getNotificationList";
$route['hr/notification/delete/(:num)']  = "hr/notification/deleteNotification/$1";
$route['hr/notification/block/(:num)']   = "hr/notification/blockNotification/$1";
$route['hr/notification/unblock/(:num)'] = "hr/notification/unblockNotification/$1";
$route['hr/notification/add']            = "hr/notification/addNew";
$route['hr/notification/edit/(:num)']    = "hr/notification/editNotification/$1";


$route['hr/leaverequest']                = "hr/leaverequest";
$route['hr/leaverequest/getListData']    = "hr/leaverequest/getLeaverequestList";
$route['hr/leaverequest/delete/(:num)']  = "hr/leaverequest/deleteLeaverequest/$1";
$route['hr/leaverequest/block/(:num)']   = "hr/leaverequest/blockLeaverequest/$1";
$route['hr/leaverequest/unblock/(:num)'] = "hr/leaverequest/unblockLeaverequest/$1";
$route['hr/leaverequest/add']            = "hr/leaverequest/addNew";
$route['hr/leaverequest/edit/(:num)']    = "hr/leaverequest/editLeaverequest/$1";


$route['hr/reports']                = "hr/reports";
$route['hr/reports/getListData']    = "hr/reports/getReportsList";
$route['hr/reports/delete/(:num)']  = "hr/reports/deleteReports/$1";
$route['hr/reports/block/(:num)']   = "hr/reports/blockReports/$1";
$route['hr/reports/unblock/(:num)'] = "hr/reports/unblockReports/$1";
$route['hr/reports/add']            = "hr/reports/addNew";
$route['hr/reports/edit/(:num)']    = "hr/reports/editReports/$1";


$route['hr/attendance']                = "hr/attendance";
$route['hr/attendance/getListData']    = "hr/attendance/getAttendanceList";
$route['hr/attendance/delete/(:num)']  = "hr/attendance/deleteAttendance/$1";
$route['hr/attendance/getusers/(:num)']    = "hr/attendance/getuserbydeaprtmentid/$1";

/************* HR ROUTES END *******************/



/************* API ROUTES END *******************/
$route['cornjob']                 = "api/authentication/cornjob";
$route['api']                     = "api/authentication/index";
$route['api/login']               = "api/authentication/login";
$route['api/logout']              = "api/authentication/logout";
$route['api/change-password']     = "api/authentication/changePassword";
$route['api/save-feedback']       = "api/authentication/saveFeedBack";
$route['api/rate-day']            = "api/authentication/saveRateDay";
$route['api/update-profile']      = "api/authentication/updateProfile";
$route['api/profile-data']        = "api/authentication/getProfileData";
$route['api/validate-user']       = "api/authentication/validateUser";
$route['api/checkin']             = "api/attendance/checkInUser";
$route['api/checkin-offsite']     = "api/attendance/checkInUserOffSite";
$route['api/checkout']            = "api/attendance/checkOutUser";
$route['api/update-attendance']   = "api/attendance/updateAttendance";
$route['api/trail-data']          = "api/attendance/getTrailData";
$route['api/home-data']           = "api/attendance/getHomeNewData";
$route['api/location-data']       = "api/authentication/getLocationData";


$route['api-tab']                 = "api/api_tab/index";
$route['api-tab/auth']            = "api/api_tab/index";
$route['api-tab/employee_data']   = "api/api_tab/searchEmployee";
$route['api-tab/checkin_data']    = "api/api_tab/getCheckInData";
$route['api-tab/checkin']         = "api/api_tab/getCheckIn";
$route['api-tab/checkout']        = "api/api_tab/getCheckOut";
$route['api-tab/login']           = "api/api_tab/login";
$route['api-tab/logout']          = "api/api_tab/logout";
/************* API ROUTES END *******************/



/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'login/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
