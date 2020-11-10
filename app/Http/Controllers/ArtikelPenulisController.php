<?php
namespace App\Http\Controllers;

use App\ArtikelPenulis;
use Illuminate\Http\Request;
use App\Support\Helper;

class ArtikelPenulisController extends Controller{

	protected $imagepath = 'images/penulis/';

	public function index()
	{
    	$table_data = ArtikelPenulis::with('Cu')->withCount('hasArtikel')->advancedFilter();

    	return response()
			->json([
				'model' => $table_data
			]);
	}

	public function indexAll()
	{
		$table_data = ArtikelPenulis::where('id','!=',1)->select('id','name')->orderby('name','asc')->get();

		return response()
			->json([
				'model' => $table_data
			]);
  }
  
  public function indexCu($id)
	{
		$table_data = ArtikelPenulis::with('Cu')->withCount('hasArtikel')->where('id_cu',$id)->advancedFilter();

		return response()
			->json([
				'model' => $table_data
			]);
	}

	public function getCu($id)
	{
		$table_data = ArtikelPenulis::where('id_cu','=',$id)->select('id','name')->orderby('name','asc')->get();

		return response()
			->json([
				'model' => $table_data
			]);
	}

	public function create()
	{
		return response()
			->json([
					'form' => ArtikelPenulis::initialize(),
					'rules' => ArtikelPenulis::$rules,
					'option' => []
			]);
	}

	public function store(Request $request)
	{
		$this->validate($request,ArtikelPenulis::$rules);

		$name = $request->name;

		// processing single image upload
		if(!empty($request->gambar))
			$fileName = Helper::image_processing($this->imagepath,'300','200',$request->gambar,'', $name);
		else
			$fileName = '';

		$kelas = ArtikelPenulis::create($request->except('gambar') + [
			'gambar' => $fileName
		]);
		
		return response()
			->json([
				'saved' => true,
				'message' => 'Penulis ' .$name. ' berhasil ditambah',
				'id' => $kelas->id
			]);	
	}

	public function edit($id)
	{
		$kelas = ArtikelPenulis::findOrFail($id);

		return response()
				->json([
						'form' => $kelas,
						'option' => []
				]);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request,ArtikelPenulis::$rules);

		$name = $request->name;

		$kelas = ArtikelPenulis::findOrFail($id);

		// processing single image upload
		if(!empty($request->gambar))
			$fileName = Helper::image_processing($this->imagepath,'300','200',$request->gambar, $kelas->gambar, $name);
		else
			$fileName = '';

		$kelas->update($request->except('gambar') + [
			'gambar' => $fileName
		]);
		
		return response()
			->json([
				'saved' => true,
				'message' => 'Penulis ' .$name. ' berhasil diubah',
				'id' => $kelas->id
			]);	
	}

	public function destroy($id)
	{
		$kelas = ArtikelPenulis::findOrFail($id);
		$name = $kelas->name;

		if(!empty($kelas->gambar)){
			File::delete($path . $kelas->gambar . '.jpg');
			File::delete($path . $kelas->gambar . 'n.jpg');
		}

		$kelas->delete();

		return response()
			->json([
				'deleted' => true,
				'message' => 'Penulis ' .$name. 'berhasil dihapus'
			]);
	}

	public function count()
	{
			$id = \Auth::user()->id_cu;

			if($id == 0){
					$table_data = ArtikelPenulis::count();
			}else{
					$table_data = ArtikelPenulis::where('id_cu',$id)->count();
			}
			
			return response()
			->json([
					'model' => $table_data
			]);
	}
}