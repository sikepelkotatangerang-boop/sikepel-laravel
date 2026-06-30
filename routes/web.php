<?php

use App\Livewire\Actions\Logout;
use App\Livewire\SuratKeluar\Create as SuratKeluarCreate;
use App\Livewire\SuratKeluar\Edit as SuratKeluarEdit;
use App\Livewire\SuratKeluar\Index as SuratKeluarIndex;
use App\Livewire\SuratMasuk\Create as SuratMasukCreate;
use App\Livewire\SuratMasuk\Edit as SuratMasukEdit;
use App\Livewire\SuratMasuk\Index as SuratMasukIndex;
use App\Livewire\SKTM\Create as SKTMCreate;
use App\Livewire\SKTM\Edit as SKTMEdit;
use App\Livewire\SKTM\Index as SKTMIndex;
use App\Livewire\BelumRumah\Create as BelumRumahCreate;
use App\Livewire\BelumRumah\Edit as BelumRumahEdit;
use App\Livewire\BelumRumah\Index as BelumRumahIndex;
use App\Livewire\Dashboard;
use App\Livewire\DocumentArchive\Index as DocumentArchiveIndex;
use App\Livewire\User\Index as UserIndex;
use App\Livewire\User\Create as UserCreate;
use App\Livewire\User\Edit as UserEdit;
use App\Livewire\Role\Index as RoleIndex;
use App\Livewire\Setting\Edit as SettingEdit;
use App\Livewire\Pejabat\Index as PejabatIndex;
use App\Livewire\Pejabat\Create as PejabatCreate;
use App\Livewire\Pejabat\Edit as PejabatEdit;
use App\Livewire\Notification\Index as NotificationIndex;
use App\Livewire\Report\Index as ReportIndex;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', Dashboard::class)
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::prefix('surat-keluar')->name('surat-keluar.')->group(function () {
        Route::get('/', SuratKeluarIndex::class)->name('index');
        Route::get('create', SuratKeluarCreate::class)->name('create');
        Route::get('{id}/edit', SuratKeluarEdit::class)->name('edit');
    });

    Route::prefix('surat-masuk')->name('surat-masuk.')->group(function () {
        Route::get('/', SuratMasukIndex::class)->name('index');
        Route::get('create', SuratMasukCreate::class)->name('create');
        Route::get('{id}/edit', SuratMasukEdit::class)->name('edit');
    });

    Route::prefix('sktm')->name('sktm.')->group(function () {
        Route::get('/', SKTMIndex::class)->name('index');
        Route::get('create', SKTMCreate::class)->name('create');
        Route::get('{id}/edit', SKTMEdit::class)->name('edit');
    });

    Route::prefix('belum-rumah')->name('belum-rumah.')->group(function () {
        Route::get('/', BelumRumahIndex::class)->name('index');
        Route::get('create', BelumRumahCreate::class)->name('create');
        Route::get('{id}/edit', BelumRumahEdit::class)->name('edit');
    });

    Route::get('arsip', DocumentArchiveIndex::class)->name('arsip');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', UserIndex::class)->name('index');
        Route::get('create', UserCreate::class)->name('create');
        Route::get('{id}/edit', UserEdit::class)->name('edit');
    });

    Route::get('roles', RoleIndex::class)->name('roles');
    Route::get('settings', SettingEdit::class)->name('settings');

    Route::prefix('pejabat')->name('pejabat.')->group(function () {
        Route::get('/', PejabatIndex::class)->name('index');
        Route::get('create', PejabatCreate::class)->name('create');
        Route::get('{id}/edit', PejabatEdit::class)->name('edit');
    });

    Route::get('notifications', NotificationIndex::class)->name('notifications');
    Route::get('reports', ReportIndex::class)->name('reports');

    Route::prefix('pdf')->name('pdf.')->group(function () {
        Route::get('surat-keluar/{id}', [PdfController::class, 'suratKeluar'])->name('surat-keluar');
        Route::get('sktm/{id}', [PdfController::class, 'sktm'])->name('sktm');
        Route::get('belum-rumah/{id}', [PdfController::class, 'belumRumah'])->name('belum-rumah');
        Route::get('report/{type}', [PdfController::class, 'report'])->name('report');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('logout', function (Logout $logout) {
        $logout();
        return redirect('/');
    })->name('logout');
});

require __DIR__.'/auth.php';
