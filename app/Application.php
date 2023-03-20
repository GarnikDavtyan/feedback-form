<?php

namespace App;

use App\Factories\FeedbackStorageFactory;
use Illuminate\Support\Facades\Config;

class Application
{
    private $name;
    private $phone;
    private $feedback;

    public function __construct(string $name, string $phone, string $feedback)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->feedback = $feedback;
    }

    public function save() : void
    {
        $storages = Config::get('feedback_storage.used_storages');

        foreach($storages as $type) {
            $storage = FeedbackStorageFactory::createStorage($type);
            
            $storage->save($this->toArray());
        }
    }

    public function toArray() : array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'feedback' => $this->feedback,
        ];
    }
}