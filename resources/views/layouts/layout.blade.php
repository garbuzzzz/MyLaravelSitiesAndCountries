<!DOCTYPE html>
<head>
    <title>@yield('title')</title>
    <style>
        html,
        body {
            background: #a9e1fa;
            height: 100%;
        }

        a {
            text-decoration: none;
        }

        .menu {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .menu__link {
            display: inline-block;
            color: #2d6c90;
            text-decoration: none;
            position: relative;
            padding: 14px 0;
            font-family: 'Muli', sans-serif;
            font-weight: 300;
            font-size: 22px;
            line-height: 1;
            letter-spacing: 0.040em;
        }

        .menu__link svg {
            fill: none;
            stroke: #70aec9;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke-dasharray: 338;
            stroke-dashoffset: 338;
            stroke-linecap: round;
            position: absolute;
            top: 50%;
            left: 50%;
            width: calc(100% + 60px);
            opacity: 0;
            transform: translate(-50%, -50%);
            transition: stroke-dashoffset 0s 0.2s, opacity 0.2s;
            z-index: -1;
        }

        .menu__link--active svg {
            stroke: #ff4c4c;
        }

        .menu__link--active svg,
        .menu__link:hover svg {
            stroke-dashoffset: 0;
            opacity: 1;
            transition: opacity 0s, stroke-dashoffset 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
        }
    </style>
</head>
<body>
<div class="menu">
    @yield('countries')
    @yield('cities')
    @yield('sights')
    @yield('descriptions')
</div>

</body>
</html>


