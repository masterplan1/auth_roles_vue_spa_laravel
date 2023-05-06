<?php 

namespace App\Enums\Authorization;

enum Permissions: string
{
  case EditArticles = 'edit articles';
  case CreateArticles = 'create articles';
  case PublishArticles = 'publish articles';
  case DeleteArticles = 'delete articles';
  case UnpublishArticles = 'unpublish articles';
  case ViewArticles = 'view articles';
}