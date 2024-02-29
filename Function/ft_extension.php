<?php

function getAndVerify($givenExtension) {
    $extensions = array(
        "Documents texte" => array(".doc", ".docx", ".pdf", ".txt", ".rtf"),
        "Feuilles de calcul" => array(".xls", ".xlsx", ".csv"),
        "Présentations" => array(".ppt", ".pptx"),
        "Images" => array(".jpg", ".jpeg", ".png", ".gif", ".bmp", ".tiff"),
        "Vidéos" => array(".mp4", ".mov", ".avi", ".wmv", ".flv", ".mkv"),
        "Audio" => array(".mp3", ".wav", ".flac", ".aac"),
        "Archives" => array(".zip", ".rar", ".7z"),
        "Fichiers de conception" => array(".psd", ".ai", ".indd"),
        "Fichiers de code source" => array(".html", ".css", ".js", ".php", ".py", ".java", ".cpp", ".c", ".rb", ".xml"),
        "Fichiers de présentation et de design" => array(".key", ".sketch", ".xd", ".fig"),
        "Fichiers de données" => array(".json", ".xml", ".csv"),
        "Fichiers de sauvegarde" => array(".bak", ".sql"),
        "Fichiers de configuration" => array(".ini", ".cfg", ".conf"),
        "Fichiers de texte enrichi" => array(".rtf", ".odt")
    );

    foreach ($extensions as $type => $extension) {
        if (in_array($givenExtension, $extension)) {
            return true;
        }
    }

    return false;
}