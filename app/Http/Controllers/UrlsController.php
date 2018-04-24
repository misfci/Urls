<?php

namespace App\Http\Controllers;
use App\Url;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UrlsController extends Controller
{

  public function index(){
    // get all url for auth user
    $url = Url::all();
    return view('url.index', compact('url'));
  }

  public function show($id){
    // get specific url
    $url = Url::find($id);
    $url=[$url];
    return view('url.index', compact('url'));
  }

  public function create()
  {
    // get form to add url
    return view('url.add');
  }

  public function store(Request $request)
  {
    // to save entered url in database
    // validate for url must be url
    $this->validate($request, [
       'app_url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
       ]);
    $url = Url::create([
      'app_url' => $request->app_url,
      'user_id' => Auth::user()->id,
    ]);
      return  redirect('/urls/index');
  }

  public function edit($id)
  {
    // to get form for specific url to edit
    $url = Url::find($id);
    return view('url.edit' , compact('url'));
  }

  public function update($id , Request $request)
  {
    // to store editing in this url in database
    $this->validate($request, [
       'app_url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
       ]);
    $url = Url::find($id);
    $url->update([
        'app_url' => $request['app_url'],
    ]);

    return  redirect('/urls/index');
  }

  public function destroy($id)
  {
    // function to delete url
    $url = Url::find($id)->delete();
    return  redirect('/urls/index');
  }


}
