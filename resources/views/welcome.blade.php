<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site['title'] ?? 'andybrudtkuhl' }} - Windows XP</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
            user-select: none;
        }

        .desktop {
            width: 100vw;
            height: 100vh;
            background: #3a6ea5;
            position: relative;
            overflow: hidden;
        }

        .desktop-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                #0e3d8c 0%,
                #1a5cc8 18%,
                #3a82d8 42%,
                #6ab0e8 62%,
                #a0d0f4 78%,
                #c8e8fa 90%,
                #e2f2fd 100%);
        }

        .desktop-hills {
            position: absolute;
            bottom: 30px;
            left: 0;
            right: 0;
            height: 260px;
            background:
                radial-gradient(ellipse 95% 60% at 12% 100%, #5aba5a 0%, transparent 62%),
                radial-gradient(ellipse 75% 50% at 42% 100%, #6aca6a 0%, transparent 55%),
                radial-gradient(ellipse 115% 70% at 72% 100%, #54b254 0%, transparent 62%),
                radial-gradient(ellipse 140% 90% at 50% 100%, #3ea03e 0%, transparent 72%);
        }

        .desktop-hills::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(180deg, #70cc70 0%, #52b252 45%, #3e9e3e 100%);
            border-radius: 50% 50% 0 0 / 50px 50px 0 0;
        }

        .desktop-clouds {
            position: absolute;
            top: 30px;
            left: 0;
            right: 0;
            height: 180px;
            background:
                radial-gradient(ellipse 140px 65px at 13% 28%, rgba(255,255,255,0.9) 0%, transparent 70%),
                radial-gradient(ellipse 110px 55px at 22% 50%, rgba(255,255,255,0.7) 0%, transparent 70%),
                radial-gradient(ellipse 200px 75px at 72% 18%, rgba(255,255,255,0.85) 0%, transparent 70%),
                radial-gradient(ellipse 100px 50px at 83% 42%, rgba(255,255,255,0.6) 0%, transparent 70%),
                radial-gradient(ellipse 160px 65px at 52% 32%, rgba(255,255,255,0.7) 0%, transparent 70%);
        }

        .desktop-icons {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            z-index: 10;
        }

        .desktop-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 75px;
            cursor: pointer;
            padding: 4px;
        }

        .desktop-icon.selected {
            background: rgba(0, 0, 128, 0.4);
        }

        .desktop-icon.selected .desktop-icon-label {
            background: #000080;
            color: #fff;
        }

        .desktop-icon:hover {
            background: rgba(0, 0, 128, 0.3);
        }

        .desktop-icon:active {
            background: rgba(0, 0, 128, 0.5);
        }

        .desktop-icon-img {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 6px;
            image-rendering: pixelated;
        }

        .desktop-icon-label {
            color: white;
            font-size: 11px;
            text-align: center;
            text-shadow: 1px 1px 1px #000;
            word-wrap: break-word;
            max-width: 72px;
            padding: 1px 2px;
        }

        .taskbar {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            background: linear-gradient(180deg, #3870cc 0%, #2060c0 6%, #1a50b8 50%, #1448b0 94%, #0e3898 100%);
            box-shadow: 0 -1px 0 rgba(255,255,255,0.2), inset 0 1px 0 rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            padding: 0 2px;
            z-index: 9999;
        }

        .start-button {
            height: 28px;
            padding: 0 14px 0 5px;
            background: linear-gradient(180deg, #5ec85e 0%, #42aa42 22%, #2e962e 55%, #3aa03a 82%, #2e962e 100%);
            border-radius: 0 13px 13px 0;
            border: 1px solid #1a6a1a;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.45), inset 1px 0 0 rgba(255,255,255,0.2), 1px 0 4px rgba(0,0,0,0.45);
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            font-style: italic;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.65);
            margin-right: 5px;
            position: relative;
        }

        .start-button:hover {
            background: linear-gradient(180deg, #72d672 0%, #56be56 22%, #42aa42 55%, #4eb44e 82%, #42aa42 100%);
        }

        .start-button:active {
            background: linear-gradient(180deg, #2e962e 0%, #3aa03a 22%, #4aaa4a 55%, #3aa03a 82%, #2e962e 100%);
            box-shadow: inset 0 -1px 0 rgba(255,255,255,0.3), inset 0 1px 0 rgba(0,0,0,0.2);
        }

        .windows-logo {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px;
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .windows-logo div { border-radius: 1px; }
        .wl-tl { background: #f35421; }
        .wl-tr { background: #8dc011; }
        .wl-bl { background: #01a2e8; }
        .wl-br { background: #ffb901; }

        .start-button-text {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', 'Segoe UI', Tahoma, sans-serif;
            font-weight: bold;
            font-style: italic;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        .taskbar-divider {
            width: 1px;
            height: 24px;
            background: linear-gradient(180deg, transparent 0%, rgba(255,255,255,0.3) 50%, transparent 100%);
            margin: 0 2px;
        }

        .taskbar-apps {
            display: flex;
            gap: 3px;
            flex: 1;
            overflow: hidden;
        }

        .taskbar-app {
            height: 28px;
            padding: 0 8px;
            background: linear-gradient(180deg, #e2ded6 0%, #c8c4bc 100%);
            border: 1px solid;
            border-color: #fff #707070 #707070 #fff;
            display: flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
            font-size: 11px;
            color: #000;
            max-width: 160px;
            min-width: 80px;
        }

        .taskbar-app:hover {
            background: linear-gradient(180deg, #eceae4 0%, #d8d4cc 100%);
        }

        .taskbar-app.active {
            background: linear-gradient(180deg, #c8dcf5 0%, #a4cff2 100%);
            border-color: #fff #5599dd #5599dd #fff;
        }

        .taskbar-app.active::before {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background: #2255b3;
        }

        .taskbar-app.minimized {
            background: linear-gradient(180deg, #bcb8b0 0%, #a8a49c 100%);
            border-color: #909090 #d4d0c8 #d4d0c8 #909090;
        }

        .taskbar-app.minimized .taskbar-app-name {
            font-style: italic;
        }

        .taskbar-app-icon {
            font-size: 16px;
        }

        .taskbar-app-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .system-tray {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 6px;
            height: 100%;
            background: linear-gradient(180deg, #1040a8 0%, #0c3898 100%);
            border-left: 1px solid rgba(255,255,255,0.15);
            box-shadow: inset 1px 0 0 rgba(0,0,0,0.3);
        }

        .system-tray-time {
            font-size: 11px;
            color: #fff;
            padding: 2px 6px;
            text-shadow: 1px 1px 1px #000;
        }

        .system-icons {
            display: flex;
            gap: 4px;
            font-size: 14px;
        }

        .start-menu {
            position: absolute;
            bottom: 30px;
            left: 0;
            width: 400px;
            background: #fff;
            border: 1px solid #3050a0;
            border-bottom: none;
            box-shadow: 3px 0 12px rgba(0,0,0,0.55), 0 -2px 8px rgba(0,0,0,0.3);
            display: none;
            flex-direction: column;
            z-index: 10000;
            border-radius: 0 8px 0 0;
        }

        .start-menu.visible {
            display: flex;
        }

        .start-menu-header {
            background: linear-gradient(180deg, #2e6ad2 0%, #1a58c4 40%, #1450bc 100%);
            padding: 8px 12px 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 0 7px 0 0;
            border-bottom: 2px solid #0a3898;
        }

        .start-menu-user-avatar {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #5a9ff0 0%, #2a6fd0 100%);
            border: 3px solid rgba(255,255,255,0.85);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
        }

        .start-menu-user-name {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.6);
        }

        .start-menu-panels {
            display: flex;
            flex: 1;
            min-height: 0;
        }

        .start-menu-left {
            width: 195px;
            background: #fff;
            border-right: 1px solid #c0c8e0;
            display: flex;
            flex-direction: column;
        }

        .start-menu-right {
            flex: 1;
            background: #d6dff8;
            padding: 5px 0;
            display: flex;
            flex-direction: column;
        }

        .start-menu-pinned {
            padding: 5px 0 3px;
            border-bottom: 1px solid #c0c0c8;
            margin-bottom: 3px;
        }

        .start-menu-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 8px;
            cursor: pointer;
            font-size: 11px;
            color: #000;
        }

        .start-menu-item:hover {
            background: #316ac5;
            color: #fff;
        }

        .start-menu-item:hover .start-menu-item-sub {
            color: rgba(255,255,255,0.8);
        }

        .start-menu-item-icon {
            font-size: 22px;
            width: 26px;
            text-align: center;
            flex-shrink: 0;
        }

        .start-menu-item-name {
            font-weight: bold;
            font-size: 11px;
        }

        .start-menu-item-sub {
            font-size: 10px;
            color: #666;
        }

        .start-menu-separator {
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, #c0c0c0 15%, #c0c0c0 85%, transparent 100%);
            margin: 3px 6px;
        }

        .start-menu-all-programs {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 5px 8px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            color: #000;
            border-top: 1px solid #c0c0c8;
            margin-top: auto;
        }

        .start-menu-all-programs:hover {
            background: #316ac5;
            color: #fff;
        }

        .start-menu-right-item {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 3px 10px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            color: #000;
        }

        .start-menu-right-item:hover {
            background: #316ac5;
            color: #fff;
        }

        .start-menu-right-separator {
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, #8090c8 15%, #8090c8 85%, transparent 100%);
            margin: 3px 8px;
        }

        .start-menu-footer {
            background: linear-gradient(180deg, #1c58c8 0%, #1248b8 100%);
            padding: 5px 10px;
            display: flex;
            justify-content: flex-end;
            gap: 6px;
            border-top: 2px solid #0a3898;
        }

        .start-menu-footer-btn {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 3px 12px;
            background: linear-gradient(180deg, #5888d4 0%, #3a6cc4 40%, #2a5cb4 100%);
            border: 1px solid #1a3c8a;
            border-radius: 11px;
            font-size: 11px;
            color: #fff;
            cursor: pointer;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.3);
        }

        .start-menu-footer-btn:hover {
            background: linear-gradient(180deg, #78a8f0 0%, #5a88e4 40%, #4878d4 100%);
        }

        .window {
            position: absolute;
            display: none;
            flex-direction: column;
            background: #ece9d8;
            border: 4px solid #7090b0;
            border-radius: 8px 8px 4px 4px;
            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.25),
                3px 4px 16px rgba(0,0,0,0.5);
            min-width: 200px;
            min-height: 120px;
            z-index: 100;
            overflow: hidden;
        }

        .window.visible {
            display: flex;
        }

        .window.active {
            border-color: #0a2e7e;
            box-shadow:
                inset 0 0 0 1px rgba(255,255,255,0.3),
                3px 5px 18px rgba(0,0,0,0.55);
            z-index: 1000;
        }

        .window.resizing {
            user-select: none;
        }

        .window-resize-handle {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 16px;
            height: 16px;
            cursor: se-resize;
            z-index: 10;
        }

        .window-resize-handle::before {
            content: '';
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            background: 
                linear-gradient(135deg, transparent 30%, #808080 30%, #808080 35%, transparent 35%, transparent 40%, #808080 40%, #808080 45%, transparent 45%, transparent 50%, #808080 50%, #808080 55%, transparent 55%, transparent 60%, #808080 60%, #808080 65%, transparent 65%),
                linear-gradient(135deg, transparent 20%, #c0c0c0 20%, #c0c0c0 25%, transparent 25%, transparent 30%, #808080 30%, #808080 35%, transparent 35%),
                linear-gradient(135deg, transparent 10%, #c0c0c0 10%, #c0c0c0 15%, transparent 15%);
        }

        .window-resize-handle::after {
            content: '';
            position: absolute;
            bottom: 3px;
            right: 3px;
            width: 10px;
            height: 10px;
            background: 
                repeating-linear-gradient(
                    135deg,
                    transparent,
                    transparent 2px,
                    #404040 2px,
                    #404040 3px
                );
        }

        .window-titlebar {
            height: 30px;
            background: linear-gradient(180deg, #9db8d2 0%, #7898b4 100%);
            display: flex;
            align-items: center;
            padding: 0 4px 0 6px;
            cursor: move;
            user-select: none;
            flex-shrink: 0;
            border-bottom: 2px solid #4c6888;
            gap: 4px;
        }

        .window.active .window-titlebar {
            background: linear-gradient(180deg,
                #52a0f4 0%,
                #2575e0 4%,
                #1868d0 15%,
                #155ec4 80%,
                #1254bc 100%
            );
            border-bottom: 2px solid #0a2870;
        }

        .window-icon {
            font-size: 14px;
            margin-right: 4px;
        }

        .window-title {
            flex: 1;
            color: #fff;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-shadow: 1px 1px 1px #000;
        }

        .window-controls {
            display: flex;
            gap: 2px;
            margin-left: auto;
            flex-shrink: 0;
        }

        .window-button {
            width: 21px;
            height: 21px;
            background: linear-gradient(180deg, #e8e2d8 0%, #cec8be 100%);
            border: 1px solid;
            border-color: #f4f0ec #807870 #807870 #f4f0ec;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            color: #1a1a1a;
            line-height: 1;
            flex-shrink: 0;
        }

        .window-button:hover {
            background: linear-gradient(180deg, #f4eee4 0%, #dcd6cc 100%);
        }

        .window-button:active {
            background: linear-gradient(180deg, #c0bab2 0%, #d0cac2 100%);
            border-color: #807870 #f4f0ec #f4f0ec #807870;
        }

        .window-button.close {
            background: linear-gradient(180deg, #e88070 0%, #c86050 100%);
            border-color: #f4a090 #804030 #804030 #f4a090;
            color: #fff;
        }

        .window-button.close:hover {
            background: linear-gradient(180deg, #f09080 0%, #d84040 100%);
        }

        .window-button.close:active {
            background: linear-gradient(180deg, #a03020 0%, #c04030 100%);
            border-color: #804030 #f4a090 #f4a090 #804030;
        }

        .window-content {
            flex: 1;
            background: #fff;
            margin: 0;
            border: none;
            border-top: 1px solid #909090;
            overflow: auto;
            min-height: 0;
        }

        .window-menubar {
            display: flex;
            padding: 2px 4px;
            background: #efefde;
            border-bottom: 1px solid #b8b4a8;
            font-size: 11px;
            flex-shrink: 0;
        }

        .window-menu-item {
            padding: 2px 8px;
            cursor: pointer;
        }

        .window-menu-item:hover {
            background: #2255b3;
            color: #fff;
        }

        .my-projects-window {
            width: 650px;
            height: 480px;
            top: 60px;
            left: 100px;
        }

        .my-projects-window .window-content {
            padding: 0;
        }

        .projects-header {
            background: linear-gradient(180deg, #d4d0c4 0%, #c0bbb0 100%);
            padding: 8px 12px;
            border-bottom: 1px solid #999;
            font-size: 11px;
            color: #444;
        }

        .projects-toolbar {
            display: flex;
            gap: 4px;
            padding: 6px 8px;
            background: #f0ede4;
            border-bottom: 1px solid #b8b4a8;
        }

        .projects-toolbar-btn {
            padding: 4px 12px;
            background: linear-gradient(180deg, #e8e8e8 0%, #d4d4d4 100%);
            border: 1px solid;
            border-color: #fff #888 #888 #fff;
            border-radius: 3px;
            font-size: 11px;
            cursor: pointer;
        }

        .projects-toolbar-btn:hover {
            background: linear-gradient(180deg, #f0f0f0 0%, #e0e0e0 100%);
        }

        .projects-toolbar-btn:active {
            border-color: #888 #fff #fff #888;
        }

        .projects-toolbar-separator {
            width: 1px;
            background: #b8b4a8;
            margin: 0 4px;
        }

        .projects-list {
            padding: 12px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            height: calc(100% - 80px);
            overflow-y: auto;
        }

        .project-item {
            background: #f8f6f0;
            border: 1px solid #d4d0c4;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.1s ease;
        }

        .project-item:hover {
            background: #e8e4d8;
            border-color: #a0a0a0;
        }

        .project-item-icon {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .project-item-name {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 4px;
            color: #000;
        }

        .project-item-desc {
            font-size: 11px;
            color: #666;
            line-height: 1.4;
        }

        .project-item-tags {
            display: flex;
            gap: 4px;
            margin-top: 8px;
            flex-wrap: wrap;
        }

        .project-item-tag {
            font-size: 10px;
            padding: 2px 6px;
            background: #d4ddf5;
            border-radius: 3px;
            color: #2255b3;
        }

        .about-window {
            width: 420px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2000;
        }

        .about-window-content {
            flex: 1;
            display: flex;
            min-height: 0;
            overflow: hidden;
        }

        .about-sidebar {
            width: 110px;
            background: linear-gradient(180deg, #2e6ad2 0%, #1448b0 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 10px;
            flex-shrink: 0;
        }

        .about-avatar {
            font-size: 52px;
            margin-bottom: 10px;
        }

        .about-avatar-name {
            color: rgba(255,255,255,0.75);
            font-size: 10px;
            text-align: center;
            font-weight: bold;
        }

        .about-body {
            flex: 1;
            padding: 18px 20px;
            display: flex;
            flex-direction: column;
        }

        .about-title {
            font-size: 18px;
            font-weight: bold;
            color: #2255b3;
            margin-bottom: 8px;
        }

        .about-text {
            font-size: 12px;
            line-height: 1.65;
            color: #333;
            margin-bottom: 14px;
        }

        .about-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 14px;
        }

        .about-skill {
            font-size: 10px;
            padding: 2px 7px;
            background: #ece9d8;
            border: 1px solid #b8b4a8;
            border-radius: 2px;
            color: #444;
        }

        .about-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid #e0dcd0;
            margin-top: auto;
        }

        .about-hint {
            font-size: 10px;
            color: #888;
        }

        .ie-window {
            width: 700px;
            height: 500px;
            top: 80px;
            left: 80px;
        }

        .ie-toolbar {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 4px 8px;
            background: #ece9d8;
            border-bottom: 1px solid #b8b4a8;
        }

        .ie-nav-btn {
            width: 26px;
            height: 26px;
            background: linear-gradient(180deg, #e8e8e8 0%, #d4d4d4 100%);
            border: 1px solid;
            border-color: #fff #888 #888 #fff;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
        }

        .ie-nav-btn:hover {
            background: linear-gradient(180deg, #f0f0f0 0%, #e0e0e0 100%);
        }

        .ie-address-bar {
            flex: 1;
            display: flex;
            align-items: center;
            background: #fff;
            border: 1px solid;
            border-color: #716f64 #fff #fff #716f64;
            padding: 2px 8px;
        }

        .ie-address-bar input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 12px;
        }

        .ie-go-btn {
            padding: 4px 12px;
            background: linear-gradient(180deg, #e8e8e8 0%, #d4d4d4 100%);
            border: 1px solid;
            border-color: #fff #888 #888 #fff;
            border-radius: 3px;
            font-size: 12px;
            cursor: pointer;
            margin-left: 4px;
        }

        .ie-content {
            flex: 1;
            background: #fff;
            padding: 0;
            overflow-y: auto;
        }

        .fake-webpage {
            background: #000066;
            color: #ffffff;
            font-family: 'Times New Roman', Times, serif;
            min-height: 100%;
            padding-bottom: 20px;
        }

        .fake-webpage .rainbow-bar {
            height: 5px;
            background: linear-gradient(90deg, #ff0000, #ff7700, #ffff00, #00cc00, #0000ff, #8800ff, #ff0000);
        }

        .fake-webpage .page-header {
            background: #000033;
            text-align: center;
            padding: 16px 12px 12px;
            border-bottom: 1px solid #2222aa;
        }

        .fake-webpage .page-title {
            font-family: Arial Black, 'Arial Bold', Gadget, sans-serif;
            font-size: 22px;
            color: #ffff00;
            text-shadow: 2px 2px 0 #ff6600, -1px -1px 0 #ff0000;
            margin: 0 0 6px;
            letter-spacing: 1px;
        }

        .fake-webpage .page-subtitle {
            font-style: italic;
            color: #00ffff;
            font-size: 13px;
            margin: 0;
        }

        .fake-webpage .page-marquee {
            display: block;
            background: #000033;
            color: #ffff00;
            font-size: 12px;
            padding: 4px 0;
            border-top: 1px solid #2244aa;
            border-bottom: 1px solid #2244aa;
        }

        .fake-webpage .page-body {
            padding: 10px 14px;
        }

        .fake-webpage .under-construction {
            text-align: center;
            color: #ff6600;
            font-size: 13px;
            font-weight: bold;
            margin: 8px 0;
            padding: 6px;
            border: 2px dashed #ff6600;
            background: #000044;
        }

        @keyframes webpage-blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .fake-webpage .blink {
            animation: webpage-blink 1s step-start infinite;
        }

        .fake-webpage .section-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 12px;
        }

        .fake-webpage .section-table td {
            vertical-align: top;
            padding: 10px;
            background: #000044;
            border: 1px solid #3344aa;
        }

        .fake-webpage .section-heading {
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            margin: 0 0 8px;
            padding-bottom: 4px;
            border-bottom: 1px dashed;
        }

        .fake-webpage .section-heading.green { color: #00ff00; border-color: #00ff00; }
        .fake-webpage .section-heading.orange { color: #ff9900; border-color: #ff9900; }
        .fake-webpage .section-heading.cyan { color: #00ffff; border-color: #00ffff; }
        .fake-webpage .section-heading.pink { color: #ff66ff; border-color: #ff66ff; }

        .fake-webpage .body-text {
            color: #aaaaff;
            line-height: 1.6;
            margin: 0 0 6px;
        }

        .fake-webpage a {
            color: #ff9900;
            text-decoration: underline;
        }

        .fake-webpage a:hover { color: #ffdd00; }

        .fake-webpage .hit-counter {
            font-family: 'Courier New', monospace;
            background: #000000;
            border: 2px inset #336633;
            color: #00ff00;
            padding: 3px 10px;
            letter-spacing: 5px;
            font-size: 16px;
            display: inline-block;
        }

        .fake-webpage .awards-grid {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            margin-top: 6px;
        }

        .fake-webpage .award-badge {
            background: linear-gradient(135deg, #222266, #000044);
            border: 2px solid #4488ff;
            padding: 4px 8px;
            font-size: 10px;
            text-align: center;
            color: #ffdd88;
        }

        .fake-webpage .page-footer {
            text-align: center;
            padding: 10px;
            border-top: 1px solid #2222aa;
            font-size: 11px;
            color: #4444aa;
            margin-top: 10px;
        }

        .fake-webpage .webring {
            background: #000033;
            border: 1px solid #4444aa;
            padding: 8px;
            text-align: center;
            font-size: 11px;
            color: #8888cc;
            margin: 10px 0;
        }

        .writing-window {
            width: 600px;
            height: 450px;
            top: 100px;
            left: 180px;
        }

        .writing-list {
            padding: 12px;
        }

        .writing-item {
            display: flex;
            gap: 12px;
            padding: 12px;
            border-bottom: 1px solid #e0dcd0;
        }

        .writing-item:hover {
            background: #f0ede4;
        }

        .writing-item-icon {
            font-size: 24px;
        }

        .writing-item-content {
            flex: 1;
        }

        .writing-item-title {
            font-size: 13px;
            font-weight: bold;
            color: #2255b3;
            margin-bottom: 4px;
        }

        .writing-item-desc {
            font-size: 11px;
            color: #666;
            line-height: 1.4;
        }

        .writing-item-meta {
            font-size: 10px;
            color: #999;
            margin-top: 6px;
        }

        .contact-window {
            width: 450px;
            height: 300px;
            top: 120px;
            left: 200px;
        }

        .contact-window .window-content {
            padding: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-bottom: 1px solid #e0dcd0;
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-item-icon {
            font-size: 24px;
        }

        .contact-item-label {
            font-size: 10px;
            color: #999;
        }

        .contact-item-value {
            font-size: 12px;
            color: #2255b3;
        }

        .recycle-bin-window {
            width: 500px;
            height: 380px;
            top: 120px;
            left: 200px;
        }

        .recycle-bin-window .window-content {
            display: flex;
            flex-direction: column;
            padding: 16px;
        }

        .recycle-bin-icon-large {
            text-align: center;
            font-size: 80px;
            margin: 20px 0;
        }

        .recycle-bin-text {
            text-align: center;
            font-size: 13px;
            color: #666;
            margin-bottom: 16px;
        }

        .recycle-bin-warning {
            background: #fff8e0;
            border: 1px solid #f0d580;
            padding: 12px;
            border-radius: 4px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .recycle-bin-warning-icon {
            font-size: 24px;
        }


        .xp-button {
            padding: 6px 20px;
            background: linear-gradient(180deg, #e8e8e8 0%, #d4d4d4 100%);
            border: 1px solid;
            border-color: #fff #888 #888 #fff;
            border-radius: 3px;
            font-size: 12px;
            cursor: pointer;
        }

        .xp-button:hover {
            background: linear-gradient(180deg, #f0f0f0 0%, #e0e0e0 100%);
        }

        .xp-button.primary {
            background: linear-gradient(180deg, #3a7acc 0%, #2255b3 100%);
            color: #fff;
            border-color: #5599dd #1a3a7a #1a3a7a #5599dd;
        }

        .xp-button.primary:hover {
            background: linear-gradient(180deg, #4a8adc 0%, #2a5ab3 100%);
        }

        .visitor-counter {
            font-size: 11px;
            color: #666;
            text-align: center;
            margin-top: 12px;
            padding: 8px;
            background: #f0ede4;
            border-radius: 4px;
        }

        .window.maximized {
            left: 0 !important;
            top: 0 !important;
            width: 100vw !important;
            height: calc(100vh - 30px) !important;
            border-radius: 0 !important;
            border: none !important;
            box-shadow: none !important;
        }

        .games-window {
            width: 520px;
            height: 380px;
            top: 70px;
            left: 110px;
        }

        .games-list {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .game-item {
            display: flex;
            gap: 16px;
            align-items: center;
            padding: 14px 16px;
            background: linear-gradient(180deg, #f8f6f0 0%, #f0ede4 100%);
            border: 1px solid #d4d0c4;
            cursor: pointer;
        }

        .game-item:hover {
            background: linear-gradient(180deg, #dde8f8 0%, #ccd8f0 100%);
            border-color: #a0b8e0;
        }

        .game-item-icon {
            font-size: 48px;
            flex-shrink: 0;
        }

        .game-item-info {
            flex: 1;
        }

        .game-item-name {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            margin-bottom: 4px;
        }

        .game-item-desc {
            font-size: 11px;
            color: #444;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .game-item-badge {
            display: inline-block;
            font-size: 10px;
            padding: 2px 7px;
            background: #c00;
            color: #fff;
            font-weight: bold;
            border-radius: 2px;
            margin-right: 6px;
        }

        .game-item-link {
            font-size: 11px;
            color: #2255b3;
            text-decoration: underline;
        }

        .game-item:hover .game-item-link {
            color: #fff;
        }

        .game-item:hover .game-item-name,
        .game-item:hover .game-item-desc {
            color: #fff;
        }

        .games-coming-soon {
            padding: 12px 16px;
            font-size: 11px;
            color: #888;
            font-style: italic;
            border-top: 1px solid #e0dcd0;
        }

        @media (max-width: 768px) {
            .desktop-icons {
                top: 10px;
                left: 10px;
            }

            .desktop-icon {
                width: 65px;
            }

            .start-menu {
                width: 320px;
                height: 400px;
            }

            .window {
                width: 90vw !important;
                left: 5vw !important;
            }

            .projects-list {
                grid-template-columns: 1fr;
            }

            .taskbar-app-name {
                display: none;
            }

            .ie-content .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="desktop">
        <div class="desktop-bg"></div>
        <div class="desktop-clouds"></div>
        <div class="desktop-hills"></div>
        <div class="desktop-icons">
            <div class="desktop-icon" ondblclick="openWindow('projects')">
                <div class="desktop-icon-img">📁</div>
                <div class="desktop-icon-label">My Projects</div>
            </div>
            <div class="desktop-icon" ondblclick="openWindow('about')">
                <div class="desktop-icon-img">👤</div>
                <div class="desktop-icon-label">About Me</div>
            </div>
            <div class="desktop-icon" ondblclick="openWindow('browser')">
                <div class="desktop-icon-img">🌐</div>
                <div class="desktop-icon-label">Internet</div>
            </div>
            <div class="desktop-icon" ondblclick="openWindow('writing')">
                <div class="desktop-icon-img">✏️</div>
                <div class="desktop-icon-label">Writing</div>
            </div>
            <div class="desktop-icon" ondblclick="openWindow('contact')">
                <div class="desktop-icon-img">📧</div>
                <div class="desktop-icon-label">Contact</div>
            </div>
            <div class="desktop-icon" ondblclick="openWindow('games')">
                <div class="desktop-icon-img">🎮</div>
                <div class="desktop-icon-label">Games</div>
            </div>
            <div class="desktop-icon" ondblclick="openWindow('recycle')">
                <div class="desktop-icon-img">🗑️</div>
                <div class="desktop-icon-label">Recycle Bin</div>
            </div>
        </div>

        <div class="start-menu" id="startMenu">
            <div class="start-menu-header">
                <div class="start-menu-user-avatar">👤</div>
                <div class="start-menu-user-name">{{ $site['title'] ?? 'andybrudtkuhl' }}</div>
            </div>
            <div class="start-menu-panels">
                <div class="start-menu-left">
                    <div class="start-menu-pinned">
                        <div class="start-menu-item" onclick="openWindow('browser')">
                            <div class="start-menu-item-icon">🌐</div>
                            <div>
                                <div class="start-menu-item-name">Internet Explorer</div>
                                <div class="start-menu-item-sub">Web Browser</div>
                            </div>
                        </div>
                        <div class="start-menu-item" onclick="openWindow('writing')">
                            <div class="start-menu-item-icon">✉️</div>
                            <div>
                                <div class="start-menu-item-name">Outlook Express</div>
                                <div class="start-menu-item-sub">E-mail</div>
                            </div>
                        </div>
                    </div>
                    <div class="start-menu-item" onclick="openWindow('projects')">
                        <div class="start-menu-item-icon">📁</div>
                        <div class="start-menu-item-name">My Projects</div>
                    </div>
                    <div class="start-menu-item" onclick="openWindow('writing')">
                        <div class="start-menu-item-icon">✏️</div>
                        <div class="start-menu-item-name">Writing</div>
                    </div>
                    <div class="start-menu-item" onclick="openWindow('about')">
                        <div class="start-menu-item-icon">👤</div>
                        <div class="start-menu-item-name">About Me</div>
                    </div>
                    <div class="start-menu-item" onclick="openWindow('games')">
                        <div class="start-menu-item-icon">🎮</div>
                        <div class="start-menu-item-name">Games</div>
                    </div>
                    <div class="start-menu-item" onclick="openWindow('contact')">
                        <div class="start-menu-item-icon">📧</div>
                        <div class="start-menu-item-name">Contact</div>
                    </div>
                    <div class="start-menu-all-programs">
                        <span>All Programs</span>
                        <span style="margin-left:auto">▶</span>
                    </div>
                </div>
                <div class="start-menu-right">
                    <div class="start-menu-right-item" onclick="openWindow('projects')">
                        <span>📁</span> My Documents
                    </div>
                    <div class="start-menu-right-item" onclick="openWindow('projects')">
                        <span>🖼️</span> My Pictures
                    </div>
                    <div class="start-menu-right-item" onclick="openWindow('writing')">
                        <span>🎵</span> My Music
                    </div>
                    <div class="start-menu-right-item" onclick="openWindow('browser')">
                        <span>💻</span> My Computer
                    </div>
                    <div class="start-menu-right-separator"></div>
                    <div class="start-menu-right-item" onclick="openWindow('about')">
                        <span>⚙️</span> Control Panel
                    </div>
                    <div class="start-menu-right-item" onclick="openWindow('about')">
                        <span>🔌</span> Connect To
                    </div>
                    <div class="start-menu-right-separator"></div>
                    <div class="start-menu-right-item" onclick="openWindow('about')">
                        <span>❓</span> Help and Support
                    </div>
                    <div class="start-menu-right-item">
                        <span>🔍</span> Search
                    </div>
                    <div class="start-menu-right-item">
                        <span>▶️</span> Run...
                    </div>
                </div>
            </div>
            <div class="start-menu-footer">
                <div class="start-menu-footer-btn">
                    <span>🚪</span> Log Off
                </div>
                <div class="start-menu-footer-btn">
                    <span>⏻</span> Turn Off Computer
                </div>
            </div>
        </div>

        <div class="window my-projects-window" id="window-projects">
            <div class="window-titlebar">
                <span class="window-icon">📁</span>
                <span class="window-title">My Projects</span>
                <div class="window-controls">
                    <div class="window-button">_</div>
                    <div class="window-button">□</div>
                    <div class="window-button close" onclick="closeWindow('projects')">×</div>
                </div>
            </div>
            <div class="window-menubar">
                <div class="window-menu-item">File</div>
                <div class="window-menu-item">Edit</div>
                <div class="window-menu-item">View</div>
                <div class="window-menu-item">Favorites</div>
                <div class="window-menu-item">Tools</div>
                <div class="window-menu-item">Help</div>
            </div>
            <div class="window-content">
                <div class="projects-header">
                    Address: C:\Users\andy\Sites\youmetandy\Projects
                </div>
                <div class="projects-toolbar">
                    <div class="projects-toolbar-btn">← Back</div>
                    <div class="projects-toolbar-btn">→ Forward</div>
                    <div class="projects-toolbar-btn">↑ Up</div>
                    <div class="projects-toolbar-separator"></div>
                    <div class="projects-toolbar-btn">🔄 Refresh</div>
                </div>
<div class="projects-list">
                    @foreach($projects as $project)
                        <div class="project-item" data-url="{{ $project['links']['view'] ?? '#' }}" onclick="if(this.dataset.url !== '#') window.open(this.dataset.url, '_blank')">
                            <div class="project-item-icon">{{ $project['emoji'] ?? '▶' }}</div>
                            <div class="project-item-name">{{ $project['title'] ?? 'Project' }}</div>
                            <div class="project-item-desc">{{ Str::limit(strip_tags($project['description'] ?? ''), 60) }}</div>
                            <div class="project-item-tags">
                                @if(isset($project['tags']))
                                    @foreach(array_slice($project['tags'], 0, 3) as $tag)
                                        <span class="project-item-tag">{{ $tag }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        <div class="window-resize-handle"></div>
        </div>

        <div class="window about-window" id="window-about">
            <div class="window-titlebar">
                <span class="window-icon">👤</span>
                <span class="window-title">Andy Brudtkuhl</span>
                <div class="window-controls">
                    <div class="window-button">_</div>
                    <div class="window-button">□</div>
                    <div class="window-button close" onclick="closeWindow('about')">×</div>
                </div>
            </div>
            <div class="about-window-content">
                <style>
                    .about-centered { display: flex; flex-direction: column; align-items: center; padding: 20px 24px 16px; text-align: center; }
                    .about-centered .about-avatar-lg { font-size: 52px; margin-bottom: 8px; }
                    .about-centered .about-title-lg { font-size: 18px; font-weight: bold; color: #2255b3; margin-bottom: 10px; }
                    .about-centered .about-bio { font-size: 12px; line-height: 1.65; color: #444; max-width: 320px; margin-bottom: 14px; }
                    .about-centered .about-links { display: flex; gap: 12px; margin-bottom: 16px; justify-content: center; flex-wrap: wrap; }
                    .about-centered .about-link { font-size: 11px; color: #2255b3; text-decoration: none; padding: 3px 10px; border: 1px solid #b8b4a8; background: linear-gradient(180deg, #f4f2ec 0%, #e8e4d8 100%); border-radius: 2px; }
                    .about-centered .about-link:hover { background: linear-gradient(180deg, #dde6f5 0%, #c8d8f0 100%); border-color: #2255b3; }
                    .about-centered .about-footer-centered { padding-top: 12px; border-top: 1px solid #e0dcd0; width: 100%; display: flex; justify-content: center; }
                </style>
                <div class="about-centered">
                    <div class="about-avatar-lg">👤</div>
                    <div class="about-title-lg">Andy Brudtkuhl</div>
                    <div class="about-bio">Hi, I am Andy Brudtkuhl and I build things online. When I'm not shipping Laravel Cloud features, I am shipping side projects. Follow along on X and Github or read my blog.</div>
                    <div class="about-links">
                        <a href="{{ $contact['twitter'] ?? '#' }}" target="_blank" class="about-link">𝕏 Twitter/X</a>
                        <a href="{{ $contact['github'] ?? '#' }}" target="_blank" class="about-link">GitHub</a>
                        <a href="{{ collect($links ?? [])->firstWhere('name', 'Blog')['url'] ?? '#' }}" target="_blank" class="about-link">Blog</a>
                    </div>
                    <div class="about-footer-centered">
                        <button class="xp-button primary" onclick="closeWindow('about')">OK</button>
                    </div>
                </div>
            </div>
            <div class="window-resize-handle"></div>
        </div>

        <div class="window ie-window" id="window-browser">
            <div class="window-titlebar">
                <span class="window-icon">🌐</span>
                <span class="window-title">Andy Brudtkuhl's Homepage!! - Microsoft Internet Explorer</span>
                <div class="window-controls">
                    <div class="window-button">_</div>
                    <div class="window-button">□</div>
                    <div class="window-button close" onclick="closeWindow('browser')">×</div>
                </div>
            </div>
            <div class="window-menubar">
                <div class="window-menu-item">File</div>
                <div class="window-menu-item">Edit</div>
                <div class="window-menu-item">View</div>
                <div class="window-menu-item">Favorites</div>
                <div class="window-menu-item">Tools</div>
                <div class="window-menu-item">Help</div>
            </div>
            <div class="ie-toolbar">
                <div class="ie-nav-btn">←</div>
                <div class="ie-nav-btn">→</div>
                <div class="ie-nav-btn">↻</div>
                <div class="ie-nav-btn">🏠</div>
                <div class="ie-address-bar">
                    <input type="text" value="http://www.geocities.com/SiliconValley/Lab/andybrudtkuhl/index.html" id="addressBar">
                </div>
                <div class="ie-go-btn" onclick="navigateToUrl()">Go</div>
            </div>
            <div class="window-content ie-content">
                <div class="fake-webpage">
                    <div class="rainbow-bar"></div>
                    <div class="page-header">
                        <div class="page-title">&#x2605; {{ $site['title'] ?? 'Andy Brudtkuhl\'s Homepage' }} &#x2605;</div>
                        <div class="page-subtitle">~ {{ $site['subtitle'] ?? 'Making the internet a better place since 1995!' }} ~</div>
                    </div>
                    <marquee class="page-marquee">{{ $site['banner'] ?? '🌟 WELCOME TO MY HOMEPAGE!' }} &nbsp;&#x1F31F; BEST VIEWED IN INTERNET EXPLORER 5.5 AT 800x600 &nbsp;&#x1F31F; SIGN MY GUESTBOOK!! &nbsp;&#x1F31F;</marquee>
                    <div class="rainbow-bar"></div>
                    <div class="page-body">
                        <div class="under-construction">
                            &#x1F6A7; <span class="blink">{{ $site['subtitle'] ?? 'UNDER CONSTRUCTION' }}</span> &#x1F6A7;&nbsp;&nbsp; Last updated: {{ $site['lastUpdated'] ?? '2001' }}
                        </div>

                        <table class="section-table">
                            <tr>
                                <td style="width:55%">
                                    <div class="section-heading green">&#x2606; About Me &#x2606;</div>
                                    <p class="body-text">{{ $about['description'] ?? '' }}</p>
                                    <p class="body-text">{{ $about['description2'] ?? '' }}</p>
                                    <p class="body-text">
                                        <strong style="color:#00ff00">E-Mail:</strong> <a href="mailto:{{ $contact['email'] ?? '' }}">{{ $contact['email'] ?? '' }}</a><br>
                                        <strong style="color:#00ff00">GitHub:</strong> <a href="{{ $contact['github'] ?? '#' }}" target="_blank">{{ str_replace('https://github.com/', '', $contact['github'] ?? '') }}</a><br>
                                        <strong style="color:#00ff00">Twitter/X:</strong> <a href="{{ $contact['twitter'] ?? '#' }}" target="_blank">{{ str_replace('https://x.com/', '@', $contact['twitter'] ?? '') }}</a>
                                    </p>

                                    <div class="section-heading cyan" style="margin-top:12px">&#x2606; My Skillz &#x2606;</div>
                                    <p class="body-text">
                                        @foreach($about['skills'] as $skill)&#x1F31F; {{ $skill }}&nbsp;&nbsp; @endforeach
                                    </p>
                                </td>
                                <td style="width:45%">
                                    <div class="section-heading orange">&#x2606; My Projects &#x2606;</div>
                                    <p class="body-text">
                                        @foreach(array_slice($projects, 0, 6) as $project)
                                            &#x1F31F; <a href="{{ $project['links']['view'] ?? '#' }}" target="_blank">{{ $project['title'] }}</a>@if(isset($project['badge'])) <span style="color:#ff3333;font-size:10px;font-weight:bold">[{{ $project['badge'] }}]</span>@endif<br>
                                        @endforeach
                                    </p>

                                    <div class="section-heading pink" style="margin-top:12px">&#x2606; My Writing &#x2606;</div>
                                    <p class="body-text">
                                        @foreach(array_slice($writing, 0, 4) as $article)
                                            &#x270D; <a href="{{ $article['link'] ?? '#' }}" target="_blank">{{ Str::limit($article['title'], 35) }}</a><br>
                                        @endforeach
                                    </p>

                                    <div class="section-heading orange" style="margin-top:12px">&#x2606; Find Me Online &#x2606;</div>
                                    <p class="body-text">
                                        @foreach($links ?? [] as $link)
                                            &#x1F310; <a href="{{ $link['url'] }}" target="_blank">{{ $link['name'] }}</a><br>
                                        @endforeach
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <div class="webring">
                            [ <a href="#">&#x276E; Prev</a> ]
                            &nbsp; Laravel Developers Web Ring &nbsp;
                            [ <a href="#">List Sites</a> ]
                            &nbsp;
                            [ <a href="#">Next &#x276F;</a> ]
                        </div>

                        <div style="text-align:center; margin-top: 10px;">
                            <p class="body-text" style="text-align:center">You are visitor number:</p>
                            <div class="hit-counter">{{ str_pad($visitorCount ?? 1337, 6, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>
                    <div class="page-footer">
                        &copy; {{ date('Y') }} {{ $site['title'] ?? 'Andy Brudtkuhl' }} &nbsp;|&nbsp;
                        Last Updated: {{ $site['lastUpdated'] ?? 'today' }} &nbsp;|&nbsp;
                        <a href="mailto:{{ $contact['email'] ?? '' }}">Email Me!</a><br>
                        <span style="font-size:10px">Best viewed in Internet Explorer 5.5 at 800&times;600 resolution &bull; No Netscape please!!</span>
                    </div>
                    <div class="rainbow-bar"></div>
                </div>
            </div>
        <div class="window-resize-handle"></div>
        </div>

        <div class="window writing-window" id="window-writing">
            <div class="window-titlebar">
                <span class="window-icon">✏️</span>
                <span class="window-title">Writing - RSS Feed</span>
                <div class="window-controls">
                    <div class="window-button">_</div>
                    <div class="window-button">□</div>
                    <div class="window-button close" onclick="closeWindow('writing')">×</div>
                </div>
            </div>
            <div class="window-menubar">
                <div class="window-menu-item">File</div>
                <div class="window-menu-item">Edit</div>
                <div class="window-menu-item">View</div>
                <div class="window-menu-item">Help</div>
            </div>
            <div class="window-content">
                <div class="writing-list">
                    @forelse($writing as $article)
                        <div class="writing-item" data-url="{{ $article['link'] ?? '#' }}" onclick="if(this.dataset.url !== '#') window.open(this.dataset.url, '_blank')">
                            <div class="writing-item-icon">📝</div>
                            <div class="writing-item-content">
                                <div class="writing-item-title">{{ $article['title'] ?? 'Untitled' }}</div>
                                <div class="writing-item-desc">{{ Str::limit(strip_tags($article['description'] ?? ''), 100) }}</div>
                                <div class="writing-item-meta">
                                    {{ $article['date'] ?? '' }} @if(isset($article['source'])) • {{ strtoupper($article['source']) }} @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div style="padding: 20px; text-align: center; color: #666;">
                            No writing articles found.
                        </div>
                    @endforelse
                </div>
            </div>
        <div class="window-resize-handle"></div>
        </div>

        <div class="window contact-window" id="window-contact">
            <div class="window-titlebar">
                <span class="window-icon">📧</span>
                <span class="window-title">Contact</span>
                <div class="window-controls">
                    <div class="window-button">_</div>
                    <div class="window-button">□</div>
                    <div class="window-button close" onclick="closeWindow('contact')">×</div>
                </div>
            </div>
            <div class="window-content">
                <div class="contact-item">
                    <div class="contact-item-icon">📧</div>
                    <div>
                        <div class="contact-item-label">EMAIL</div>
                        <div class="contact-item-value">{{ $contact['email'] ?? 'hello@andybrudtkuhl.com' }}</div>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon">🐙</div>
                    <div>
                        <div class="contact-item-label">GITHUB</div>
                        <div class="contact-item-value">{{ str_replace('https://', '', $contact['github'] ?? 'github.com/abrudtkuhl') }}</div>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon">🐦</div>
                    <div>
                        <div class="contact-item-label">TWITTER</div>
                        <div class="contact-item-value">{{ str_replace('https://twitter.com/', '@', $contact['twitter'] ?? '@abrudtkuhl') }}</div>
                    </div>
                </div>
                <div style="padding: 16px;">
                    <p style="font-size: 12px; color: #666; line-height: 1.6;">
                        {{ $contact['message'] ?? 'Want to collaborate? Feel free to reach out!' }}
                    </p>
                </div>
            </div>
        <div class="window-resize-handle"></div>
        </div>

        <div class="window games-window" id="window-games">
            <div class="window-titlebar">
                <span class="window-icon">🎮</span>
                <span class="window-title">Games</span>
                <div class="window-controls">
                    <div class="window-button">_</div>
                    <div class="window-button">□</div>
                    <div class="window-button close" onclick="closeWindow('games')">×</div>
                </div>
            </div>
            <div class="window-menubar">
                <div class="window-menu-item">File</div>
                <div class="window-menu-item">View</div>
                <div class="window-menu-item">Help</div>
            </div>
            <div class="window-content">
                <div class="games-list">
                    <div class="game-item" onclick="window.open('https://snooji.laravel.cloud', '_blank')">
                        <div class="game-item-icon">🎯</div>
                        <div class="game-item-info">
                            <div class="game-item-name">Snooji</div>
                            <div class="game-item-desc">A modern web version of the classic Snood puzzle game. Launch emojis from a cannon, match three or more, and clear the board before the danger meter fills up.</div>
                            <span class="game-item-badge">HOT!</span>
                            <span class="game-item-link">snooji.laravel.cloud</span>
                        </div>
                    </div>
                    <div class="game-item" onclick="window.open('https://invaders.laravel.cloud', '_blank')">
                        <div class="game-item-icon">👾</div>
                        <div class="game-item-info">
                            <div class="game-item-name">Emoji Invaders</div>
                            <div class="game-item-desc">Defend your planet against waves of emoji invaders in this classic space shooter with a colorful twist.</div>
                            <span class="game-item-link">invaders.laravel.cloud</span>
                        </div>
                    </div>
                </div>
                <div class="games-coming-soon">More games in development... check back soon.</div>
            </div>
            <div class="window-resize-handle"></div>
        </div>

        <div class="window recycle-bin-window" id="window-recycle">
            <div class="window-titlebar">
                <span class="window-icon">🗑️</span>
                <span class="window-title">Recycle Bin</span>
                <div class="window-controls">
                    <div class="window-button">_</div>
                    <div class="window-button">□</div>
                    <div class="window-button close" onclick="closeWindow('recycle')">×</div>
                </div>
            </div>
            <div class="window-content">
                <div class="recycle-bin-icon-large">🗑️</div>
                <div class="recycle-bin-text">3 items &nbsp;·&nbsp; 14.2 KB</div>
                <div style="padding: 0 16px;">
                    <div class="writing-item" style="cursor:default;">
                        <div class="writing-item-icon">📄</div>
                        <div class="writing-item-content">
                            <div class="writing-item-title">my_geocities_page_1998.html</div>
                            <div class="writing-item-desc">Deleted 9,496 days ago &nbsp;·&nbsp; 8.1 KB</div>
                        </div>
                    </div>
                    <div class="writing-item" style="cursor:default;">
                        <div class="writing-item-icon">📄</div>
                        <div class="writing-item-content">
                            <div class="writing-item-title">ie6_favorites_backup.bak</div>
                            <div class="writing-item-desc">Deleted 6,210 days ago &nbsp;·&nbsp; 4.4 KB</div>
                        </div>
                    </div>
                    <div class="writing-item" style="cursor:default;">
                        <div class="writing-item-icon">📄</div>
                        <div class="writing-item-content">
                            <div class="writing-item-title">my_myspace_layout_2006.css</div>
                            <div class="writing-item-desc">Deleted 7,305 days ago &nbsp;·&nbsp; 1.7 KB</div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="window-resize-handle"></div>
        </div>


        <div class="taskbar">
            <div class="start-button" onclick="toggleStartMenu()">
                <div class="windows-logo">
                    <div class="wl-tl"></div>
                    <div class="wl-tr"></div>
                    <div class="wl-bl"></div>
                    <div class="wl-br"></div>
                </div>
                <span class="start-button-text">start</span>
            </div>
            <div class="taskbar-divider"></div>
            <div class="taskbar-apps" id="taskbarApps">
            </div>
            <div class="system-tray">
                <div class="system-icons">
                    <span>🔊</span>
                    <span>📶</span>
                </div>
                <div class="system-tray-time" id="systemTime">12:00 PM</div>
            </div>
        </div>
    </div>

    <script>
        let activeWindow = null;
        let isDragging = false;
        let isResizing = false;
        let dragOffset = { x: 0, y: 0 };
        let resizeData = { width: 0, height: 0, startX: 0, startY: 0 };
        let windowZIndex = 100;

        function toggleStartMenu() {
            const menu = document.getElementById('startMenu');
            menu.classList.toggle('visible');
        }

        document.addEventListener('click', (e) => {
            const menu = document.getElementById('startMenu');
            const startBtn = document.querySelector('.start-button');
            if (!menu.contains(e.target) && !startBtn.contains(e.target)) {
                menu.classList.remove('visible');
            }
        });

        function openWindow(id) {
            const win = document.getElementById('window-' + id);
            if (win) {
                win.classList.add('visible');
                win.classList.add('active');
                win.style.zIndex = ++windowZIndex;
                activeWindow = win;
                
                document.getElementById('startMenu').classList.remove('visible');
                
                let taskbarApp = document.getElementById('taskbar-' + id);
                if (!taskbarApp) {
                    taskbarApp = document.createElement('div');
                    taskbarApp.id = 'taskbar-' + id;
                    taskbarApp.className = 'taskbar-app';
                    taskbarApp.onclick = () => focusWindow(id);
                    
                    const windowIcon = win.querySelector('.window-icon');
                    const windowTitle = win.querySelector('.window-title');
                    
                    taskbarApp.innerHTML = `
                        <span class="taskbar-app-icon">${windowIcon ? windowIcon.textContent : '📄'}</span>
                        <span class="taskbar-app-name">${windowTitle ? windowTitle.textContent : id}</span>
                    `;
                    
                    document.getElementById('taskbarApps').appendChild(taskbarApp);
                }
                taskbarApp.classList.add('active');
                taskbarApp.classList.remove('minimized');
            }
        }

        function closeWindow(id) {
            const win = document.getElementById('window-' + id);
            if (win) {
                win.classList.remove('visible');
                win.classList.remove('active');
                win.classList.remove('maximized');

                const taskbarApp = document.getElementById('taskbar-' + id);
                if (taskbarApp) {
                    taskbarApp.classList.remove('active');
                    taskbarApp.classList.remove('minimized');
                    taskbarApp.remove();
                }
            }
        }

        function minimizeWindow(id) {
            const win = document.getElementById('window-' + id);
            if (!win) return;
            win.classList.remove('visible');
            win.classList.remove('active');
            win.classList.remove('maximized');
            const taskbarApp = document.getElementById('taskbar-' + id);
            if (taskbarApp) {
                taskbarApp.classList.remove('active');
                taskbarApp.classList.add('minimized');
            }
        }

        function maximizeWindow(id) {
            const win = document.getElementById('window-' + id);
            if (!win) return;
            if (win.classList.contains('maximized')) {
                win.classList.remove('maximized');
                win.style.left = win.dataset.prevLeft || '';
                win.style.top = win.dataset.prevTop || '';
                win.style.width = win.dataset.prevWidth || '';
                win.style.height = win.dataset.prevHeight || '';
            } else {
                const rect = win.getBoundingClientRect();
                win.dataset.prevLeft = win.style.left || rect.left + 'px';
                win.dataset.prevTop = win.style.top || rect.top + 'px';
                win.dataset.prevWidth = win.style.width || rect.width + 'px';
                win.dataset.prevHeight = win.style.height || rect.height + 'px';
                win.classList.add('maximized');
            }
        }

        function focusWindow(id) {
            const win = document.getElementById('window-' + id);
            if (win && win.classList.contains('visible')) {
                document.querySelectorAll('.window').forEach(w => w.classList.remove('active'));
                win.classList.add('active');
                win.style.zIndex = ++windowZIndex;
                activeWindow = win;
            } else if (win) {
                win.classList.add('visible');
                win.classList.add('active');
                win.style.zIndex = ++windowZIndex;
                activeWindow = win;
                
                const taskbarApp = document.getElementById('taskbar-' + id);
                if (taskbarApp) {
                    taskbarApp.classList.add('active');
                    taskbarApp.classList.remove('minimized');
                }
            }
        }

        document.querySelectorAll('.window').forEach(win => {
            const id = win.id.replace('window-', '');
            win.querySelectorAll('.window-button').forEach(btn => {
                const label = btn.textContent.trim();
                if (label === '_') btn.addEventListener('click', () => minimizeWindow(id));
                if (label === '□') btn.addEventListener('click', () => maximizeWindow(id));
            });
        });

        document.querySelectorAll('.window').forEach(win => {
            const titlebar = win.querySelector('.window-titlebar');
            const resizeHandle = win.querySelector('.window-resize-handle');
            
            titlebar.addEventListener('mousedown', (e) => {
                if (e.target.classList.contains('window-button')) return;
                if (win.classList.contains('resizing')) return;
                
                isDragging = true;
                activeWindow = win;
                
                document.querySelectorAll('.window').forEach(w => w.classList.remove('active'));
                win.classList.add('active');
                win.style.zIndex = ++windowZIndex;
                
                const rect = win.getBoundingClientRect();
                dragOffset.x = e.clientX - rect.left;
                dragOffset.y = e.clientY - rect.top;
                
                e.preventDefault();
            });

            if (resizeHandle) {
                resizeHandle.addEventListener('mousedown', (e) => {
                    if (!win.classList.contains('visible')) return;
                    
                    isResizing = true;
                    activeWindow = win;
                    win.classList.add('resizing');
                    
                    document.querySelectorAll('.window').forEach(w => w.classList.remove('active'));
                    win.classList.add('active');
                    win.style.zIndex = ++windowZIndex;
                    
                    const rect = win.getBoundingClientRect();
                    resizeData.width = rect.width;
                    resizeData.height = rect.height;
                    resizeData.startX = e.clientX;
                    resizeData.startY = e.clientY;
                    
                    e.preventDefault();
                    e.stopPropagation();
                });
            }
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging && activeWindow) {
                const x = e.clientX - dragOffset.x;
                const y = e.clientY - dragOffset.y;
                
                const maxX = window.innerWidth - activeWindow.offsetWidth;
                const maxY = window.innerHeight - activeWindow.offsetHeight - 40;
                
                activeWindow.style.left = Math.max(-activeWindow.offsetWidth + 100, Math.min(maxX, x)) + 'px';
                activeWindow.style.top = Math.max(0, Math.min(maxY, y)) + 'px';
            }
            
            if (isResizing && activeWindow) {
                const dx = e.clientX - resizeData.startX;
                const dy = e.clientY - resizeData.startY;
                
                const newWidth = Math.max(300, resizeData.width + dx);
                const newHeight = Math.max(200, resizeData.height + dy);
                
                activeWindow.style.width = newWidth + 'px';
                activeWindow.style.height = newHeight + 'px';
            }
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            isResizing = false;
            if (activeWindow) {
                activeWindow.classList.remove('resizing');
            }
        });

        document.querySelectorAll('.window').forEach(win => {
            win.addEventListener('mousedown', () => {
                if (!win.classList.contains('visible')) return;
                if (win.classList.contains('resizing')) return;
                
                document.querySelectorAll('.window').forEach(w => w.classList.remove('active'));
                win.classList.add('active');
                win.style.zIndex = ++windowZIndex;
                activeWindow = win;
            });
        });

        function updateTime() {
            const now = new Date();
            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            document.getElementById('systemTime').textContent = hours + ':' + minutes + ' ' + ampm;
        }

        updateTime();
        setInterval(updateTime, 1000);

        function navigateToUrl() {
            const url = document.getElementById('addressBar').value;
            alert('This is a recreation - navigating to: ' + url);
        }

        setTimeout(() => {
            openWindow('about');
        }, 500);
    </script>
</body>
</html>