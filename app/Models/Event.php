<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Mail\EventCreation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Contracts\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    protected $table = "events";

    protected $fillable = ['name', 'slug', 'start_at', 'end_at', 'updated_at'];

    public function sendNotificationEmail()
    {
        Mail::to(config('mail.notification_recipient'))->queue(new EventCreation($this));
    }
}
