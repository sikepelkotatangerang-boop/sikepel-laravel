<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keluar - {{ $doc->nomor_surat }}</title>
    <style>
        body { font-family: 'Times New Roman', serif; font-size: 12pt; line-height: 1.6; }
        .kop { text-align: center; margin-bottom: 20px; }
        .kop h2 { margin: 0; font-size: 14pt; }
        .kop p { margin: 2px 0; font-size: 10pt; }
        .kop hr { border: 1px solid #000; margin-top: 5px; }
        .nomor { text-align: center; margin: 15px 0; font-weight: bold; }
        .isi { text-align: justify; margin-top: 20px; }
        .tembusan { margin-top: 30px; font-size: 11pt; }
        .footer { margin-top: 50px; text-align: right; }
        .footer p { margin: 2px 0; }
        .footer .ttd { margin-top: 60px; }
    </style>
</head>
<body>
    <div class="kop">
        <h2>PEMERINTAH KOTA TANGERANG</h2>
        <h2>KECAMATAN {{ strtoupper($doc->kelurahan->kecamatan ?? '') }}</h2>
        <h2>KELURAHAN {{ strtoupper($doc->kelurahan->nama_kelurahan ?? '') }}</h2>
        <p>{{ $doc->kelurahan->alamat ?? '' }}</p>
        <hr>
    </div>

    <div class="nomor">
        <p>Nomor: {{ $doc->nomor_surat }}</p>
        <p>Lampiran: {{ $doc->jumlah_lampiran ?? '-' }}</p>
        <p>Perihal: {{ $doc->perihal }}</p>
    </div>

    <div class="isi">
        <p>Kepada Yth.</p>
        <p>{{ $doc->tujuan }}</p>
        <p>di -</p>
        <p>Tempat</p>
        {!! nl2br(e($doc->isi_surat ?? '')) !!}
    </div>

    <div class="footer">
        <p>{{ $doc->kelurahan->nama_kelurahan ?? '' }}, {{ $doc->tanggal_surat?->isoFormat('D MMMM Y') }}</p>
        <p><strong>{{ $doc->akhiran ?? 'a.n. LURAH' }}</strong></p>
        <div class="ttd">
            <p><strong>{{ $doc->nama_pejabat ?? '' }}</strong></p>
            <p>{{ $doc->nip_pejabat ?? '' }}</p>
            <p>{{ $doc->jabatan ?? '' }}</p>
        </div>
    </div>
</body>
</html>
