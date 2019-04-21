<?php
/**
 * Created by PhpStorm.
 * User: BASMA
 * Date: 4/14/2019
 * Time: 2:49 PM
 */

namespace App\Http\Controllers\API;

use App\Doctors;
use Illuminate\Support\Facades\Lang;
use App\Cateory;
use App\City;
use App\UserWeb;

class SearchController extends Controller_Default
{
    public function search($SpecialId, $CityId, $StateId, $docname)
    {
        $allCity = City::all();
        $allCateory = Cateory::all();
        foreach ($allCateory as $data)
        {
            $nameArr = json_decode($data->name , true);
//            dd($nameArr);
            $data->name = $nameArr[Lang::getLocale()];
        }
        $allDoctor = UserWeb::where('type' , 1);
//            $query = UserWeb::select('*')->where('type' , 1)->paginate(5);
        if ($SpecialId && is_numeric($SpecialId)) {
            $docData = Doctors::select('userId')->Where('SpecialId' , $SpecialId)->get();
            //dd($docData);
            /*$Ides=array();
            foreach($docData as $docitems){
                $ides[]=$docitems->userId;

            }*/
            $allDoctor = $allDoctor->whereIn('id',$docData->pluck('userId')->all());

        }

        if ($docname && $docname != null) {
            $allDoctor = $allDoctor->where('name', 'like', '%' . $docname . '%');
        }

        if ($CityId && is_numeric($CityId)) {
            $allDoctor = $allDoctor->where('cityId',$CityId);
        }
        if ($StateId && is_numeric($StateId)) {
            $allDoctor = $allDoctor->where('stateId',$StateId);
        }

//            $allDoctor=$allDoctor::take(5)->get();
//            $news = News::take(5)->get();

//            dd($allDoctor->get());
        $allDoctor = $allDoctor->paginate(5);
        return self::ResponseAPI(200, 'success', [$allDoctor,$allCity,$allDoctor]);
    }
}