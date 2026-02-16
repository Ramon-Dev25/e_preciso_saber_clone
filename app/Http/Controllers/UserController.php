<?php

namespace App\Http\Controllers;

use App\Http\Libraries\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('adm.user.login');
    }

    public function users()
    {
        $user = Auth::user();
        return view('adm.control_panel.users', compact('user'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            (new Response())
                ->error("<b>E-mail não cadastrado</b>, por favor, entre em contato com o suporte.", 5000)
                ->flash();
            return redirect()->back();
        }

        if (Auth::attempt($credentials)) {
            (new Response())
                ->success("Login realizado com sucesso!", 5000)
                ->flash();
            return redirect()->route('controlPanel.index');

        } else {
            (new Response())
                ->error("E-mail ou senha incorretos.", 5000)
                ->flash();
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('adm.user.register');
    }

    public function createUser(Request $request)
    {
        $users = User::where('email', $request->email)->first();

        if (empty($users)) {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password) // Senha criptografada
            ]);

            (new Response())
                ->success("Usuário criado com Sucesso!", 5000)
                ->flash();
            return redirect()->route('user.index');

        } else {
            (new Response())
                ->error("Este e-mail já está cadastrado!", 5000)
                ->flash();
            return redirect()->back();
        }
    }

    public function updateTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:light,dark',
        ]);

        $user = auth()->user();
        $user->theme = $request->theme;
        $user->save();

        return response()->json(['success' => true, 'theme' => $user->theme]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Faz o logout do usuário

        $request->session()->invalidate(); // Invalida a sessão
        $request->session()->regenerateToken(); // Regenera o token CSRF

        (new Response())
            ->info("Obrigado. Até breve!", 5000)
            ->flash();
        return redirect()->route('user.index');
    }

    public function listUsers()
    {
        $users = User::all();

        $data = $users->map(function ($user) {
            return [
                'date' => $user->created_at->format('d/m/Y - H:i'),
                'name' => $user->name,
                'email' => $user->email,

                'actions' => '
                <a href="javascript:void(0);" data-id="' . $user->id . '" class="btn-view btn btn-xs text-bg-success font-weight-bold text-xs m-0" title="Editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a href="javascript:void(0);" data-id="' . $user->id . '" class="btn-delete btn btn-xs text-bg-danger font-weight-bold text-xs m-0" title="Deletar">
                    <i class="fa-solid fa-trash-can"></i>
                </a>

            ',
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function viewUser($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function editUser(Request $request)
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

            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

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

    public function deleteUser(User $user)
    {
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuário não encontrado'], 409);
        }

        $totalUsers = User::count();

        if ($totalUsers <= 1) {
            return response()->json([
                'success' => false, 
                'message' => 'Não é possível deletar o último usuário. O sistema precisa ter pelo menos um usuário ativo.'
            ], 403);
        }

        $user->delete();

        return response()->json(['success' => true, 'message' => 'Usuário deletado com sucesso']);
    }
}
