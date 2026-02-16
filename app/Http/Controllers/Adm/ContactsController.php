<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function  listContactEPrecisoSaber()
    {
        $contacts = Contacts::where('type', 'precisoSaber')->orderBy('id', 'desc')->get();

        $data = $contacts->map(function ($contact) {
            return [
                'date' => $contact->created_at->format('d/m/Y - H:i'),
                'name' => $contact->name,
                'status' => $contact->viewed
                    ? '<span class="badge bg-gradient-success">Visualizado</span>'
                    : '<span class="badge bg-gradient-warning">Novo</span>',
                'actions' => '
                <a href="javascript:void(0);" data-id="' . $contact->id . '" class="btn-view btn btn-xs text-bg-success font-weight-bold text-xs m-0" title="Visualizar">
                    <i class="fa-solid fa-eye"></i> Visualizar
                </a>
                <a href="javascript:void(0);" data-id="' . $contact->id . '" class="btn-delete btn btn-xs text-bg-danger font-weight-bold text-xs m-0" title="Deletar">
                    <i class="fa-solid fa-trash-can"></i> Deletar
                </a>

            ',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function  listContactAva()
    {
        $contacts = Contacts::where('type', 'ava')->orderBy('id', 'desc')->get();

        $data = $contacts->map(function ($contact) {
            return [
                'date' => $contact->created_at->format('d/m/Y - H:i'),
                'name' => $contact->name,
                'status' => $contact->viewed
                    ? '<span class="badge bg-gradient-success">Visualizado</span>'
                    : '<span class="badge bg-gradient-warning">Novo</span>',
                'actions' => '
                <a href="javascript:void(0);" data-id="' . $contact->id . '" class="btn-view btn btn-xs text-bg-success font-weight-bold text-xs m-0" title="Visualizar">
                    <i class="fa-solid fa-eye"></i> Visualizar
                </a>
                <a href="javascript:void(0);" data-id="' . $contact->id . '" class="btn-delete btn btn-xs text-bg-danger font-weight-bold text-xs m-0" title="Deletar">
                    <i class="fa-solid fa-trash-can"></i> Deletar
                </a>

            ',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function deleteContact($id)
    {
        $contact = Contacts::find($id);

        if (!$contact) {
            return response()->json(['success' => false, 'message' => 'Contato não encontrado']);
        }

        $contact->delete();

        return response()->json(['success' => true, 'message' => 'Contato deletado com sucesso']);
    }

    public function viewContact($id)
    {
        $contact = Contacts::find($id);

        if ($contact->viewed == false) {
            $contact->status = 'visualizado';
            $contact->viewed = true;
            $contact->save();
        }

        // Normaliza o campo "type"
        switch ($contact->type) {
            case 'precisoSaber':
                $contact['type'] = 'É Preciso Saber';
                break;
            case 'ava':
                $contact['type'] = 'AVA';
                break;
            default:
                $contact['type'] = 'Não Informado';
                break;
        }

        return response()->json($contact);
    }
}
