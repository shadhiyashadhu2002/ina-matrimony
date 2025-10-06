<?php
// Simple test to show featured profiles without Laravel session
header('Content-Type: application/json');

try {
    // Get available photos from uploads folder
    $uploadPath = __DIR__ . '/uploads/all';
    $availablePhotos = [];
    
    if (is_dir($uploadPath)) {
        $files = scandir($uploadPath);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
        
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($extension, $imageExtensions)) {
                    $availablePhotos[] = $file;
                }
            }
        }
    }
    
    // Create sample profiles with actual photos
    $sampleNames = [
        'Priya Sharma', 'Arjun Menon', 'Meera Krishna', 'Rohit Pillai', 
        'Anjali Nair', 'Vishnu Namboothiri', 'Sneha Varma', 'Anand Kumar'
    ];
    
    $profiles = [];
    $photoCount = min(count($availablePhotos), 6);
    
    for ($i = 0; $i < $photoCount; $i++) {
        $profiles[] = [
            'name' => $sampleNames[$i % count($sampleNames)],
            'photo' => '/uploads/all/' . $availablePhotos[$i],
            'code' => 'INA' . str_pad($i + 1001, 4, '0', STR_PAD_LEFT),
            'age' => rand(23, 35),
            'occupation' => ['Software Engineer', 'Doctor', 'Teacher', 'Business Analyst', 'Nurse', 'Marketing Manager'][$i % 6]
        ];
    }

    echo json_encode([
        'success' => true,
        'profiles' => $profiles,
        'count' => count($profiles),
        'available_photos' => count($availablePhotos)
    ], JSON_PRETTY_PRINT);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>