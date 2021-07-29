<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TimeSlotsController extends Controller
{
    public function getAll()
    {
        return DB::table('time_slots')->paginate(5);
    }

    public function viewAll(Request $request)
    {
        if ($request->session()->has('login')) {
            $data = $this->getAll();
            return view('time-slots', ['data' => $data, 'session' => $request->session()->all()]);
        } else {
            return redirect('/login');
        }
    }

    public function viewMenu(Request $request)
    {
        if ($request->session()->has('login')) {
            $data = TimeSlot::all();
            return view('menu', ['data' => $data, 'session' => $request->session()->all()]);
        } else {
            return redirect('/login');
        }
    }

    public function viewNew(Request $request)
    {
        if ($request->session()->has('login') && session('role') == 1) {
            return view('form-time-slot');
            // return redirect('/login');
        } else {
            return redirect('/stuffs');
        }
    }

    public function saveNew(Request $post)
    {
        $stuff = new TimeSlot;
        $data = $post->input();
        $file = $post->file('picture');
        //check if file upload exist
        if (isset($file)) {
            $storeName = md5($file->getClientOriginalName()) . "." . $file->extension();
            Storage::putFileAs(
                'public/pictures',
                $file,
                $storeName,
                'public'
            );
        }

        $stuff->name = $data['name'];
        $stuff->stock = $data['stock'];
        $stuff->status = $data['status'];
        $stuff->picture = $storeName;
        $stuff->price = $data['price'];
        $stuff->type = $data['type'];

        $save = $stuff->save();
        if ($save) {
            return redirect('/stuffs');
        } else {
            return redirect('/new-time-slot');
        }
    }

    public function saveEdit(Request $post, $id)
    {
        $data = $post->input();
        $file = $post->file('picture');
        $old = TimeSlot::where('id', $id)->first();
        $oldPicture = $old->picture;

        if (isset($file)) {
            $storeName = md5($file->getClientOriginalName()) . "." . $file->extension();
            Storage::putFileAs(
                'public/pictures',
                $file,
                $storeName,
                'public'
            );
            Storage::delete('public/pictures/' . $oldPicture);
        } else {
            $storeName = $oldPicture;
        }

        $update = TimeSlot::where('id', "=", $id)->update(array(
            'name' => $data['name'],
            'stock' => $data['stock'],
            'status' => $data['status'],
            'price' => $data['price'],
            'picture' => $storeName,
            'type' => $data['type']
        ));
        if ($update) {
            return redirect('/stuffs');
        } else {
            return redirect('/edit-time-slot/' . $id);
        }
    }

    public function viewEdit(Request $request, $id)
    {
        if ($request->session()->has('login') &&  session('role') == 1) {
            $data  = TimeSlot::where('id', $id)->first();
            return view('form-time-slot', ['data' => $data]);
        } else {
            return redirect('/stuffs');
        }
    }

    public function viewSingle(Request $request, $id)
    {
        if ($request->session()->has('login') &&  session('role') == 1) {
            $data  = TimeSlot::where('id', $id)->first();
            return Response(['data' => $data], 200);
        } else {
            return Response(['message' => "Not Found"], 404);
        }
    }

    public function delete($id)
    {
        $data  = TimeSlot::where('id', $id)->first();
        Storage::delete('public/pictures/' . $data->picture);
        if ($data != null) {
            $data->delete();
            return true;
        } else {
            return false;
        }
    }

    public function index()
    {
        return Response($this->getAll());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
