<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Generate PDF</title>
</head>
<body>
    <button onclick="startGenerate()">Mulai Buat PDF</button>
    <button onclick="checkStatus()">Cek Status</button>
    <a id="downloadLink" href="src/download_pdf.php" style="display:none;">Download PDF</a>

    <script>
        function startGenerate() {
            fetch('src/start_generate.php').then(response => response.text()).then(data => {
                alert(data);
            });
        }

        function checkStatus() {
            fetch('src/check_status.php').then(response => response.text()).then(data => {
                alert(data);
                if (data === 'PDF siap untuk diunduh.') {
                    document.getElementById('downloadLink').style.display = 'block';
                }
            });
        }
    </script>
</body>
</html>
