<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('admin/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>

                            {{ auth()->user()->name }}
                            <span class="user-level">{{ auth()->user()->level }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="nav nav-primary">

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>



                            @if (auth()->user()->level == 'admin'))
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#base">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Transaksi</p>
                                    <span class="caret"></span>
                                </a>



                                <div class="collapse" id="base">
                                    <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('dataoutlet') }}">
                                    <span class="sub-item">Data Outlet</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('data-paket') }}">
                                    <span class="sub-item">Data Paket</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{ route('data-transaksi') }}">
                                    <span class="sub-item">Transaksi</span>
                                </a>
                            </li>


                            <li>   <li>
                                <a href="{{ route('history-transaksi',auth()->user()->id_outlet) }}">
                                    <span class="sub-item">History Transaksi</span>
                                </a>
                            </li></li>










                        </ul>
                        <li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Menu Levels</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
                                    <li>
                                        <a href="/member">
                                            <span class="sub-item">Data Member</span>
                                        </a>
                                    </li>

                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#maps">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Outlet</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="maps">

                        <ul class="nav nav-collapse">
                            @forelse ($outlet as $data )
                            <li>
                                <a href="/laporanoutlet/{{ $data->id }}">
                                    <span class="sub-item">{{ $data->nama }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </li>

                </li>
                @elseif (auth()->user()->level == 'kasir')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Transaksi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">



                <li>
                    <a href="{{ route('data-transaksi') }}">
                        <span class="sub-item">Tranasksi</span>
                    </a>
                </li>

                        </ul>



                @elseif (auth()->user()->level == 'Owner')
                <li class="nav-item">
                    <a data-toggle="collapse" href="#maps">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Outlet</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="maps">

                        <ul class="nav nav-collapse">

                            <li>
                                <a href="/laporanoutlet/{{ auth()->user()->id_outlet }}">
                                    <span class="sub-item">Laporan Outlet</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </li>
                @endif
                <li class="mx-4 mt-2">
                    <a href="{{ route('logout') }}" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
