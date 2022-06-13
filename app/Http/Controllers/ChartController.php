<?php

namespace App\Http\Controllers;

use App\Chart;
use Illuminate\Http\Request;
use App\Order;
use App\Dish;
use Illuminate\Support\Facades\Auth;
use DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get users grouped by age
        $groups = Order::where('user_id',Auth::id())->groupBy('delivery_time')->sum('total_price');

        // $groups = array_unique($groups);
        $dishes = Dish::where('user_id',Auth::id())->get()->all();

        $dishesChart = Dish::where('user_id',Auth::id())->pluck('name');

        foreach ($dishes as $dish) {
            $quantity[] = DB::table('dish_order')->where('dish_id', $dish->id)->sum('quantity');
        }
        
        // Generate random colours for the groups
        for ($i=0; $i<=count($dishes); $i++) {
        $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        // Prepare the data for returning with the view
        $chart = new Chart;
        $chart->labels = ($dishesChart);
        $chart->dataset = ($quantity);
        $chart->colours = $colours;
        return view('admin.charts.index', compact('chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
