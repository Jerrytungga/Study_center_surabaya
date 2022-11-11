<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="traines.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Traines
                            </a>
                            <a class="nav-link" href="sekolah.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                Sekolah
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kontakan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="kontakan.php">List Kontakan</a>
                                    <a class="nav-link" href="followup.php">Follow Up</a>
                                </nav>
                            </div>
                        
                           
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#jadwal" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Daftar Kelas 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="jadwal" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="kelas_reguler.php">Reguler</a>
                                    <a class="nav-link" href="kelas_ekstra.php">Ekstrakurikuler</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="study_center.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Data Registrasi Study Center
                            </a>
                            <a class="nav-link" href="semester_reguler.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Semester & Reguler
                            </a>
                          
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <strong><?= $data['nama'];?></strong>
                    </div>
                </nav>