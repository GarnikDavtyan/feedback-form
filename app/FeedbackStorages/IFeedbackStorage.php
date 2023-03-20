<?php

namespace App\FeedbackStorages;

interface IFeedbackStorage 
{
  public function save(array $data): void;
}