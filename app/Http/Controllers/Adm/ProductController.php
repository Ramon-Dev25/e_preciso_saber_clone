<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Libraries\Response;
use App\Models\KitProducts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('adm.control_panel.product.product', compact('user'));
    }

    public function productRegistration()
    {
        $user = Auth::user();
        return view('adm.control_panel.product.register', compact('user'));
    }

    public function registeringProduct(Request $request)
    {
        // Verifica se já existe produto pelo ISBN
        $product = Products::where('isbn', $request->isbn)->first();

        // Validação dos dados
        $validated = $request->validate([
            'image_file' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:15',
            'synopsis' => 'required|string|min:50',
            'age_group' => 'required|string|max:50',
            'publisher' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'author' => 'nullable|string|max:255',
        ], [
            'image_file.image' => 'O arquivo deve ser uma imagem.',
            'image_file.max' => 'A imagem não pode ser maior que 2MB.',
            'image_file.uploaded' => 'Não foi possível enviar a imagem. Tente um arquivo menor ou em outro formato.',
            'title.required' => 'O título é obrigatório.',
            'title.max' => 'O título não pode passar de 255 caracteres.',
            'isbn.max' => 'O isbn não pode passar de 15 caracteres.',
            'isbn.required' => 'O ISBN é obrigatório.',
            'synopsis.min' => 'A sinopse precisa ter no mínimo 50 caracteres.',
            'publisher.max' => 'A editora não pode passar de 255 caracteres.',
        ]);

        // Upload do arquivo de imagem, caso exista
        $imagePath = $product->image_file ?? null;
        if ($request->hasFile('image_file')) {
            // se quiser pode deletar imagem antiga
            if ($product && $product->image_file) {
                Storage::disk('public')->delete($product->image_file);
            }

            $imagePath = $request->file('image_file')->store('products', 'public');
        }

        // Monta dados
        $data = [
            'image_file' => $imagePath,
            'image_url' => $request->image_url,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'isbn' => $request->isbn,
            'age_group' => $request->age_group,
            'publisher' => $request->publisher,
            'type' => $request->type,
            'author' => $request->author,
            'height' => $request->height,
            'width' => $request->width,
            'length' => $request->length,
            'weight' => $request->weight,
            'synopsis' => $request->synopsis,
        ];

        // Se já existe, atualiza. Se não, cria.
        if ($product) {
            $product->update($data);

            (new Response())
                ->success("Cadastro Atualizado com Sucesso!", 5000)
                ->flash();
        } else {
            Products::create($data);

            (new Response())
                ->success("Livro Cadastrado com Sucesso!", 5000)
                ->flash();
        }

        return redirect()->back();
    }

    public function listProducts()
    {
        $products = Products::orderBy('id', 'desc')->get();

        $data = $products->map(function ($product) {
            return [
                'checkbox' => '
                    <input type="checkbox" 
                        class="form-check-input" 
                        name="products[]" 
                        value="' . $product->id . '">
                ',
                'isbn' => $product->isbn,
                'name' => $product->title,
                'publisher' => $product->publisher,

                'actions' => '

                <a href="javascript:void(0);" data-id="' . $product->id . '" class="btn-view btn btn-xs text-bg-success font-weight-bold text-xs m-0 px-2" title="Visualizar">
                    <i class="fa-solid fa-eye"></i>
                </a>

                <a href="javascript:void(0);" data-id="' . $product->id . '" class="btn-edit btn btn-xs text-bg-info font-weight-bold text-xs m-0 px-2" title="Editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <a href="javascript:void(0);" data-id="' . $product->id . '" class="btn-delete btn btn-xs text-bg-danger font-weight-bold text-xs m-0 px-2" title="Deletar">
                    <i class="fa-solid fa-trash-can"></i>
                </a>',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function viewProduct(Products $product)
    {
        // se não tiver arquivo, usa a URL externa
        if ($product->image_file) {
            $product->image = asset('storage/' . $product->image_file);
        } elseif ($product->image_url) {
            $product->image = $product->image_url;
        } else {
            $product->image = asset('img/capa-defaut.png'); // imagem padrão se não tiver nenhuma
        }

        return response()->json($product);
    }

    public function editProduct(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:users,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'nullable|string|min:6',
            ], [
                'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
                'name.required' => 'O campo nome é obrigatório.',
            ]);

            $user = Products::findOrFail($request->id);
            $user->name = $request->name;
            $user->email = $request->email;

            // ✅ Retorna JSON pro AJAX
            return response()->json([
                'success' => true,
                'message' => 'Usuário atualizado com sucesso!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar o usuário.'
            ], 500);
        }
    }

    public function deleteProduct($id)
    {
        $product = Products::where('id', $id)->first();

        $productKitItems  = KitProducts::where('product_id', $id)
            ->with('kit')
            ->get();

        if ($productKitItems->isNotEmpty()) {

            // Mapeia a coleção para extrair apenas os nomes dos kits
            $kitNames = $productKitItems
                ->map(function ($kitProduct) {
                    
                    return $kitProduct->kit->name ?? null; 
                })
                ->filter() // Remove valores nulos (se algum kit não foi encontrado)
                ->unique() // Garante que cada nome de kit apareça apenas uma vez
                ->values(); // Re-indexa o array após o unique()
            
            // 3. Formata a lista de nomes: "Kit A, Kit B e Kit C"
            $kitNamesString = $kitNames->implode(', ');

            // Monta a mensagem final 
            $message = "Esse item está presente nos seguintes kits: <b>{$kitNamesString}.</b> Por favor, verifique antes de deletar.";

            return response()->json(['success' => false, 'message' => $message], 409);
        }

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Contato não encontrado'], 409);
        }

        $product->delete();

        return response()->json(['success' => true, 'message' => 'Contato deletado com sucesso']);
    }
}
