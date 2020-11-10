<?php
namespace App\Http\Controllers;

use DB;
use File;
use Image;
use App\Tempat;
use App\Support\Helper;
use Illuminate\Http\Request;
use Venturecraft\Revisionable\Revision;

class TempatController extends Controller{

	protected $imagepath = 'images/tempat/';
	protected $width = 200;
	protected $height = 200;
	protected $message = "Tempat ";

	public function index()
	{
		$table_data = Tempat::with('Villages','Districts','Regencies','Provinces')->advancedFilter();

		return response()
		->json([
			'model' => $table_data
		]);
	}
	
	public function get($id)
	{
		$table_data = Tempat::with('Villages','Districts','Regencies','Provinces')->where('id_regencies',$id)->orderby('name','asc')->get();

		return response()
			->json([
				'model' => $table_data
			]);
  }

	public function create()
	{
		return response()
			->json([
					'form' => Tempat::initialize(),
					'rules' => Tempat::$rules,
					'option' => []
			]);
	}

	public function store(Request $request)
	{
		$this->validate($request,Tempat::$rules);

		$name = $request->name;

		// processing single image upload
		if(!empty($request->gambar))
			$fileName = Helper::image_processing($this->imagepath,$this->width,$this->height,$request->gambar,'',$name);
		else
			$fileName = '';

		$kelas = Tempat::create($request->except('gambar') + [
			'gambar' => $fileName
		]);
		
		return response()
			->json([
				'saved' => true,
				'message' => $this->message . $name . ' berhasil ditambah',
				'id' => $kelas->id
			]);	
	}

	public function edit($id)
	{
		$kelas = Tempat::with('Villages','Districts','Regencies','Provinces')->findOrFail($id);

		return response()
				->json([
						'form' => $kelas,
						'option' => []
				]);
	}

	public function update(Request $request, $id)
	{
		$this->validate($request,Tempat::$rules);

		$name = $request->name;

		$kelas = Tempat::findOrFail($id);

		// processing single image upload
		if(!empty($request->gambar))
			$fileName = Helper::image_processing($this->imagepath,$this->width,$this->height,$request->gambar,$kelas->gambar,$name);
		else
			$fileName = '';

		$kelas->update($request->except('gambar') + [
			'gambar' => $fileName
		]);	
		
		return response()
			->json([
				'saved' => true,
				'message' => $this->message . $name . ' berhasil diubah',
				'id' => $kelas->id
			]);	
	}

	public function destroy($id)
	{
		$kelas = Tempat::findOrFail($id);
		$name = $kelas->name;

		if(!empty($kelas->gambar)){
			File::delete($path . $kelas->gambar . '.jpg');
			File::delete($path . $kelas->gambar . 'n.jpg');
		}

		$kelas->delete();

		return response()
			->json([
				'deleted' => true,
				'message' => $this->message . $name . 'berhasil dihapus'
			]);
	}

	public function history()
  {
    $table_data = Revision::with('revisionable')->where('revisionable_type','App\Tempat')->get();

    return response()
			->json([
				'model' => $table_data
			]);
  }
}