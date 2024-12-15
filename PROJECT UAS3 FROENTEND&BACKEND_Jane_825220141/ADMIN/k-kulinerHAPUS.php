<!DOCTYPE html>
<html lang="en">
   <?php include "include/head.php";?></include>
    <body class="sb-nav-fixed">
        <?php include "include/menunav.php";?>
        <div id="layoutSidenav">
            <?php include "include/menu.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <ol class="breadcrumb mb-4">
                        <h1 class="mt-4">Daftar Kuliner</h1>
                            <li class="breadcrumb-item active">Destinasi Kuliner</li>
                        </ol>
                        <?php include "kulinerHAPUS.php";?>
                        
                        
                    </div>
                </main>
                <?php include "include/footer.php";?>
            </div>
        </div>
        <?php include "include/jsscript.php";?>
    </body>
</html>
