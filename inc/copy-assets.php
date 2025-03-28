
<?php
/**
 * Script to copy assets from the React build to the WordPress theme
 * This file is only used during development and can be safely removed from the production theme
 */

// Source and destination paths
$src_path = dirname(__DIR__, 2) . '/public/lovable-uploads/';
$dest_path = dirname(__DIR__) . '/assets/images/';

// Create destination directory if it doesn't exist
if (!file_exists($dest_path)) {
    mkdir($dest_path, 0755, true);
}

// Files to copy
$files = [
    'Logo.svg',
    'maybe-hero.jpg',
    'maybe-hero2.jpg',
    'wood-grain.jpg',
    'wood-samples.jpg',
    'PM-CNC-InUse-1.jpg',
    'cargo-unloading.jpg',
    'cad.png',
];

// Copy each file
foreach ($files as $file) {
    if (file_exists($src_path . $file)) {
        copy($src_path . $file, $dest_path . $file);
        echo "Copied: $file\n";
    } else {
        echo "Warning: Source file not found: $file\n";
    }
}

echo "Asset copy complete.\n";
