<?php

namespace Modules\Prescreening\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Prescreening\Models\Prescreening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrescreeningController extends Controller
{
    public function index()
    {
        $prescreenings = Prescreening::where('candidate_id', auth()->id())->get();
        return view('Prescreening::frontend.index', compact('prescreenings'));
    }

    public function create()
    {
        return view('Prescreening::frontend.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'test_name' => 'required|string|max:255',
            'score' => 'nullable|numeric|min:0|max:100',
            'file_result' => 'nullable|mimes:pdf,doc,docx|max:2048'
        ]);

        $data = $request->except('file_result');
        $data['candidate_id'] = auth()->id();

        if ($request->hasFile('file_result')) {
            $file = $request->file('file_result');
            $path = $file->store('prescreening-files', 'public');
            $data['file_result'] = $path;
        }

        Prescreening::create($data);
        return redirect()->route('prescreening.index')->with('success', 'Prescreening berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prescreening = Prescreening::findOrFail($id);
        return view('Prescreening::frontend.edit', compact('prescreening'));
    }

    public function update(Request $request, $id)
    {
        $prescreening = Prescreening::findOrFail($id);
        $request->validate([
            'test_name' => 'required|string|max:255',
            'score' => 'nullable|numeric|min:0|max:100',
            'file_result' => 'nullable|mimes:pdf,doc,docx|max:2048'
        ]);

        $data = $request->except('file_result');

        if ($request->hasFile('file_result')) {
            if ($prescreening->file_result) {
                Storage::disk('public')->delete($prescreening->file_result);
            }
            $file = $request->file('file_result');
            $path = $file->store('prescreening-files', 'public');
            $data['file_result'] = $path;
        }

        $prescreening->update($data);
        return redirect()->route('prescreening.index')->with('success', 'Prescreening berhasil diperbarui');
    }

    public function destroy($id)
    {
        $prescreening = Prescreening::findOrFail($id);
        if ($prescreening->file_result) {
            Storage::disk('public')->delete($prescreening->file_result);
        }
        $prescreening->delete();
        return redirect()->route('prescreening.index')->with('success', 'Prescreening berhasil dihapus');
    }
}
