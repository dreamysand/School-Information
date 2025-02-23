<script>
let idleTime = 0;
const resetTime = 100*1000;

function trackActivity() {
    window.onload = resetIdle;
    window.onmousemove = resetIdle;
    window.onmousedown = resetIdle;
    window.ontouchstart = resetIdle;
    window.onclick = resetIdle;
    window.onkeypress = resetIdle;
    window.addEventListener('scroll', resetIdle, true);
}

function startReset() {
    idleTime = setTimeout(() => {
        console.log('Pengguna Tidak Melakukan Aktivitas, logging out...'); // Tambahkan log untuk pengujian
        window.location.href = 'logout.php';
    }, resetTime);
}

function resetIdle() {
    console.log('Aktivitas Terdeteksi'); // Tambahkan log
    clearTimeout(idleTime);
    startReset();
}

trackActivity();
startReset();
</script>
