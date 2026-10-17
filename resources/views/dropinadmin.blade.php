<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Andy Brudtkuhl — Laravel Backend Developer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *, * + * { margin-top: 0; }
        :root {
            --ink: #18181b;
            --body: #27272a;
            --muted: #71717a;
            --faint: #a1a1aa;
            --line: #e4e4e7;
            --wash: #f4f4f5;
            --accent: #2563eb;
        }
        body {
            background: #fafafa;
            color: var(--ink);
            font-family: 'IBM Plex Mono', ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            line-height: 1.75;
            -webkit-font-smoothing: antialiased;
        }
        .page { max-width: 720px; margin: 0 auto; padding: 70px 24px 110px; }
        h1 { font-size: clamp(1.9rem, 5vw, 2.45rem); line-height: 1.15; letter-spacing: -.045em; margin-bottom: .55rem; }
        h2 { font-size: 1.08rem; line-height: 1.4; letter-spacing: -.02em; margin: 2.8rem 0 .6rem; }
        h2 .label { display: block; margin-bottom: .42rem; }
        h3 { font-size: .96rem; line-height: 1.45; margin: 0 0 .25rem; }
        p, li { color: var(--body); font-size: .94rem; }
        p { margin-bottom: 1.3rem; }
        a { color: var(--accent); text-decoration: underline; text-decoration-thickness: 1px; text-underline-offset: 3px; }
        a:hover { color: #1d4ed8; }
        .eyebrow, .label { color: var(--faint); font-size: .67rem; font-weight: 500; letter-spacing: .08em; text-transform: uppercase; }
        .eyebrow { margin-bottom: .75rem; }
        .subtitle { color: var(--muted); font-size: .88rem; margin-bottom: 2.7rem; }
        .contact-links { display: flex; flex-wrap: wrap; gap: .75rem; margin: -1.6rem 0 2.4rem; font-size: .78rem; }
        .contact-links a, .copy-email { color: var(--muted); }
        .copy-email { appearance: none; background: none; border: 0; cursor: pointer; display: inline-flex; align-items: center; gap: .4rem; font: inherit; padding: 0; }
        .copy-email svg { width: .85rem; height: .85rem; stroke: currentColor; stroke-width: 1.7; fill: none; }
        .copy-email:hover, .copy-email.is-copied { color: var(--accent); }
        .contact-links a:hover { color: var(--accent); }
        .contact { border-top: 1px solid var(--line); margin-top: 2rem; padding-top: 1.5rem; }
        .contact .contact-links { margin: 0 0 1.5rem; }
        .intro { color: var(--ink); font-size: 1.06rem; line-height: 1.7; }
        .note { background: var(--wash); border-radius: 6px; padding: 1rem 1.2rem .25rem; margin: 1.6rem 0; }
        .note p { color: var(--ink); }
        hr { border: 0; border-top: 1px solid var(--line); margin: 2.6rem 0; }
        ul { padding-left: 1.5rem; margin: .7rem 0 1.4rem; }
        li { margin-bottom: .45rem; }
        .work-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: .75rem; margin: 1rem 0 1.3rem; }
        .work { border: 1px solid var(--line); border-radius: 6px; padding: 1rem 1.05rem .85rem; background: #fff; }
        .work h3 { font-size: .95rem; }
        .work p { color: var(--muted); font-size: .78rem; line-height: 1.55; margin: .35rem 0 0; }
        .work .type { color: var(--faint); display: block; font-size: .64rem; letter-spacing: .06em; text-transform: uppercase; margin-bottom: .45rem; }
        .work a { text-decoration: none; }
        .work a:hover h3 { text-decoration: underline; text-underline-offset: 3px; }
        .skills { display: grid; gap: .72rem; margin: 1rem 0 1.4rem; }
        .skill { display: grid; grid-template-columns: 122px 1fr; gap: 1rem; }
        .skill .label { padding-top: .18rem; }
        .skill p { margin: 0; }
        .role { margin: 1.4rem 0 1.8rem; }
        .role-meta { color: var(--muted); font-size: .8rem; margin-bottom: .65rem; }
        .role p { margin-bottom: .9rem; }
        .products { border-left: 2px solid var(--line); color: var(--muted); font-size: .8rem; line-height: 1.8; margin: .9rem 0 0; padding-left: 1rem; }
        .closing { border-top: 1px solid var(--line); margin-top: 2.8rem; padding-top: 1.6rem; }
        .closing p { margin-bottom: 0; }
        @media (max-width: 560px) {
            .page { padding-top: 48px; }
            .work-grid { grid-template-columns: 1fr; }
            .skill { display: block; }
            .skill .label { display: block; margin-bottom: .15rem; }
        }
    </style>
</head>
<body>
    <article class="page">
        <p class="eyebrow">For DropinAdmin · Engineering / Remote / Contract</p>
        <h1>Andy Brudtkuhl</h1>
        <p class="subtitle">Senior Software Engineer &nbsp;|&nbsp; Laravel / PHP &nbsp;|&nbsp; SaaS &amp; APIs</p>

        <p class="intro">Most recently, I was a Senior Product Manager at <a href="https://laravel.com" target="_blank" rel="noopener">Laravel</a>, working directly with the engineering team on <a href="https://cloud.laravel.com" target="_blank" rel="noopener">Laravel Cloud</a> and its developer platform.</p>
        <p class="intro">I’m a senior software engineer and product builder with 20+ years of experience building web applications, SaaS products, APIs, integrations, and internal tools. I’m a longtime Laravel developer.</p>

        <div class="note">
            <p>The work you describe at DropinAdmin lines up closely with the work I’ve been doing for a long time: Laravel APIs, queues and jobs, data models, third-party integrations, and maintaining production applications as they grow.</p>
        </div>

        <p>I like backend work, but I also like understanding the product around it. I’ve built software from the initial idea through deployment, and I’ve spent plenty of time coming into existing applications, figuring out how they work, and making them more reliable.</p>

        <hr>

        <h2><span class="label">Selected work</span>Laravel-based products I’ve built and maintained</h2>
        <div class="work-grid">
            <article class="work"><span class="type">Surveys · SaaS</span><a href="https://surveysnaps.com" target="_blank" rel="noopener"><h3>SurveySnaps ↗</h3></a><p>Survey software for collecting and using feedback.</p></article>
            <article class="work"><span class="type">Product · Web app</span><a href="https://tapback.dev" target="_blank" rel="noopener"><h3>Tapback ↗</h3></a><p>A focused product built around simple interactions and data.</p></article>
            <article class="work"><span class="type">Communications · Workflow</span><a href="https://faxonline.app" target="_blank" rel="noopener"><h3>FaxOnline ↗</h3></a><p>Online faxing with payments, integrations, and background processing.</p></article>
            <article class="work"><span class="type">Automation · AI</span><a href="https://sitespellchecker.com" target="_blank" rel="noopener"><h3>SiteSpellChecker ↗</h3></a><p>Automated website checking as a repeatable service.</p></article>
            <article class="work"><span class="type">AI · Product tools</span><a href="https://pmprompt.com" target="_blank" rel="noopener"><h3>PMprompt ↗</h3></a><p>AI-powered tools for product managers.</p></article>
            <article class="work"><span class="type">Developer tool · Data</span><a href="https://jsonltools.com" target="_blank" rel="noopener"><h3>JSONLTools ↗</h3></a><p>Practical tools for working with JSONL data.</p></article>
        </div>
        <p>There’s more of the shelf at <a href="https://brudtkuhl.com/projects" target="_blank" rel="noopener">brudtkuhl.com/projects</a>.</p>

        <h2><span class="label">What I work with</span>Technical skills</h2>
        <div class="skills">
            <div class="skill"><span class="label">Backend</span><p>PHP, Laravel, C#, .NET, REST APIs, webhooks, Eloquent, queues &amp; jobs</p></div>
            <div class="skill"><span class="label">Frontend</span><p>Vue.js, Livewire, Tailwind CSS, JavaScript</p></div>
            <div class="skill"><span class="label">Data</span><p>MySQL, PostgreSQL, Redis, Elasticsearch</p></div>
            <div class="skill"><span class="label">Cloud &amp; DevOps</span><p>AWS, DigitalOcean, Laravel Forge, Docker, Linux, CI/CD, Git</p></div>
            <div class="skill"><span class="label">Other</span><p>Stripe, SaaS architecture, third-party integrations, performance optimization, PHPUnit/Pest, AI-assisted development</p></div>
        </div>

        <hr>

        <h2><span class="label">Experience</span>Where I’ve done this work</h2>

        <section class="role">
            <h3>Founder / Independent Software Consultant · 48Web, LLC</h3>
            <p class="role-meta">2007–Present</p>
            <p>Build and operate SaaS products and develop custom software for clients, with a focus on Laravel/PHP applications, APIs, integrations, and web-based products.</p>
            <ul>
                <li>Design and build Laravel applications from initial architecture through production deployment.</li>
                <li>Develop REST APIs, third-party integrations, background jobs/queues, payment systems, and internal tooling.</li>
                <li>Maintain and modernize existing applications, troubleshoot production issues, and improve performance and reliability.</li>
            </ul>
        </section>

        <section class="role">
            <h3>Senior Product Manager · <a href="https://laravel.com" target="_blank" rel="noopener">Laravel</a></h3>
            <p class="role-meta">May 2025–June 2026</p>
            <p>Worked directly with Laravel’s engineering team on <a href="https://cloud.laravel.com" target="_blank" rel="noopener">Laravel Cloud</a> and its developer platform.</p>
            <p>Helped develop and launch Cloud capabilities including Managed Queues, Cloud API and CLI, Secrets Manager, WAF, and scale-to-zero compute. Worked closely with engineers on developer experience, APIs, infrastructure, architecture, and production platform capabilities.</p>
        </section>

        <section class="role">
            <h3>Director, Software Engineering · Bound</h3>
            <p class="role-meta">June 2026–Present</p>
            <p>Lead software engineering while remaining involved in architecture, technical decisions, integrations, and product development.</p>
        </section>

        <section class="role">
            <h3>Senior Technical Product Manager · Ford Motor Company</h3>
            <p class="role-meta">October 2021–May 2025</p>
            <p>Worked across software engineering and product teams on large-scale digital products, APIs, integrations, and platform initiatives.</p>
        </section>

        <h2><span class="label">Selected strengths</span>The parts of the work I tend to be useful for</h2>
        <p>Laravel &amp; PHP development · SaaS product development · APIs &amp; integrations · Existing application maintenance · Debugging &amp; performance · Background jobs &amp; queues · Cloud infrastructure · SQL &amp; data modeling · Payments · Developer tooling · Shipping production software</p>

        <div class="closing">
            <p>I’m comfortable working independently or collaborating closely with product, frontend, and infrastructure teams. I’d be glad to show you a Laravel app I’m proud of and talk through the decisions behind it.</p>
            <p class="eyebrow">Andy Brudtkuhl</p>
        </div>

        <div class="contact">
            <p class="eyebrow">Contact</p>
            <nav class="contact-links" aria-label="Contact links">
                <button class="copy-email" type="button" data-email="hi@youmetandy.com" aria-label="Copy email address">
                    <span class="email-text">hi@youmetandy.com</span>
                    <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="8" y="8" width="11" height="11" rx="1.5"></rect><path d="M16 8V5.5A1.5 1.5 0 0 0 14.5 4h-10A1.5 1.5 0 0 0 3 5.5v10A1.5 1.5 0 0 0 4.5 17H8"></path></svg>
                </button>
                <a href="https://github.com/abrudtkuhl" target="_blank" rel="noopener">GitHub ↗</a>
                <a href="https://brudtkuhl.com" target="_blank" rel="noopener">Blog ↗</a>
            </nav>
        </div>

    </article>
    <script>
        document.querySelector('.copy-email').addEventListener('click', async (event) => {
            const button = event.currentTarget;
            const email = button.dataset.email;
            const emailText = button.querySelector('.email-text');
            try {
                await navigator.clipboard.writeText(email);
                emailText.textContent = 'Copied';
                button.classList.add('is-copied');
                setTimeout(() => {
                    emailText.textContent = email;
                    button.classList.remove('is-copied');
                }, 1600);
            } catch {
                emailText.textContent = email;
            }
        });
    </script>
</body>
</html>
