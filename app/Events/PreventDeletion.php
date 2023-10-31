<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Portofolio;
use Illuminate\Support\Facades\DB;

class PreventDeletion
{
    use Dispatchable, SerializesModels;

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function handle()
    {
        // Ganti 'related_table' dengan nama tabel yang memiliki foreign key
        $relatedTable = 'portofolios';
        
        if (DB::table($relatedTable)->where('foreign_key', $this->model->id)->count() > 0) {
            throw new \Exception('Data memiliki relasi dan tidak dapat dihapus.');
        }
    }
}