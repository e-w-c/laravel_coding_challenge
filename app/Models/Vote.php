<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ]; 

    public static function castVote($data)
    {
        $name = strtolower(implode(' *',str_split(str_replace(' ','',$data['name']))));

        $record = self::select('id')
            ->whereRaw('lower(name) regexp (?)',[$name])
            ->first();

        if (is_Null($record)) {
            self::create($data);  
        } else {
            self::find($record['id'])
                ->update(['image_id'=>$data['image_id']]);
        }
    }

    public static function getResults($field)
    {
        $results = self::select('name', 'image_id')
            ->orderBy($field)
            ->get(); 

        return $results;
    }
}
