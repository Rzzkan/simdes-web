<?php

namespace App\Providers;

use App\Models\KonfigurasiModel;
use App\Models\PengaduanModel;
use App\Models\PengajuanSuratModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data_konfig = KonfigurasiModel::first();
        $data_notif_pengaduan = PengaduanModel::where('status_notif', 0)->count();
        $data_notif_pengajuan = PengajuanSuratModel::where('status_notif', 0)->count();
        $data = array(
            'data_konfig' => $data_konfig,
            'data_notif_pengaduan' => $data_notif_pengaduan,
            'data_notif_pengajuan' => $data_notif_pengajuan,
        );

        View::share("service", $data);
    }
}
