<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    //สำหรับ Mass Assignment
    protected $fillable = ['title', 'body', 'published_at', 'image'];

    //Make as Carbon Object
    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::parse($date)->subDay();
    }

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeUnpublished($query){
        $query->where('published_at', '>', Carbon::now());
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        //เพิ่ม withTimestamps() เพื่อให้ระบบอัพเดทค่าอัตโนมัติ
        Return $this->belongsToMany('App\Tag')->withTimestamps();;
    }

    public function getTagListAttribute(){
        //ถ้าใน C# ที่ทำ DTO ห่้อย DTO แล้วตัว ORM จะไป Fetch มาใส่ให้
        return $this->tags->pluck('id');
    }
}
