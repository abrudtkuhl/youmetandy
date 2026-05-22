<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Andy Brudtkuhl — Director of Software Engineering, Bound</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, * + * {
            margin-top: 0;
        }
        body {
            font-family: 'IBM Plex Mono', ui-monospace, SFMono-Regular, 'SF Mono', Menlo, Consolas, monospace;
            font-display: swap;
            background: #fafafa;
            color: #18181b;
            line-height: 1.75;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .page {
            max-width: 640px;
            margin: 0 auto;
            padding: 80px 24px 120px;
        }
        .prose h1 {
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: -0.025em;
            line-height: 1.2;
            text-pretty: optimize;
            margin-bottom: 0.5rem;
        }
        .prose .subtitle {
            font-size: 0.9375rem;
            color: #71717a;
            margin-bottom: 3rem;
        }
        .prose p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
            color: #27272a;
        }
        .prose p.intro {
            font-size: 1.0625rem;
            color: #18181b;
        }
        .prose p.market {
            font-size: 1.0625rem;
            color: #18181b;
            background: #f4f4f5;
            padding: 1rem 1.25rem;
            margin: 1.5rem 0;
            border-radius: 6px;
        }
        .prose a {
            color: #2563eb;
            text-decoration: underline;
            text-underline-offset: 2px;
        }
        .prose a:hover {
            color: #1d4ed8;
        }
        .prose h2 {
            font-size: 1.125rem;
            font-weight: 600;
            letter-spacing: -0.01em;
            margin-top: 2.75rem;
            margin-bottom: 0.25rem;
        }
        .prose h2 .label {
            display: block;
            font-size: 0.6875rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #a1a1aa;
            margin-bottom: 0.25rem;
        }
        .prose hr {
            border: none;
            border-top: 1px solid #e4e4e7;
            margin: 2.5rem 0;
        }
        .prose ul {
            margin: 1rem 0 1.5rem;
            padding-left: 1.5rem;
        }
        .prose li {
            margin-bottom: 0.5rem;
            color: #27272a;
        }
        .prose .signature {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #e4e4e7;
        }
        .prose .signature p {
            margin-bottom: 0;
            font-size: 1.0625rem;
            font-weight: 500;
            color: #18181b;
        }
    </style>
</head>
<body>
    <article class="page prose">
        <h1>Andy Brudtkuhl</h1>

        <p class="intro">Hey Bound team - here's I've been up to and why I think the Director of Software Engineering role at Bound is a good fit.</p>

        <p>The short version: I think you nailed the problem in front of you. It's all scale, scaling the team, the infra, the software, the product, the devops. That's not a list of buzzwords to me. It's what I work on every single day.</p>

        <hr>

        <h2><span class="label">Now</span>Current Role</h2>

        <p>I'm a technical PM at <a href="https://laravel.com" target="_blank" rel="noopener">Laravel</a>, working on <a href="https://cloud.laravel.com" target="_blank" rel="noopener">Laravel Cloud</a>, the infrastructure platform for developers, companies, and agencies. Day to day I'm managing several product and project teams at once, and the question I spend the most time on is exactly the one in your posting: how do you scale these teams, and the way they work, in a world of AI? That's not a someday problem I'm reading about. It's the thing on my desk right now.</p>

        <p>Most of my time is guiding our engineering and design teams through the Shape Up process to deliver great features. But I stay close to the technical side — Laravel Cloud runs on AWS and Cloudflare, and I'm working across hibernating compute pods, AI agents on ephemeral compute, APIs, SSO, and scalable managed queues. So when your posting talks about microservices evolution, AWS scaling, Docker/K8s, Postgres, that's not a stretch. It's adjacent to my Tuesday, even if I'm not the one writing the code.</p>

        <p>The AI piece is a big part of why this caught my attention. After my chat with Nathan, it's clear we're circling the same question, what a software company actually looks like once these tools are real, and I was glad to see your teams already moving on it. It's rarer than it should be to find a team that's already there.</p>

        <p class="market">Here's the part that I think really matters: I'm in your market. I've got three girls deep in sports and I coach club soccer here in central Iowa. I'm a parent in the stands and a coach on the sideline, the exact person on the other end of a Bound ticket scan, registration form, or team message. When I look at your customer list and see Ames, Johnston, Linn-Mar, Dowling, Des Moines Public, those aren't logos to me. They're my Saturdays - and Mon/Tues/Thurs/Fri nights. I'd be building for a world I actually live in.</p>

        <p>I also never really stop building myself. Outside the day job I've shipped a long trail of side projects: AI tools, micro-SaaS, open source, a few dumb ones for fun. Most recently a stack of <a href="https:pmprompt.com">AI-powered tooling for product managers</a> and an <a href="https://sitespellchecker.com">AI-powered website spell checker</a>. It's how I learn, and it's why "build, scale, systemize" reads as a description of my weekends, not just a job posting. The whole shelf is at <a href="https://brudtkuhl.com/projects" target="_blank" rel="noopener">brudtkuhl.com/projects</a>.</p>

        <hr>

        <h2><span class="label">Recent</span>Previous Experience</h2>

        <p>Senior Technical PM before Laravel. Started on payments and billing APIs, then led the build-out of an e-commerce search platform for ford.com. That search service was processing millions in transactions a month and on track to become a major revenue driver for the business. High-traffic, real-money, real-stakes systems where the question was never "can we ship it" but "will it hold and stay sane as everything around it grows." That's the muscle this role needs.</p>

        <hr>

        <h2><span class="label">Background</span>How I Got Here</h2>

        <ul>
            <li>Iowa State grad. Iowan, still here. Ames being home base is a feature, not a hurdle, for me.</li>
            <li>Two startups straight out of school.</li>
            <li>Consulting, then started my own agency, then founded a startup that went through an accelerator. I've built from zero and know what it costs.</li>
            <li>Landed at an ag-sector organization: ran the web team, then all of digital strategy, then moved into emerging tech and innovation, working with startups on tech enablement in agriculture.</li>
        </ul>

        <p>The thread through all of it: I keep ending up where new technology meets an industry that's ready but doesn't quite have the bridge yet. That's the exact shape of what you're doing at Bound.</p>

        <hr>

        <h2><span class="label">Why Bound</h2>

        <p>The business is great and the moat is real. Distribution plus network effects, the kind of thing that stays durable even in a world where Hacker News keeps declaring SaaS dead because of AI. I think you're making this hire at exactly the right time, and I think the perspective I'd bring, leading teams and living in your market and working on the AI-and-scale question every day, is an unusual combination.</p>

        <div class="signature">
            <p>Andy</p>
        </div>
    </article>
</body>
</html>
