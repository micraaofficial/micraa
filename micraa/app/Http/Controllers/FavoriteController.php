<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{

public function toggle($service_id)
{

$user = auth()->user();

$favorite = Favorite::where('user_id',$user->id)
->where('service_id',$service_id)
->first();

if($favorite){
$favorite->delete();
}else{
Favorite::create([
'user_id'=>$user->id,
'service_id'=>$service_id
]);
}

return back();

}

}
