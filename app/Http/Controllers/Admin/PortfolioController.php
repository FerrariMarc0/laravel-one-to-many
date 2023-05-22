<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $data = $request->validated();

        $portfolio = new Portfolio();
        $portfolio->fill($data);

        $portfolio->slug = Str::slug($data['name']);

        if(isset($data['image'])){
            $portfolio->image = Storage::put('uploads', $data['image']);
        }

        $portfolio->save();

        return to_route('admin.portfolios.index')->with('message', 'Hai inserito un nuovo progetto!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfolioRequest  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {

        $data = $request->validated();
        $portfolio->slug = Str::slug($data['name']);

        if(empty($data['set_image'])){
            if($portfolio->image){
                Storage::delete($portfolio->image);
                $portfolio->image = null;
            }
            } else {
                if(isset($data['image'])){

                    if($portfolio->image){
                        Storage::delete($portfolio->image);
                    }
                    $portfolio->image = Storage::put('uploads', $data['image']);
                }
            }


        $portfolio->update($data);

        return to_route('admin.portfolios.index')->with('message', "Progetto $portfolio->id aggiornato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $old_id = $portfolio->id;

        if($portfolio->image) {
            Storage::delete($portfolio->image);
        }

        $portfolio->delete();
        return to_route('admin.portfolios.index')->with('message', "Progetto $old_id eliminato!");
    }
}
