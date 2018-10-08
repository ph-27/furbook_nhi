<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Furbook\Http\Requests\CatRequest;
Route::get('/',function () {
	
	return redirect('cats');
});
Route::get('/cats',function () {
	$cats = Furbook\Cat::orderBy('created_at','DESC')->get();
	return view('cats.index')->with('cats',$cats);
}) -> name('cat.index');

Route::get('/cats/breeds/{name}', function ($name){
	$breed = Furbook\Breed::where('name', $name) -> first();
	$cats = $breed ->cats;
	return view('cats.index', compact('breed', 'cats'));
}) -> name('cat.breed');


Route::get('/cats/{id}', function ($id){
	return 'Show detail of cat #' .$id;
}) -> name('cat.show')-> where('id','[0-9]+');

Route::get('/cats/create', function() {
	
	$breed = Furbook\Breed::pluck('name','id');
	return view('cats.create', compact('breeds'));
}) -> name('cat.create');

Route::post('/cats', function() {
	$validation = Validator::make(
		request()->all(),
		[
			'name'          => 'required|max:255',
			'date_of_birth' => 'required|date_format:"Y-m-d" ',
			'breed_id'      => 'required|numeric',
		],
		[
			'required'      => 'Trường :attribute là bắt buộc',
			'max'           => 'Trường: attribute tối đa là max kí tự',
			'numeric'       => 'Trường bắt buộc: attribute là kiểu số nguyên',
			'date_format'   => 'Trường: attribute format không đúng định dạng: format',
		]
	);

	if ($validation->fails()){
		return redirect()
			->back()
			->withErrors($validation)
			->withInput();
	}
    
    $data = Request::all();
    Furbook\Cat::create($data);
    return redirect()
    	-> route('cat.index');
    }) -> name('cat.store');

Route::get('/cats/{id}/edit', function($id) {
	$breeds = Furbook\Breed::pluck('name','id');
	$cat = Furbook\Cat::find($id);
	return view('cats.edit', compact('cat','breeds'));
}) -> name('cat.edit');

Route::put('/cats/', function(CatRequest $request, $id) {
	$data = $request->all();
	$cat = Furbook\Cat::find($id);
	$cat -> update($data);
	return redirect()->route('cat.index');
	
}) -> name('cat.update');

Route::delete('/cats/{id}', function($id) {
	return 'Delete cat #'.$id;
}) -> name('cat.destroy');





