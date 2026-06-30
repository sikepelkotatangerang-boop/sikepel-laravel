<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 10pt; }
        h2 { text-align: center; margin-bottom: 5px; }
        .subtitle { text-align: center; font-size: 9pt; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; font-size: 9pt; }
        th { background-color: #f0f0f0; font-weight: bold; }
        .ttd { margin-top: 40px; text-align: right; font-size: 9pt; }
    </style>
</head>
<body>
    <h2>{{ $title }}</h2>
    <p class="subtitle">Periode: {{ now()->isoFormat('D MMMM Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No. Surat</th>
                @if(in_array($type, ['sktm', 'belum-rumah']))
                    <th>Nama Pemohon</th>
                    <th>NIK</th>
                @else
                    <th>Perihal</th>
                    <th>Tujuan/Asal</th>
                @endif
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $d)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $d->nomor_surat ?? '-' }}</td>
                    @if(in_array($type, ['sktm', 'belum-rumah']))
                        <td>{{ $d->nama_pemohon ?? '-' }}</td>
                        <td>{{ $d->nik_pemohon ?? '-' }}</td>
                    @elseif($type === 'surat-keluar')
                        <td>{{ $d->perihal ?? '-' }}</td>
                        <td>{{ $d->tujuan ?? '-' }}</td>
                    @else
                        <td>{{ $d->perihal ?? '-' }}</td>
                        <td>{{ $d->asal_surat ?? '-' }}</td>
                    @endif
                    <td>{{ $d->tanggal_surat?->isoFormat('D/M/Y') }}</td>
                    <td>{{ $d->status ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd">
        <p>Mengetahui,</p>
        <p style="margin-top: 50px;">( ..................................... )</p>
    </div>
</body>
</html>
