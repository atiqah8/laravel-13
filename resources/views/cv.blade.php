@php
    // === EDIT DATA DIRI DI SINI ===
    $profil = [
        'nama'    => 'Atiqah Nur Aqillah',
        'peran'   => 'Mahasiswa Teknik Informatika',
        'tentang' => 'Mahasiswa yang suka membangun aplikasi web dengan Laravel dan MySQL. Senang belajar hal baru dan mengerjakan proyek nyata.',
        'email'   => 'atiqa25ti@mahasiswa,pcr.ac.id',
        'lokasi'  => 'Indonesia',
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV - {{ $profil['nama'] }}</title>
    <style>
        :root { --bg:#f6f7fb; --card:#fff; --ink:#1b2333; --muted:#5b667a; --accent:#0f766e; --accent2:#134e4a; --line:#e3e7ef; }
        @media (prefers-color-scheme: dark) {
            :root { --bg:#0e131c; --card:#171e2b; --ink:#e8edf6; --muted:#9aa6bb; --accent:#2dd4bf; --accent2:#0f766e; --line:#263044; }
        }
        * { box-sizing: border-box; }
        body { margin:0; font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background:var(--bg); color:var(--ink); line-height:1.6; }
        .wrap { max-width: 980px; margin: 0 auto; padding: 0 20px; }
        header.hero { background: linear-gradient(135deg, #134e4a, #0f766e); color:#fff; padding: 64px 0 56px; }
        .hero h1 { margin:0 0 6px; font-size: clamp(28px, 5vw, 44px); }
        .hero .peran { font-size: 18px; opacity:.9; margin-bottom: 16px; }
        .hero p { max-width: 620px; opacity:.92; margin: 0 0 20px; }
        .chips span { display:inline-block; background:rgba(255,255,255,.15); padding:4px 12px; border-radius:999px; font-size:14px; margin: 0 8px 8px 0; }
        section { padding: 40px 0 8px; }
        h2 { font-size: 22px; margin: 0 0 18px; padding-bottom: 8px; border-bottom: 2px solid var(--accent); display:inline-block; }
        .skill { margin-bottom: 14px; }
        .skill .row { display:flex; justify-content:space-between; font-size:15px; margin-bottom:4px; }
        .bar { height:10px; background: var(--line); border-radius:999px; overflow:hidden; }
        .bar i { display:block; height:100%; background: var(--accent); border-radius:999px; }
        .grid { display:grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
        .card { background:var(--card); border:1px solid var(--line); border-radius:14px; overflow:hidden; display:flex; flex-direction:column; }
        .thumb { height:160px; background: linear-gradient(135deg, var(--accent2), var(--accent)); display:flex; align-items:center; justify-content:center; color:#fff; font-size:44px; font-weight:700; }
        .thumb img { width:100%; height:100%; object-fit:cover; display:block; }
        .card .body { padding: 16px; display:flex; flex-direction:column; flex:1; }
        .card h3 { margin:0 0 4px; font-size:18px; }
        .card .tahun { color:var(--muted); font-size:13px; margin-bottom:8px; }
        .card p { margin:0 0 12px; color:var(--muted); font-size:15px; }
        .tags { margin-top:auto; }
        .tags span { display:inline-block; font-size:12px; border:1px solid var(--line); padding:2px 10px; border-radius:999px; margin: 0 6px 6px 0; color:var(--muted); }
        .card a.link { color:var(--accent); font-weight:600; text-decoration:none; font-size:14px; }
        .kosong { color:var(--muted); }
        footer { margin-top: 48px; padding: 24px 0; border-top:1px solid var(--line); color:var(--muted); font-size:14px; }
        footer a { color: var(--accent); }
    </style>
</head>
<body>
    <header class="hero">
        <div class="wrap">
            <h1>{{ $profil['nama'] }}</h1>
            <div class="peran">{{ $profil['peran'] }}</div>
            <p>{{ $profil['tentang'] }}</p>
            <div class="chips">
                <span>{{ $profil['email'] }}</span>
                <span>{{ $profil['lokasi'] }}</span>
            </div>
        </div>
    </header>

    <div class="wrap">
        <section>
            <h2>Skill</h2>
            @forelse ($dataSkill as $s)
                <div class="skill">
                    <div class="row"><span>{{ $s->nama }}</span><span>{{ $s->level }}%</span></div>
                    <div class="bar"><i style="width: {{ $s->level }}%"></i></div>
                </div>
            @empty
                <p class="kosong">Belum ada skill. Tambahkan lewat halaman admin.</p>
            @endforelse
        </section>

        <section>
            <h2>Portofolio</h2>
            <div class="grid">
                @forelse ($dataPortofolio as $p)
                    <article class="card">
                        <div class="thumb">
                            @if ($p->gambar)
                                <img src="{{ asset('uploads/portofolio/' . $p->gambar) }}" alt="{{ $p->judul }}">
                            @else
                                {{ strtoupper(mb_substr($p->judul, 0, 1)) }}
                            @endif
                        </div>
                        <div class="body">
                            <h3>{{ $p->judul }}</h3>
                            <div class="tahun">{{ $p->tahun }}</div>
                            <p>{{ $p->deskripsi }}</p>
                            @if ($p->teknologi)
                                <div class="tags">
                                    @foreach (explode(',', $p->teknologi) as $t)
                                        @if (trim($t) !== '')
                                            <span>{{ trim($t) }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if ($p->link)
                                <a class="link" href="{{ $p->link }}" target="_blank" rel="noopener">Lihat proyek &rarr;</a>
                            @endif
                        </div>
                    </article>
                @empty
                    <p class="kosong">Belum ada portofolio. Tambahkan lewat halaman admin.</p>
                @endforelse
            </div>
        </section>

        <footer>
            &copy; {{ date('Y') }} {{ $profil['nama'] }} &middot;
            <a href="{{ route('portofolio.index') }}">Kelola data (admin)</a>
        </footer>
    </div>
</body>
</html>
