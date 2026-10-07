@extends('layouts.app')

@section('title', 'Portfolio - Mahasiswa')

@push('styles')
<style>
    #home {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    #home::before {
        content: '';
        position: absolute;
        width: 600px; height: 600px;
        border-radius: 50%;
        background: radial-gradient(circle, var(--glow1), transparent 70%);
        top: -100px; right: -100px;
        pointer-events: none;
    }

    #home::after {
        content: '';
        position: absolute;
        width: 400px; height: 400px;
        border-radius: 50%;
        background: radial-gradient(circle, var(--glow2), transparent 70%);
        bottom: 0; left: -100px;
        pointer-events: none;
    }

    .hero-content { position: relative; z-index: 1; }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 999px;
        padding: 0.4rem 1rem;
        font-size: 0.82rem;
        color: var(--muted);
        margin-bottom: 2rem;
        animation: fadeUp 0.6s ease forwards;
    }

    .hero-badge span {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: var(--accent3);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
    }

    .hero-title {
        font-family: 'Syne', sans-serif;
        font-size: clamp(3rem, 8vw, 5.5rem);
        font-weight: 800;
        line-height: 1.05;
        margin-bottom: 1.5rem;
        animation: fadeUp 0.7s 0.1s ease both;
    }

    .hero-subtitle {
        font-size: 1.15rem;
        color: var(--muted);
        max-width: 520px;
        margin-bottom: 2.5rem;
        animation: fadeUp 0.7s 0.2s ease both;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        animation: fadeUp 0.7s 0.3s ease both;
    }

    .hero-scroll {
        position: absolute;
        bottom: 2.5rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
        color: var(--muted);
        font-size: 0.75rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); }
        50% { transform: translateX(-50%) translateY(-8px); }
    }

    /* ══════════════════════════════
       ABOUT HEHEHEHE
    ══════════════════════════════ */
    #about { background: var(--surface); }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
    }

    .about-image-wrap {
        position: relative;
    }

    .about-image-box {
        width: 100%;
        aspect-ratio: 4/5;
        border-radius: 20px;
        background: var(--card);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 6rem;
        position: relative;
        overflow: hidden;
    }

    .about-image-box::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, var(--glow1), var(--glow2));
        opacity: 0.5;
    }

    .about-image-box i { position: relative; z-index: 1; }

    .about-deco {
        position: absolute;
        bottom: -20px; right: -20px;
        width: 120px; height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent1), var(--accent2));
        opacity: 0.15;
        z-index: -1;
    }

    .about-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 2rem;
    }

    .stat-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.2rem;
        text-align: center;
    }

    .stat-number {
        font-family: 'Syne', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--accent1), var(--accent2));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-label { font-size: 0.8rem; color: var(--muted); margin-top: 0.2rem; }

    /* ══════════════════════════════
       SKILLS HEHEHE
    ══════════════════════════════ */
    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .skill-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.8rem;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .skill-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--accent1), var(--accent2));
        transform: scaleX(0);
        transition: transform 0.3s;
    }

    .skill-card:hover { transform: translateY(-4px); border-color: rgba(255,107,53,0.3); }
    .skill-card:hover::before { transform: scaleX(1); }

    .skill-icon {
        font-size: 2.2rem;
        margin-bottom: 1rem;
    }

    .skill-name {
        font-family: 'Syne', sans-serif;
        font-size: 1.05rem;
        font-weight: 700;
        margin-bottom: 0.8rem;
    }

    .skill-bar-bg {
        height: 6px;
        background: var(--surface);
        border-radius: 999px;
        overflow: hidden;
    }

    .skill-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--accent1), var(--accent2));
        border-radius: 999px;
        transition: width 1.5s ease;
    }

    .skill-level {
        font-size: 0.78rem;
        color: var(--muted);
        margin-top: 0.4rem;
        text-align: right;
    }

    /* ══════════════════════════════
       PROJECTS HEWHEHH
    ══════════════════════════════ */
    #projects { background: var(--surface); }

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
    }

    .project-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s;
    }

    .project-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(0,0,0,0.4); }

    .project-thumbnail {
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        position: relative;
        overflow: hidden;
    }

    .project-thumb-1 { background: linear-gradient(135deg, #ff6b35, #f7c59f); }
    .project-thumb-2 { background: linear-gradient(135deg, #7c3aed, #c4b5fd); }
    .project-thumb-3 { background: linear-gradient(135deg, #06d6a0, #0891b2); }

    .project-body { padding: 1.5rem; }

    .project-tags { display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 0.8rem; }

    .tag {
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        padding: 0.2rem 0.7rem;
        border-radius: 999px;
        background: rgba(255,107,53,0.1);
        color: var(--accent1);
        border: 1px solid rgba(255,107,53,0.2);
    }

    .tag.purple {
        background: rgba(124,58,237,0.1);
        color: #c4b5fd;
        border-color: rgba(124,58,237,0.2);
    }

    .tag.green {
        background: rgba(6,214,160,0.1);
        color: var(--accent3);
        border-color: rgba(6,214,160,0.2);
    }

    .project-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .project-desc { font-size: 0.88rem; color: var(--muted); line-height: 1.6; margin-bottom: 1.2rem; }

    .project-links { display: flex; gap: 0.8rem; }

    .project-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--muted);
        text-decoration: none;
        transition: color 0.2s;
    }

    .project-link:hover { color: var(--accent1); }

    /* ══════════════════════════════
       CONTACT EHHEH
    ══════════════════════════════ */
    .contact-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
    }

    .contact-info {
        width: min(100%, 560px);
    }

    .contact-info h3 {
        font-family: 'Syne', sans-serif;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .contact-info p { color: var(--muted); font-size: 0.95rem; line-height: 1.7; margin-bottom: 2rem; }

    .contact-links { display: flex; flex-direction: column; gap: 0.8rem; }

    .contact-link {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        color: var(--muted);
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s;
    }

    .contact-link i {
        width: 36px; height: 36px;
        border-radius: 8px;
        background: var(--card);
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        flex-shrink: 0;
        transition: all 0.3s;
    }

    .contact-link:hover { color: var(--text); }
    .contact-link:hover i { border-color: var(--accent1); color: var(--accent1); }

    /* ══════════════════════════════
       RESPONSIVE EHHEH
    ══════════════════════════════ */
    @media (max-width: 768px) {
        .about-grid { grid-template-columns: 1fr; }
        .contact-wrapper { gap: 2.5rem; }
        .about-image-box { aspect-ratio: 3/2; }
        .nav-links { display: none; }
    }
</style>
@endpush

@section('content')

{{-- ═══════════════════════════════════
     HERO
════════════════════════════════════ --}}
<section class="section" id="home">
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <span></span>
                Tersedia untuk Kolaborasi & Magang
            </div>

            <h1 class="hero-title">
                Halo, Saya<br>
                <span class="gradient-text">Yubel Joshua</span>
            </h1>

            <p class="hero-subtitle">
                Mahasiswa jurusan Computer Science yang suka berinteraksi dengan orang dalam bisnis terutama dalam finance.
            </p>

            <div class="hero-actions">
                <a href="#projects" class="btn btn-primary">
                    <i class="fas fa-rocket"></i>
                    Lihat Projects
                </a>
                <a href="#contact" class="btn btn-outline">
                    <i class="fas fa-envelope"></i>
                    Hubungi Saya
                </a>
            </div>
        </div>
    </div>

    <div class="hero-scroll">
        <span>Scroll</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

{{-- ═══════════════════════════════════
     ABOUT
════════════════════════════════════ --}}
<section class="section" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-image-wrap">
                <div class="about-image-box">
                    <img src="{{ asset('images/foto-saya.jpeg') }}"
                         alt="Foto Saya"
                         style="widh:100%; height:100%; object-fit:cover; border-radius:20px; position:relative; z-index:1;">
                </div>
                <div class="about-deco"></div>
            </div>

            <div class="about-text">
                <span class="section-tag">About Me</span>
                <h2 class="section-title">
                    Seorang <span class="gradient-text">Mahasiswa</span><br>
                    yang Ingin Tahu
                </h2>
                <p style="color: var(--muted); margin-bottom: 1.5rem; line-height: 1.8;">
                    Saya adalah mahasiswa semester 5 di Universitas Bina Nusantara dengan
                    minat besar di bidang web development, UI/UX, serta database. Saya percaya bahwa teknologi
                    terbaik adalah yang mudah digunakan dan berdampak positif bagi masyarakat.
                </p>
                <p style="color: var(--muted); line-height: 1.8;">
                    Di luar kuliah, saya aktif membuka jasa membuat web kepada teman-teman saya yang sedang menjalankan usaha.
                </p>

                <div class="about-stats">
                    <div class="stat-card">
                        <div class="stat-number">6</div>
                        <div class="stat-label">Projects Selesai</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Bantu Tugas</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">2+</div>
                        <div class="stat-label">Tahun Belajar Coding</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">4.5★</div>
                        <div class="stat-label">Rating di Freelance</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     SKILLS
════════════════════════════════════ --}}
<section class="section" id="skills">
    <div class="container">
        <span class="section-tag">Skills</span>
        <h2 class="section-title">
            Apa yang Saya <span class="gradient-text">Kuasai</span>
        </h2>

        <div class="skills-grid">
            @php
            $skills = [
                ['icon' => 'fa-html5', 'name' => 'HTML', 'level' => 90, 'label' => 'Expert'],
                ['icon' => 'fa-css3-alt', 'name' => 'CSS', 'level' => 90, 'label' => 'Expert'],
                ['icon' => 'fa-js', 'name' => 'JavaScript', 'level' => 78, 'label' => 'Advanced'],
                ['icon' => 'fa-php', 'name' => 'PHP', 'level' => 75, 'label' => 'Advanced'],
                ['icon' => 'fa-laravel', 'name' => 'Laravel', 'level' => 75, 'label' => 'Advanced'],
                ['icon' => 'fa-react', 'name' => 'React.js', 'level' => 65, 'label' => 'Intermediate'],
                ['icon' => 'fa-mysql', 'name' => 'MySQL', 'level' => 80, 'label' => 'Advanced'],
                ['icon' => 'fa-figma', 'name' => 'Figma', 'level' => 70, 'label' => 'Intermediate'],
            ];
            @endphp

            @foreach($skills as $skill)
            <div class="skill-card">
                <div class="skill-icon"><i class="fab {{ $skill['icon'] }}" aria-hidden="true"></i></div>
                <div class="skill-name">{{ $skill['name'] }}</div>
                <div class="skill-bar-bg">
                    <div class="skill-bar" style="width: {{ $skill['level'] }}%"></div>
                </div>
                <div class="skill-level">{{ $skill['label'] }} — {{ $skill['level'] }}%</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     PROJECTS
════════════════════════════════════ --}}
<section class="section" id="projects">
    <div class="container">
        <span class="section-tag">Projects</span>
        <h2 class="section-title">
            Proyek <span class="gradient-text">Pilihan Saya</span>
        </h2>

        <div class="projects-grid">
            @php
            $projects = [
                [
                    'thumb' => 'project-thumb-1',
                    'image' => 'images/debouquets-banner.jpeg',
                    'tags' => [['JavaScript', ''], ['Figma', 'purple']],
                    'title' => 'DeBouquets',
                    'desc' => 'DeBouquets merupakan usaha yang bergerak pada bidang penjualan bouquet bunga dan layanan custom order',
                    'platform' => 'figma',
                    'link' => 'https://www.figma.com/file/3EHrChIRnCXbywhxvdHJiu/FigmaDeBouquets'
                ],
                [
                    'thumb' => 'project-thumb-2',
                    'image' => 'images/IShowKost-banner.jpeg',
                    'tags' => [['CSS', ''], ['HTML', 'purple']],
                    'title' => 'IShowKost',
                    'desc' => 'IshowKost memanfaatkan teknologi untuk berkembang dari aplikasi cari kos menjadi aplikasi yang memudahkan calon anak kos untuk booking properti kos dan juga melakukan pembayaran kos.',
                    'platform' => 'github',
                    'link' => 'https://github.com/stickyfinger222/web-kos'
                ],
                [
                    'thumb' => 'project-thumb-3',
                    'image' => 'images/predatoria-banner.jpeg',
                    'tags' => [['AR', ''], ['CSS', 'purple']],
                    'title' => 'Predatoria',
                    'desc' => 'Predatoria berangkat dari permasalahan dalam proses pembelajaran sains, khususnya dalam topik keanekaragaman hayati dan konservasi satwa liar, yang cenderung kurang diminati oleh siswa sekolah dasar.',
                    'platform' => 'github',
                    'link' => '#https://www.linkedin.com/safety/go/?url=https%3A%2F%2Fbeni1412.github.io%2Fvirtual%2F&urlhash=ToZy&mt=NQ6L6kRRhjyC8HSk6mTg2jt-4iRASncawgfAlVuilx5xQnVN8iiQAER9yTWt_EFcVlxuz4gT9lkp_rBjdj8zSSJ0x_QO&isSdui=true&lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_media_list%3BqtyrtRo2SBWY6RTFHd3Jcw%3D%3Dhttps://beni1412.github.io/virtual/'
                ],
            ];
            @endphp

            @foreach($projects as $p)
            <div class="project-card">
                <div class="project-thumbnail {{ $p['thumb'] }}">
    @if(isset($p['image']))
        <img src="{{ asset($p['image']) }}" alt="{{ $p['title'] }}" style="width: 100%; height: 100%; object-fit: cover;">
    @else
        {{ $p['icon'] }}
    @endif
