<!-- Top Bar -->
<div id="top-bar">

  <div class="container clearfix">

    <div class="col_half nobottommargin">

      <!-- Top Links
      ============================================= -->
      <div class="top-links">
        <ul>
          <li><a href="{{ route('home') }}">Puskopdit BKCU Kalimantan</a></li>
        </ul>
      </div><!-- .top-links end -->

    </div>

    <div class="col_half fright col_last nobottommargin">

        <!-- Top Social
        ============================================= -->
        <div id="top-social">
          <ul>
            <li><a href="https://www.facebook.com/PuskopditBKCUKalimantan/?rf=547963498564679" class="si-facebook" target="_blank"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>

            <li><a href="https://twitter.com/bkcu_kalimantan" class="si-twitter"><span class="ts-icon" target="_blank"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>

            <li><a href="https://www.instagram.com/bkcukalimantan/?hl=id" class="si-instagram" target="_blank"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>

            <li><a href="tel:+62561765591" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+62 561-765591</span></a></li>

            <li><a href="mailto:cucoborneo@hotmail.com" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">cucoborneo@hotmail.com</span></a></li>
          </ul>
        </div><!-- #top-social end -->

    </div>

  </div>

</div>

<!-- Header -->
<header id="header" class="full-header">
	<div id="header-wrap">
		<div class="container">
			<div class="header-row">

                <div class="header-misc">
                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="{{ route('artikel.cari.cu',['cu'=>$subdomain,'cari' => request('cari')] ) }}" method="get">
                            <input type="text" name="cari" class="form-control" value="{{ request('cari') }}" placeholder="Cari Artikel">
                        </form>
                    </div>
                    <!-- #top-search end -->

                    <!-- <div class="dropdown mx-3 mr-lg-0">
                        <a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item text-left" href="/profileAnggota">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-left" href="/logout">Logout<i class="icon-signout"></i></a>
                        </ul>
                    </div> -->
                </div>

                <div id="primary-menu-trigger">
				    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
				</div>
    
                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">
                    @php $subdomain = Route::input('cu') @endphp
                    <ul class="menu-container">
                        <!-- home -->
                        <!-- <li class="{{ Request::is('/') ? 'current' : '' }}">
                            <a href="{{ route('home.cu', $subdomain) }}">
                                <div>CU {{ ucwords(str_replace('-', ' ', $subdomain)) }}</div>
                            </a>
                        </li> -->

                        <!-- dashboard anggota -->
                        <li class="menu-item">
                            <a href="/dashboardCu">
                                <div>Data Keuangan Anggota</div>
                            </a>
                        </li>

                        <!-- aset anggota -->
                        <li class="menu-item">
                            <a href="/pinjamanAnggota">
                                <div>Pinjaman</div>
                            </a>
                        </li>

                        <!-- profile anggota -->
                        <li class="menu-item">
                            <a href="/profileAnggota">
                                <div>Profil</div>
                            </a>
                        </li>

                        <!-- logout -->
                        <li class="menu-item">
                            <a href="/logout">
                                <div>Logout</div>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- #primary-menu end -->
			</div>
		</div>
	</div>
    
    <div class="header-wrap-clone"></div>
    
</header><!-- #header end -->