<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Events;
use App\Models\Kit;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\News;

class WebController extends Controller
{
    public function index()
    {
        $kits = Kit::all();
        $events = Events::where('active', true)->get();

        return view('index', compact('kits', 'events'));
    }

    public function productsProjects()
    {
        $kits = Kit::all();
        return view('productsProjects', compact( 'kits'));
    }

    public function formContact(Request $request)
    {
        try {
            $validated = $request->validate([
                'type' => 'required|string',
                'name' => 'required|string|min:3|max:100',
                'email' => 'required|email:rfc,dns',
                'phone' => ['required', 'regex:/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/'],
                'institution' => 'nullable|string|max:150',
                'message' => 'required|string|min:10|max:500',

            ], [
                'name.required' => 'O campo Nome é obrigatório.',
                'name.min' => 'O nome deve ter pelo menos :min caracteres.',
                'email.required' => 'O campo E-mail é obrigatório.',
                'email.email' => 'Informe um endereço de e-mail válido.',
                'phone.required' => 'O campo Telefone é obrigatório.',
                'phone.regex' => 'Informe um telefone válido no formato (11) 98888-7777.',
                'message.required' => 'O campo Mensagem é obrigatório.',
                'message.min' => 'A mensagem deve ter pelo menos :min caracteres.',

            ]);

            Contacts::create($validated);

            if ($request->ajax()) {
                return response()->json(['message' => 'Mensagem enviada com sucesso!']);
            }

            return back()->with('success', 'Mensagem enviada com sucesso!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }
    }

    public function formContactAva(Request $request)
    {
        try {
            $validated = $request->validate([
                'type' => 'required|string|min:1|max:191',
                'name' => 'required|string|min:3|max:100',
                'email' => 'required|email:rfc,dns',
                'phone' => ['required', 'regex:/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/'],
                'institution' => 'nullable|string|max:150',
                'message' => 'required|string|min:10|max:500',
                'segment' => 'required|string|min:1|max:191',

            ], [
                'name.required' => 'O campo Nome é obrigatório.',
                'name.min' => 'O nome deve ter pelo menos :min caracteres.',
                'email.required' => 'O campo E-mail é obrigatório.',
                'email.email' => 'Informe um endereço de e-mail válido.',
                'phone.required' => 'O campo Telefone é obrigatório.',
                'phone.regex' => 'Informe um telefone válido no formato (11) 98888-7777.',
                'message.required' => 'O campo Mensagem é obrigatório.',
                'message.min' => 'A mensagem deve ter pelo menos :min caracteres.',

            ]);

            Contacts::create($validated);

            if ($request->ajax()) {
                return response()->json(['message' => 'Mensagem enviada com sucesso!']);
            }

            return back()->with('success', 'Mensagem enviada com sucesso!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }
    }

    public function bibliotecaCertaIndex()
    {
        return view('biblioteca_certa.index');
    }

    public function ava()
    {
        return view('ava');
    }

    public function viewProduct ($id)
    {
        $product = Products::where('id', $id)->first();
        
        if ($product->image_file) {
            $product->image = asset('storage/' . $product->image_file);
        } elseif ($product->image_url) {
            $product->image = $product->image_url;
        } else {
            $product->image = asset('img/capa-defaut.png'); // imagem padrão se não tiver nenhuma
        }

        return response()->json($product);
    }

    public function eventsAll () 
    {
        return view('events');
    }

    public function eventsManager (Events $event)
    {
        if ($event->page == 0){
            return view('eventsNoPage', compact('event'));

        }else {
            return view('eventsManager', compact('event'));

        }
    }

}