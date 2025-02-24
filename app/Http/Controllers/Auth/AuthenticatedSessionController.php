<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Xác thực người dùng
        $request->authenticate();

        // Tạo lại session sau khi đăng nhập
        $request->session()->regenerate();

        // Chuyển hướng đến trang chủ (home)
        return redirect()->route('dashboard'); // Đây sẽ là route dẫn đến trang home
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Đăng xuất người dùng
        Auth::guard('web')->logout();

        // Hủy session hiện tại
        $request->session()->invalidate();

        // Tạo lại token session
        $request->session()->regenerateToken();

        // Chuyển hướng về trang chủ
        return redirect('/');
    }
}
