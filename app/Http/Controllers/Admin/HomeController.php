<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Governorate;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Type;
use App\Models\User;
use DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{
    public function index()
       {
          $drivers_count = User::where('type','driver')->count();
          $cars_count = Car::count();
          $users_count = User::where('type','user')->count();
          $orders_count = Order::count();
          $types_count = Type::count();
          $governorates_count = Governorate::count();
          $offers_count = Offer::count();

          $chart_options = [
            'chart_title' => 'Orders by days',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'carrying_date',
            'group_by_period' => 'day',
            'chart_type' => 'line',

        ];


        $chart1 = new LaravelChart($chart_options);

            return view('admin.index',compact('drivers_count','cars_count','users_count','orders_count','types_count','governorates_count','offers_count','chart1'));
       }
    
}
