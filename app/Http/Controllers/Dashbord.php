<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Dashbord extends Controller
{
    //
    public function dasbord()
    {
        return view('/dashboard');
    }
    public function tasks()
    {
        $tasks = Tasks::where('user_id', auth()->user()->id)->get(); //Menampilkan Data Sesuai yg User Buat

        return view('tasks', ['tasks' => $tasks]);
    }

    public function addtasks(Request $request)
    {


        $this->validate($request, rules: [
            'name' => 'required',
            'status' => 'required',
            'img' => 'image|file|required|mimes:png,jpg,jpeg|max:2048',

        ]); // Validasi From


        $file_name = $request->img->getClientOriginalName();
        $image = $request->img->storeAs('tasks-foto', $file_name);
        Tasks::create([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
            'img' => $image,

        ]); // Tambah Data Form
        return redirect('/tasks');
    }
    public function delete_post($id)
    {
        // $data = Tasks::find($id);
        // $data->delete();
        // return response()->json(['success' => true]);
        $data = Tasks::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data telah dihapus', 'tr' => 'tr_' . $id]);
    }
}
