<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Turies;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Список туров
    public function index()
    {
        $tours = Turies::all();
        return view('admin.tours.index', compact('tours'));
    }

    // Форма создания тура
    public function create()
    {
        return view('admin.tours.create');
    }

    // Сохранение нового тура
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string',
            'cost' => 'required|string',
            'size_group' => 'required|string',
        ]);

        Turies::create($validatedData);

        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно создан!');
    }

    // Форма редактирования тура
    public function edit($id)
    {
        $tour = Turies::findOrFail($id);
        return view('admin.tours.edit', compact('tour'));
    }

    // Обновление тура
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string',
            'cost' => 'required|string',
        ]);

        $tour = Turies::findOrFail($id);
        $tour->update($validatedData);

        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно обновлен!');
    }

    // Удаление тура
    public function destroy($id)
    {
        $tour = Turies::findOrFail($id);
        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно удален!');
    }
}
