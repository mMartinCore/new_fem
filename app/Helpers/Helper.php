<?php
namespace App\Helpers;

class Helper
{
    public static function IDGenerator($model, $trow, $length = 6, $prefix)
    {
            try {
                
        $data = $model::orderBy('id', 'desc')->first();
        if (!$data) {
            $og_length = $length;
            $last_number = '';
        } else {
            $code = substr($data->$trow, strlen($prefix)+1);
            $code=(int)$code;
            $actial_last_number = ($code/1)*1;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i=0;$i<$og_length;$i++) {
            $zeros.="0";
        }
        return $prefix.$zeros.$last_number;
            } catch (\Throwable $th) {
                return back()->with('error', $th->getMessage());  
            }

        // return $prefix.'-'.$zeros.$last_number;


        //         if($last_number_length>$length){$og_length=0;}
        // else{$og_length=$length-$last_number_length;}
        //     }
    }
}