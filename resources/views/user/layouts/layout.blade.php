<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    
    <link href="{{ asset('admin_asset/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand">
                    <span class="align-middle">e-SK@S</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Halaman
                    </li>

                    <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('dashboard') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Halaman Utama</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-item {{ request()->routeIs('create') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('create') }}">
                            <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Cipta Rekod Baharu</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-header">
                        Senarai Standard
                    </li>
                    {{-- standard div --}}
                    <div>
                        <li class="sidebar-item">
                            <a class="sidebar-link toggle-standard" href="#">
                                <i class="align-middle"></i> <span class="align-middle">Standard 1</span>
                            </a>
                            <ul class="sidebar-dropdown" style="display: none;">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{route('aspek_1_1')}}">
                                        <span class="align-middle">Aspek 1.1</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="#">
                                        <span class="align-middle">Aspek 1.2</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="#">
                                        <span class="align-middle">Aspek 1.3</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </div>
                    <div>
                        <li class="sidebar-item">
                            <a class="sidebar-link toggle-standard" href="#">
                                <i class="align-middle"></i> <span class="align-middle">Standard 2</span>
                            </a>
                            <ul class="sidebar-dropdown" style="display: none;">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href={{route('aspek_2_1')}}>
                                        <span class="align-middle">Aspek 2.1</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="#">
                                        <span class="align-middle">Sub Standard 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div>
                        <li class="sidebar-item">
                            <a class="sidebar-link toggle-standard" href="#">
                                <i class="align-middle"></i> <span class="align-middle">Standard 3</span>
                            </a>
                            <ul class="sidebar-dropdown" style="display: none;">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="#">
                                        <span class="align-middle">Sub Standard 1</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="#">
                                        <span class="align-middle">Sub Standard 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <div>
                        <li class="sidebar-item">
                            <a class="sidebar-link toggle-standard" href="#">
                                <i class="align-middle"></i> <span class="align-middle">Standard 4</span>
                            </a>
                            <ul class="sidebar-dropdown" style="display: none;">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="#">
                                        <span class="align-middle">Sub Standard 1</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="#">
                                        <span class="align-middle">Sub Standard 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>

                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-blank.html">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                        </a>
                    </li> --}}
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align d-flex align-items-center">
                        <div class="text-center me-3">
                            <p id="current-time" class="mb-0"></p>
                        </div>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="align-middle me-1" data-feather="log-out"></i> Log out
                            </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    @yield('user_layout')

                </div>
            </main>

            {{-- <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer> --}}
        </div>
    </div>

    <script src="{{ asset('admin_asset/js/app.js') }}"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			function updateTime() {
				const options = { timeZone: 'Asia/Kuala_Lumpur', hour12: true, weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
				const now = new Date().toLocaleString('ms-MY', options);
				document.getElementById('current-time').innerText = now;
			}

			setInterval(updateTime, 1000);
			updateTime(); // initial call to display time immediately
		});

		document.addEventListener('DOMContentLoaded', function() {
			const toggles = document.querySelectorAll('.toggle-standard');

			toggles.forEach(toggle => {
				toggle.addEventListener('click', function(event) {
					event.preventDefault();
					const submenu = this.nextElementSibling; // Get the next sibling (the submenu)
					submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
				});
			});
		});
	</script>
    @stack('scripts')
</body>

</html>
