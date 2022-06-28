<?php
    function active($url) {
         return ((substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1)) == $url) ? "" : "collapsed";
    }
?>

<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link <?php echo $cls = ((substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1)) == "dashboard.php")  ? "" : "collapsed"; ?>" href="/bookreview/dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-heading">BOOKS</li>
            <li class="nav-item">
                <a class="nav-link <?php echo $cls = ((substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1)) == "addbooks.php")  ? "" : "collapsed"; ?>" href="/bookreview/admin/addbooks.php">
                    <i class="bi bi-cloud-plus"></i>
                    <span>Add Books</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo active("books.php"); ?>" href="/bookreview/admin/books.php">
                    <i class="bi bi-gear"></i>
                    <span>Books View | Edit | Delete</span>
                </a>
            </li>

            <li class="nav-heading">SUMMARIES</li>
            <li class="nav-item">
                <a class="nav-link <?php echo active("addsummary.php"); ?>" href="/bookreview/admin/addsummary.php">
                    <i class="bi bi-chat-square-dots"></i>
                    <span>Add Summary</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo active("summary.php"); ?>" href="/bookreview/admin/summary.php">
                    <i class="bi bi-gear"></i>
                    <span>Summary Edit | Delete</span>
                </a>
            </li>

            <li class="nav-heading">PHOTOS</li>
            <li class="nav-item">
                <a class="nav-link <?php echo active("media.php"); ?>" href="/bookreview/admin/media.php">
                    <!-- <i class="bi bi-gear"></i> -->
                    <i class="bi bi-images"></i>
                    <span>Photo Edit | Delete</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->