<?php 	
require_once '../db_connect.php'; 
$valid['success'] = array('success' => false, 'messages' => array());
?>
<body>
    <form method="post" enctype="multipart/form-data" action="file.php">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>