<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Belum Rumah - {{ $doc->nomor_surat }}</title>
    <style>
        body { font-family: 'Times New Roman', serif; font-size: 12pt; line-height: 1.6; }
        .kop { text-align: center; margin-bottom: 20px; }
        .kop h2 { margin: 0; font-size: 14pt; }
        .kop p { margin: 2px 0; font-size: 10pt; }
        .kop hr { border: 1px solid #000; margin-top: 5px; }
        .title { text-align: center; margin: 15px 0; font-weight: bold; text-decoration: underline; font-size: 13pt; }
        .nomor { text-align: center; margin: 10px 0; }
        .data { margin-top: 20px; }
        .data table { width: 100%; }
        .data td { padding: 3px 5px; vertical-align: top; }
        .data .label { width: 120px; }
        .footer { margin-top: 50px; text-align: right; }
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

    <div class="title">SURAT KETERANGAN BELUM MEMILIKI RUMAH</div>
    <div class="nomor">Nomor: {{ $doc->nomor_surat }}</div>

    <p>Yang bertanda tangan di bawah ini, {{ $doc->jabatan ?? 'Lurah' }} {{ $doc->kelurahan->nama_kelurahan ?? '' }}, menerangkan bahwa:</p>

    <div class="data">
        <table>
            <tr><td class="label">Nama</td><td>: {{ $doc->nama_pemohon }}</td></tr>
            <tr><td>NIK</td><td>: {{ $doc->nik_pemohon }}</td></tr>
            <tr><td>Tempat/Tgl Lahir</td><td>: {{ $doc->tempat_lahir }}, {{ $doc->tanggal_lahir?->isoFormat('D MMMM Y') }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>: {{ $doc->kelamin_pemohon }}</td></tr>
            <tr><td>Agama</td><td>: {{ $doc->agama }}</td></tr>
            <tr><td>Pekerjaan</td><td>: {{ $doc->pekerjaan }}</td></tr>
            <tr><td>Status Perkawinan</td><td>: {{ $doc->perkawinan }}</td></tr>
            <tr><td>Kewarganegaraan</td><td>: {{ $doc->negara }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $doc->alamat }}, RT {{ $doc->rt }}/RW {{ $doc->rw }}, Kel. {{ $doc->kelurahan }}, Kec. {{ $doc->kecamatan }}, {{ $doc->kota_kabupaten }}</td></tr>
        </table>
    </div>

    <p>Dengan ini menerangkan bahwa yang bersangkutan <strong>BELUM MEMILIKI RUMAH</strong> dan surat ini dibuat untuk {{ $doc->peruntukan }}.</p>

    <div class="footer">
        <p>{{ $doc->kelurahan->nama_kelurahan ?? '' }}, {{ $doc->tanggal_surat?->isoFormat('D MMMM Y') }}</p>
        <p><strong>{{ $doc->jabatan ?? 'LURAH' }}</strong></p>
        <div class="ttd">
            <p><strong>{{ $doc->nama_pejabat ?? '' }}</strong></p>
            <p>{{ $doc->nip_pejabat ?? '' }}</p>
        </div>
    </div>
</body>
</html>
