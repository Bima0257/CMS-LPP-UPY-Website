<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="/work-programs" class=" waves-effect">
                        <i class="ri-calendar-todo-fill"></i>
                        <span>Program Kerja</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-3-line"></i>
                        <span>Manajemen Sistem</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        @can('superadmin-access')
                            <li>
                                <a href="/users-management" class=" waves-effect">
                                    <i class="ri-folder-user-line"></i>
                                    <span>Manajemen Akun</span>
                                </a>
                            </li>

                            <li>
                                <a href="/members" class=" waves-effect">
                                    <i class="ri-team-line"></i>
                                    <span>Manajemen Anggota</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-global-line"></i>
                        <span>Konten Website</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        @can('superadmin-access')
                            <li>
                                <a href="/menu-setting" class=" waves-effect">
                                    <i class="ri-list-settings-line"></i>
                                    <span>Pengaturan Menu</span>
                                </a>
                            </li>

                            <li>
                                <a href="/carousels-management" class=" waves-effect">
                                    <i class="ri-layout-right-2-line"></i>
                                    <span>Konten Carousel</span>
                                </a>
                            </li>

                            <li>
                                <a href="/banner-setting" class=" waves-effect">
                                    <i class="ri-image-2-fill"></i>
                                    <span>Pengaturan Banner</span>
                                </a>
                            </li>


                            <li>
                                <a href="/services" class=" waves-effect">
                                    <i class="ri-external-link-line"></i>
                                    <span>Layanan</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-folder-2-line"></i>
                        <span>Dokumen</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="/documents-management">
                                <i class="ri-folder-2-line"></i> <span>Data Dokumen</span>
                            </a>
                        </li>

                        @can('superadmin-access')
                            <li>
                                <a href="/documents-categories" class=" waves-effect">
                                    <i class="ri-function-line"></i>
                                    <span>Kategori Dokumen</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-article-line"></i>
                        <span>Artikel</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="/posts-management">
                                <i class="ri-article-line"></i> <span>Data Artikel</span>
                            </a>
                        </li>

                        @can('superadmin-access')
                            <li>
                                <a href="/posts-categories" class=" waves-effect">
                                    <i class="ri-apps-line"></i>
                                    <span>Kategori Artikel</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>

                <li>
                    <a href="/messages" class=" waves-effect">
                        <i class="ri-chat-1-line"></i>
                        <span>Pesan</span>
                        <span id="unreadBadge"
                            class="badge bg-danger rounded-pill ms-2 {{ $unreadCount <= 0 ? 'd-none' : '' }}">
                            {{ $unreadCount }}
                        </span>
                    </a>
                </li>

                @can('superadmin-access')
                    <li>
                        <a href="/about-settings" class=" waves-effect">
                            <i class="ri-information-line"></i>
                            <span>Tentang</span>
                        </a>
                    </li>
                @endcan

                <li>
                    <a href="/logout" class=" waves-effect">
                        <i class="ri-logout-circle-r-line"></i>
                        <span>Keluar</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<script>
    function checkUnreadMessages() {

        fetch('/messages/unread-count')
            .then(response => response.json())
            .then(data => {

                const badge = document.getElementById('unreadBadge');

                if (!badge) return;

                if (data.count > 0) {

                    badge.classList.remove('d-none');

                    badge.textContent = data.count;

                } else {

                    badge.classList.add('d-none');

                }

            })
            .catch(error => {

                console.error('Error unread count:', error);

            });
    }

    // First load
    checkUnreadMessages();

    // Realtime tiap 5 detik
    setInterval(checkUnreadMessages, 5000);
</script>
