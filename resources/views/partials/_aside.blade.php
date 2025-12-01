<aside class="navbar navbar-vertical navbar-expand-sm" data-bs-theme="dark">
    <div class="container-fluid">

        <!-- Brand/Logo -->
        <a href="#"
            class="navbar-brand navbar-brand-autodark d-flex justify-content-center align-items-center gap-2 mt-3">
            <!-- SVG Icon for ITSM+ -->
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5rem; height: 2.5rem;" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-devices-pc">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 5h6v14h-6z" />
                <path d="M12 9h10v7h-10z" />
                <path d="M14 19h6" />
                <path d="M17 16v3" />
                <path d="M6 13v.01" />
                <path d="M6 16v.01" />
            </svg>
            <span>ITSM+</span>
        </a>

        <!-- Sidebar Menu - Collapses on mobile, expands on 'sm' and up -->
        <div class="navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                            stroke-width="2" class="icon me-2">
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Ticket Request -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('request') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-ticket me-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 5l0 2" />
                            <path d="M15 11l0 2" />
                            <path d="M15 17l0 2" />
                            <path
                                d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" />
                        </svg>
                        <span>Ticket Request</span>
                    </a>
                </li>

                @auth

                    @php
                        $userPosition = auth()->user()->position;
                    @endphp

                    @if ($userPosition == 'IT Manager' || $userPosition == 'Financial Director')

                        {{-- 1. IT/Finance Approval View --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('it-manager.approval') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-gavel me-2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M13 10l7.383 7.418c.823 .82 .823 2.148 0 2.967a2.11 2.11 0 0 1 -2.976 0l-7.407 -7.385" />
                                    <path d="M6 9l4 4" />
                                    <path d="M13 10l-4 -4" />
                                    <path d="M3 21h7" />
                                    <path
                                        d="M6.793 15.793l-3.586 -3.586a1 1 0 0 1 0 -1.414l2.293 -2.293l.5 .5l3 -3l-.5 -.5l2.293 -2.293a1 1 0 0 1 1.414 0l3.586 3.586a1 1 0 0 1 0 1.414l-2.293 2.293l-.5 -.5l-3 3l.5 .5l-2.293 2.293a1 1 0 0 1 -1.414 0z" />
                                </svg>
                                <span>Approval</span>
                            </a>
                        </li>

                    @elseif ($userPosition == 'IT Supervisor' || $userPosition == 'IT Consultant' || $userPosition == 'IT Senior')

                        {{-- 2. IT Personnel Assignation View --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="icon icon-tabler icons-tabler-outline icon-tabler-users-plus me-2"></i>
                                <span>IT Personnel Assignation</span>
                            </a>
                        </li>

                    @elseif ($userPosition == 'IT Specialist' || $userPosition == 'System Analyst Programmer')

                        {{-- 3. Department Review View --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="icon icon-tabler icons-tabler-outline icon-tabler-eye-check me-2"></i>
                                <span>Department Review</span>
                            </a>
                        </li>

                    @elseif ($userPosition == 'Manager')

                        {{-- 4. General Manager Approval View (Your original condition) --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('review') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                    <path d="M21 21l-6 -6" />
                                </svg>
                                <span>Ticket Review</span>
                            </a>
                        </li>

                    @endif

                @endauth


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('request') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-ticket me-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 5l0 2" />
                            <path d="M15 11l0 2" />
                            <path d="M15 17l0 2" />
                            <path
                                d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" />
                        </svg>
                        <span>Track Tickets</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('guides') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-book me-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                            <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                            <path d="M3 6l0 13" />
                            <path d="M12 6l0 13" />
                            <path d="M21 6l0 13" />
                        </svg>
                        <span>Guides</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('request') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-search me-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                        <span>Troubleshooting</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('request') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-file-info me-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                            <path d="M11 14h1v4h1" />
                            <path d="M12 11h.01" />
                        </svg>
                        <span>FAQs</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</aside>