</div>
                <div class="project-body">
                    <div class="project-tags">
                        @foreach($p['tags'] as $t)
                        <span class="tag {{ $t[1] }}">{{ $t[0] }}</span>
                        @endforeach
                    </div>
                    <div class="project-title">{{ $p['title'] }}</div>
                    <p class="project-desc">{{ $p['desc'] }}</p>
                    <div class="project-links">
                        <a href="{{ $p['link'] }}" class="project-link">
                            <i class="fab fa-{{ $p['platform'] }}"></i> {{ ucfirst($p['platform']) }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════
     CONTACT
════════════════════════════════════ --}}
<section class="section" id="contact">
    <div class="container">
        <span class="section-tag">Contact</span>
        <h2 class="section-title">
            Ayo <span class="gradient-text">Terhubung!</span>
        </h2>

        <div class="contact-wrapper">
            <div class="contact-info">
                <h3>Hubungi Saya</h3>
                <p>
                    Saya terbuka untuk peluang magang, freelance, atau sekadar ngobrol
                    seputar teknologi. Jangan ragu menghubungi saya!
                </p>
                <div class="contact-links">
                    <a href="mailto:Playstision7@gmail.com" class="contact-link">
                        <i class="fas fa-envelope"></i>
                        Playstision7@gmail.com
                    </a>
                    <a href="https://www.linkedin.com/in/yubel-hakinen-joshua-lita-3978b6439" class="contact-link" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-linkedin"></i>
                        Yubel Hakinen Joshua Lita
                    </a>
                    <a href="https://github.com/Yubeixuan" class="contact-link" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-github"></i>
                        Yubeixuan
                    </a>
                    <a href="https://www.instagram.com/yubeel_?stkn=MWtzejhhdGMyaW05YQ==" class="contact-link" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                        @yubeel_
                    </a>
                </div>
                <footer>
                    <p>© {{ date('Y') }} — dibuat dengan hati yang bahagia ;)</p>
                </footer>
            </div>
        </div>
    </div>
</section>

@endsection