<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentUpload extends Model
{
    protected $table = 'document_uploads';
    //
    protected $fillable = [
        'value', 'user_id'
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
