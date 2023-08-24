<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/home" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                        class="hide-menu">Transaksi Surat </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('surat-masuk') }}" class="sidebar-link"><i class="me-2 mdi mdi-email"></i><span class="hide-menu"> Surat Masuk
                                </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('surat-keluar') }}" class="sidebar-link"><i class="me-2 mdi mdi-email-open"></i><span class="hide-menu"> Surat Keluar
                                </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                    href="{{ route('trash_m') }}" aria-expanded="false"><i class="me-2 mdi mdi-delete"></i><span
                        class="hide-menu">Tempat Sampah</span></a></li>
                    @if (Auth::user()->role == 'admin')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/user" aria-expanded="false"><i class="ri-user-fill"></i></i><span
                            class="hide-menu">User</span></a></li>
                    @endif



                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>