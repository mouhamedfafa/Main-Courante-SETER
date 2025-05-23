<?php

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntiteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ListeDiffusionController;

Route::get('/', function () {
    return view('auth/boxed-signin');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('index');


});
//Route eneite
Route::get('/entites', [EntiteController::class, 'create'])->name('entite.creation');
Route::post('/entites/store', [EntiteController::class, 'store'])->name('entites.store');
Route::get('/entites/index', [EntiteController::class, 'index'])->name('entites.index');
Route::put('/entites/{id}', [EntiteController::class, 'update'])->name('entites.update');
Route::get('/entites/{id}/edit', [EntiteController::class, 'edit'])->name('entites.edit');
Route::delete('/entites/{id}', [EntiteController::class, 'destroy'])->name('entites.destroy');

// Routes  permissions
Route::get('/permissions', [PermissionController::class, 'create'])->name('permission.creation');
Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/index', [PermissionController::class, 'index'])->name('permissions.index');
Route::put('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');

Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');


// Routes  utilisateurs
Route::get('/users', [UserController::class, 'create'])->name('users.creation');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


//Gestion des rôles

Route::get('/roles', [RoleController::class, 'create'])->name('roles.creation');
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');

Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

//Liste de diffusion
Route::get('/liste_diffusions', [ListeDiffusionController::class, 'index'])->name('liste_diffusions.index');
Route::get('/liste_diffusions/create', [ListeDiffusionController::class, 'create'])->name('liste_diffusions.create');
Route::post('/liste_diffusions/store', [ListeDiffusionController::class, 'store'])->name('liste_diffusions.store');
Route::get('/liste_diffusions/{id}/edit', [ListeDiffusionController::class, 'edit'])->name('liste_diffusions.edit');
Route::put('/liste_diffusions/{id}', [ListeDiffusionController::class, 'update'])->name('liste_diffusions.update');
Route::delete('/liste_diffusions/{id}', [ListeDiffusionController::class, 'destroy'])->name('liste_diffusions.destroy');




Route::view('/dashboard', 'index');
Route::view('/analytics', 'analytics');
Route::view('/finance', 'finance');
Route::view('/crypto', 'crypto');

Route::view('/apps/chat', 'apps.chat');
Route::view('/apps/mailbox', 'apps.mailbox');
Route::view('/apps/todolist', 'apps.todolist');
Route::view('/apps/notes', 'apps.notes');
Route::view('/apps/scrumboard', 'apps.scrumboard');
Route::view('/apps/contacts', 'apps.contacts');
Route::view('/apps/calendar', 'apps.calendar');

Route::view('/apps/invoice/list', 'apps.invoice.list');
Route::view('/apps/invoice/preview', 'apps.invoice.preview');
Route::view('/apps/invoice/add', 'apps.invoice.add');
Route::view('/apps/invoice/edit', 'apps.invoice.edit');

Route::view('/components/tabs', 'ui-components.tabs');
Route::view('/components/accordions', 'ui-components.accordions');
Route::view('/components/modals', 'ui-components.modals');
Route::view('/components/cards', 'ui-components.cards');
Route::view('/components/carousel', 'ui-components.carousel');
Route::view('/components/countdown', 'ui-components.countdown');
Route::view('/components/counter', 'ui-components.counter');
Route::view('/components/sweetalert', 'ui-components.sweetalert');
Route::view('/components/timeline', 'ui-components.timeline');
Route::view('/components/notifications', 'ui-components.notifications');
Route::view('/components/media-object', 'ui-components.media-object');
Route::view('/components/list-group', 'ui-components.list-group');
Route::view('/components/pricing-table', 'ui-components.pricing-table');
Route::view('/components/lightbox', 'ui-components.lightbox');

