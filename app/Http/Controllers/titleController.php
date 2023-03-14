<?php
 
namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class titleController extends Controller
{
    public function index()
    {
        $title = Title::all();
        return view('/title/main', compact(['title']), [
            "title" => "Title"
        ]);
    }
    public function store(Request $request)
    {
        if ($request->default == 1) {
            DB::table('title')->where('default', 1)->update(['default' => 0]);
        }
        Title::create($request->except(['_token', 'submit']));
        $title = Title::latest()->first();

        return back();
    }

    public function destroy($id)
    {
        $title = title::find($id);
        $title->delete();
        return redirect('/title/main');
    }
    public function default($id)
    {
        DB::table('title')->where('default', 1)->update(['default' => 0]);
        DB::table('title')->where('id', $id)->update(['default' => 1]);
        return  back();
    }
}
