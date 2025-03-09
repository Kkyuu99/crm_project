    <?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\IssueController;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\UserProfileController;
    use App\Http\Controllers\ChangePasswordController;
    use App\Http\Controllers\ForgotPasswordController;
    use App\Http\Controllers\ResetPasswordController;
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
    })->middleware('auth');

    Route::get('login', [AuthController::class, 'get_login'])->name('login')->middleware('guest');
    Route::post('login', [AuthController::class, 'post_login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

    Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

        Route::get('/profile/{id}', [UserProfileController::class, 'show'])->name('admin.user-profile');
        Route::get('/profile/{id}/profile-edit', [UserProfileController::class, 'edit'])->name('admin.profile-edit');
        Route::put('/profile/{id}/profile-edit', [UserProfileController::class, 'edit'])->name('admin.profile-edit');
        Route::put('/profile/{id}/profile-update', [UserProfileController::class, 'update'])->name('admin.profile-update');
        Route::put('/profile/{id}/profile-delete', [UserProfileController::class, 'delete'])->name('admin.profile-delete');
        Route::delete('/issues/{id}/remove-profile-pic', [UserProfileController::class, 'removeProfilePic'])->name('remove-profile-pic');

        Route::get('/profile/{id}/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('admin.change-password-form');
        Route::post('/profile/{id}/change-password', [ChangePasswordController::class, 'changePassword'])->name('admin.change-password');

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
        Route::delete('/issues/{id}/remove-attachment', [IssueController::class, 'removeAttachment'])->name('admin.remove-attachment');

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

        Route::get('/profile/{id}', [UserProfileController::class, 'show'])->name('user.user-profile');
        Route::get('/profile/{id}/profile-edit', [UserProfileController::class, 'edit'])->name('user.profile-edit');
        Route::put('/profile/{id}/profile-edit', [UserProfileController::class, 'edit'])->name('user.profile-edit');
        Route::put('/profile/{id}/profile-update', [UserProfileController::class, 'update'])->name('user.profile-update');
        Route::put('/profile/{id}/profile-delete', [UserProfileController::class, 'delete'])->name('user.profile-delete');
        Route::delete('/issues/{id}/remove-profile-pic', [UserProfileController::class, 'removeProfilePic'])->name('remove-profile-pic');

        Route::get('/profile/{id}/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('user.change-password-form');
        Route::post('/profile/{id}/change-password', [ChangePasswordController::class, 'changePassword'])->name('user.change-password');

        Route::get('/project-list', [ProjectController::class, 'index'])->name('user.project-list');
        Route::get('/project-create', [ProjectController::class, 'create'])->name('user.project-create');
        Route::post('/project-store', [ProjectController::class, 'store'])->name('user.project-store');
        Route::get('/projects/{id}',[ProjectController::class,'show'])->name('user.project-detail');
        Route::get('/projects/{id}/project-edit', [ProjectController::class, 'edit'])->name('user.project-edit');
        Route::put('/projects/{id}/project-edit', [ProjectController::class, 'edit'])->name('user.project-edit');
        Route::put('/projects/{id}/project-update', [ProjectController::class, 'update'])->name('user.project-update');
        Route::delete('/projects/{id}/project-delete', [ProjectController::class, 'delete'])->name('user.project-delete');

        Route::get('/issue-list', [IssueController::class, 'index'])->name('user.issue-list');
        Route::get('/issue-create', [IssueController::class, 'create'])->name('user.issue-create');
        Route::post('/issue-store', [IssueController::class, 'store'])->name('user.issue-store');
        Route::get('/issues/{id}',[IssueController::class,'show'])->name('user.issue-detail');
        Route::put('/issues/{id}/issue-edit', [IssueController::class, 'edit'])->name('user.issue-edit');
        Route::put('/issues/{id}/issue-update', [IssueController::class, 'update'])->name('user.issue-update');
        Route::delete('/issues/{id}/issue-delete', [IssueController::class, 'delete'])->name('user.issue-delete');
        Route::delete('/issues/{id}/remove-attachment', [IssueController::class, 'removeAttachment'])->name('user.remove-attachment');

    });



