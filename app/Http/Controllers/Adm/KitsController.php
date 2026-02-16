<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Libraries\Response;
use App\Models\Kit;
use App\Models\KitProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Products;

class KitsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('adm.control_panel.kits.kits', compact('user'));
    }

    public function registeringKits(Request $request)
    {
        $kit = Kit::where('code', $request->code)->first();

        if ($kit) {
            (new Response())
                ->error("Já existe um kit com esse código.", 5000)
                ->flash();

            return redirect()->back();

        } else {
            $data = [
                'name' => $request->name,
                'code' => $request->code,
                'project' => $request->project,
            ];

            Kit::create($data);

            (new Response())
                ->success("Kit Cadastrado com Sucesso!", 5000)
                ->flash();

            return redirect()->back();
        }
    }

    public function listKits()
    {
        $kits = Kit::orderBy('id', 'desc')->get();

        $data = $kits->map(function ($kit) {
            return [
                'code' => $kit->code,
                'name' => $kit->name,
                'qtd' => $kit->products->count(),
                'project' => $kit->project,

                'actions' => '

                <a href="' . route('adm.kits.addProducts', ['kit' => $kit->id]) . '" 
                class="btn-view btn btn-xs text-bg-success font-weight-bold text-xs m-0 px-2" 
                title="Vincular Itens">
                    <i class="fa-solid fa-plus"></i>
                </a>

                <a href="javascript:void(0);" data-id="' . $kit->id . '" class="btn-delete btn btn-xs text-bg-danger font-weight-bold text-xs m-0 px-2" title="Deletar">
                    <i class="fa-solid fa-trash-can"></i>
                </a>',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function addProducts(Kit $kit)
    {
        $user = Auth::user();

        $products = Products::all();
        return view('adm.control_panel.kits.addProducts', compact('user', 'kit', 'products'));
    }

    public function addingProducts(Request $request)
    {
        $product = Products::where('id', $request->product)->first();

        // VERIFICA SE TEM IMAGEM DE CAPA
        if ($product->image_file || $product->image_url) {

            $productKit = KitProducts::where('product_id', $request->product)
                ->where('kit_id', $request->kit_id)
                ->first();

            // VALIDA SE JÁ FOI CADASTRO NESSE KIT
            if (!$productKit) {
                if ($request->product && $request->quantity) {
                    $data = [
                        'kit_id' => $request->kit_id,
                        'product_id' => $request->product,
                        'quantity' => $request->quantity,
                    ];
                    // ADICIONA NO KIT
                    KitProducts::create($data);

                    (new Response())
                        ->success("Item Adicionado com Sucesso!", 5000)
                        ->flash();

                    return redirect()->back();

                } else {
                    (new Response())
                        ->error("Todos os Campos são obrigatórios!", 5000)
                        ->flash();

                    return redirect()->back();
                }
            } else {
                (new Response())
                    ->error("Item já cadastrado neste kit", 5000)
                    ->flash();

                return redirect()->back();
            }

        } else {
            (new Response())
                ->error("Item sem capa, adicione uma imagem e tente novamente.", 5000)
                ->flash();

            return redirect()->back();
        }
    }

    public function listProductsKit($id)
    {
        $productsKit = KitProducts::where('kit_id', $id)->orderBy('id', 'desc')->get();

        $data = $productsKit->map(function ($product) {
            // ARRUMAR OS DADOS
            return [
                'isbn' => $product->product->isbn ?? 'sem codigo',
                'title' => $product->product->title ?? 'sem título',
                'quantity' => $product->quantity ?? 0,

                'actions' => '

                <a href="javascript:void(0);" data-id="' . $product->product->id . '" 
                class="btn-view btn btn-xs text-bg-success font-weight-bold text-xs m-0 px-2" 
                title="Vincular Itens">
                    <i class="fa-solid fa-eye"></i>
                </a>

                <a href="javascript:void(0);" data-id="' . $product->id . '" class="btn-delete btn btn-xs text-bg-danger font-weight-bold text-xs m-0 px-2" title="Deletar">
                    <i class="fa-solid fa-trash-can"></i>
                </a>',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function deleteProductKit($id)
    {
        $product = KitProducts::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Item não encontrado'], 409);
        }

        $product->delete();

        return response()->json(['success' => true, 'message' => 'Item deletado com sucesso']);
    }

    public function deleteKit($id)
    {
        $kit = Kit::find($id);

        $itens = KitProducts::where('kit_id', $id)->first();

        if ($itens) {
            return response()->json(['success' => false, 'message' => '<b>Kit com itens, antes de deletar o kit, por favor remova os itens.</b>'], 409);

        } else {
            $kit->delete();

            return response()->json(['success' => true, 'message' => 'Kit deletado com sucesso!']);
        }
    }
}
