	session_start();
$t=time();
if (isset($_SESSION['logged']) && ($t - $_SESSION['logged'] > 900)) {
    session_destroy();
    session_unset();
    header('location: index.html');
}else {
    $_SESSION['logged'] = time();
}      