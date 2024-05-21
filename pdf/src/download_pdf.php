<?php

if (file_exists('output.pdf')) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="output.pdf"');
    readfile('output.pdf');
} else {
    echo "PDF belum siap untuk diunduh.";
}
