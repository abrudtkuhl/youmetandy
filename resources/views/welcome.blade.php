
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $site['title'] ?? 'Andy Brudtkuhl\'s Homepage' }} - Issue #{{ date('Y') }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=VT323&family=Press+Start+2P&family=Courier+Prime:wght@400;700&display=swap');
        
        * { box-sizing: border-box; }
        
        body {
            font-family: 'Courier Prime', 'Courier New', monospace;
            background: linear-gradient(to bottom, #1a1a2e 0%, #16213e 100%);
            color: #00ff00;
            margin: 0;
            padding: 0;
            line-height: 1.4;
        }
        
        .scanlines {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: repeating-linear-gradient(
                0deg,
                rgba(0, 255, 0, 0.03) 0px,
                rgba(0, 255, 0, 0.03) 1px,
                transparent 1px,
                transparent 2px
            );
            pointer-events: none;
            z-index: 1000;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #0a0a1e;
            box-shadow: 0 0 50px rgba(0, 255, 255, 0.3);
        }
        
        .magazine-header {
            background: linear-gradient(135deg, #ff00ff 0%, #00ffff 100%);
            padding: 3px;
            margin-bottom: 20px;
            position: relative;
        }
        
        .magazine-header-inner {
            background: #000;
            padding: 25px;
            border: 3px solid #fff;
        }
        
        .masthead {
            font-family: 'Press Start+2P', monospace;
            font-size: 36px;
            color: #00ffff;
            text-align: center;
            text-shadow: 
                0 0 10px #00ffff,
                0 0 20px #00ffff,
                0 0 30px #00ffff,
                3px 3px 0 #ff00ff;
            margin: 0 0 10px 0;
            letter-spacing: 3px;
        }
        
        .issue-info {
            font-family: 'VT323', monospace;
            font-size: 18px;
            color: #ff00ff;
            text-align: center;
            margin: 10px 0 0 0;
            letter-spacing: 2px;
        }
        
        .grid-layout {
            display: grid;
            grid-template-columns: 250px 1fr 250px;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .pixel-border {
            border: 4px solid;
            border-image: repeating-linear-gradient(
                45deg,
                #00ffff 0px,
                #00ffff 10px,
                #ff00ff 10px,
                #ff00ff 20px
            ) 4;
            padding: 15px;
            background: rgba(0, 0, 0, 0.8);
            position: relative;
        }
        
        .tech-box {
            background: #000;
            border: 2px solid #00ff00;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 
                inset 0 0 20px rgba(0, 255, 0, 0.1),
                0 0 10px rgba(0, 255, 0, 0.5);
        }
        
        .tech-box h3 {
            font-family: 'Press Start+2P', monospace;
            font-size: 12px;
            color: #ffff00;
            margin: 0 0 15px 0;
            text-transform: uppercase;
            border-bottom: 2px solid #00ff00;
            padding-bottom: 8px;
        }
        
        .ascii-art {
            font-family: 'VT323', monospace;
            font-size: 14px;
            line-height: 1.2;
            color: #00ffff;
            white-space: pre;
            text-align: center;
            margin: 15px 0;
        }
        
        .main-article {
            grid-column: 2;
            background: #000;
            padding: 25px;
            border: 3px double #00ffff;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
        }
        
        h2 {
            font-family: 'Press Start+2P', monospace;
            font-size: 18px;
            color: #ff00ff;
            margin: 0 0 20px 0;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 10px;
        }
        
        h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff00ff 0%, #00ffff 100%);
        }
        
        .code-block {
            background: #001a00;
            border-left: 4px solid #00ff00;
            padding: 15px;
            margin: 15px 0;
            font-family: 'VT323', monospace;
            font-size: 16px;
            color: #00ff00;
            overflow-x: auto;
        }
        
        .line-numbers {
            color: #006600;
            margin-right: 15px;
            user-select: none;
        }
        
        a {
            color: #00ffff;
            text-decoration: none;
            text-shadow: 0 0 5px #00ffff;
            transition: all 0.3s;
        }
        
        a:hover {
            color: #ff00ff;
            text-shadow: 0 0 10px #ff00ff;
        }
        
        .new-badge {
            background: #ff0000;
            color: #ffff00;
            padding: 3px 8px;
            font-family: 'Press Start+2P', monospace;
            font-size: 8px;
            margin-left: 10px;
            display: inline-block;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        
        .blink {
            animation: blink-animation 1s step-start infinite;
        }
        
        @keyframes blink-animation {
            50% { opacity: 0; }
        }
        
        .sidebar-left, .sidebar-right {
            font-size: 13px;
        }
        
        .ad-box {
            background: repeating-linear-gradient(
                45deg,
                #1a1a2e,
                #1a1a2e 10px,
                #16213e 10px,
                #16213e 20px
            );
            border: 3px solid #ffff00;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .ad-box h4 {
            color: #ffff00;
            font-family: 'Press Start+2P', monospace;
            font-size: 10px;
            margin: 0 0 10px 0;
        }
        
        .pixel-button {
            display: inline-block;
            background: #ff00ff;
            color: #000;
            padding: 10px 15px;
            border: 3px solid #00ffff;
            font-family: 'Press Start+2P', monospace;
            font-size: 10px;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 
                4px 4px 0 #000,
                0 0 10px rgba(255, 0, 255, 0.5);
            transition: all 0.1s;
        }
        
        .pixel-button:hover {
            transform: translate(2px, 2px);
            box-shadow: 
                2px 2px 0 #000,
                0 0 20px rgba(255, 0, 255, 0.8);
        }
        
        .visitor-counter {
            background: #000;
            border: 2px solid #00ff00;
            padding: 10px;
            text-align: center;
            font-family: 'VT323', monospace;
            font-size: 24px;
            color: #00ff00;
            margin: 20px 0;
            box-shadow: inset 0 0 20px rgba(0, 255, 0, 0.2);
        }
        
        .tech-specs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 15px 0;
        }
        
        .spec-item {
            background: rgba(0, 255, 0, 0.1);
            border: 1px solid #00ff00;
            padding: 8px;
            font-family: 'VT323', monospace;
            font-size: 14px;
        }
        
        .spec-label {
            color: #ffff00;
            font-weight: bold;
        }
        
        .footer {
            background: #000;
            border: 3px double #00ffff;
            padding: 20px;
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
        
        .nav-menu {
            background: #000;
            border: 3px solid #ff00ff;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .nav-menu a {
            font-family: 'Press Start+2P', monospace;
            font-size: 10px;
            padding: 8px 12px;
            border: 2px solid #00ffff;
            background: rgba(0, 255, 255, 0.1);
        }
        
        @media (max-width: 1024px) {
            .grid-layout {
                grid-template-columns: 1fr;
            }
            .main-article {
                grid-column: 1;
            }
            .masthead {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="scanlines"></div>
    
    <div class="container">
        <!-- Magazine Header -->
        <div class="magazine-header">
            <div class="magazine-header-inner">
                <div class="ascii-art">╔═══════════════════════════════════════════════════════╗
║                                                       ║
║   ██╗  ██╗███████╗██╗     ██╗      ██████╗          ║
║   ██║  ██║██╔════╝██║     ██║     ██╔═══██╗         ║
║   ███████║█████╗  ██║     ██║     ██║   ██║         ║
║   ██╔══██║██╔══╝  ██║     ██║     ██║   ██║         ║
║   ██║  ██║███████╗███████╗███████╗╚██████╔╝         ║
║   ╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝ ╚═════╝          ║
║                                                       ║
║   ██╗    ██╗ ██████╗ ██████╗ ██╗     ██████╗        ║
║   ██║    ██║██╔═══██╗██╔══██╗██║     ██╔══██╗       ║
║   ██║ █╗ ██║██║   ██║██████╔╝██║     ██║  ██║       ║
║   ██║███╗██║██║   ██║██╔══██╗██║     ██║  ██║       ║
║   ╚███╔███╔╝╚██████╔╝██║  ██║███████╗██████╔╝       ║
║    ╚══╝╚══╝  ╚═════╝ ╚═╝  ╚═╝╚══════╝╚═════╝        ║
║                                                       ║
╚═══════════════════════════════════════════════════════╝</div>
                <h1 class="masthead">{{ strtoupper($site['title'] ?? 'BRUDTKUHL.COM') }}</h1>
                <p class="issue-info">
                    VOLUME {{ date('Y') }} • ISSUE #{{ date('n') }} • {{ strtoupper(date('M')) }} • <a href="https://donate.stripe.com/dR65ll80XeORasw9AL" style="color: #ff00ff; text-decoration: none;">$6.00 USD</a>
                </p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="nav-menu">
            <a href="#about">[ ABOUT ]</a>
            <a href="#projects">[ PROJECTS ]</a>
            <a href="#writing">[ WRITING ]</a>
            <a href="#contact">[ CONTACT ]</a>
        </div>

        <!-- Grid Layout -->
        <div class="grid-layout">
            <!-- Left Sidebar -->
            <div class="sidebar-left">
                <!-- Recent Activity -->
                <div class="tech-box">
                    <h3>RECENT ACTIVITY</h3>
                    <div style="font-family: 'VT323', monospace; font-size: 13px; color: #00ff00;">
                        @php
                            $activities = [
                                ['time' => '2h ago', 'action' => 'Pushed to', 'repo' => 'pmprompt'],
                                ['time' => '5h ago', 'action' => 'Updated', 'repo' => 'sitespellchecker'],
                                ['time' => '1d ago', 'action' => 'Deployed', 'repo' => 'tapback'],
                                ['time' => '2d ago', 'action' => 'Pushed to', 'repo' => '48web'],
                            ];
                        @endphp
                        @foreach($activities as $activity)
                            <div style="margin-bottom: 12px; border-left: 2px solid #00ffff; padding-left: 8px;">
                                <div style="color: #ffff00; font-size: 11px;">{{ $activity['time'] }}</div>
                                <div style="color: #00ffff;">{{ $activity['action'] }}</div>
                                <div style="color: #ff00ff; font-size: 12px;">{{ $activity['repo'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="ad-box">
                    <h4>QUICK STATS</h4>
                    <div style="color: #00ffff; font-family: 'VT323', monospace; font-size: 14px; text-align: left; padding: 10px 0;">
                        <div style="margin-bottom: 8px;">
                            <span style="color: #ffff00;">►</span> UPTIME: {{ now()->diffInYears(now()->subYears(rand(5, 15))) }}+ years
                        </div>
                        <div style="margin-bottom: 8px;">
                            <span style="color: #ffff00;">►</span> PROJECTS: {{ count($projects) ?? '∞' }}
                        </div>
                        <div>
                            <span style="color: #ffff00;">►</span> COFFEE: <span class="blink">BREWING</span>
                        </div>
                    </div>
                </div>

                <!-- Visitor Counter -->
                <div class="visitor-counter">
                    <div style="font-size: 14px; color: #ffff00; margin-bottom: 5px;">VISITORS:</div>
                    {{ str_pad($visitorCount, 8, '0', STR_PAD_LEFT) }}
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-article">
                <a name="about"></a>
                <h2>⦿ ABOUT</h2>
                
                <p style="color: #00ffff; margin: 0 0 20px 0; font-size: 16px; line-height: 1.6;">
                    {{ $about['description'] ?? 'Developer, builder, and internet tinkerer. I\'ve been making things on the web since the dial-up days.' }}
                </p>
                
                <p style="color: #00ff00; margin: 0 0 20px 0; font-size: 14px; line-height: 1.6;">
                    {{ $about['description2'] ?? 'Currently working with modern web technologies while keeping one foot firmly planted in the retro aesthetic. Because why choose between progress and nostalgia?' }}
                </p>

                <div style="background: rgba(0, 255, 255, 0.1); border: 2px solid #00ffff; padding: 15px; margin: 20px 0;">
                    <p style="margin: 0; color: #00ffff; font-family: 'VT323', monospace; font-size: 16px;">
                        <strong style="color: #ffff00;">TECH STACK:</strong><br>
                        {{ implode(' • ', $about['skills'] ?? ['PHP', 'Laravel', 'JavaScript', 'TypeScript', 'React', 'MySQL', 'Redis', 'Git']) }}
                    </p>
                </div>

                <a name="projects"></a>
                <h2>⦿ PROJECTS</h2>
                
                @foreach($projects as $project)
                <div class="pixel-border" style="margin-bottom: 20px;">
                    <h3 style="color: #ff00ff; font-family: 'Press Start+2P', monospace; font-size: 12px; margin: 0 0 15px 0;">
                        {{ $project['emoji'] ?? '▶' }} {{ strtoupper($project['title'] ?? 'PROGRAM') }}
                        @if(isset($project['badge']))
                            <span class="new-badge">{{ $project['badge'] }}</span>
                        @endif
                    </h3>
                    <p style="color: #00ff00; margin: 0 0 15px 0; font-size: 14px; line-height: 1.5;">
                        {{ $project['description'] ?? 'Building something interesting. Details coming soon.' }}
                    </p>
                    <div>
                        <a href="{{ $project['links']['view'] ?? '#' }}" class="pixel-button">VIEW PROJECT</a>
                        @if(isset($project['links']['blog']))
                            <a href="{{ $project['links']['blog'] }}" class="pixel-button" style="background: #00ffff; margin-left: 10px;">READ MORE</a>
                        @endif
                    </div>
                </div>
                @endforeach

                <a name="writing"></a>
                <h2>⦿ WRITING</h2>
                
                @foreach($writing as $article)
                <div style="border-left: 4px solid #ff00ff; padding-left: 15px; margin-bottom: 20px;">
                    <h3 style="color: #00ffff; font-size: 16px; margin: 0 0 8px 0;">
                        <a href="{{ $article['link'] ?? '#' }}">{{ $article['title'] ?? 'Article Title' }}</a>
                        @if(isset($article['badge']))
                            <span class="new-badge">{{ $article['badge'] }}</span>
                        @endif
                    </h3>
                    <p style="color: #00ff00; margin: 0; font-size: 13px; line-height: 1.5;">
                        {{ $article['description'] ?? 'Thoughts on code, design, and building things.' }}
                    </p>
                    <p style="color: #ffff00; margin: 5px 0 0 0; font-size: 12px;">
                        <strong>DATE:</strong> {{ $article['date'] ?? 'Recently' }}
                        @if(isset($article['source']))
                            • <strong>SOURCE:</strong> {{ strtoupper($article['source']) }}
                        @endif
                    </p>
                </div>
                @endforeach

                <a name="contact"></a>
                <h2>⦿ CONTACT</h2>
                
                <p style="color: #00ffff; margin: 0 0 20px 0; font-size: 14px; line-height: 1.6;">
                    {{ $contact['message'] ?? 'Want to collaborate? Got a question? Feel free to reach out.' }}
                </p>
                
                <div class="code-block">
                    <div style="color: #00ff00;">
                        <span style="color: #ffff00;">EMAIL:</span> <a href="mailto:{{ $contact['email'] ?? 'hi@youmetandy.com' }}">{{ $contact['email'] ?? 'hello@andybrudtkuhl.com' }}</a><br>
                        <span style="color: #ffff00;">GITHUB:</span> <a href="{{ $contact['github'] ?? 'https://github.com/abrudtkuhl' }}">{{ str_replace('https://', '', $contact['github'] ?? 'github.com/abrudtkuhl') }}</a><br>
                        <span style="color: #ffff00;">TWITTER:</span> <a href="{{ $contact['twitter'] ?? 'https://twitter.com/abrudtkuhl' }}">{{ str_replace('https://twitter.com/', '@', $contact['twitter'] ?? '@abrudtkuhl') }}</a>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="sidebar-right">
                <a name="links"></a>
                <div class="tech-box">
                    <h3>ELSEWHERE</h3>
                    <div style="font-size: 13px;">
                        @foreach($links as $link)
                            <p style="margin: 0 0 10px 0;">
                                <span style="color: #ff00ff;">►</span> <a href="{{ $link['url'] ?? '#' }}">{{ $link['name'] ?? 'Link' }}</a>
                            </p>
                        @endforeach
                    </div>
                </div>

                <!-- Now Playing / Currently -->
                <div class="tech-box" style="border-color: #ff00ff;">
                    <h3 style="color: #00ffff;">NOW</h3>
                    <div style="font-family: 'VT323', monospace; font-size: 13px; color: #00ff00;">
                        <div style="margin-bottom: 12px;">
                            <div style="color: #ffff00; font-size: 11px; margin-bottom: 4px;">READING</div>
                            <div style="color: #00ffff;">Mistborn series</div>
                        </div>
                        <div style="margin-bottom: 12px;">
                            <div style="color: #ffff00; font-size: 11px; margin-bottom: 4px;">LISTENING</div>
                            <div style="color: #00ffff;">NOFX <span class="blink">♪</span></div>
                        </div>
                        <div>
                            <div style="color: #ffff00; font-size: 11px; margin-bottom: 4px;">BUILDING</div>
                            <div style="color: #00ffff;">pmprompt</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="ascii-art" style="font-size: 10px;">════════════════════════════════════════════════════════════</div>
            <p style="margin: 15px 0; color: #00ff00;">
                LAST MODIFIED: 2/15/2026 • SYSTEM TIME: {{ date('H:i') }} UTC
            </p>
            <p style="margin: 0; color: #00ffff; font-size: 11px;">
                © {{ date('Y') }} ANDY BRUDTKUHL • BUILT WITH <a href="https://48web.com">48WEB</a> • 
                <a href="#">[ ↑ TOP ]</a>
            </p>
        </div>
    </div>

    <!-- Tapback Widget - Full Width Below Footer -->
    <div style="max-width: 1200px; margin: 20px auto; padding: 0 20px;">
        <div class="tech-box" style="border-color: #00ff00;">
            <h3 style="font-family: 'Press Start+2P', monospace; font-size: 12px; color: #ffff00; margin: 0 0 15px 0; text-transform: uppercase; border-bottom: 2px solid #00ff00; padding-bottom: 8px;">REACTIONS</h3>
            <script src="https://public.tapback.dev/widget.js"></script>
            <div data-widget-id="a6131de6-6b7e-4ba7-8dfc-f9ee2516e6b0" data-source="andybrudtkuhl" data-api-base="https://tapback.dev/api"></div>
        </div>
    </div>

</body>
</html>
