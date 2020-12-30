<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// This is a model for my emails. I save all the created mails in my db.

class MailModel extends Model
{
    protected $table = 'MailTable';

    protected $fillable = ['sender','recipient','subject','content','attach_url','status'];
}
