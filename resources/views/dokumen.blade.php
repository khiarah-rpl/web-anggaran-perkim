@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body p-4">
        <h4 class="fw-bold text-success mb-3"><i class="fa-solid fa-folder-open me-2"></i>Arsip Dokumen Kantor</h4>
        <p class="text-muted">Penyimpanan file fisik digital untuk kebutuhan administrasi kantor.</p>
        <hr>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-3 border rounded bg-light">
                    <h6 class="fw-bold"><i class="fa-solid fa-file-pdf text-danger me-2"></i>Dokumen Ringkasan Kontrak (25 Poin)</h6>
                    <small class="text-muted">Jumlah Tersimpan: **{{ $totalKontrak }} berkas**</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border rounded bg-light">
                    <h6 class="fw-bold"><i class="fa-solid fa-file-excel text-success me-2"></i>Rekapitulasi Excel SPM</h6>
                    <small class="text-muted">Siap diekspor kapan saja.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection