<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Url;
use App\Stat;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $stat = Stat::where('page_views', '>=', 0)->first();
      $stat->page_views = $stat->page_views + 1;
      $stat->save();

      return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
      $v = \Validator::make($request->all(), [
        'url' => 'required|url'
      ]);

      if ($v->fails()) {
        return redirect()->back()->withErrors($v->errors());
      }
      else {
        $new_url = new Url;
        $new_url->long_url = $request->url;

        while (true) {
          $generated = \Illuminate\Support\Str::random(4);

          $url_validation = \Validator::make([], [
            $generated => 'unique:urls'
          ]);

          if (!$url_validation->fails()) {
            $new_url->short_url = \Illuminate\Support\Str::random(4);
            break;
          }
        }

        $new_url->save();

        $stat = Stat::where('links_created', '>=', 0)->first();
        $stat->links_created = $stat->links_created + 1;
        $stat->save();
      }

      return redirect('/')->with('url', $new_url->short_url);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
