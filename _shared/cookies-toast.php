<?php
    session_start();
    if (isset($_POST['accept_cookies'])) {
        setcookie('cookies_accepted', 'true'); // per 30 giorni
        // header("location: index.php");
        exit;
        // echo '<script>console.log("post: ",'.$_POST['accept_cookies'].')</script>';
        // echo '<script>console.log("cookie: ",'.$_COOKIE['cookies_accepted'].')</script>';
    }

    $cookies_accepted = (isset($_COOKIE['cookies_accepted']) && $_COOKIE['cookies_accepted'] === 'true');
    // echo '<script>console.log("var: ",'.$cookies_accepted.')</script>';
?>

<?php if (!$cookies_accepted): ?>
    <div class="w-100 vh-100">
        <div class="toast-container position-fixed bottom-0 end-0 p-2" id="cookieToastContainer">
            <div class="toast rounded-0 w-100" role="alert" aria-live="assertive" aria-atomic="true" id="cookiesToast" data-bs-autohide="false">
                <div class="toast-header border-0 flex-column">
                    <strong class="m-0 p-2 pt-0">We care about your privacy</strong>
                    <div class="w-100 border-bottom"></div>
                </div>
                <div class="toast-body pt-0 opacity-100">
                    <p>
                        This site uses cookies, including third-party cookies, to improve your browsing experience and collect information about your use of the site. For more details and to manage your preferences, see our <a class="link-success" onclick="location.href='https://maps.app.goo.gl/MiLto7uFNrvDmgBHA'" href="javascript:void(0)">cookie policy</a>. By clicking “Accept,” you consent to the use of cookies.
                    </p>
                    <div class="mt-2">
                        <form action="cookies-toast.php" method="post">
                            <button type="submit" class="btn btn-success btn-sm rounded-0" name="accept_cookies" value="true" data-bs-dismiss="toast">Accept</button>
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-0" data-bs-dismiss="toast">Reject</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    window.onload = function() {
        <?php if (!$cookies_accepted): ?>
            var toastElement = document.getElementById('cookiesToast');
            var toast = new bootstrap.Toast(toastElement);
            toast.show();
        <?php endif; ?>
    };
</script>