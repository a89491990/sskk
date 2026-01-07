<?php
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tempName = $_FILES['image']['tmp_name'];
    $fileName = 'uploads/' . time() . '_' . basename($_FILES['image']['name']);
    
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true);
    }
    
    if (move_uploaded_file($tempName, $fileName)) {
        echo json_encode([
            'status' => 'success',
            'file' => $fileName
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to move uploaded file'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'File upload error'
    ]);
}
?>