Route::view('/elements/alerts', 'elements.alerts');
Route::view('/elements/avatar', 'elements.avatar');
Route::view('/elements/badges', 'elements.badges');
Route::view('/elements/breadcrumbs', 'elements.breadcrumbs');
Route::view('/elements/buttons', 'elements.buttons');
Route::view('/elements/buttons-group', 'elements.buttons-group');
Route::view('/elements/color-library', 'elements.color-library');
Route::view('/elements/dropdown', 'elements.dropdown');
Route::view('/elements/infobox', 'elements.infobox');
Route::view('/elements/jumbotron', 'elements.jumbotron');
Route::view('/elements/loader', 'elements.loader');
Route::view('/elements/pagination', 'elements.pagination');
Route::view('/elements/popovers', 'elements.popovers');
Route::view('/elements/progress-bar', 'elements.progress-bar');
Route::view('/elements/search', 'elements.search');
Route::view('/elements/tooltips', 'elements.tooltips');
Route::view('/elements/treeview', 'elements.treeview');
Route::view('/elements/typography', 'elements.typography');

Route::view('/charts', 'charts');
Route::view('/widgets', 'widgets');
Route::view('/font-icons', 'font-icons');
Route::view('/dragndrop', 'dragndrop');

Route::view('/tables', 'tables');

Route::view('/datatables/advanced', 'datatables.advanced');
Route::view('/datatables/alt-pagination', 'datatables.alt-pagination');
Route::view('/datatables/basic', 'datatables.basic');
Route::view('/datatables/checkbox', 'datatables.checkbox');
Route::view('/datatables/clone-header', 'datatables.clone-header');
Route::view('/datatables/column-chooser', 'datatables.column-chooser');
Route::view('/datatables/export', 'datatables.export');
Route::view('/datatables/multi-column', 'datatables.multi-column');
Route::view('/datatables/multiple-tables', 'datatables.multiple-tables');
Route::view('/datatables/order-sorting', 'datatables.order-sorting');
Route::view('/datatables/range-search', 'datatables.range-search');
Route::view('/datatables/skin', 'datatables.skin');
Route::view('/datatables/sticky-header', 'datatables.sticky-header');

Route::view('/forms/basic', 'forms.basic');
Route::view('/forms/input-group', 'forms.input-group');
Route::view('/forms/layouts', 'forms.layouts');
Route::view('/forms/validation', 'forms.validation');
Route::view('/forms/input-mask', 'forms.input-mask');
Route::view('/forms/select2', 'forms.select2');
Route::view('/forms/touchspin', 'forms.touchspin');
Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
Route::view('/forms/switches', 'forms.switches');
Route::view('/forms/wizards', 'forms.wizards');
Route::view('/forms/file-upload', 'forms.file-upload');
Route::view('/forms/quill-editor', 'forms.quill-editor');
Route::view('/forms/markdown-editor', 'forms.markdown-editor');
Route::view('/forms/date-picker', 'forms.date-picker');
Route::view('/forms/clipboard', 'forms.clipboard');

Route::view('/users/profile', 'users.profile');
Route::view('/users/user-account-settings', 'users.user-account-settings');

Route::view('/pages/knowledge-base', 'pages.knowledge-base');
Route::view('/pages/contact-us-boxed', 'pages.contact-us-boxed');
Route::view('/pages/contact-us-cover', 'pages.contact-us-cover');
Route::view('/pages/faq', 'pages.faq');
Route::view('/pages/coming-soon-boxed', 'pages.coming-soon-boxed');
Route::view('/pages/coming-soon-cover', 'pages.coming-soon-cover');
Route::view('/pages/error404', 'pages.error404');
Route::view('/pages/error500', 'pages.error500');
Route::view('/pages/error503', 'pages.error503');
Route::view('/pages/maintenence', 'pages.maintenence');

Route::view('/auth/boxed-lockscreen', 'auth.boxed-lockscreen');
Route::view('/auth/boxed-signin', 'auth.boxed-signin');
// Route::view('/auth/boxed-signup', 'auth.boxed-signup');
Route::view('/auth/boxed-password-reset', 'auth.boxed-password-reset');
Route::view('/auth/cover-login', 'auth.cover-login');
Route::view('/auth/cover-register', 'auth.cover-register');
Route::view('/auth/cover-lockscreen', 'auth.cover-lockscreen');
Route::view('/auth/cover-password-reset', 'auth.cover-password-reset');
