<?php

namespace App\FeedbackStorages;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FileFeedbackStorage implements IFeedbackStorage 
{
  public function save(array $data): void 
  {
    $name = $data['name'];
    $now = Carbon::now()->format('YmdHi');
    $filename = "$name" . "_" . "$now.txt";

    Storage::put($filename, json_encode($data));
  }
}