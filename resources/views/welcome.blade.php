
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $site['title'] ?? 'Andy Brudtkuhl\'s Homepage' }}</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: #FFFFFF;
            background-image: url('data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
            color: #000000;
            margin: 0;
            padding: 10px;
        }
        a:link { color: #0000FF; text-decoration: underline; }
        a:visited { color: #800080; text-decoration: underline; }
        a:hover { color: #FF0000; text-decoration: underline; }
        a:active { color: #FF0000; text-decoration: underline; }
        .blink { animation: blink 1s infinite; }
        @keyframes blink { 0%, 50% { opacity: 1; } 51%, 100% { opacity: 0; } }
        .marquee { 
            background-color: #FFFF00; 
            color: #000000; 
            padding: 3px; 
            font-weight: bold;
            font-size: 12px;
        }
        .construction { 
            background-color: #FFA500; 
            color: #000000; 
            padding: 2px; 
            font-weight: bold;
            font-size: 11px;
        }
        .new { 
            background-color: #FF0000; 
            color: #FFFFFF; 
            padding: 1px 3px; 
            font-weight: bold;
            font-size: 10px;
        }
        .hot { 
            background-color: #FF0000; 
            color: #FFFF00; 
            padding: 1px 3px; 
            font-weight: bold;
            font-size: 10px;
        }
        table { border-collapse: collapse; }
        .bordered { border: 2px solid #000000; }
        .inset { border: 2px inset #C0C0C0; }
        .outset { border: 2px outset #C0C0C0; }
    </style>
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#0000FF" vlink="#800080" alink="#FF0000">
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#000080">
        <tr>
            <td align="center">
                <div class="marquee">
                    {{ $site['banner'] ?? '🚀 WELCOME TO ANDY\'S HOMEPAGE! 🚀 BEST VIEWED IN NETSCAPE NAVIGATOR! 🚀' }}
                </div>
            </td>
        </tr>
    </table>

    <br>

    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <h1 style="font-size: 32px; color: #000080; margin: 0 0 10px 0; font-weight: bold;">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" width="1" height="1" alt="" style="display: block;">
                    {{ $site['title'] ?? 'Andy Brudtkuhl\'s Homepage' }}
                </h1>
                <p style="margin: 0; font-size: 14px; color: #666666;">
                    <em>{{ $site['subtitle'] ?? 'Under Construction' }}</em> <span class="construction">🚧</span> | 
                    <span class="new">NEW!</span> | 
                    <span class="hot">HOT!</span>
                </p>
                <hr size="3" color="#000080" noshade>
            </td>
        </tr>
    </table>

    <table width="100%" border="2" cellpadding="5" cellspacing="0" class="outset" bgcolor="#C0C0C0">
        <tr>
            <td align="center">
                <strong>
                    <a href="#about">🏠 About Me</a> | 
                    <a href="#projects">💻 Projects</a> | 
                    <a href="#writing">📝 Writing</a> | 
                    <a href="#links">🔗 Links</a> | 
                    <a href="#contact">📧 Contact</a>
                </strong>
            </td>
        </tr>
    </table>

    <br>

    <table width="100%" border="2" cellpadding="10" cellspacing="0" class="inset" bgcolor="#F0F0F0">
        <tr>
            <td>
                <h2 style="font-size: 18px; color: #000080; margin: 0 0 10px 0;">
                    Welcome to my website!
                </h2>
                <p style="margin: 0 0 10px 0; line-height: 1.3; font-size: 14px;">
                    <strong>Hi there!</strong> Welcome to my little corner of the World Wide Web! 🌐 
                    I'm Andy Brudtkuhl, and I'm a web developer who loves creating cool stuff on the internet. 
                    This site is where I share my projects, thoughts, and whatever else I'm working on.
                </p>    
                <p style="margin: 0 0 10px 0; line-height: 1.3; font-size: 14px;">
                    Feel free to look around and check out what I've been up to. If you have any 
                    questions or just want to say hi, don't hesitate to drop me a line!
                </p>
                <p style="margin: 0; font-size: 12px; color: #666666;">
                    <em>Last updated: {{ $site['lastUpdated'] ?? date('F j, Y') }} | Best viewed at 800x600 resolution</em>
                </p>
            </td>
        </tr>
    </table>

    <br>

    <a name="about"></a>
    <table width="100%" border="2" cellpadding="10" cellspacing="0" class="outset" bgcolor="#FFFFFF">
        <tr>
            <td>
                <h2 style="font-size: 16px; color: #000080; margin: 0 0 8px 0;">
                
                    About Me
                </h2>
                <hr size="1" color="#000080" noshade>
                <table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <tr>
                        <td width="80" valign="top">
                            <img src="https://avatars.githubusercontent.com/u/322732?v=4" width="60" height="60" alt="My Photo" style="border: 2px solid #000000; background-color: #C0C0C0;">
                        </td>
                        <td valign="top">
                            <p style="margin: 0 0 8px 0; line-height: 1.3; font-size: 13px;">
                                {{ $about['description'] ?? 'I\'m a web developer who\'s been working with computers since the early days of the internet.' }}
                            </p>
                            <p style="margin: 0 0 8px 0; line-height: 1.3; font-size: 13px;">
                                {{ $about['description2'] ?? 'These days I work with modern technologies like PHP, Laravel, and JavaScript.' }}
                            </p>
                            <p style="margin: 0; line-height: 1.3; font-size: 13px;">
                                <strong>Skills:</strong> {{ implode(', ', $about['skills'] ?? ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'MySQL', 'Linux', 'Apache']) }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>

    <a name="projects"></a>
    <table width="100%" border="2" cellpadding="10" cellspacing="0" class="outset" bgcolor="#FFFFFF">
        <tr>
            <td>
                <h2 style="font-size: 16px; color: #000080; margin: 0 0 8px 0;">        
                    My Projects 
                    @if(!empty($projects) && count($projects) > 0)
                        @foreach($projects as $project)
                            @if(isset($project['badge']))
                                <span class="{{ strtolower($project['badge']) == 'new!' ? 'new' : 'hot' }}">{{ $project['badge'] }}</span>
                                @break
                            @endif
                        @endforeach
                    @endif
                </h2>
                <hr size="1" color="#000080" noshade>
                
                <table width="100%" border="0" cellpadding="5" cellspacing="0">
                    @foreach($projects as $index => $project)
                        @if($index % 2 == 0)
                            <tr>
                        @endif
                        <td width="50%" valign="top">
                            <h3 style="font-size: 14px; color: #000080; margin: 0 0 5px 0;">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" width="12" height="12" alt="*" style="display: inline-block;">
                                {{ $project['emoji'] ?? '💻' }} {{ $project['title'] ?? 'Project' }}
                            </h3>
                            <p style="margin: 0 0 5px 0; line-height: 1.3; font-size: 12px;">
                                {{ $project['description'] ?? 'Project description coming soon!' }}
                            </p>
                            <p style="margin: 0 0 10px 0; font-size: 12px;">
                                <a href="{{ $project['links']['view'] ?? '#' }}">[View Project]</a>
                                @if(isset($project['links']['blog']))
                                    | <a href="{{ $project['links']['blog'] }}">[Blog]</a>
                                @endif
                            </p>
                        </td>
                        @if($index % 2 == 1 || $index == count($projects) - 1)
                            </tr>
                        @endif
                    @endforeach
                </table>
            </td>
        </tr>
    </table>

    <br>

    <a name="writing"></a>
    <table width="100%" border="2" cellpadding="10" cellspacing="0" class="outset" bgcolor="#FFFFFF">
        <tr>
            <td>
                <h2 style="font-size: 16px; color: #000080; margin: 0 0 8px 0;">
                    My Writing 
                    @if(!empty($writing) && count($writing) > 0)
                        @foreach($writing as $article)
                            @if(isset($article['badge']))
                                <span class="{{ strtolower($article['badge']) == 'new!' ? 'new' : 'hot' }}">{{ $article['badge'] }}</span>
                                @break
                            @endif
                        @endforeach
                    @endif
                </h2>
                <hr size="1" color="#000080" noshade>
                
                <table width="100%" border="0" cellpadding="3" cellspacing="0">
                    @foreach($writing as $article)
                        <tr>
                            <td width="100%" valign="top">
                                <h3 style="font-size: 14px; color: #000080; margin: 0 0 3px 0;">
                                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" width="12" height="12" alt="*" style="display: inline-block;">
                                    <a href="{{ $article['link'] ?? '#' }}">{{ $article['title'] ?? 'Article Title' }}</a>
                                </h3>
                                <p style="margin: 0 0 5px 0; line-height: 1.3; font-size: 12px;">
                                    {{ $article['description'] ?? 'Article description coming soon!' }} 
                                    <em>Published {{ $article['date'] ?? 'Recently' }}</em>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>

    <br>

    <a name="links"></a>
    <table width="100%" border="2" cellpadding="10" cellspacing="0" class="outset" bgcolor="#FFFFFF">
        <tr>
            <td>
                <h2 style="font-size: 16px; color: #000080; margin: 0 0 8px 0;">
                    Cool Links
                </h2>
                <hr size="1" color="#000080" noshade>
                <p style="margin: 0 0 5px 0; font-size: 13px;">
                    @foreach($links as $index => $link)
                        <a href="{{ $link['url'] ?? '#' }}">{{ $link['name'] ?? 'Link' }}</a>@if($index < count($links) - 1) | @endif
                    @endforeach
                </p>
                <p style="margin: 0; font-size: 12px; color: #666666;">
                    <em>More links coming soon!</em>
                </p>
            </td>
        </tr>
    </table>

    <br>

    <a name="contact"></a>
    <table width="100%" border="2" cellpadding="10" cellspacing="0" class="outset" bgcolor="#FFFFFF">
        <tr>
            <td>
                <h2 style="font-size: 16px; color: #000080; margin: 0 0 8px 0;">
                    Contact Me
                </h2>
                <hr size="1" color="#000080" noshade>
                <p style="margin: 0 0 8px 0; line-height: 1.3; font-size: 13px;">
                    {{ $contact['message'] ?? 'I\'m always interested in new opportunities and exciting projects.' }}
                </p>
                <p style="margin: 0; line-height: 1.3; font-size: 13px;">
                    <strong>Email:</strong> <a href="mailto:{{ $contact['email'] ?? 'hello@andybrudtkuhl.com' }}">{{ $contact['email'] ?? 'hello@andybrudtkuhl.com' }}</a><br>
                    <strong>GitHub:</strong> <a href="{{ $contact['github'] ?? 'https://github.com/andybrudtkuhl' }}">{{ str_replace('https://', '', $contact['github'] ?? 'github.com/andybrudtkuhl') }}</a><br>
                    <strong>Twitter:</strong> <a href="{{ $contact['twitter'] ?? 'https://twitter.com/andybrudtkuhl' }}">{{ str_replace('https://twitter.com/', '@', $contact['twitter'] ?? '@andybrudtkuhl') }}</a>
                </p>
            </td>
        </tr>
    </table>

    <br>

    <table width="100%" border="2" cellpadding="8" cellspacing="0" class="inset" bgcolor="#C0C0C0">
        <tr>
            <td align="center">
                <p style="margin: 0; font-size: 11px; color: #000000;">
                    © {{ date('Y') }} Andy Brudtkuhl. All rights reserved.<br>
                    <em>Last updated: {{ $site['lastUpdated'] ?? date('F j, Y') }}</em> | 
                    <a href="#">Back to Top</a>
                </p>
            </td>
        </tr>
    </table>

    <table width="100%" border="0" cellpadding="3" cellspacing="0">
        <tr>
            <td align="center">
                <p style="margin: 5px 0; font-size: 10px; color: #999999;">
                    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" width="1" height="1" alt="" style="display: inline-block;">
                    You are visitor number: <strong>{{ number_format($visitorCount) }}</strong> since January 1, 2024<br>
                    <em>Best viewed in Netscape Navigator 4.0 or higher</em>
                </p>
            </td>
        </tr>
    </table>

</body>
</html>
