<?php 

namespace App\Enums\Authorization;

enum Roles: string
{
  case Superuser = 'superuser';
  case Admin = 'admin';
  case Manager = 'manager';
  case Customer = 'customer';
  case Guest = 'guest';
}