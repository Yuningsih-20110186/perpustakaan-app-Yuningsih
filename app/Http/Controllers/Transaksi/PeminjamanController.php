<?php

namespace App\Http\Controllers\Transaksi;

use App\Helpers\ConstantsHelper;
use App\Helpers\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Models\PeminjamanT;
use Exception;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(){

    }

    public function getPeminjaman (Request $request) {
        $id = $request->get('id');
        try {
            $model = new PeminjamanT();
            $query = $model->select(
                'id',
                'no_peminjaman',
                'books_id',
                'pengunjung_id',
                'pegawai_id',
                'status',
            );
            if (isset($id)){
                $query->where('id', $id);
            }
            $query->where('is_deleted', false);
            $query = $query->get();
                return ResponseHelpers::success(ConstantsHelper::STATUS_SUCCESS, ConstantsHelper::MSG_SUCCESS_GET, $query);
        } catch (\Exception $e) {
                return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_SERVER, ConstantsHelper::MSG_ERR_SERVER, $e);
        }

        $query = PeminjamanT::where('is_deleted', false)->get();
        return view('peminjaman/index', ['peminjamanData' => $query]);

    }

    public function savePeminjaman(Request $request){
        $id = $request->post('id');
        $no_peminjaman = $request->post('no_peminjaman');
        $books_id = $request->post('books_id');
        $pengunjung_id = $request->post('pengunjung_id');
        $pegawai_id = $request->post('pegawai_id');
        $status = $request->post('status');

        try {
            $model = new PeminjamanT();

            if (isset($id)) {
                $query = $model->find($id);
                if ($query == null) {
                    return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_VALIDATION, ConstantsHelper::MSG_ERR_SAVE);
                }
                $model = $model->find($id);
            }
            $model->no_peminjaman = $no_peminjaman;
            $model->books_id = $books_id;
            $model->pengunjung_id = $pengunjung_id;
            $model->pegawai_id = $pegawai_id;
            $model->status = $status;

            if($model->validate()->save()){
                return ResponseHelpers::success(ConstantsHelper::STATUS_SUCCESS, ConstantsHelper::MSG_SUCCESS_SAVE, true);
            } else {
                return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_VALIDATION, ConstantsHelper::MSG_ERR_SAVE, false);
            }

        } catch (\Exception $e) {
            return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_VALIDATION, ConstantsHelper::MSG_ERR_VALIDATION, $e);
        } catch (\Exception $e) {
            return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_SERVER, ConstantsHelper::MSG_ERR_SERVER, $e);
        }

        $query = PeminjamanT::where('is_deleted', false)->get();
        return view('peminjaman/index', ['peminjamanData' => $query]);
    }

    public function deletePengunjung(Request $request) {
        $id = $request->get('id');
        try{
            $model =  new PeminjamanT();
            if($model->find($id) == null){
                return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_VALIDATION, 'Data tidak ditemukan!', false);
            }
            $model = $model->find($id);
            $model->is_deleted = true;
            if ($model->save()) {
                return ResponseHelpers::success(ConstantsHelper::STATUS_SUCCESS, ConstantsHelper::MSG_SUCCESS_DELETE, true);
            } else {
                return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_VALIDATION, ConstantsHelper::MSG_ERR_DELETE, false);
            }

        } catch (\Exception $e) {
            return ResponseHelpers::error(ConstantsHelper::STATUS_ERR_SERVER, ConstantsHelper::MSG_ERR_SERVER, $e);
        }

        $query = PeminjamanT::where('is_deleted', false)->get();
        return view('peminjaman/index', ['peminjamanData' => $query]);
    }

}
