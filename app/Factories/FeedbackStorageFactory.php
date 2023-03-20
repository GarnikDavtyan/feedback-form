<?php

namespace App\Factories;

use App\FeedbackStorages\FileFeedbackStorage;
use App\FeedbackStorages\IFeedbackStorage;
use App\FeedbackStorages\MySqlFeedbackStorage;
use App\Helpers\FeedbackStorageTypeHelper;
use Exception;

class FeedbackStorageFactory 
{
  public static function createStorage($type) : IFeedbackStorage
  {
    switch ($type) {
      case FeedbackStorageTypeHelper::MYSQL:
        return new MySqlFeedbackStorage();

      case FeedbackStorageTypeHelper::FILE:
        return new FileFeedbackStorage();

      default:
        throw new Exception("Invalid storage type: $type");
    }
  }
}