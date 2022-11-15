<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Support\Facades\Lang;

class Collection extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'amount',
        'cover',
        'active',
    ];

    protected $table = 'collections';
    protected $primaryKey = 'id';

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function images() {
        return $this->belongsToMany(Image::class)->withTimestamps();
        //return $this->hasMany(Image::class)->withTimestamps();
    }

    public function getDiffInDaysAttribute() {
        if (!empty($this->created_at) && !empty($this->updated_at)) {
            return $this->updated_at->diffInDays($this->created_at);
        }
    }

    function timePassed($toCompareTimeStamp){
        $dateToCompare = new DateTime($toCompareTimeStamp);
        $currentDate = new DateTime("now");
        $dateDifference = $dateToCompare->diff($currentDate);

        $str = trans('dates.sentence_starts');
        $str .= ($dateDifference->invert == 1) ? ' / ' : '';

        if($dateDifference->y > 0){ // years
            $str .= trans_choice('dates.years', $dateDifference->y, ['value'   =>  $dateDifference->y]). ' ';
            //$str .= ($dateDifference->y > 1) ? $dateDifference->y . ' Years ' : $dateDifference->y . ' Year ';
        } if($dateDifference->m > 0){ // months
            $str .= trans_choice('dates.months', $dateDifference->m, ['value'   =>  $dateDifference->m]). ' ';
            //$str .= ($dateDifference->m > 1) ? $dateDifference->m . ' Months ' : $dateDifference->m . ' Month ';
        } if($dateDifference->d > 0){ // days
            $str .= trans_choice('dates.days', $dateDifference->d, ['value'   =>  $dateDifference->d]). ' ';
            //$str .= ($dateDifference->d > 1) ? $dateDifference->d . ' Days ' : $dateDifference->d . ' Day ';
        } if($dateDifference->h > 0){ // hours
            $str .= trans_choice('dates.hours', $dateDifference->h, ['value'   =>  $dateDifference->h]). ' ';
            //$str .= ($dateDifference->h > 1) ? $dateDifference->h . ' Hours ' : $dateDifference->h . ' Hour ';
        } if($dateDifference->i > 0){ // minutes
            $str .= trans_choice('dates.minutes', $dateDifference->i, ['value'   =>  $dateDifference->i]). ' ';
            //$str .= ($dateDifference->i > 1) ? $dateDifference->i . ' Minutes ' : $dateDifference->i . ' Minute ';
        } if($dateDifference->s > 0){ // seconds
            $str .= trans_choice('dates.seconds', $dateDifference->s, ['value'   =>  $dateDifference->s]);
            //$str .= ($dateDifference->s > 1) ? $dateDifference->s . ' Seconds ' : $dateDifference->s . ' Second ';
        }
        $str .= trans('dates.sentence_ends');

        return $str;
    }
}
