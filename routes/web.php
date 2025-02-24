    <?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;

// Routes for all users
Route::get('/', function () {
    $user = Auth::user();
    if ($user && isset($user->role)) {
        return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');
    }
    return redirect()->route('login');
});
=======
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\IssueController;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PostController;
    use Illuminate\Routing\RouteUri;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    
    Route::get('/', function () 
    {
        $user = Auth::user();
        if ($user && isset($user->role)) {
            return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');
        }
        return redirect()->route('login');
    });

    Route::get('/login', [AuthController::class, 'get_login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'post_login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

        Route::get('/project-list', [ProjectController::class, 'index'])->name('admin.project-list');
        Route::get('/project-create', [ProjectController::class, 'create'])->name('admin.project-create');
        Route::post('/project-store', [ProjectController::class, 'store'])->name('admin.project-store');
        Route::get('/projects/{id}',[ProjectController::class,'show'])->name('admin.project-detail');
        Route::get('/projects/{id}/project-edit', [ProjectController::class, 'edit'])->name('admin.project-edit');
        Route::put('/projects/{id}/project-edit', [ProjectController::class, 'edit'])->name('admin.project-edit');
        Route::put('/projects/{id}/project-update', [ProjectController::class, 'update'])->name('admin.project-update');
        Route::delete('/projects/{id}/project-delete', [ProjectController::class, 'delete'])->name('admin.project-delete');
        
        Route::get('/issue-list', [IssueController::class, 'index'])->name('admin.issue-list');
        Route::get('/issue-create', [IssueController::class, 'create'])->name('admin.issue-create');
        Route::post('/issue-store', [IssueController::class, 'store'])->name('admin.issue-store');
        Route::get('/issues/{id}',[IssueController::class,'show'])->name('admin.issue-detail');
        Route::get('/issues/{id}/issue-edit', [IssueController::class, 'edit'])->name('admin.issue-edit');
        Route::put('/issues/{id}/issue-edit', [IssueController::class, 'edit'])->name('admin.issue-edit');
        Route::put('/issues/{id}/issue-update', [IssueController::class, 'update'])->name('admin.issue-update');
        Route::delete('/issues/{id}/issue-delete', [IssueController::class, 'delete'])->name('admin.issue-delete');
        Route::delete('/issues/{id}/remove-attachment', [IssueController::class, 'removeAttachment'])->name('remove-attachment');

        Route::get('/user-list', [UserController::class, 'user_list'])->name('admin.user-list');
        Route::get('/user-register', [UserController::class, 'create'])->name('admin.user-register');
        Route::post('/user-store', [UserController::class, 'store'])->name('admin.user-store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.user-detail');
        Route::get('/users/{id}/user-edit', [UserController::class, 'edit'])->name('admin.user-edit');
        Route::put('/users/{id}/user-edit', [UserController::class, 'edit'])->name('admin.user-edit');
        Route::put('/users/{id}/user-update', [UserController::class, 'update'])->name('admin.user-update');
        Route::delete('/users/{id}/user-delete', [UserController::class, 'delete'])->name('admin.user-delete');
    });

    Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
        Route::get('/project-list', [ProjectController::class, 'project_list'])->name('user.project-list');

        Route::get('/issue-list', [IssueController::class, 'index'])->name('user.issue-list');
        Route::get('/issue-create', [IssueController::class, 'create'])->name('user.issue-create');
        Route::post('/issue-store', [IssueController::class, 'store'])->name('user.issue-store');
        Route::get('/issues/{id}',[IssueController::class,'show'])->name('user.issue-detail');
        Route::put('/issues/{id}/issue-edit', [IssueController::class, 'edit'])->name('user.issue-edit');
        Route::put('/issues/{id}/issue-update', [IssueController::class, 'update'])->name('user.issue-update');
        Route::delete('/issues/{id}/issue-delete', [IssueController::class, 'delete'])->name('user.issue-delete');
        Route::delete('/issues/{id}/remove-attachment', [IssueController::class, 'removeAttachment'])->name('remove-attachment');

    });

    Route::get('/auth/forgot-password', [AuthController::class, 'forgot']);
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26

Route::get('/login', [AuthController::class, 'get_login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

<<<<<<< HEAD
// Routes for authenticated users (Admin and User)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('dashboard');
=======
>>>>>>> fe5005435fda480a6b596025c207e299b8517f26

    // Admin routes (restricted to admins)
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::get('/user-list', [UserController::class, 'user_list'])->name('admin.user-list');
        Route::get('/user-register', [UserController::class, 'create'])->name('admin.user-register');
        Route::post('/user-store', [UserController::class, 'store'])->name('admin.user-store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('admin.user-detail');
        Route::get('/users/{id}/user-edit', [UserController::class, 'edit'])->name('admin.user-edit');
        Route::put('/users/{id}/user-update', [UserController::class, 'update'])->name('admin.user-update');
        Route::delete('/users/{id}/user-delete', [UserController::class, 'delete'])->name('admin.user-delete');

        // Project Routes
        Route::get('/project-list', [ProjectController::class, 'index'])->name('admin.project-list');
        Route::get('/project-create', [ProjectController::class, 'create'])->name('admin.project-create');
        Route::post('/project-store', [ProjectController::class, 'store'])->name('admin.project-store');
        Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('admin.project-detail');
        Route::put('/projects/{id}/project-update', [ProjectController::class, 'update'])->name('admin.project-update');
        Route::delete('/projects/{id}/project-delete', [ProjectController::class, 'delete'])->name('admin.project-delete');

        // Issue Routes
        Route::get('/issue-list', [IssueController::class, 'index'])->name('admin.issue-list');
        Route::get('/issue-create', [IssueController::class, 'create'])->name('admin.issue-create');
        Route::post('/issue-store', [IssueController::class, 'store'])->name('admin.issue-store');
        Route::get('/issues/{id}', [IssueController::class, 'show'])->name('admin.issue-detail');
        Route::put('/issues/{id}/issue-edit', [IssueController::class, 'edit'])->name('admin.issue-edit');
        Route::put('/issues/{id}/issue-update', [IssueController::class, 'update'])->name('admin.issue-update');
        Route::delete('/issues/{id}/issue-delete', [IssueController::class, 'delete'])->name('admin.issue-delete');
    });

    // User routes (restricted to users)
    Route::middleware(['role:user'])->prefix('user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
        Route::get('/project-list', [ProjectController::class, 'project_list'])->name('user.project-list');

        // Issue Routes
        Route::get('/issue-list', [IssueController::class, 'index'])->name('user.issue-list');
        Route::get('/issue-create', [IssueController::class, 'create'])->name('user.issue-create');
        Route::post('/issue-store', [IssueController::class, 'store'])->name('user.issue-store');
        Route::get('/issues/{id}', [IssueController::class, 'show'])->name('user.issue-detail');
        Route::put('/issues/{id}/issue-edit', [IssueController::class, 'edit'])->name('user.issue-edit');
        Route::put('/issues/{id}/issue-update', [IssueController::class, 'update'])->name('user.issue-update');
        Route::delete('/issues/{id}/issue-delete', [IssueController::class, 'delete'])->name('user.issue-delete');
    });
});

// Public routes
Route::get('/auth/forgot-password', [AuthController::class, 'forgot']);
