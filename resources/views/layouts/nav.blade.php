        {{--  Left side navigation  --}}
        <nav class="col-lg-2 navbar-expand-lg navbar-dark sidebar-navbar bg-k2">
            <div class="col-12 text-center m-2">
                <h1>
                    <a class="navbar-brand" href="{{ url('/works') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </h1>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav text-center text-md-right flex-column col-12">
                    <div class="nav-item">
                        <a class="nav-link" href="/works">
                            <i class="fa fa-clipboard" aria-hidden="true"></i> Munkák
                        </a>
                        <a class="nav-link" href="/work/new">
                            <i class="fa fa-plus" aria-hidden="true"></i> Új hozzáadása
                        </a>
                        <a class="nav-link" href="/works/notbilled">
                            <i class="fa fa-ban" aria-hidden="true"></i> Nincs számlázva
                        </a>
                        <a class="nav-link" href="/works/drafts">
                            <i class="fa fa-calendar-times-o" aria-hidden="true"></i> Függőben
                        </a>
                        <a class="nav-link" href="/works/search">
                            <i class="fa fa-question" aria-hidden="true"></i> Keresés
                        </a>
                        <a class="nav-link" href="/works/week">
                            <i class="fa fa-calendar-minus-o" aria-hidden="true"></i> Heti nézet
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="nav-item">
                        <a class="nav-link" href="/notes">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Jegyzetek
                        </a>
                        <a class="nav-link" href="/note/new">
                            <i class="fa fa-plus" aria-hidden="true"></i> Új jegyzet
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="nav-item">
                        <a class="nav-link" href="/companies">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Megrendelő cégek
                        </a>
                        <a class="nav-link" href="/company/new">
                            <i class="fa fa-plus" aria-hidden="true"></i> Új hozzáadása
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="nav-item">
                        <a class="nav-link" href="/employees">
                            <i class="fa fa-id-card" aria-hidden="true"></i> Megrendelők / Kapcsolatok
                        </a>
                        <a class="nav-link" href="/employee/new">
                            <i class="fa fa-plus" aria-hidden="true"></i> Új hozzáadása
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="nav-item">
                        <div class="nav-link">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Erőforrások
                        </div>
                        <div class="dropdown-divider-dark"></div>
                        <div class="nav-item">
                            <a class="nav-link" href="/workers">
                                <i class="fa fa-users" aria-hidden="true"></i> Dolgozók
                            </a>
                            <a class="nav-link" href="/worker/new">
                                <i class="fa fa-plus" aria-hidden="true"></i> Új hozzáadása
                            </a>
                        </div>
                        <div class="dropdown-divider-dark"></div>
                        <div class="nav-item">
                            <a class="nav-link" href="/trucks">
                                <i class="fa fa-truck" aria-hidden="true"></i> Teherautók
                            </a>
                            <a class="nav-link" href="/truck/new">
                                <i class="fa fa-plus" aria-hidden="true"></i> Új hozzáadása
                            </a>
                        </div>
                        <div class="dropdown-divider-dark"></div>
                        <div class="nav-item">
                            <a class="nav-link" href="/subcontractors">
                                <i class="fa fa-user-plus" aria-hidden="true"></i> Alvállalkozók
                            </a>
                            <a class="nav-link" href="/subcontractor/new">
                                <i class="fa fa-plus" aria-hidden="true"></i> Új hozzáadása
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        {{-- /Left side navigation --}}