<?php 

namespace App\Enums\Authorization;

enum Permissions: string
{
  // article crud permissions
  case EditArticles = 'edit articles';
  case CreateArticles = 'create articles';
  case PublishArticles = 'publish articles';
  case DeleteArticles = 'delete articles';
  case UnpublishArticles = 'unpublish articles';
  case ViewArticles = 'view articles';

  // user crud permissions
  case ViewUsersList = 'view users_list';
  case CreateUser = 'create user';
  case ViewUser = 'view user';
  case EditUser = 'edit user';
  case DeleteUser = 'delete user';

  // roles permissions
  case ViewRoles = 'view roles';
  case EditRole = 'edit role';
}