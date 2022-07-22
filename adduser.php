<?php
$username = "abcd";
$password = "456789";
$expired = "5";
if (!function_exists("ssh2_connect")) die("function ssh2_connect doesn't exist");
// log in at server1.example.com on port 22
if(!($con = ssh2_connect("178.128.119.220", 22))){
echo "fail: unable to establish connection\n";
} else {
// try to authenticate with username root, password secretpassword
if(!ssh2_auth_password($con, "root", "C79#0Ag3Myb)Yk")) {
    echo "fail: unable to authenticate\n";
} else {
    // allright, we're in!
    echo "okay: logged in...\n";

    // execute a command
    if (!($stream = ssh2_exec($con, "passwd 'haha'"))){
        echo "fail: unable to execute command\n";
    } else {
        // collect returning data from command
        stream_set_blocking($stream, true);
        $data = "";
        while ($buf = fread($stream,4096)) {
            $data .= $buf;
        }
        echo "Username berhasil dibuat";
        echo $data;
        fclose($stream);
}
}
}
?>
