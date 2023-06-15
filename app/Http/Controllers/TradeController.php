<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Papertrade;
use Illuminate\Support\Facades\Auth;

class TradeController extends Controller
{
    // view function
    public function view()
    {
        $list_data = Papertrade::where('status', 'open')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(20);

        return view('dashboard', compact('list_data'));
    }

    public function saveTrade(Request $request)
    {

        $validatedData = $request->validate([
            'pair_name' => ['required'],
            'entry' => ['required'],
        ]);

        $data = new Papertrade;
        $data->pair_name = $request->pair_name;
        $data->entry = $request->entry;
        $data->entry_time = now()->toDateTimeString();
        $data->user_id = Auth::user()->id;
        $data->save();

        return back()->with('success', 'Trade Created Successfully');
    }

    // edit function
    public function editTrade($id)
    {
        $edit_data = Papertrade::find($id);
        return view('dashboard.config.edit', compact('edit_data'));
    }

    // update function
    public function updateTrade(Request $request)
    {
        $validatedData = $request->validate([
            'entry' => ['required'],
            'exit' => ['required'],
        ]);

        $update_data = Papertrade::find($request->id);
        $update_data->user_id = Auth::user()->id;
        $update_data->entry = $request->entry;
        $update_data->entry_time = $request->entry_time;
        $update_data->exit = $request->exit;
        $update_data->exit_time = now()->toDateTimeString();
        $update_data->profit = $request->exit - $request->entry;
        $update_data->profit_percentage = ($update_data->profit / $request->entry) * 100;
        $update_data->status = 'closed';
        $update_data->save();

        return redirect('dashboard')->with('success', 'Trade Closed Successfully');
    }
    //  delete function
    public function deleteTrade($id)
    {
        $delete_data = Papertrade::find($id);
        $delete_data->status = 'deleted';
        $delete_data->save();
        $delete_data->delete();
        return back()->with('danger', 'Paper Trade Deleted Successfully');
    }

    // closed data

    public function closedData()
    {
        $closed_data = Papertrade::where('status', 'closed')->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(20);
        return view('dashboard.history', compact('closed_data'));
    }
}
