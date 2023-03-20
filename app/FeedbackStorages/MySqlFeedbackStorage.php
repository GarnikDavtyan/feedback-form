<?php

namespace App\FeedbackStorages;

use App\Models\Feedback;

class MySqlFeedbackStorage implements IFeedbackStorage 
{
  public function save(array $data): void
  {
    Feedback::create($data);
  }
}