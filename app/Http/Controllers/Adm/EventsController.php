<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Libraries\Response;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index () 
    {
        $user  = Auth::user();
        return view('adm.control_panel.events.events', compact('user'));
    }

    public function eventsRegistration () 
    {
        $user  = Auth::user();
        return view('adm.control_panel.events.register-events', compact('user'));
    }

    public function registeringEvents (Request $request) 
    {
        $validated = $request->validate([
            'image_file' => 'required|image|max:2048',
            'name' => 'required|string|max:255|unique:events,name',
            'days' => 'required|string|max:255',
            'start_day' => 'required|date',
            'address' => 'required|string|max:255',
            'description' => 'required|string|min:50|max:255',
        ], [
            'image_file.required' => 'Capa do evento é obrigatório.',
            'image_file.image' => 'O arquivo deve ser uma imagem.',
            'image_file.max' => 'A imagem não pode ser maior que 2MB.',
            'image_file.uploaded' => 'Não foi possível enviar a imagem. Tente um arquivo menor ou em outro formato.',

            'name.required' => 'O título é obrigatório.',
            'name.unique' => 'Já existe um evento com esse nome.',
            'days.required' => 'Data obrigatória.',
            'start_day.required' => 'Data obrigatória.',
            'address.required' => 'Endereço Obrigatório.',

            'description.max' => 'A descrição não pode passar de 255 caracteres.',
            'description.min' => 'A descrição não pode ter menos de 50 caracteres.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_file')) {

            // O arquivo será armazenado no disco 'public' dentro da pasta 'events'
            $imagePath = $request->file('image_file')->store('events', 'public');
        }

        $event = Events::where('name', $request->name)
            ->where('active', true)
            ->first();

        if ($event) {
            (new Response())
                ->error("Já existe um evento com esse nome.", 5000)
                ->flash();

            return redirect()->back();

        } else {
            $data = [
                'image_file' => $imagePath,
                'name' => $request->name,
                'days' => $request->days,
                'start_day' => $request->start_day,
                'address' => $request->address,
                'description' => $request->description,
                'page' => false,
                'status' => 'Novo',
                'active' => true,
            ];
            
            Events::create($data);

            (new Response())
                ->success("Evento cadastrado com sucesso!", 5000)
                ->flash();

            return redirect()->back();
        }
    }

    public function listEvents ()
    {
        $events = Events::where('active', true)->orderBy('id', 'desc')->get();

        $data = $events->map(function ($event) {
            return [
                'days' => $event->days,
                'name' => $event->name,
                'address' => $event->address,
                'status' => $event->status,

                'actions' => '
                <a href="javascript:void(0);" data-id="' . $event->id . '" class="btn-view btn btn-xs text-bg-info font-weight-bold text-xs m-0 px-2" title="Editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <a href="javascript:void(0);" data-id="' . $event->id . '" class="btn-delete btn btn-xs text-bg-danger font-weight-bold text-xs m-0 px-2" title="Deletar">
                    <i class="fa-solid fa-trash-can"></i>
                </a>',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function deleteEvents($id)
    {
        $event = Events::find($id);

        if ($event) {
            $event->delete();

            return response()->json(['success' => true, 'message' => 'Evento deletado com sucesso!']);

        } else {

            return response()->json(['success' => false, 'message' => 'Evento não encontrado, tente novamente.'], 409);
        }
    }
}
