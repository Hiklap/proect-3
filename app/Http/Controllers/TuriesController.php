<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turies;
use App\Models\Bron;

class TuriesController extends Controller
{
    public function turies()
    {
        $turies = Turies::all();
        return view('turies', ['turies' => $turies]);
    }

    public function show($id)
    {
        // Получаем данные тура по ID
        $turi = Turies::findOrFail($id);

        // Передаем данные в представление
        return view('turshow', compact('turi'));
    }

    public function applyForm($id)
    {
        // Получаем данные тура по ID
        $turi = Turies::findOrFail($id);

        // Передаем данные в представление
        return view('apply', compact('turi'));
    }

    public function applyStore(Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'fio' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'people_count' => 'required|integer|min:1',
        ]);

        // Сохранение данных заявки в базу данных или отправка уведомления
        // Пример сохранения в базу:
        $application = new Bron();
        $application->turies_id = $id;
        $application->name = $validatedData['fio'];
        $application->phone = $validatedData['phone'];
        $application->email = $validatedData['email'];
        $application->people = $validatedData['people_count'];
        $application->save();

        // Перенаправление с сообщением об успехе
        return redirect()->route('turies.show', $id)->with('success', 'Ваша заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.');
    }

    public function index(Request $request)
    {
        // Получаем параметры из запроса
        $search = $request->input('search');
        $priceFilter = $request->input('price_filter');
        $durationFilter = $request->input('duration_filter');

        // Запрос к базе данных
        $query = Turies::query();

        // Поиск по названию или описанию
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Фильтрация по цене
        if ($priceFilter === 'asc') {
            $query->orderBy('cost', 'asc');
        } elseif ($priceFilter === 'desc') {
            $query->orderBy('cost', 'desc');
        }

        // Фильтрация по длительности
        if ($durationFilter === 'asc') {
            $query->orderBy('duration', 'asc');
        } elseif ($durationFilter === 'desc') {
            $query->orderBy('duration', 'desc');
        }

        // Получаем результаты
        $turies = $query->paginate(9);

        return view('turies', compact('turies'));
    }
}
