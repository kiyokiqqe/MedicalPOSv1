<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RedirectController;

// Chief Controllers
use App\Http\Controllers\Chief\ChiefController;
use App\Http\Controllers\Chief\ChiefPatientController;
use App\Http\Controllers\Chief\ChiefUserController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\Admin\AdminMedicalCardController;

// Doctor Controllers
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\PatientController as DoctorPatientController;
use App\Http\Controllers\Doctor\DoctorMedicalCardController;
use App\Http\Controllers\Doctor\DoctorRecommendationController;

// Nurse Controllers
use App\Http\Controllers\Nurse\NurseController;
use App\Http\Controllers\Nurse\NursePatientController;
use App\Http\Controllers\Nurse\NurseRecommendationController;
use App\Http\Controllers\Nurse\NurseMedicalCardController;

// Pharmacist Controllers
use App\Http\Controllers\Pharmacist\PharmacistDashboardController;
use App\Http\Controllers\Pharmacist\MedicationController as PharmacistMedicationController;

// AdminPharmacist Controllers
use App\Http\Controllers\AdminPharmacist\AdminPharmacistController;
use App\Http\Controllers\AdminPharmacist\MedicationController as AdminPharmacistMedicationController;

// Головна (Welcome)
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('redirect.by.role')
        : view('welcome');
})->name('welcome');

// Група з middleware 'auth'
Route::middleware(['auth'])->group(function () {

    // Редірект за роллю
    Route::get('/redirect-by-role', [RedirectController::class, 'redirectByRole'])->name('redirect.by.role');

    /** =================== Завідувач (роль 1) =================== */
    Route::prefix('chief')->name('chief.')->middleware('role:1')->group(function () {
        Route::get('/dashboard', [ChiefController::class, 'index'])->name('dashboard');
        Route::resource('patients', ChiefPatientController::class);
        Route::resource('users', ChiefUserController::class);
    });

    /** =================== Адміністратор (роль 2) =================== */
    Route::prefix('admin')->name('admin.')->middleware('role:2')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('patients', AdminPatientController::class);
        Route::resource('users', AdminUserController::class);

        // Медичні картки
        Route::get('/medical-cards', [AdminMedicalCardController::class, 'index'])->name('medical_cards.index');
        Route::get('/patients/{patient}/medical-card/create', [AdminMedicalCardController::class, 'create'])->name('medical_cards.create');
        Route::post('/patients/{patient}/medical-card', [AdminMedicalCardController::class, 'store'])->name('medical_cards.store');
        Route::get('/medical-cards/{medicalCard}/edit', [AdminMedicalCardController::class, 'edit'])->name('medical_cards.edit');
        Route::put('/medical-cards/{medicalCard}', [AdminMedicalCardController::class, 'update'])->name('medical_cards.update');
        Route::delete('/medical-cards/{medicalCard}', [AdminMedicalCardController::class, 'destroy'])->name('medical_cards.destroy');
    });

    /** =================== Лікар (роль 3) =================== */
    Route::prefix('doctor')->name('doctor.')->middleware('role:3')->group(function () {
        Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
        Route::resource('patients', DoctorPatientController::class);

        // Медичні картки
        Route::get('/medical_cards/{medicalCard}', [DoctorMedicalCardController::class, 'show'])->name('medical_cards.show');
        Route::get('/medical_cards/{medicalCard}/edit', [DoctorMedicalCardController::class, 'edit'])->name('medical_cards.edit');
        Route::put('/medical_cards/{medicalCard}', [DoctorMedicalCardController::class, 'update'])->name('medical_cards.update');

        // Рекомендації
        Route::prefix('medical_cards/{medicalCard}')->group(function () {
            Route::get('/recommendations', [DoctorRecommendationController::class, 'index'])->name('recommendations.index');
            Route::get('/recommendations/create', [DoctorRecommendationController::class, 'create'])->name('recommendations.create');
            Route::post('/recommendations', [DoctorRecommendationController::class, 'store'])->name('recommendations.store');
        });

        Route::get('recommendations/{recommendation}', [DoctorRecommendationController::class, 'show'])->name('recommendations.show');
        Route::get('recommendations/{recommendation}/edit', [DoctorRecommendationController::class, 'edit'])->name('recommendations.edit');
        Route::put('recommendations/{recommendation}', [DoctorRecommendationController::class, 'update'])->name('recommendations.update');
        Route::delete('recommendations/{recommendation}', [DoctorRecommendationController::class, 'destroy'])->name('recommendations.destroy');
    });

    /** =================== Медсестра (роль 4) =================== */
    Route::prefix('nurse')->name('nurse.')->middleware('role:4')->group(function () {
        Route::get('/dashboard', [NurseController::class, 'index'])->name('dashboard');

        // Пацієнти
        Route::resource('patients', NursePatientController::class)->only(['index', 'show', 'edit', 'update']);

        // Медичні картки
        Route::get('medical_cards/{patient}', [NurseMedicalCardController::class, 'show'])->name('medical_cards.show');

        // Відзначення рекомендацій як виконаних
        Route::post('recommendations/{recommendation}/mark-done', [NurseRecommendationController::class, 'markDone'])->name('recommendations.mark_done');

    });

    /** =================== Фармацевт (роль 5) =================== */
    Route::prefix('pharmacist')->name('pharmacist.')->middleware('role:5')->group(function () {
        Route::get('/dashboard', [PharmacistDashboardController::class, 'index'])->name('dashboard');
        Route::get('medications', [PharmacistMedicationController::class, 'index'])->name('medications.index');
        Route::get('medications/{medication}', [PharmacistMedicationController::class, 'show'])->name('medications.show');
        Route::post('medications/{medication}/request', [PharmacistMedicationController::class, 'requestMedication'])->name('medications.request');
    });

    /** =================== Адмінфармацевт (роль 6) =================== */
    Route::prefix('adminpharmacist')->name('adminpharmacist.')->middleware('role:6')->group(function () {
        Route::get('/dashboard', [AdminPharmacistController::class, 'index'])->name('dashboard');
        Route::resource('medications', AdminPharmacistMedicationController::class);
    });

    /** =================== Профіль користувача =================== */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth (login, registration, password reset)
require __DIR__.'/auth.php';
