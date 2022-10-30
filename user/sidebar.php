<nav class="sb-sidenav accordion sb-sidenav-dark bg-success" id="sidenavAccordion">
<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Menu</div>
        <a class="nav-link" href="index.php">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>
        <div class="sb-sidenav-menu-heading">Data</div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
            Kontakan
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="kontakan.php">List Kontakan</a>
                <a class="nav-link" href="followup.php">Follow Up</a>
            </nav>
        </div>
        
       
        <!-- <div class="sb-sidenav-menu-heading">Addons</div>
        <a class="nav-link" href="charts.html">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Charts
        </a>
        <a class="nav-link" href="tables.html">
            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
            Tables
        </a>
    </div> -->

</div>
</div>
<div class="sb-sidenav-footer bg-success">
    <div class="small">Logged in as:</div>
    <strong><?=  $namaTraines; ?></strong>
    
</div>
</nav>